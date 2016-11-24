<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

  <div class="jumbotron">
    <h3>Добро пожаловать в SanPasport Manager!</h3>
  </div>

  <div class="body-content">

    <div class="row">

      <div class="col-lg-4">
        <h4>Базовые станции</h4>
        <table class="table">
          <thead>
            <tr>
              <th>Оператор</th>
              <th>Кол-во</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($baseStations as $baseStartion) { ?>
            <tr>
              <td><?= $baseStartion['name'] ?></td>
              <td><?= $baseStartion['count'] ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <div class="col-lg-4">
        <h4>Проекты</h4>
        <table class="table">
          <thead>
            <tr>
              <th>Статус</th>
              <th>Кол-во</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($statuses as $status) { ?>
            <tr>
              <td><?= $status['name']?></td>
              <td><?= $status['count']?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <div class="col-lg-4">
        <h4>Оплата</h4>
        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th>руб.</th>
            </tr>    
          </thead>           
          <tbody>
            <tr>
              <td>Всего сделанно на сумму:</td>
              <td><?= Yii::$app->formatter->asInteger($debts['sum_cost']) ?></td>
            </tr>
            <tr>
              <td>Всего выплаченно:</td>
              <td><?= Yii::$app->formatter->asInteger($debts['sum_paid']) ?></td>
            </tr>
            <tr>
              <td>Долг:</td>
              <td><?= Yii::$app->formatter->asInteger($debts['sum_cost'] - $debts['sum_paid']) ?></td>
            </tr>
          </tbody>         
        </table>
      </div>

    </div>

    <div class="row">
      <div class="col-lg-12">
        <h4>Проекты в работе</h4>
        <?php 
          $searchModel = new \app\models\ProjectSearch();
          $dataProvider = $searchModel->search(['ProjectSearch' => ['status_id' => '1'] ]);
        ?>
        <?= \yii\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'regionName',
                'name',
                'baseStationName',
                'statusName',
                'customerName',
                [
                  'content' => function ($model, $key, $index, $column) {
                    return Html::a('Открыть', Url::toRoute(['/project/view', 'id' => $model->id], true));
                  }
                ]
                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
      </div>
    </div>

  </div>

</div>
