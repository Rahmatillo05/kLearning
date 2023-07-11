<?php

namespace common\models\groups;

use common\models\user\User;
use common\widgets\Detect;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property int $teacher_id
 * @property string $name
 * @property int|null $status
 * @property int|null $created_at
 *
 * @property FamilyList[] $familyLists
 * @property-read array $teacherList
 * @property-read ActiveQuery $schedule
 * @property User $teacher
 */
class Group extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'group';
    }

    public function behaviors(): array
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
    public function rules(): array
    {
        return [
            [['teacher_id', 'name'], 'required'],
            [['teacher_id', 'status', 'created_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'name' => 'Guruh nomi',
            'status' => 'Holati',
            'created_at' => 'Ochilgan vaqti',
        ];
    }

    /**
     * Gets query for [[FamilyLists]].
     *
     * @return ActiveQuery
     */
    public function getFamilyLists(): ActiveQuery
    {
        return $this->hasMany(FamilyList::class, ['group_id' => 'id']);
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

    public function getTeacherList(): array
    {
        return ArrayHelper::map(User::findAll(['role' => Detect::TEACHER]), 'id', 'full_name');
    }

    public function getSchedule(): LessonSchedule|null
    {
        return LessonSchedule::findOne(['group_id' => $this->id]);
    }
}
