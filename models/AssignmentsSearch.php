<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Assignments;

/**
 * AssignmentsSearch represents the model behind the search form of `app\models\Assignments`.
 */
class AssignmentsSearch extends Assignments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['homeworkID', 'isCompleted', 'userID', 'subjectID'], 'integer'],
            [['title', 'description', 'due_date'], 'safe'],
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Assignments::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'homeworkID' => $this->homeworkID,
            'isCompleted' => $this->isCompleted,
            'due_date' => $this->due_date,
            'userID' => $this->userID,
            'subjectID' => $this->subjectID,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
