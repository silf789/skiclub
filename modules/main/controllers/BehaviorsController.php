<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 24.02.2016
 * Time: 1:11
 */

namespace app\modules\main\controllers;

use app\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;


class BehaviorsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [

                    [
                        'allow' => true,

                        'actions' => [
                            'index',
                            'editcontent',
                            'editfoto',
                            'editvideo',
                            'editshedule',
                            'delete-row',
                            'edit-row'
                        ],
                        'roles' => ['@'],
                        'verbs' => ['GET','POST'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserAdmin(Yii::$app->user->identity['username']);
                        }
                    ],

                ]
            ],



        ];
    }

} 