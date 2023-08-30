<?php

namespace common\widgets;

use common\models\course\Course;
use common\models\groups\FamilyList;
use common\models\groups\Group;
use common\models\groups\LessonSchedule;
use common\models\groups\WaitList;
use common\models\MainImg\MainImg;
use common\models\user\TeacherSocialAccounts;
use common\models\user\User;
use common\models\user\UserRole;
use Yii;
use yii\bootstrap5\Html;

use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use function PHPUnit\Framework\isNull;

class Tools
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    const REPLY = 10;
    const NOT_REPLY = 0;
    public static function generateUsername(string $full_name): array|string
    {
        $username = str_replace(' ', '_', strtolower($full_name));

        $user = User::findByUsername($username);
        if ($user) {
            return $username . rand(1, 9999);
        }
        return $username;
    }

    public static function setStatusBadgeAsIcon(int $status): string
    {
        if ($status == self::STATUS_DELETED) {
            return '<span class="badge bg-danger rounded-3 fw-semibold"
                            data-bs-toggle="tooltip"
                            data-bs-placement="bottom"
                            data-bs-title="O\'chirilgan">
                          <i class="ti ti-cross"></i>
                      </span>';
        } elseif ($status == self::STATUS_INACTIVE) {
            return '<span class="badge bg-warning rounded-3 fw-semibold"
                            data-bs-toggle="tooltip"
                            data-bs-placement="bottom"
                            data-bs-title="Nofaol">
                            <i class="ti ti-clock-pause"></i>
                        </span>';
        }
        return '<span class="badge bg-success rounded-3 fw-semibold"
                            data-bs-toggle="tooltip"
                            data-bs-placement="bottom"
                            data-bs-title="Faol">
                    <i class="ti ti-activity"></i>
                 </span>';
    }

    public static function statusList(): array
    {
        return [
            self::STATUS_DELETED => "O'chirilgan",
            self::STATUS_INACTIVE => "NoFaol",
            self::STATUS_ACTIVE => "Faol"
        ];
    }

    public static function statusStyleList(): array
    {
        return [
            self::STATUS_DELETED => "<span class='badge bg-danger rounded-3 fw-semibold'>O'chirilgan</span>",
            self::STATUS_INACTIVE => "<span class='badge bg-warning rounded-3 fw-semibold'>Nofaol</span>",
            self::STATUS_ACTIVE => "<span class='badge bg-success rounded-3 fw-semibold'>Faol</span>"
        ];
    }

    public static function gridViewButtons(): array
    {
        return [
            'view' => function ($url) {
                return Html::a('<i class="ti ti-eye"></i>', $url, ['class' => 'btn btn-sm btn-info']);
            },
            'update' => function ($url) {
                return Html::a('<i class="ti ti-pencil"></i>', $url, ['class' => 'btn btn-sm btn-primary']);
            },
            'delete' => function ($url) {
                return Html::a('<i class="ti ti-trash"></i>', $url, ['class' => 'btn btn-sm btn-danger', 'data-method' => 'post']);
            }
        ];
    }

    public static function dateFormat(int $date): string
    {
        return date('d/m/y H:i', $date);
    }

    public static function viewImage(string $image_name): string
    {
        return "<img src='" . Yii::$app->params['viewPath'] . $image_name . "' class='img-fluid w-25'>";
    }

    public static function deleteFile(string $path): bool
    {
        return unlink(Yii::$app->params['uploadPath'] . $path);
    }

    public static function imageRender(string $image_name, array $options = []): string
    {
        if (!empty($options)) {
            $options = self::parseOptions($options);
            return "<img src='" . Yii::$app->params['viewPath'] . $image_name . "' $options>";
        }
        return "<img src='" . Yii::$app->params['viewPath'] . $image_name . "'>";
    }

    public static function parseOptions(array $options): string
    {
        $opt = '';
        foreach ($options as $option => $val) {
            $opt .= "$option='$val'";
        }
        return $opt;
    }

    public static function renderRating(): string
    {
        return '<ul class="list-unstyled d-flex align-items-center mb-0">
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
            </ul>';
    }

    public static function ruleName(int $role_power)
    {
        return (UserRole::find()->where(['role_power' => $role_power])->one())->role_name;
    }

    public static function groupPupil(int $group_id): bool|int|string|null
    {
        return FamilyList::find()->where(['group_id' => $group_id])->count();
    }

    public static function renderSchedule(LessonSchedule|null $schedule, bool $show_group_name = false, bool $without_room_name = false): string
    {
        if (!$schedule) {
            return "<h4 class='text-warning'>Schedule hasn't set yet</h4>";
        }
        $attributes = array_slice($schedule->attributes, 3, 8);
        $table = "<table class='table table-bordered'>";

        if ($without_room_name) {
            $table .= "<tr><th>Xona</th><td>{$schedule->room->name}</td></tr>";
        }

        if ($show_group_name){
            $table .= "<tr><th>Guruh nomi</th><td>{$schedule->group->name}</td></tr>";
        }

        foreach ($attributes as $key => $val) {
            $table .= "<tr>";
            if ($val) {
                $table .= "<th>" . $schedule->getAttributeLabel($key) . "</th>\n<td>$val</td>";
            }
            $table .= "</tr>";
        }
        $table .= "</table>";
        return $table;
    }

    public static function renderTeacherSocials(TeacherSocialAccounts|null $socialAccounts, bool $for_backend = false): string
    {
        $icons = '<ul class="ftco-social text-center">';
        if (!isNull($socialAccounts)) {
            $attributes = array_slice($socialAccounts->attributes, 2);
            foreach ($attributes as $key => $val) {
                if ($val) {
                    if ($key == 'email') {
                        $icons .= '<li class="ftco-animate"><a class="text-dark" href="' . $val . '"><span class="ti ti-brand-google"></span></a></li>';
                    }
                    $icons .= '<li class="ftco-animate"><a class="text-dark" href="' . $val . '"><span class="ti ti-brand-' . $key . '"></span></a></li>';
                }
            }
        }
        else{
            return "";
        }
        $icons .= '</ul>';
        return $icons;
    }

    public static function checkWaitList(int $user_id)
    {
        $wait_list = WaitList::findAll(['teacher_id' => $user_id, 'status' => Detect::NOT_REPLY]);

        if (!empty($wait_list)){
            return '<i class="ti ti-bell-ringing"></i>
                    <div class="notification bg-primary rounded-circle"></div>';
        }
        return '<i class="ti ti-bell"></i>';
    }
    public static function active($teacher_id): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => Course::find()->where(['teacher_id' => $teacher_id]),
            'pagination' => [
                'pageSize' => 30
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ]
        ]);
    }

    public static function ActiveGroups($teacher_id): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => Group::find()->where(['teacher_id' => $teacher_id]),
            'pagination' => [
                'pageSize' => 30
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ]
        ]);
    }
    public static function dtmBlock(string $subject_1, string $subject_2): string
    {
        return substr($subject_1, 0, 1). substr($subject_2, 0, 1);
    }

    public static function setStatusBadge(int $status): string
    {
        if($status === self::STATUS_ACTIVE){
            return "<span class='badge bg-success'>Faol</span>";
        } elseif($status === self::STATUS_INACTIVE){
            return "<span class='badge bg-warning'>Nofaol</span>";
        }
        return "<span class='badge bg-danger'>O'chirilgan</span>";
    }
    public static function MainImg(): array|ActiveRecord|null
    {
        return MainImg::find()->one();
    }
}