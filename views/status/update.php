<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Status */

$this->title = 'Редактировать статус: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Статусы проекта', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
