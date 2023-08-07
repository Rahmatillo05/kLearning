<?php

namespace common\models\groups;

use common\models\course\Course;
use common\models\user\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "wait_list".
 *
 * @property int $id
 * @property int|null $teacher_id
 * @property int|null $course_id
 * @property int|null $status
 * @property string $full_name
 * @property string $location
 * @property string $phone_number
 * @property int|null $created_at
 *
 * @property Course $course
 * @property User $teacher
 */
class WaitList extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'wait_list';
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
    public function rules(): array
    {
        return [
            [['teacher_id', 'course_id', 'created_at', 'status'], 'integer'],
            [['full_name', 'location', 'phone_number'], 'required'],
            [['full_name', 'location', 'phone_number'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'teacher_id' => 'O\'qituvchi',
            'course_id' => 'Kurs nomi',
            'full_name' => 'To\'liq ism',
            'location' => 'Manzil',
            'phone_number' => 'Telefon raqam',
            'created_at' => 'Qo\'shilgan vaqti',
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return ActiveQuery
     */
    public function getCourse(): ActiveQuery
    {
        return $this->hasOne(Course::class, ['id' => 'course_id']);
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
}
