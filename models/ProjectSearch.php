<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Project;

/**
 * ProjectSearch represents the model behind the search form about `app\models\Project`.
 */
class ProjectSearch extends Project
{
    public $regionName;
    public $baseStationName;
    public $customerName;
    public $statusName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'base_station_id', 'customer_id', 'status_id', 'cost', 'paid', 'drawing'], 'integer'],
            [['regionName', 'baseStationName', 'customerName', 'statusName', 'begin_date', 'end_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Project::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'cost',
                'drawing',
                'begin_date',
                'end_date',
                'regionName' => [
                    'asc' => ['region.name' => SORT_ASC],
                    'desc' => ['region.name' => SORT_DESC],
                ],
                'baseStationName' => [
                    'asc' => ['base_station.name' => SORT_ASC],
                    'desc' => ['base_station.name' => SORT_DESC],
                ],
                'customerName' => [
                    'asc' => ['customer.name' => SORT_ASC],
                    'desc' => ['customer.name' => SORT_DESC],
                ],
                'statusName' => [
                    'asc' => ['status.name' => SORT_ASC],
                    'desc' => ['status.name' => SORT_DESC],
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['region']);
            $query->joinWith(['base_station']);
            $query->joinWith(['customer']);
            $query->joinWith(['status']);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'base_station_id' => $this->base_station_id,
            'customer_id' => $this->customer_id,
            'status_id' => $this->status_id,
            'cost' => $this->cost,
            'paid' => $this->paid,
            'drawing' => $this->drawing,
            'begin_date' => $this->begin_date,
            'end_date' => $this->end_date,
        ]);

        $query->joinWith(['region' => function($q) {
            $q->where('region.name LIKE "%' . $this->regionName . '%"');
        }]);

        $query->joinWith(['baseStation' => function($q) {
            $q->where('base_station.name LIKE "%' . $this->baseStationName . '%"');
        }]);

        $query->joinWith(['customer' => function($q) {
          $q->where('customer.name LIKE "%' . $this->customerName . '%"');
        }]);

        $query->joinWith(['status' => function($q) {
            $q->where('status.name LIKE "%' . $this->statusName . '%"');
        }]);

        return $dataProvider;
    }
}
