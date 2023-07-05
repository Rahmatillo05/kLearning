<?php

namespace common\models\groups;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "lesson_schedule".
 *
 * @property int $id
 * @property int|null $group_id
 * @property int|null $room_id
 * @property string $monday
 * @property string $tuesday
 * @property string $wednesday
 * @property string $thursday
 * @property string $friday
 * @property string $saturday
 * @property string $sunday
 *
 * @property Group $group
 * @property-read array $roomList
 * @property Room $room
 */
class LessonSchedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson_schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['group_id', 'room_id'], 'integer'],
            [['room_id'], 'required'],
            [['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'], 'string', 'max' => 255],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::class, 'targetAttribute' => ['group_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::class, 'targetAttribute' => ['room_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group',
            'room_id' => 'Room',
            'monday' => 'Monday',
            'tuesday' => 'Tuesday',
            'wednesday' => 'Wednesday',
            'thursday' => 'Thursday',
            'friday' => 'Friday',
            'saturday' => 'Saturday',
            'sunday' => 'Sunday',
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
     * Gets query for [[Room]].
     *
     * @return ActiveQuery
     */
    public function getRoom(): ActiveQuery
    {
        return $this->hasOne(Room::class, ['id' => 'room_id']);
    }

    public function getRoomList(): array
    {
        return Room::find()->all();
    }
}
