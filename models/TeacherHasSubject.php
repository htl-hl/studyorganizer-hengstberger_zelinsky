<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Teacher_has_Subject".
 *
 * @property int $subjectID
 * @property int $teacherID
 *
 * @property Subjects $subject
 * @property Teachers $teacher
 */
class TeacherHasSubject extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Teacher_has_Subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subjectID', 'teacherID'], 'required'],
            [['subjectID', 'teacherID'], 'integer'],
            [['subjectID', 'teacherID'], 'unique', 'targetAttribute' => ['subjectID', 'teacherID']],
            [['subjectID'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::class, 'targetAttribute' => ['subjectID' => 'subjectID']],
            [['teacherID'], 'exist', 'skipOnError' => true, 'targetClass' => Teachers::class, 'targetAttribute' => ['teacherID' => 'teacherID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'subjectID' => Yii::t('app', 'Subject ID'),
            'teacherID' => Yii::t('app', 'Teacher ID'),
        ];
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery|SubjectsQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subjects::class, ['subjectID' => 'subjectID']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery|TeachersQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teachers::class, ['teacherID' => 'teacherID']);
    }

    /**
     * {@inheritdoc}
     * @return TeacherHasSubjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TeacherHasSubjectQuery(get_called_class());
    }

}
