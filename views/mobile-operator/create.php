<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MobileOperator */

$this->title = 'Create Mobile Operator';
$this->params['breadcrumbs'][] = ['label' => 'Mobile Operators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobile-operator-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
