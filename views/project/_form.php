<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\BaseStation;
use app\models\Customer;
use app\models\Region;
use app\models\Status;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<?php 
$urlListBs = Url::toRoute(['base-station/list', 'id' => '']);

$loadBaseStation = <<< JS
  $('select#project-base_station_id').prop('disabled', true);
  $.post('{$urlListBs}' + $(this).val(), function(data) {
    $('select#project-base_station_id')
      .html(data)
      .prop('disabled', false);
  });
JS;
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'region_id')->dropDownList(
      ArrayHelper::map(Region::find()->all(), 'id', 'name'),
      [
        'prompt' => '--- Выберите регион ---',
        'onchange' => $loadBaseStation,
      ]
    ) ?>

    <?= $form->field($model, 'base_station_id')->dropDownList(
      [],
      [
        'prompt' => '--- Выберите БС ---',
        'disabled' => 'disabled',
      ]
    ) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_id')->dropDownList(
      ArrayHelper::map(Customer::find()->all(), 'id', 'name'),
      ['prompt' => '--- Выберите заказчика ---' ]
    ) ?> 

    <?= $form->field($model, 'status_id')->dropDownList(
      ArrayHelper::map(Status::find()->all(), 'id', 'name'),
      ['prompt' => '--- Выберите статус проекта ---' ]
    ) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'paid')->textInput() ?>

    <?= $form->field($model, 'drawing')->checkBox() ?>

    <?= $form->field($model, 'begin_date')->textInput(['data-mask'=>'9999-99-99']) ?>

    <?= $form->field($model, 'end_date')->textInput(['data-mask'=>'9999-99-99']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
