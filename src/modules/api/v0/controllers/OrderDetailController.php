<?php
/**
 * Created by PhpStorm.
 * User: 98203
 * Date: 2018/9/10
 * Time: 15:53
 */

namespace src\modules\api\v0\controllers;


use src\modules\api\v0\models\OrderDetails;

class OrderDetailController extends ApiController
{
    public $modelClass = OrderDetails::class;

}