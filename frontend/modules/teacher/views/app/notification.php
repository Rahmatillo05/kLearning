<?php

use common\models\groups\WaitList;
use common\widgets\user\ShowWaitList;
use yii\data\ActiveDataProvider;
use yii\web\View;
/**
 * @var View $this
 * @var ActiveDataProvider $wait_list
 */

$this->title = "Bildirishnomalar";

?>

<div class="card">
    <div class="card-header card-title">Qabuldagi o'quvchilar</div>
    <div class="card-body">
        <?= ShowWaitList::widget([
                'dataProvider' => $wait_list
        ]) ?>
    </div>
    <div class="card-header card-title">O'qilmagan xabarlar</div>
    <div class="card-body">

    </div>
</div>
