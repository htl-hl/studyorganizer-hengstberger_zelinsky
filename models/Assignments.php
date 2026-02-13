<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Assignments".
 *
 * @property int $homeworkID
 * @property string $title
 * @property string $description
 * @property int|null $isCompleted
 * @property string $due_date
 * @property int|null $userID
 * @property int|null $subjectID
 *
 * @property Subjects $subject
 * @property Users $user
 */
class Assignments extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Assignments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isCompleted', 'userID', 'subjectID'], 'default', 'value' => null],
            [['title', 'description', 'due_date'], 'required'],
            [['isCompleted', 'userID', 'subjectID'], 'integer'],
            [['due_date'], 'safe'],
            [['title', 'description'], 'string', 'max' => 255],
            [['userID'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['userID' => 'userID']],
            [['subjectID'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::class, 'targetAttribute' => ['subjectID' => 'subjectID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'homeworkID' => Yii::t('app', 'Homework ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'isCompleted' => Yii::t('app', 'Is Completed'),
            'due_date' => Yii::t('app', 'Due Date'),
            'userID' => Yii::t('app', 'User ID'),
            'subjectID' => Yii::t('app', 'Subject ID'),
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UsersQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['userID' => 'userID']);
    }

    /**
     * {@inheritdoc}
     * @return AssignmentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AssignmentsQuery(get_called_class());
    }

}
