<?php

namespace common\models\course;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "feedback_reply".
 *
 * @property int $id
 * @property int|null $course_feedback_id
 * @property string $name
 * @property string|null $reply_msg
 * @property int|null $created_at
 *
 * @property CourseReview $courseFeedback
 */
class FeedbackReply extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'feedback_reply';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_feedback_id', 'created_at'], 'integer'],
            [['name'], 'required'],
            [['reply_msg'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['course_feedback_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseReview::class, 'targetAttribute' => ['course_feedback_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_feedback_id' => 'Course Feedback ID',
            'name' => 'Name',
            'reply_msg' => 'Reply Msg',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[CourseFeedback]].
     *
     * @return ActiveQuery
     */
    public function getCourseFeedback(): ActiveQuery
    {
        return $this->hasOne(CourseReview::class, ['id' => 'course_feedback_id']);
    }
}
