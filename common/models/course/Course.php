<?php

namespace common\models\course;

use common\models\user\User;
use common\models\user\UserRole;
use common\widgets\Detect;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property int $teacher_id
 * @property int $category_id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $first_lesson
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $status
 *
 * @property Category $category
 * @property CourseReview[] $courseReviews
 * @property-read User[] $teacherList
 * @property-read Category[] $categoryList
 * @property User $teacher
 */
class Course extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'course';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['teacher_id', 'category_id', 'title', 'description', 'first_lesson'], 'required'],
            [['teacher_id', 'category_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['first_lesson'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['teacher_id' => 'id']],
            [['image'], 'image', 'extensions' => ['jpg', 'jpeg', 'png'], 'maxSize' => 1024 * 1024 * 2]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'teacher_id' => 'Teacher',
            'category_id' => 'Category',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
            'first_lesson' => 'First Lesson',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return ActiveQuery
     */
    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[CourseReviews]].
     *
     * @return array|ActiveRecord[]
     */
    public function getCourseReviews(): array
    {
        return CourseReview::find()->where(['course_id' => $this->id])->orderBy(['id' => SORT_DESC])->all();
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
        return ArrayHelper::map(User::find()->where(['role' => Detect::TEACHER])->all(), 'id', 'full_name');
    }

    public function getCategoryList(): array
    {
        return ArrayHelper::map(Category::find()->where(['status' => Category::STATUS_ACTIVE])->all(), 'id', 'name');
    }

    public function uploadFile(UploadedFile $file): bool|string
    {
        $name = 'IMG_' . date('Ymd_His') . "." . $file->extension;
        $path = Yii::$app->params['uploadPath'] . $name;
        if ($file->saveAs($path)) {
            return $name;
        } else {
            return false;
        }
    }
}