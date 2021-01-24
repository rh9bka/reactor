<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Url;

/**
 * UrlSearch represents the model behind the search form of `app\models\Url`.
 */
class UrlSearch extends Url
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'expired_at', 'userID'], 'integer'],
            [['minUrl', 'fullUrl'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Url::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'expired_at' => $this->expired_at,
            'userID' => $this->userID,
        ]);

        $query->andFilterWhere(['like', 'minUrl', $this->minUrl])
            ->andFilterWhere(['like', 'fullUrl', $this->fullUrl]);

        return $dataProvider;
    }
}
