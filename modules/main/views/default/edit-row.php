<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 03.02.2016
 * Time: 21:22
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Cathegories;
use yii\helpers\ArrayHelper;

?>
<div class="col-md-7">
    <h2>редактирование контента</h2>

    <?php
        $form = ActiveForm::begin(/*['action'=>['default/edit-row']]*/);
        $cathegory = Cathegories::find()
            ->all();
        $items = ArrayHelper::map($cathegory,'name','rusname');
   ?>

    <?= $form->field($content,'date')->label('выберите дату',['value' => $content->date])->widget(\yii\jui\DatePicker::classname(),['dateFormat' => 'yyyy-MM-dd']);?>
    <?= $form->field($content,'cathegory')->dropDownList($items);?>
    <?= $form->field($content,'title')->label('введите заголовок',['value' => $content->title]);?>
    <?= $form->field($content ,'text')->textarea(['value'=>$content->text ])->label('введите содержание');?>
    <?= $form->field($content,'metad')->textarea(['value'=>$content->metad ])->label('введите короткое описание');?>
    <?= $form->field($content,'metak')->textarea(['value'=>$content->metak ])->label('введите ключевые слова');?>
    <?= Html::submitButton('Отправить', ['class' => 'submit']) ?>
    <?php ActiveForm::end();?>

</div>