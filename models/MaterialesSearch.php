<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Materiales;

/**
 * MaterialesSearch represents the model behind the search form about `app\models\Materiales`.
 */
class MaterialesSearch extends Materiales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MA_ID', 'MA_COSTOUNIDAD'], 'integer'],
            [['TMA_ID', 'MA_NOMBRE', 'MA_UNIDAD'], 'safe'],
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
        $query = Materiales::find();

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
        $query->joinWith('tMA');

        // grid filtering conditions
        $query->andFilterWhere([
            'MA_ID' => $this->MA_ID,
            'MA_COSTOUNIDAD' => $this->MA_COSTOUNIDAD,
        ]);

        $query->andFilterWhere(['like', 'MA_NOMBRE', $this->MA_NOMBRE])
            ->andFilterWhere(['like', 'MA_UNIDAD', $this->MA_UNIDAD])
            ->andFilterWhere(['like', 'tipo_material.TMA_NOMBRE', $this->TMA_ID]);

        return $dataProvider;
    }
}
