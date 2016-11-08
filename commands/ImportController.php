<?php

namespace app\commands;

use yii\console\Controller;
use app\models\OrlovAntennas;
use app\models\OrlovBcf;

class ImportController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionOrlovAntennas($fileName = 'test.xlsx')
    {
        $filePath = "/var/www/public/download/" . $fileName;
				if (!file_exists($filePath)) {
						echo "File does not exist " . $filePath . "\n";
						return 0;
				}
        \PHPExcel_Settings::setCacheStorageMethod(\PHPExcel_CachedObjectStorageFactory::cache_in_memory_gzip);
        $xls = \PHPExcel_IOFactory::load($filePath);
        $xls->setActiveSheetIndex(0);
        $sheet = $xls->getActiveSheet();

        for ($row = 2; $row <= $sheet->getHighestRow(); $row++) {
            $OrlovAntennasItem = new OrlovAntennas([
								'name'         => (string) $sheet->getCell('C' . $row)->getValue(),
								'address'      => (string) $sheet->getCell('D' . $row)->getValue(),
								'region'       => (string) $sheet->getCell('B' . $row)->getValue(),
								'latitude'     => str_replace(' ', '', (string) $sheet->getCell('F' . $row)->getValue()),
								'longitude'    => str_replace(' ', '', (string) $sheet->getCell('E' . $row)->getValue()),
								'type_sector'  => (string) $sheet->getCell('G' . $row)->getValue(),
								'band'         => (string) $sheet->getCell('J' . $row)->getValue(),
								'height'       => (string) $sheet->getCell('K' . $row)->getValue(),
								'azimuth'      => (string) $sheet->getCell('L' . $row)->getValue(),
								'tilt'         => (string) $sheet->getCell('M' . $row)->getValue(),
								'antenna'      => (string) $sheet->getCell('P' . $row)->getValue(),
								'polarization' => (string) $sheet->getCell('Q' . $row)->getValue(),
            ]);
						if (!$OrlovAntennasItem->insert()) {
								echo "row - " . $row . "\n";
								print_r($OrlovAntennasItem->getErrors());
						}
            unset($OrlovAntennasItem);
				}

        echo "import rows - " . $sheet->getHighestRow() . "\n";

        return 0;
    }

    public function actionOrlovBcf($fileName = 'test_bcf.xls')
    {
        $filePath = "/var/www/public/download/" . $fileName;
				if (!file_exists($filePath)) {
						echo "File does not exist " . $filePath . "\n";
						return 0;
				}
        \PHPExcel_Settings::setCacheStorageMethod(\PHPExcel_CachedObjectStorageFactory::cache_in_memory_gzip);
        $xls = \PHPExcel_IOFactory::load($filePath);
        $xls->setActiveSheetIndex(0);
        $sheet = $xls->getActiveSheet();

				for ($row = 2; $row <= $sheet->getHighestRow(); $row++) {
						$launch_date = (string) $sheet->getCell('M' . $row)->getValue();
						if ($launch_date === "") { 
								$launch_date = NULL;
						} else {
							  $launch_date = \DateTime::createFromFormat( "d.m.Y", $launch_date)->format("Y-m-d");
						}

            $OrlovBcfItem = new OrlovBcf([
								'region'         => (string) $sheet->getCell('A' . $row)->getValue(),
								'number_cabinet' => (integer) $sheet->getCell('I' . $row)->getValue(),
								'config'         => (string) $sheet->getCell('J' . $row)->getValue(),
								'name'           => (string) $sheet->getCell('K' . $row)->getValue(),
								'operation_type' => (string) $sheet->getCell('L' . $row)->getValue(),
								'launch_date'    => $launch_date		
						]);

						if (!$OrlovBcfItem->insert()) {
								echo "row - " . $row . "\n";
								print_r($OrlovBcfItem->getErrors());
						}
            unset($OrlovBcfItem);
				}

        echo "import rows - " . $sheet->getHighestRow() . "\n";

        return 0;
    }

}
