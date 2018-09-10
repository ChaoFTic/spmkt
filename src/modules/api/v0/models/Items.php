<?php

namespace src\modules\api\v0\models;


/**
 * This is the model class for table "items".
 *
 * @property int $item_id
 * @property string $item_name
 * @property string $price
 * @property string $category
 * @property int $pos_x
 * @property int $pos_y
 *
 * @property OrderDetails[] $orderDetails
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'item_name', 'price'], 'required'],
            [['item_id', 'pos_x', 'pos_y'], 'integer'],
            [['price'], 'number'],
            [['item_name', 'category'], 'string', 'max' => 255],
            [['item_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_id' => 'Item ID',
            'item_name' => 'Item Name',
            'price' => 'Price',
            'category' => 'Category',
            'pos_x' => 'Pos X',
            'pos_y' => 'Pos Y',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetails::className(), ['item_id' => 'item_id']);
    }
}
