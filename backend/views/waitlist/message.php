<?php

use yii\helpers\VarDumper;
use yii\web\View;

/**
 * @var View $this
 * @var array $messages
 */
$this->title = "Xabarlar";
//VarDumper::dump($messages, 10, true);
?>

<div class="card">
    <div class="card-header card-title">Jo'natgan SMS xabarlarim</div>
    <div class="card-body">
        <?php foreach ($messages['data']['data'] as $message) :
            if ($message['dispatch_id'] == Yii::$app->user->id) :
                ?>
                <div class="card">
                    <div class="card-header">Qabul qiluvchi +<?= $message['to'] ?></div>
                    <div class="card-body d-flex justify-content-between">
                        <div class="pe-sm-5">
                            <b>Xabar matni:</b>
                            <p><?= $message['content'] ?></p>
                        </div>
                        <div>
                            <b>Xabar holati:</b>
                            <p class="<?= $message['status'] === 'DELIVRD' ? 'text-success' : "text-danger" ?>">
                                <?= $message['status'] === 'DELIVRD' ? 'Yetkazilgan' : "Yetkazilmagan" ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; endforeach; ?>
    </div>
</div>

