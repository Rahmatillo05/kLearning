<?php

namespace common\models\course;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "course_review".
 *
 * @property int $id
 * @property int $course_id
 * @property float|null $rating
 * @property string $feedback
 * @property int|null $created_at
 * @property int|null $is_reply
 * @property int|null $is_read
 *
 * @property Course $course
 */
class CourseReview extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'course_review';
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
            [['course_id', 'feedback'], 'required'],
            [['course_id', 'created_at', 'is_reply', 'is_read'], 'integer'],
            [['rating'], 'number'],
            [['feedback'], 'string'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course ID',
            'rating' => 'Rating',
            'feedback' => 'Feedback',
            'is_read' => 'Is Read',
            'is_reply' => 'Is Reply',
            'created_at' => 'Created At',
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

    public function getReplies(): ActiveQuery
    {
        return $this->hasMany(FeedbackReply::class, ['course_feedback_id' => 'id']);
    }
}
