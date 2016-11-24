<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property integer $id
 * @property string $name
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 100],
            [['sort'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ид',
            'name' => 'Название',
            'sort' => 'Порядок сортировки',
        ];
    }

    public function beforeSave($insert) 
    {
        if (parent::beforeSave($insert)) {
            if ($this->sort == NULL) {
                $this->sort = 0;
            }
            return true;
        }
    }
}
