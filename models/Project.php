<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property integer $name
 * @property integer $base_station_id
 * @property integer $customer_id
 * @property integer $status_id
 * @property integer $cost
 * @property integer $paid
 * @property integer $drawing
 * @property string $begin_date
 * @property string $end_date
 *
 * @property Status $status
 * @property BaseStation $baseStation
 * @property Customer $customer
 */
class Project extends \yii\db\ActiveRecord
{
    public $region_id;
    public $mobile_operator_id;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['base_station_id', 'name', 'customer_id', 'status_id', 'cost', 'mobile_operator_id', 'region_id'], 'required'],
            [['base_station_id', 'customer_id', 'status_id', 'cost', 'paid', 'drawing'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['begin_date', 'end_date'], 'safe'],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['base_station_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaseStation::className(), 'targetAttribute' => ['base_station_id' => 'id']],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ид',
            'base_station_id' => 'БС',
            'name' => 'Название',
            'customer_id' => 'Заказчик',
            'status_id' => 'Статус',
            'cost' => 'Стоимость',
            'paid' => 'Оплачено',
            'drawing' => 'Ситуационный план',
            'begin_date' => 'Дата начала',
            'end_date' => 'Дата конца',
            'region_id' => 'Регион',
            'description' => 'Примечание',
            'baseStationName' => 'БС',
            'customerName' => 'Заказчик',
            'statusName' => 'Статус',
            'regionName' => 'Регион',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    public function getStatusName() 
    {
        return $this->status->name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseStation()
    {
        return $this->hasOne(BaseStation::className(), ['id' => 'base_station_id']);
    }

    public function getBaseStationName() 
    {
        return $this->baseStation->name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    public function getCustomerName()
    {
        return $this->customer->name;
    }

    public function getRegion() 
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id'])
            ->via('baseStation');
    }

    public function getRegionName() 
    {
        return $this->region->name;
    }

}
