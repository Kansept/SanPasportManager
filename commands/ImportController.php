<?php

namespace app\commands;

use yii\console\Controller;
use app\models\OrlovAntennas;

class ImportController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionOrlovAntennas()
    {
        $fileName = "/var/www/public/download/test.xlsx";
        \PHPExcel_Settings::setCacheStorageMethod(\PHPExcel_CachedObjectStorageFactory::cache_in_memory_gzip);
        $xls = \PHPExcel_IOFactory::load($fileName);
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
            $OrlovAntennasItem->insert();
            unset($OrlovAntennasItem);
        }

        echo "import rows - " . $sheet->getHighestRow() . "\n";

        return 0;
    }
}
