<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Teachers".
 *
 * @property int $teacherID
 * @property string $teachername
 * @property int|null $isActive
 *
 * @property Subjects[] $subjects
 * @property TeacherHasSubject[] $teacherHasSubjects
 */
class Teachers extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Teachers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isActive'], 'default', 'value' => 1],
            [['teachername'], 'required'],
            [['isActive'], 'integer'],
            [['teachername'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'teacherID' => Yii::t('app', 'Teacher ID'),
            'teachername' => Yii::t('app', 'Teachername'),
            'isActive' => Yii::t('app', 'Is Active'),
        ];
    }

    /**
     * Gets query for [[Subjects]].
     *
     * @return \yii\db\ActiveQuery|SubjectsQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subjects::class, ['subjectID' => 'subjectID'])->viaTable('Teacher_has_Subject', ['teacherID' => 'teacherID']);
    }

    /**
     * Gets query for [[TeacherHasSubjects]].
     *
     * @return \yii\db\ActiveQuery|TeacherHasSubjectQuery
     */
    public function getTeacherHasSubjects()
    {
        return $this->hasMany(TeacherHasSubject::class, ['teacherID' => 'teacherID']);
    }

    /**
     * {@inheritdoc}
     * @return TeachersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TeachersQuery(get_called_class());
    }

}
