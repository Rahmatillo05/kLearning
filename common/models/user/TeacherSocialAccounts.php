<?php

namespace common\models\user;

use Yii;
use yii\db\ActiveQuery;

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
    public static function tableName(): string
    {
        return 'teacher_social_accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
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
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'user_id' => 'Teacher',
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
     * @return ActiveQuery
     */
    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
