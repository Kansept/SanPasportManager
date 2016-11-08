<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orlov_bcf".
 *
 * @property integer $id
 * @property string $region
 * @property integer $number_cabinet
 * @property string $config
 * @property string $name
 * @property string $operation_type
 * @property string $launch_date
 */
class OrlovBcf extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orlov_bcf';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number_cabinet'], 'integer'],
            [['launch_date'], 'safe'],
            [['region', 'config', 'operation_type'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region' => 'Region',
            'number_cabinet' => 'Number Cabinet',
            'config' => 'Config',
            'name' => 'Name',
            'operation_type' => 'Operation Type',
            'launch_date' => 'Launch Date',
        ];
    }
}
