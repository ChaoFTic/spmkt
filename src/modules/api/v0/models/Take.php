<?php

namespace src\modules\api\v0\models;


/**
 * This is the model class for table "take".
 *
 * @property int $take_id
 * @property int $car_id
 * @property int $user_id
 * @property string $take_time
 * @property int $status 0=complete;1=in use;
 *
 * @property Cars $car
 * @property Users $user
 */
class Take extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'take';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['take_id', 'status'], 'required'],
            [['take_id', 'car_id', 'user_id', 'status'], 'integer'],
            [['take_time'], 'safe'],
            [['take_id'], 'unique'],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cars::className(), 'targetAttribute' => ['car_id' => 'car_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'take_id' => 'Take ID',
            'car_id' => 'Car ID',
            'user_id' => 'User ID',
            'take_time' => 'Take Time',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Cars::className(), ['car_id' => 'car_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'user_id']);
    }
}
