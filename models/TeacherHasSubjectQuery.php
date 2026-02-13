<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TeacherHasSubject]].
 *
 * @see TeacherHasSubject
 */
class TeacherHasSubjectQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TeacherHasSubject[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TeacherHasSubject|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
