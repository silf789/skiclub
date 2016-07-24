<?php

namespace app\controllers;

use app\models\Cathegories;
use app\models\Content;
use app\models\Albums;
use app\models\Foto;
use app\models\Video;
use app\models\RegForm;
use app\models\LoginForm;
use app\models\User;
use Yii;


class MainController extends BehaviorsController
{
    public function getCathegoryIdByName($name)
    {
        $cathegoryId = Cathegories::find()
            ->select(['id'])
            ->where(['cathegory' => $name])
            ->one();
        return $cathegoryId->id;
    }
    public function actionIndex()
    {
        $queryAll =  Content::find()
            ->select(['title', 'id', 'metad','cathegory'])
            ->orderBy('id DESC')
            ->limit(3)
            ->all();
        return $this->render('index',[
            'list' => $queryAll,
        ]);
    }
    public function actionReg()
    {
        $model = new RegForm();
        if($model->load(Yii::$app->request->post()) && $model->validate())
        {
            if(($user = $model->reg()) instanceof User)
            {
                if($user->status === User::STATUS_ACTIVE)
                {
                    if(Yii::$app->getUser()->login($user))
                    {
                        return $this->goHome();
                    }
                }
            }
            else
            {
                var_dump($user);
                die('kasdjhfj');
                Yii::$app->session->setFlash('error','Возникла ошибка при регистрации');
                Yii::error('Возникла ошибка при регистрации');
                return $this->refresh();
            }
        }
        return $this->render('reg',[
            'model' => $model
        ]);
    }
    public function actionLogin()
    {
        if(!Yii::$app->user->isGuest)
        {
            $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->loginAdmin()) {
            return $this->goBack();
        }
        if($model->load(Yii::$app->request->post()) && $model->login())
        {
            return $this->goBack();
        }
        return $this->render('login',[
            'model' => $model
        ]);
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['/main/index']);
    }
    public function actionNews()
    {

        return $this->render('news');
    }
    public function actionContent()
    {
        $cathegory = Yii::$app->getRequest()->get('cathegory');
        $cathegoryId = $this->getCathegoryIdByName($cathegory);
        $id=Yii::$app->getRequest()->get('id');
        if ($id==null){
            $query = Content::find()
                ->select(['id','title', 'text', 'cathegory'])
                ->where(['cathegory' => $cathegoryId])
                ->orderBy('id DESC')
                ->one();
        }
        else{
            $query = Content::find()
                ->select(['id','title', 'text', 'cathegory'])
                ->where(['id' => $id])
                ->orderBy('id DESC')
                ->one();
        }
        $queryAll =  Content::find()
            ->select(['title', 'id', 'cathegory'])
            ->where(['cathegory' => $cathegoryId])
            ->orderBy('id DESC')
            ->limit(10)
            ->all();

        return $this->render('content',[
            'row' => $query,
            'list' => $queryAll,
            'cathegory' => $cathegory
        ]);
    }
    public function actionAll()
    {
        $cathegory=Yii::$app->getRequest()->get('cathegory');
        $query = Content::find()
            ->select(['id','title', 'cathegory','metad'])
            ->where(['cathegory' => $cathegory])
            ->orderBy('id DESC')
            ->all();
        return $this->render('all',[
            'content' => $query
        ]);
    }
    public function actionShedule()
    {
        $shedule = Content::find()
            ->where(['cathegory'=> 'shedule'])
            ->one();
        return $this->render('shedule',[
            'shedule' => $shedule
        ]);
    }

    public function actionFoto()
    {
        $albums = Albums::find()
            ->select(['id','name','thumb'])
            ->orderBy('id DESC')
            ->all();
        return $this->render('foto',[
            'albums' => $albums
        ]);
    }
    public function actionViewFoto()
    {
        $albid=Yii::$app->getRequest()->get('albid');
        $albname=Albums::find()
            ->select(['name'])
            ->where(['id' => $albid])
            ->one();
        $fotos = Foto::find()
            ->select(['id','ref'])
            ->where(['album'=>$albname->name])
            ->all();
        return $this->render('view-foto',[
            'fotos' => $fotos,
            'albname'=>$albname->name,
            'albid'=> $albid
        ]);
    }
    public function actionVideo()
    {
        $video = Video::find()
            ->select(['id','name','ref'])
            ->orderBy('id DESC')
            ->all();
        return $this->render('video',['video' => $video]);
    }
    public function actionWorkouts()
    {
        return $this->render('workouts');
    }
    public function actionAbout()
    {
        $cathegoryId = $this->getCathegoryIdByName('about');
        $about = Content::find()
            ->select(['id','title', 'text', 'cathegory'])
            ->where(['cathegory'=> $cathegoryId])
            ->one();
        return $this->render('about',[
            'about' => $about
        ]);
    }
}
