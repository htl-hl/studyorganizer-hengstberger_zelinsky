<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Users".
 *
 * @property int $userID
 * @property string $username
 * @property string|null $password
 * @property string|null $accessToken
 * @property string|null $authKey
 *
 * @property Assignments[] $assignments
 */
class Users extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password', 'accessToken', 'authKey'], 'default', 'value' => null],
            [['username'], 'required'],
            [['username', 'password', 'accessToken', 'authKey'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userID' => Yii::t('app', 'User ID'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'accessToken' => Yii::t('app', 'Access Token'),
            'authKey' => Yii::t('app', 'Auth Key'),
        ];
    }

    /**
     * Gets query for [[Assignments]].
     *
     * @return \yii\db\ActiveQuery|AssignmentsQuery
     */
    public function getAssignments()
    {
        return $this->hasMany(Assignments::class, ['userID' => 'userID']);
    }

    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }

}
