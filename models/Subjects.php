<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Subjects".
 *
 * @property int $subjectID
 * @property string $subjectname
 *
 * @property Assignments[] $assignments
 * @property TeacherHasSubject[] $teacherHasSubjects
 * @property Teachers[] $teachers
 */
class Subjects extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Subjects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subjectname'], 'required'],
            [['subjectname'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'subjectID' => Yii::t('app', 'Subject ID'),
            'subjectname' => Yii::t('app', 'Subjectname'),
        ];
    }

    /**
     * Gets query for [[Assignments]].
     *
     * @return \yii\db\ActiveQuery|AssignmentsQuery
     */
    public function getAssignments()
    {
        return $this->hasMany(Assignments::class, ['subjectID' => 'subjectID']);
    }

    /**
     * Gets query for [[TeacherHasSubjects]].
     *
     * @return \yii\db\ActiveQuery|TeacherHasSubjectQuery
     */
    public function getTeacherHasSubjects()
    {
        return $this->hasMany(TeacherHasSubject::class, ['subjectID' => 'subjectID']);
    }

    /**
     * Gets query for [[Teachers]].
     *
     * @return \yii\db\ActiveQuery|TeachersQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Teachers::class, ['teacherID' => 'teacherID'])->viaTable('Teacher_has_Subject', ['subjectID' => 'subjectID']);
    }

    /**
     * {@inheritdoc}
     * @return SubjectsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SubjectsQuery(get_called_class());
    }

}
