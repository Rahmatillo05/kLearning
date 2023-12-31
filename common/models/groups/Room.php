<?php

namespace common\models\groups;

use common\models\user\User;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property string $name
 * @property int $number
 * @property int $capacity
 * @property int $responsible
 *
 * @property-read ActiveQuery $lessonSchedules
 * @property User $teacher
 */
class Room extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'number', 'capacity', 'responsible'], 'required'],
            [['number', 'capacity', 'responsible'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['responsible'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['responsible' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Xona nomi',
            'number' => 'Xona raqami',
            'capacity' => 'Xona sig\'imi',
            'responsible' => 'Ma\'sul shaxs',
        ];
    }

    /**
     * Gets query for [[Responsible0]].
     *
     * @return ActiveQuery
     */
    public function getTeacher(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'responsible']);
    }

    public function getLessonSchedules(): ActiveQuery
    {
        return $this->hasMany(LessonSchedule::class, ['room_id' => 'id']);
    }
}
