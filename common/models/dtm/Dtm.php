<?php

namespace common\models\dtm;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

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
 * @property ActiveDataProvider $results
 */
class Dtm extends ActiveRecord
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
     * @return ActiveQuery
     */
    public function getDtmPupils(): ActiveQuery
    {
        return $this->hasMany(DtmPupil::class, ['dtm_id' => 'id']);
    }

    /**
     * Gets query for [[DtmResults]].
     *
     * @return ActiveDataProvider
     */
    public function getDtmResults(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => DtmResult::find()->where(['dtm_id' => $this->id]),
            'sort' => [
                'defaultOrder' => [
                    'total' => SORT_DESC
                ]
            ],
            'pagination' => [
                'pageSize' => 10
            ]
        ]);
    }

    public function getResults(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => DtmResult::find()->where(['dtm_id' => $this->id]),
            'sort' => [
                'defaultOrder' => [
                    'total' => SORT_DESC
                ]
            ],
            'pagination' => false
        ]);
    }
}
