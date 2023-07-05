<?php

namespace common\models\groups;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "family_list".
 *
 * @property int $id
 * @property int|null $family_id
 * @property int|null $group_id
 * @property int|null $created_at
 *
 * @property Family $family
 * @property Group $group
 * @property array $families
 */
class FamilyList extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'family_list';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['family_id', 'group_id'], 'required'],
            [['family_id', 'group_id', 'created_at'], 'integer'],
            [['family_id'], 'exist', 'skipOnError' => true, 'targetClass' => Family::class, 'targetAttribute' => ['family_id' => 'id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::class, 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'family_id' => 'Pupil',
            'group_id' => 'Group ',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Family]].
     *
     * @return ActiveQuery
     */
    public function getFamily(): ActiveQuery
    {
        return $this->hasOne(Family::class, ['id' => 'family_id']);
    }

    /**
     * Gets query for [[Group]].
     *
     * @return ActiveQuery
     */
    public function getGroup(): ActiveQuery
    {
        return $this->hasOne(Group::class, ['id' => 'group_id']);
    }

    public function getFamilies(): array
    {
        return ArrayHelper::map(Family::find()->all(), 'id', 'pupil.full_name');
    }

    public function pupilIsSet(): bool
    {
        $res = self::find()->andWhere(['group_id' => $this->group_id])->andWhere(['family_id' => $this->family_id])->all();

        return !$res;
    }
}
