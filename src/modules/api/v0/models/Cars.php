<?php

namespace src\modules\api\v0\models;


/**
 * This is the model class for table "cars".
 *
 * @property int $car_id
 * @property int $staus 0=空闲；1=被占用 2=unavaliable 
 * @property int $carpos_x
 * @property int $carpos_y
 *
 * @property Take[] $takes
 */
class Cars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id', 'staus'], 'required'],
            [['car_id', 'staus', 'carpos_x', 'carpos_y'], 'integer'],
            [['car_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'car_id' => 'Car ID',
            'staus' => 'Staus',
            'carpos_x' => 'Carpos X',
            'carpos_y' => 'Carpos Y',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTakes()
    {
        return $this->hasMany(Take::className(), ['car_id' => 'car_id']);
    }
}
