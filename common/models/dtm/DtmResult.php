<?php

namespace common\models\dtm;

use Yii;

/**
 * This is the model class for table "dtm_result".
 *
 * @property int $id
 * @property int|null $dtm_id
 * @property int|null $pupil_id
 * @property int $subject_1
 * @property int $subject_2
 * @property int $require_subject
 * @property float|null $total
 *
 * @property Dtm $dtm
 * @property DtmPupil $pupil
 */
class DtmResult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dtm_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dtm_id', 'pupil_id', 'subject_1', 'subject_2', 'require_subject'], 'integer'],
            [['total'], 'number'],
            [['dtm_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dtm::class, 'targetAttribute' => ['dtm_id' => 'id']],
            [['pupil_id'], 'exist', 'skipOnError' => true, 'targetClass' => DtmPupil::class, 'targetAttribute' => ['pupil_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dtm_id' => 'Dtm ID',
            'pupil_id' => 'Pupil ID',
            'subject_1' => 'Fan 1 | 3.1',
            'subject_2' => 'Fan 2 | 2.1',
            'require_subject' => 'Majburiy fanlar | 1.1',
            'total' => 'Umumiy ball',
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
     * Gets query for [[Pupil]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPupil()
    {
        return $this->hasOne(DtmPupil::class, ['id' => 'pupil_id']);
    }

    public function saveModel(): bool
    {
        $this->total = $this->subject_1 * 3.1 + $this->subject_2 * 2.1 + $this->require_subject * 1.1;
        return $this->save();
    }
}
