<?php
/**
 * @var FamilyList $family
 * @var FamilyList[] $pupil_list
 */

use common\models\groups\FamilyList;

?>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <h2 class="card-header card-title">O'quvchi qo'shish</h2>
            <?= $this->render('_family', ['model' => $family]) ?>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <h2 class="card-header card-title">O'quvchilar ro'yhati</h2>
            <div class="card-body p-2 table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>T/R</th>
                        <th>Ismi</th>
                        <th>Ota-onasi</th>
                        <th>Bog'lanish</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; foreach ($pupil_list as $item) :  ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $item->family->pupil->full_name ?></td>
                            <td><?= $item->family->parent->full_name ?></td>
                            <td><?= $item->family->parent->tel_number ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
