<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Wallet;

/**
 * SearchWallet represents the model behind the search form of `app\models\Wallet`.
 */
class SearchWallet extends Wallet
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'stage', 'country'], 'integer'],
            [['address', 'id_member', 'name', 'buy_date'], 'safe'],
            [['coin'], 'number'],
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
        $query = Wallet::find();

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
            'stage' => $this->stage,
            'coin' => $this->coin,
            'buy_date' => $this->buy_date,
        ]);

        $query->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'id_member', $this->id_member])
            ->andFilterWhere(['like', 'country', $this->country]);

        return $dataProvider;
    }
}
