<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BaseStation;

/**
 * BaseStationSearch represents the model behind the search form about `app\models\BaseStation`.
 */
class BaseStationSearch extends BaseStation
{
    public $regionName;
    public $mobileOperatorName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'region_id', 'mobile_operator_id'], 'integer'],
            [['name', 'address', 'latitude', 'longitude', 'date_begin', 'regionName', 'mobileOperatorName'], 'safe'],
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
        $query = BaseStation::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'name',
                'address',
                'regionName' => [
                    'asc' => ['region.name' => SORT_ASC],
                    'desc' => ['region.name' => SORT_DESC],
                    'label' => 'Country Name'
                ],
                'mobileOperatorName' => [
                    'asc' => ['mobile_operator.name' => SORT_ASC],
                    'desc' => ['mobile_operatorname' => SORT_DESC],
                    'label' => 'Mobile Operator'
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['region']);
            $query->joinWith(['mobile_operator']);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'region_id' => $this->region_id,
            'mobile_operator_id' => $this->mobile_operator_id,
            'date_begin' => $this->date_begin,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude]);

        $query->joinWith(['region' => function($q) {
            $q->where('region.name LIKE "%' . $this->regionName . '%"');
        }]);

        $query->joinWith(['mobileOperator' => function($q) {
            $q->where('mobile_operator.name LIKE "%' . $this->mobileOperatorName . '%"');
        }]);

        return $dataProvider;
    }
}
