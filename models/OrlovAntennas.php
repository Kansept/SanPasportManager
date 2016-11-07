<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orlov_antennas".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $region
 * @property string $latitude
 * @property string $longitude
 * @property string $type_sector
 * @property string $band
 * @property double $height
 * @property double $azimuth
 * @property integer $tilt
 * @property string $antenna
 * @property string $polarization
 */
class OrlovAntennas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orlov_antennas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['height', 'azimuth'], 'number'],
            [['tilt'], 'integer'],
            [['name', 'region', 'latitude', 'longitude', 'type_sector'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 250],
            [['band', 'antenna'], 'string', 'max' => 100],
            [['polarization'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'region' => 'Region',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'type_sector' => 'Type Sector',
            'band' => 'Band',
            'height' => 'Height',
            'azimuth' => 'Azimuth',
            'tilt' => 'Tilt',
            'antenna' => 'Antenna',
            'polarization' => 'Polarization',
        ];
    }
}
