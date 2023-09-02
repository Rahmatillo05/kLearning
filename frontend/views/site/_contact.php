<?php

/**
 * @var Contact $model
 */

use common\models\contact\Contact;

?>

<div class="testimony-wrap py-4">
    <div class="text">
        <div>

        </div>
        <p class="mb-4 px-3" style="height: 200px; overflow-y: scroll; text-align:justify;">
            <?=$model->body?>
        </p>
        <div class="d-flex align-items-center">
            <div class="pl-3">
                <p class="name"><?=$model->username?></p>
                <span class="position"><?=$model->title?></span>
            </div>
        </div>
    </div>
</div>