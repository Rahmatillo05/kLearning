<?php

namespace common\models\payment;

use common\models\groups\Family;
use common\models\groups\Group;
use common\models\user\User;
use common\widgets\Detect;
use ErrorException;
use rahmatullo\eskizsms\Eskiz;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int $teacher_id
 * @property int $group_id
 * @property int $pupil_id
 * @property float $amount
 * @property int|null $payment_type
 * @property int|null $created_at
 *
 * @property Group $group
 * @property User $pupil
 * @property User $teacher
 * @property User[] $teachers
 */
class Payment extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teacher_id', 'group_id', 'pupil_id', 'amount'], 'required'],
            [['teacher_id', 'group_id', 'pupil_id', 'payment_type', 'created_at'], 'integer'],
            [['amount'], 'safe'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::class, 'targetAttribute' => ['group_id' => 'id']],
            [['pupil_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['pupil_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'teacher_id' => 'O\'qituvchi',
            'group_id' => 'Guruh',
            'pupil_id' => 'O\'quvchi',
            'amount' => 'To\'lov miqdori',
            'payment_type' => 'To\'lov turi',
            'created_at' => 'To\'lov vaqti',
        ];
    }

    /**
     * Gets query for [[Group]].
     *
     * @return ActiveQuery
     */
    public function getGroup(): ActiveQuery
    {
        return $this->hasOne(Group::class, ['id' => 'group_id']);
    }

    /**
     * Gets query for [[Pupil]].
     *
     * @return ActiveQuery
     */
    public function getPupil(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'pupil_id']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return ActiveQuery
     */
    public function getTeacher(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'teacher_id']);
    }

    public function getTeachers(): array
    {
        return User::findAll(['status' => Detect::STATUS_ACTIVE, 'role' => Detect::TEACHER]);
    }

    public function getNumberFormat(): string
    {
        return number_format($this->amount, 0, '.', ' ') . " UZS";
    }

    /**
     * @throws ErrorException
     */
    public function paymentMessage(): bool
    {
        $family = Family::findOne(['pupil_id' => $this->pupil_id]);
        $parent_number = $family->parent->tel_number;
        $pupil_name = $family->pupil->full_name;
        $message = PaymentMessage::editMessage($pupil_name, $this->amount);
        $res = $this->sendMessage($parent_number, $message);
        if ($res['status'] == 'waiting') {
            return true;
        }
        return false;
    }

    /**
     * @throws ErrorException
     */
    private function sendMessage($number, $message): array
    {
        $sms = new Eskiz(Yii::$app->params['eskiz_email'], Yii::$app->params['eskiz_key']);
        $options = [
            'mobile_phone' => $number,
            'message' => $message,
            'from' => 4546
        ];
        return $sms->smsSend($options);
    }
}
