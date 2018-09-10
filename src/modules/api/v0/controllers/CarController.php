<?php
/**
 * Created by PhpStorm.
 * User: 98203
 * Date: 2018/9/10
 * Time: 15:55
 */

namespace src\modules\api\v0\controllers;


use src\modules\api\v0\models\Cars;

class CarController extends ApiController
{
    public $modelClass = Cars::class;

}