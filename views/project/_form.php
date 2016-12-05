<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\BaseStation;
use app\models\Customer;
use app\models\MobileOperator;
use app\models\Region;
use app\models\Status;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<?php 
$urlListBs = Url::toRoute(['base-station/list']);
$loadBaseStation = <<< JS
  $.post('{$urlListBs}', {
      'region_id': $('select#project-regionid').val(), 
      'mobile_operator_id': $('select#project-mobile_operator_id').val(),
    }, function(data) {
      $('select#project-base_station_id').html(data);
    }
  );
JS;
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mobile_operator_id')->dropDownList(
      ArrayHelper::map(MobileOperator::find()->all(), 'id', 'name'),
      [
        'prompt' => '--- Выберите оператора ---',
        'onchange' => $loadBaseStation,
        'options' => $model->isNewRecord ? '' : [$model->baseStation->mobile_operator_id => ['selected' => true]],
      ]
    ) ?>

    <?= $form->field($model, "region_id")->dropDownList(
      ArrayHelper::map(Region::find()->all(), 'id', 'name'),
      [
        'prompt' => '--- Выберите регион ---',
        'onchange' => $loadBaseStation,
        'options' => $model->isNewRecord ? '' : [$model->region->id => ['selected' => true ]],
      ]
    ) ?>

    <?= $form->field($model, 'base_station_id')->dropDownList(
      ArrayHelper::map(BaseStation::find()->all(), 'id', 'name'),
      [
        'prompt' => '--- Выберите БС ---',
      ]
    ) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_id')->dropDownList(
      ArrayHelper::map(Customer::find()->all(), 'id', 'name'),
      ['prompt' => '--- Выберите заказчика ---' ]
    ) ?> 

    <?= $form->field($model, 'status_id')->dropDownList(
      ArrayHelper::map(Status::find()->orderBy(['sort' => SORT_ASC])->all(), 'id', 'name'),
      ['prompt' => '--- Выберите статус проекта ---' ]
    ) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'paid')->textInput() ?>

    <?= $form->field($model, 'drawing')->checkBox() ?>

    <?= $form->field($model, 'begin_date')->textInput(['data-mask'=>'9999-99-99']) ?>

    <?= $form->field($model, 'end_date')->textInput(['data-mask'=>'9999-99-99']) ?>

    <?= $form->field($model, 'description')->textArea() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
