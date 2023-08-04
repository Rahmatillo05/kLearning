<?php

use common\models\groups\Room;
use common\widgets\Tools;
use yii\web\View;
use yii\widgets\DetailView;

/**
 * @var View $this
 * @var Room $room
 */
$this->title = $room->name
?>

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="row">
                <div class="col-md-6">
                    <div class="card-header card-title"><?= $room->name ?></div>
                    <div class="card-body">
                        <p class="card-text">Xona haqida</p>
                        <table class="table-bordered table">
                            <thead>
                            <tr>
                                <th>Xona raqami</th>
                                <th>Xona sig'imi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?= $room->number ?></td>
                                <td><?= $room->capacity ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-header card-title">Xonadagi darslar</div>
                    <div class="card-body">
                        <p class="card-text">Ushbu xonada rejalashtirlgan darslar ro'yhati</p>
                        <?php
                        foreach ($room->lessonSchedules as $lessonSchedule) {
                            echo Tools::renderSchedule($lessonSchedule, true);
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

