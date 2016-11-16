<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
            'region_id',
            'address',
            'mobile_operator_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
