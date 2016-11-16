<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mobile_operator".
 *
 * @property integer $id
 * @property string $name
 *
 * @property BaseStation[] $baseStations
 */
class MobileOperator extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mobile_operator';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['name'], 'unique'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseStations()
    {
        return $this->hasMany(BaseStation::className(), ['mobile_operator_id' => 'id']);
    }
}
