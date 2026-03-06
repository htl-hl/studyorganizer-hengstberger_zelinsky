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
            [['userID', 'subjectID'], 'default', 'value' => null],
            ['isCompleted', 'default', 'value' => 0],
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

    public function getDueDateClass(): string
    {
        if ($this->isCompleted) return 'list-group-item-success';

        $now = new \DateTime();
        $due = new \DateTime($this->due_date);
        $past = $due < $now;
        $diff = (int)$now->diff($due)->days;

        if ($past || $diff < 1) return 'list-group-item-danger';
        if ($diff < 7) return 'list-group-item-warning';
        if ($diff < 14) return 'list-group-item-primary';
        return '';
    }
}
