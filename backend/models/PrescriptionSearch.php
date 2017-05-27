<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prescription;

/**
 * PrescriptionSearch represents the model behind the search form about `app\models\Prescription`.
 */
class PrescriptionSearch extends Prescription
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'patient_id', 'doctor_id', 'pills_number', 'refills_number'], 'integer'],
            [['diagnosis', 'pharmacy', 'instruction', 'start_period', 'end_period'], 'safe'],
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
        $query = Prescription::find();

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
            'patient_id' => $this->patient_id,
            'doctor_id' => $this->doctor_id,
            'pills_number' => $this->pills_number,
            'refills_number' => $this->refills_number,
            'start_period' => $this->start_period,
            'end_period' => $this->end_period,
        ]);

        $query->andFilterWhere(['like', 'diagnosis', $this->diagnosis])
            ->andFilterWhere(['like', 'pharmacy', $this->pharmacy])
            ->andFilterWhere(['like', 'instruction', $this->instruction]);

        return $dataProvider;
    }
}
