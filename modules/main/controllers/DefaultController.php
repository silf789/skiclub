<?php

namespace app\modules\main\controllers;

use app\controllers;

use app\models\Content;
use yii;
use app\models\EditContentForm;
use yii\filters\AccessControl;

class DefaultController extends BehaviorsController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionEdit()
    {
            return $this->render('edit');
    }
    public function actionEditcontent()
    {
        $query=Content::find()
            ->select(['id','title','cathegory','date'])
            ->orderBy('id DESC')
            ->all();

        return $this->render('editcontent',['content' => $query]);
    }
    public function actionEditfoto()
    {
        return $this->render('editfoto');
    }
    public function actionEditvideo()
    {
        return $this->render('editvideo');
    }
    public function actionEditshedule()
    {
        return $this->render('editshedule');
    }
    public function actionDeleteRow()
    {
        $id = Yii::$app->request->get('id');
        $content=Content::find()
            ->select(['id','date','cathegory','title','text','metad','metak'])
            ->where(['id' => $id])
            ->one();
        if(Yii::$app->getRequest()->isPost)
        {
            $content->delete();
            return $this->render('edit',['success' => 'Информация удалена']);
        }
        return $this->render('delete-row',['content' => $content]);
    }
    public function actionEditRow()
    {
        $id = Yii::$app->request->get('id');
        if($id != null)
        {
            $content=Content::find()
                ->select(['id','date','cathegory','title','text','metad','metak'])
                ->where(['id' => $id])
                ->one();
        }
        else
        {
            $content=new Content;
        }
        if(Yii::$app->getRequest()->isPost)
        {
            if($content->load(Yii::$app->request->post()) && $content->save())
            {
                return $this->render('edit',['success' => 'Информация обновлена']);
            }
        }
        return $this->render('edit-row',['content' => $content]);
    }

}
