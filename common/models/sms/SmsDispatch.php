<?php

namespace common\models\sms;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "sms_dispatch".
 *
 * @property int $id
 * @property int $dispatch_id
 * @property int|null $created_at
 */
class SmsDispatch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sms_dispatch';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false,
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dispatch_id'], 'required'],
            [['dispatch_id', 'created_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'dispatch_id' => 'Dispatch ID',
            'created_at' => 'Created At',
        ];
    }
}
