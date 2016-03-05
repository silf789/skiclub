<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 02.02.2016
 * Time: 21:03
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="col-md-7">
    <h3>Вы действительно хотите удалить запись?</h3>
    <?php ActiveForm::begin();?>
    <?= Html::submitButton('удалить', ['class' => 'submit']) ?>
    <?php ActiveForm::end();?>
    <h4><?=$content->title?></h4>
    <p><?=$content->text?></p>
</div>