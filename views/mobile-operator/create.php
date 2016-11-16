<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MobileOperator */

$this->title = 'Добавить мобильного оператора';
$this->params['breadcrumbs'][] = ['label' => 'Мобильные операторы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobile-operator-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
