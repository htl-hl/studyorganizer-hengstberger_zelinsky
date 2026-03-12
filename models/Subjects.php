<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

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
    public $teacherIds = [];

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
            [['teacherIds'], 'safe'],
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
            'teacherIds' => Yii::t('app', 'Teachers'),
        ];
    }

    public function beforeDelete()
    {
        Assignments::deleteAll(['subjectID' => $this->subjectID]);
        TeacherHasSubject::deleteAll(['subjectID' => $this->subjectID]);
        return parent::beforeDelete();
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

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        // Lösche alle bestehenden Verknüpfungen für dieses Fach
        TeacherHasSubject::deleteAll(['subjectID' => $this->subjectID]);

        // Füge die neuen Verknüpfungen hinzu
        if (is_array($this->teacherIds)) {
            foreach ($this->teacherIds as $teacherId) {
                $link = new TeacherHasSubject();
                $link->subjectID = $this->subjectID;
                $link->teacherID = $teacherId;
                $link->save();
            }
        }
    }

    public function afterFind()
    {
        parent::afterFind();
        // Lade die IDs der verknüpften Lehrer in das Array
        $this->teacherIds = ArrayHelper::getColumn($this->teachers, 'teacherID');
    }

    public function editIconUpdate()
    {
        return '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
</svg>';
    }

    public function deleteIconUpdate()
    {
        return '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
</svg>';
    }
}
