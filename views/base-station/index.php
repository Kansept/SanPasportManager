<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BaseStationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'БС';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="base-station-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить БС', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'region_id',
                'label' => 'Регион',
                'filter' => ArrayHelper::map(app\models\Region::find()->asArray()->all(), 'id', 'name'),
                'value' => 'regionName'
            ],
            'address',
            [
                'attribute' => 'mobile_operator_id',
                'label' => 'Оператор',
                'filter' => ArrayHelper::map(app\models\MobileOperator::find()->asArray()->all(), 'id', 'name'),
                'value' => 'mobileOperatorName'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
