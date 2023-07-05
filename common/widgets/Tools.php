<?php

namespace common\widgets;

use common\models\groups\FamilyList;
use common\models\groups\LessonSchedule;
use common\models\user\User;
use common\models\user\UserRole;
use Yii;
use yii\bootstrap5\Html;

class Tools
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    public static function generateUsername(string $full_name): array|string
    {
        $username = str_replace(' ', '_', strtolower($full_name));

        $user = User::findByUsername($username);
        if ($user) {
            return $username . rand(1, 9999);
        }
        return $username;
    }

    public static function setStatusBadge($staus)
    {
        if ($staus == self::STATUS_DELETED) {
            return "<span class='badge bg-danger rounded-3 fw-semibold'>O'chirilgan</span>";
        } elseif ($staus == self::STATUS_INACTIVE) {
            return "<span class='badge bg-warning rounded-3 fw-semibold'>Nofaol</span>";
        }
        return "<span class='badge bg-success rounded-3 fw-semibold'>Faol</span>";
    }

    public static function statusList()
    {
        return [
            self::STATUS_DELETED => "O'chirilgan",
            self::STATUS_INACTIVE => "NoFaol",
            self::STATUS_ACTIVE => "Faol"
        ];
    }

    public static function statusStyleList()
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

    public static function renderSchedule(LessonSchedule|null $schedule): string
    {
        if (!$schedule) {
            return "<h4 class='text-warning'>Schedule hasn't set yet</h4>";
        }
        $attributes = array_slice($schedule->attributes, 3, 8);
        $table = "<table class='table table-bordered'>";
        $table .= "<tr><th>Room</th><td>{$schedule->room->name}</td></tr>";
        foreach ($attributes as $key => $val) {
            $table .= "<tr>";
            if ($val) {
                $table .= "<th>" . ucfirst($key) . "</th>\n<td>$val</td>";
            }
            $table .= "</tr>";
        }
        $table .= "</table>";
        return $table;
    }
}