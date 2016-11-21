<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
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
            [['base_station_id', 'customer_id', 'status_id', 'cost'], 'required'],
            [['base_station_id', 'customer_id', 'status_id', 'cost', 'paid', 'drawing'], 'integer'],
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
            'id' => 'ID',
            'base_station_id' => 'Base Station ID',
            'customer_id' => 'Customer ID',
            'status_id' => 'Status ID',
            'cost' => 'Cost',
            'paid' => 'Paid',
            'drawing' => 'Drawing',
            'begin_date' => 'Begin Date',
            'end_date' => 'End Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseStation()
    {
        return $this->hasOne(BaseStation::className(), ['id' => 'base_station_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }
}
