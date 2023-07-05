<?php

namespace common\models\user;

use yii\db\ActiveQuery;

/**
 * This is the model class for table "user_role".
 *
 * @property int $id
 * @property string|null $role_name
 * @property int|null $role_power
 *
 * @property User[] $users
 */
class UserRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_power'], 'integer'],
            [['role_name'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'role_name' => 'Role Name',
            'role_power' => 'Role Power',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return ActiveQuery
     */
    public function getUsers(): ActiveQuery
    {
        return $this->hasMany(User::class, ['role_id' => 'id']);
    }
}
