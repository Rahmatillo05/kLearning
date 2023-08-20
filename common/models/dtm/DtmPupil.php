<?php

namespace common\models\dtm;

use Yii;

/**
 * This is the model class for table "dtm_pupil".
 *
 * @property int $id
 * @property string $full_name
 * @property string $subject_1
 * @property string $subject_2
 * @property int $dtm_id
 *
 * @property Dtm $dtm
 * @property DtmResult[] $dtmResults
 * @property DtmResult $result
 */
class DtmPupil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dtm_pupil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'subject_1', 'subject_2', 'dtm_id'], 'required'],
            [['dtm_id'], 'integer'],
            [['full_name', 'subject_1', 'subject_2'], 'string', 'max' => 255],
            [['dtm_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dtm::class, 'targetAttribute' => ['dtm_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'F.I.SH',
            'subject_1' => 'Fan #1',
            'subject_2' => 'Fan #2',
            'dtm_id' => 'Dtm ID',
        ];
    }

    /**
     * Gets query for [[Dtm]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDtm()
    {
        return $this->hasOne(Dtm::class, ['id' => 'dtm_id']);
    }

    /**
     * Gets query for [[DtmResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDtmResults()
    {
        return $this->hasMany(DtmResult::class, ['pupil_id' => 'id']);
    }

    public function getResult(): ?DtmResult
    {
        return DtmResult::findOne(['dtm_id' => $this->dtm_id]);
    }

    public function setDefaultResult(): bool
    {
        $result = new DtmResult();
        $result->dtm_id = $this->dtm_id;
        $result->pupil_id = $this->id;
        return $result->save();
    }
}
