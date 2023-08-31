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
        return str_replace(['{pupil}', '{month}', '{payment_sum}'], [$pupil, self::monthName(date('m')), $payment_sum], $message);
    }

    private static function monthName(int $month_number): string
    {
        $month = [
            1 => "Yanvar",
            2 => "Fevral",
            3 => "Mart",
            4 => "Aprel",
            5 => "May",
            6 => "Iyun",
            7 => "Iyul",
            8 => "Avgust",
            9 => "Sentabr",
            10 => "Oktabr",
            11 => "Noyabr",
            12 => "Dekabr"
        ];
        return $month[$month_number];
    }
}
