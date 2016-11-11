<?php
use yii\helpers\Html;

$this->title = 'Orlov';
?>

<div class="row">

  <div class="col-lg-12">
    <?= Html::beginForm(['orlov/index'], 'post', ['class' => 'form-inline', 'enctype' => 'multipart/form-data']) ?> 
    <?= Html::label('Название БС', 'name') ?>
    <?= Html::input('text', 'name', '', ['class' => 'form-control']) ?>
    <?= Html::submitButton('Найти', ['class' => 'form-control']) ?>
    <?= Html::endForm() ?>
  </div>

  <div class="col-lg-12">
    <?php if (isset($antennas[0])) { ?>

    <h1><center><?= $antennas[0]['name'] ?></center></h1>
    <table class="table">
      <tr>
        <th>Название БС:</th><td><?= $antennas[0]['name'] ?></td>
      </tr><tr>
        <th>Регион:</th><td><?= $antennas[0]['region'] ?></td>
      </tr><tr>
        <th>Адрес:</th><td><?= $antennas[0]['address'] ?></td>
      </tr><tr>
        <th>Координаты:</th>
        <td><a href="http://yandex.ru/maps/?mode=search&text=<?= $antennas[0]['latitude'] ?> <?= $antennas[0]['longitude'] ?>" target="_blank">
          <?= $antennas[0]['latitude'] ?> <?= $antennas[0]['longitude'] ?>
        </a></td>
      </tr>
    </table>

    <ul class="nav nav-tabs" role="tablist" id="tabs">
      <li role="presentation" class="active">
        <a href="#antennas" aria-controls="antennas" role="tab" data-toggle="antennas">
          Антенны
        </a>
      </li>
      <li role="presentation">
        <a href="#bcf" aria-controls="bcf" role="tab" data-toggle="bcf">
          Конфигурация
        </a>
      </li>
    </ul>

    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="antennas">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Название</th>
              <th>Тип сектора</th>
              <th>Антенна</th>
              <th>Диапозон</th>
              <th>Высота</th>
              <th>Азимут</th>
              <th>Угол наклона</th>
              <th>Поляризация</th>
            </tr>
            <?php foreach ($antennas as $value) { ?>
            <tr>
              <td><?= $value['name'] ?></td>
              <td><?= $value['type_sector'] ?></td>
              <td><?= $value['antenna'] ?></td>
              <td><?= $value['band'] ?></td>
              <td><?= $value['height'] ?></td>
              <td><?= $value['azimuth'] ?></td>
              <td><?= $value['tilt'] ?></td>
              <td><?= $value['polarization'] ?></td>
            </tr>
            <?php } ?>
          </thead>
        </table>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="bcf">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Регион</th>
              <th>БС</th>
              <th>Номер кабинета</th>
              <th>Конфигурация</th>
              <th>Тип</th>
              <th>Дата запуска</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach ($bcf as $value) { ?>
              <tr>
                <td><?= $value['region'] ?></td>
                <td><?= $value['name'] ?></td>
                <td><?= $value['number_cabinet'] ?></td>
                <td><?= $value['config'] ?></td>
                <td><?= $value['operation_type'] ?></td>
                <td><?= $value['launch_date'] ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </thead>
        </table>
      </div>
    </div>
    <?php } else if (Yii::$app->request->post('name')) { ?>
    <h3>По запросу <b><?= Yii::$app->request->post('name') ?></b> ничего не найдено :(</h3>
    <?php } ?>

  </div>

</div>

<?php
$script = <<< JS
  $('#tabs a').click(function (e) {
     e.preventDefault();
    $(this).tab('show');
  })
JS;
$this->registerJs($script);
?>
