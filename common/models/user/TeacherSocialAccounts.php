<?php

namespace common\models\user;

use Yii;

/**
 * This is the model class for table "teacher_social_accounts".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $telegram
 * @property string|null $email
 * @property string|null $instagram
 * @property string|null $youtube
 * @property string|null $facebook
 * @property string|null $others
 *
 * @property User $user
 */
class TeacherSocialAccounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher_social_accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['telegram', 'email', 'instagram', 'youtube', 'facebook', 'others'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'telegram' => 'Telegram',
            'email' => 'Email',
            'instagram' => 'Instagram',
            'youtube' => 'Youtube',
            'facebook' => 'Facebook',
            'others' => 'Others',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
