<?php

namespace common\models\groups;

use common\models\user\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "family".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $pupil_id
 *
 * @property FamilyList[] $familyLists
 * @property User $parent
 * @property User $pupil
 * @property ActiveDataProvider $familyListAsProvider
 */
class Family extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'family';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['parent_id', 'pupil_id'], 'integer'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['parent_id' => 'id']],
            [['pupil_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['pupil_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'pupil_id' => 'Pupil ID',
        ];
    }

    /**
     * Gets query for [[FamilyLists]].
     *
     * @return ActiveQuery
     */
    public function getFamilyLists(): ActiveQuery
    {
        return $this->hasMany(FamilyList::class, ['family_id' => 'id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return ActiveQuery
     */
    public function getParent(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[Pupil]].
     *
     * @return ActiveQuery
     */
    public function getPupil(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'pupil_id']);
    }

    /**
     * @return ActiveDataProvider
     */
    public function getFamilyListAsProvider(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => FamilyList::find()->where(['family_id' => $this->id]),
            'pagination' => false
        ]);
    }
}
