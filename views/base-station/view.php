<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BaseStation */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'БС', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="base-station-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'mobileOperatorName',
            'name',
            'regionName',
            'address',
            [ 
                'label' => 'Координаты',
                'value' => Html::a(
                    $model['latitude'] . ' ' . $model['longitude'], 
                    'http://yandex.ru/maps/?mode=search&text=' . $model['latitude'] . ' ' . $model['longitude'],
                    ['target' => '_blank']
                ),
                'format' => 'raw',
            ],
            'date_begin',
        ],
    ]) ?>
</div>
