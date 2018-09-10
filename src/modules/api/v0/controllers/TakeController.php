<?php
/**
 * Created by PhpStorm.
 * User: 98203
 * Date: 2018/9/10
 * Time: 15:54
 */

namespace app\modules\api\v0\controllers;


use src\modules\api\v0\controllers\ApiController;
use src\modules\api\v0\models\Take;

class TakeController extends ApiController
{
    public $modelClass = Take::class;

}