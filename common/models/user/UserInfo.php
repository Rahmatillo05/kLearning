<?php

namespace common\models\user;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user_info".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $image
 * @property string $about
 * @property string $education
 * @property string $experience
 * @property string $job
 * @property string|null $social_media
 *
 * @property User $user
 */
class UserInfo extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'user_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'about', 'education', 'experience', 'job'], 'required'],
            [['user_id'], 'integer'],
            [['about', 'education', 'experience'], 'string'],
            [['job'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['image'], 'image']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'image' => 'Image',
            'about' => 'About',
            'education' => 'Education',
            'experience' => 'Experience',
            'job' => 'Job',
            'social_media' => 'Social Media',
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
