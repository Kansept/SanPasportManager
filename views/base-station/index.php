<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BaseStationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Base Stations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="base-station-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Base Station', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'address',
            'region_id',
            'latitude',
            // 'longitude',
            // 'mobile_operator_id',
            // 'date_begin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
