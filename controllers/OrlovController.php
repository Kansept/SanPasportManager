<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\OrlovBcf;
use app\models\OrlovAntennas;

class OrlovController extends Controller
{
    public function actionIndex() 
    {
        $antennas = [];
        $bcf = [];
        if (Yii::$app->request->post()) {
          $antennas = OrlovAntennas::find()
            ->where("name = '" . Yii::$app->request->post('name') . "'" )
            ->orWhere("name LIKE '" . Yii::$app->request->post('name') . " на %'")
            ->all();
          $bcf = OrlovBcf::find()->where(['name' => Yii::$app->request->post('name') ])->all();
        }
        return $this->render('index', [
            'antennas' => $antennas,
            'bcf' => $bcf 
        ]);
    }

}
