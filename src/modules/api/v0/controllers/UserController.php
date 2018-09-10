<?php
/**
 * Created by PhpStorm.
 * User: 98203
 * Date: 2018/9/10
 * Time: 15:01
 */

namespace src\modules\api\v0\controllers;

use src\modules\api\v0\models\Users;

class UserController extends ApiController
{
    public $modelClass = Users::class;

}