<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property integer $id
 * @property string $name
 * @property string $source
 * @property integer $base_station_id
 * @property string $link
 *
 * @property BaseStation $baseStation
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['base_station_id'], 'integer'],
            [['name', 'source', 'link'], 'string', 'max' => 255],
            [['base_station_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaseStation::className(), 'targetAttribute' => ['base_station_id' => 'id']],
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
            'source' => 'Source',
            'base_station_id' => 'Base Station ID',
            'link' => 'Link',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseStation()
    {
        return $this->hasOne(BaseStation::className(), ['id' => 'base_station_id']);
    }
}
