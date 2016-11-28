<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $baseStations = \app\models\BaseStation::find()
            ->select(['count(*) as count', 'mobile_operator.name'])
            ->leftJoin('mobile_operator', '`base_station`.`mobile_operator_id` = `mobile_operator`.`id`')
            ->groupBy('mobile_operator_id')
            ->asArray()
            ->all();

        $statuses = \app\models\Project::find()
            ->select(['count(*) as count', '`status`.`name`'])
            ->leftJoin('status', '`status`.`id` = `project`.`status_id`')
            ->groupBy('status_id')
            ->orderBy(['status.sort' => SORT_ASC])
            ->asArray()
            ->all();

        $debts = \app\models\Project::find()
            ->select(['SUM(cost) AS sum_cost', 'SUM(IFNULL(paid, 0)) AS sum_paid'])
            ->asArray()
            ->one();

        $projects = \app\models\Project::find()
            ->where(['status_id' => 1])
            ->limit(10)
            ->orderBy('end_date ASC')
            ->all();

        return $this->render('index', [
            'baseStations' => $baseStations,
            'statuses' => $statuses,
            'debts' => $debts,
            'projects' => $projects,
        ]);
    }

}
