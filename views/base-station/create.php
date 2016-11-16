<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BaseStation */

$this->title = 'Добавить БС';
$this->params['breadcrumbs'][] = ['label' => 'БС', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="base-station-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
