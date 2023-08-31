<?php

namespace common\models\Payment;

use Yii;

/**
 * This is the model class for table "payment_message".
 *
 * @property int $id
 * @property string $message
 */
class PaymentMessage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message'], 'required'],
            [['message'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'message' => 'SMS matni',
        ];
    }

    public static function editMessage(string $pupil, int|float $payment_sum): array|string
    {
        $message = self::find()->one()->message;
        return str_replace(['{pupil}', '{month}', '{payment_sum}'], [$pupil, date('M'), $payment_sum], $message);
    }
}
