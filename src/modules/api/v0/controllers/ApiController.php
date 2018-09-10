<?php

namespace src\modules\api\v0\controllers;

use src\modules\api\v0\models\Users;
use yii\rest\ActiveController;

/**
 * Default controller for the `v0` module
 */
class ApiController extends ActiveController
{
    public $defaultAction = 'index';
    public $modelClass = Users::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        unset($behaviors['authenticator']);
        return $behaviors;
    }

    public function actionIndex()
    {
        return 'Base api controller';
    }
}
