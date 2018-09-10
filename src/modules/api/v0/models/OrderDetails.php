<?php

namespace src\modules\api\v0\models;


/**
 * This is the model class for table "order_details".
 *
 * @property int $order_details_id
 * @property int $order_id
 * @property int $item_id
 * @property int $item_num
 * @property string $price_sum
 *
 * @property Items $item
 * @property Orders $order
 */
class OrderDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_details_id'], 'required'],
            [['order_details_id', 'order_id', 'item_id', 'item_num'], 'integer'],
            [['price_sum'], 'string', 'max' => 255],
            [['order_details_id'], 'unique'],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Items::className(), 'targetAttribute' => ['item_id' => 'item_id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'order_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_details_id' => 'Order Details ID',
            'order_id' => 'Order ID',
            'item_id' => 'Item ID',
            'item_num' => 'Item Num',
            'price_sum' => 'Price Sum',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Items::className(), ['item_id' => 'item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['order_id' => 'order_id']);
    }
}
