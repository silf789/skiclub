<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 24.02.2016
 * Time: 1:11
 */

namespace app\controllers;

use app\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;



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
                        'controllers' => ['main'],
                        'actions' => ['reg','login'],
                        'verbs' => ['GET','POST'],
                        'roles' => ['?']
                    ],
                    [
                        'allow' => true,
                        'controllers' => ['main'],
                        'actions' => ['logout'],
                        'verbs' => ['POST','GET'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => true,
                        'controllers' => ['main'],
                        'actions' =>[
                            'index',
                            'content',
                            'foto',
                            'video',
                            'workouts',
                            'all',
                            'about'
                        ],
                        'verbs' => ['GET','POST'],

                    ],


                ]
            ],
            'verbs' => [
             'class' => VerbFilter::className(),
                 'actions' => ['logout' => ['post','get']],
    ],


    ];
    }

} 