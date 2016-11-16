<?php

namespace app\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use app\behaviors\WithoutWhitespaceBehavior;

/**
 * This is the model class for table "base_station".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property integer $region_id
 * @property string $latitude
 * @property string $longitude
 * @property integer $mobile_operator_id
 * @property string $date_begin
 *
 * @property MobileOperator $mobileOperator
 * @property Region $region
 */
class BaseStation extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'base_station';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'region_id', 'mobile_operator_id'], 'required'],
            [['region_id', 'mobile_operator_id'], 'integer'],
            [['date_begin'], 'safe'],
            [['name', 'address'], 'string', 'max' => 250],
            [['latitude', 'longitude'], 'string', 'max' => 50],
            [['address'], 'unique'],
            [['mobile_operator_id'], 'exist', 'skipOnError' => true, 'targetClass' => MobileOperator::className(), 'targetAttribute' => ['mobile_operator_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'address' => 'Адрес',
            'region_id' => 'Регион',
            'latitude' => 'Широта',
            'longitude' => 'Долгота',
            'mobile_operator_id' => 'Оператор',
            'date_begin' => 'Дата запуска в эсплуатацию',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => WithoutWhitespaceBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'latitude',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'latitude',
                ],
                'field' => 'latitude',
            ],
            [
                'class' => WithoutWhitespaceBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'longitude',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'longitude',
                ],
                'field' => 'longitude',
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMobileOperator()
    {
        return $this->hasOne(MobileOperator::className(), ['id' => 'mobile_operator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }
}
