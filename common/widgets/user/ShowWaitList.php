<?php

namespace common\widgets\user;

use yii\base\InvalidArgumentException;
use yii\base\Widget;
use yii\data\ActiveDataProvider;

class ShowWaitList extends Widget
{
    public $dataProvider;

    public function run()
    {
        parent::init();

        if ($this->dataProvider != null) {
            return $this->render('view_wait_list', [
                'wait_list' => $this->dataProvider,
            ]);
        }
        throw new InvalidArgumentException();
    }

}