<?php

namespace src\modules\api\v0\models;


/**
 * This is the model class for table "users".
 *
 * @property int $user_id
 * @property string $login_time
 * @property int $status 0=logout；1=login；2=bill to pay
 * @property string $user_name
 * @property string $password_hash
 *
 * @property Orders[] $orders
 * @property Take[] $takes
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login_time'], 'safe'],
            [['status'], 'integer'],
            [['user_name', 'password_hash'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'login_time' => 'Login Time',
            'status' => 'Status',
            'user_name' => 'User Name',
            'password_hash' => 'Password Hash',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTakes()
    {
        return $this->hasMany(Take::className(), ['user_id' => 'user_id']);
    }
}
