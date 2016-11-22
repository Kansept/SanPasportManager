<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Проекты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить проект', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'regionName',
                'filter' => ArrayHelper::map(app\models\Region::find()->asArray()->all(), 'name', 'name'),
            ],
            'baseStationName',
            [
                'attribute' => 'customer_id',
                'filter' => ArrayHelper::map(app\models\Customer::find()->asArray()->all(), 'id', 'name'),
                'value' => 'customerName',
            ],
            [
                'attribute' => 'status_id',
                'filter' => ArrayHelper::map(app\models\Status::find()->asArray()->all(), 'id', 'name'),
                'value' => 'statusName',
            ],
            'cost',
            [
                'attribute' => 'drawing',
                'filter' => ['0' => 'нет', '1' => 'есть'],
            ],
            'begin_date',
            'end_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
