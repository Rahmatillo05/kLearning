<?php

namespace common\models\contact;


use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $email
 * @property string|null $title
 * @property string|null $body
 * @property int|null $status
 * @property int|null $rating
 */
class Contact extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'create_contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['username', 'email'], 'string', 'max' => 64],
            [['title'], 'string', 'max' => 32],
            [['body'], 'string', 'max' => 255],
            [['status'],'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Ism'),
            'email' => Yii::t('app', 'Elektron pochta'),
            'title' => Yii::t('app', 'Sarlavha'),
            'body' => Yii::t('app', 'Ma\'lumot'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
    public function userStatusList()
    {
        return [
            self::STATUS_DELETED => "O'chirilgan",
            self::STATUS_INACTIVE => "NoFaol",
            self::STATUS_ACTIVE => "Faol"
        ];
    }
}
