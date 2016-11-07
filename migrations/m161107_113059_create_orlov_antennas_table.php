<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orlov_antennas`.
 */
class m161107_113059_create_orlov_antennas_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('orlov_antennas', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
            'address' => $this->string(250),
            'region' => $this->string(50),
            'latitude' => $this->string(50),
            'longitude' => $this->string(50),
            'type_sector' => $this->string(50),
            'band' => $this->string(100),
            'height' => $this->float(),
            'azimuth' => $this->float(),
            'tilt' => $this->integer(),
            'antenna' => $this->string(100),
            'polarization' => $this->string(10)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('orlov_antennas');
    }
}
