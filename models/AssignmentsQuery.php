<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Assignments]].
 *
 * @see Assignments
 */
class AssignmentsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Assignments[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Assignments|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
