<?php

namespace app\behaviors;

use yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

class WithoutWhitespaceBehavior extends AttributeBehavior
{
    public $field;

    public function getValue($event)
    {
        return str_replace(' ', '', $this->owner->attributes[$this->field]);
    }
}
