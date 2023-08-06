<?php

/** @var yii\web\View $this */

use yii\helpers\VarDumper;

$this->title = 'Teacher - Dashboard';
VarDumper::dump(Yii::$app->getModules(true)[0]->id, 10, true);
?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Sample Page</h5>
        <p class="mb-0"></p>
    </div>
</div>

