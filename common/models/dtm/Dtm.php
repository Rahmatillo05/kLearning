<?php

namespace common\models\dtm;

use Yii;

/**
 * This is the model class for table "dtm".
 *
 * @property int $id
 * @property string $title
 * @property string $start_date
 * @property int|null $status
 *
 * @property DtmPupil[] $dtmPupils
 * @property DtmResult[] $dtmResults
 */
class Dtm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dtm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'start_date'], 'required'],
            [['status'], 'integer'],
            [['title', 'start_date'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Test nomi',
            'start_date' => 'Test kuni',
            'status' => 'Holati',
        ];
    }

    /**
     * Gets query for [[DtmPupils]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDtmPupils()
    {
        return $this->hasMany(DtmPupil::class, ['dtm_id' => 'id']);
    }

    /**
     * Gets query for [[DtmResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDtmResults()
    {
        return $this->hasMany(DtmResult::class, ['dtm_id' => 'id']);
    }
}
