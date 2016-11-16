<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\MobileOperator;
use app\models\Region;

/* @var $this yii\web\View */
/* @var $model app\models\BaseStation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="base-station-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region_id')->dropDownList(
      ArrayHelper::map(Region::find()->all(), 'id', 'name'),
      ['prompt' => '--- Выберите регион ---' ]
    ) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile_operator_id')->dropDownList(
      ArrayHelper::map(MobileOperator::find()->all() , 'id', 'name'),
      ['prompt' => '--- Выберите оператора ---' ]
    ) ?> 

    <?= $form->field($model, 'date_begin')->textInput(['data-mask'=>'9999-99-99']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', 
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
