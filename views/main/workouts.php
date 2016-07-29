<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 26.01.2016
 * Time: 23:35
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="col-md-7">
    <div class="row">
        <div class="col-md-6">
            <?=Html::a('<div class=workoutcontent>Расписание тренировок</div>',
                Url::toRoute(['content','cathegory'=>'shedule']), ['class' => 'allcontentref']
            );
            ?>
        </div>
        <div class="col-md-6">
            <?=Html::a('<div class=workoutcontent>Питание</div>',
                Url::toRoute(['content','cathegory'=>'food']), ['class' => 'allcontentref']
            );
            ?>
        </div>

        <div class="col-md-6">
            <?=Html::a('<div class=workoutcontent>Программы тренировок</div>',
                Url::toRoute(['content','cathegory'=>'program']), ['class' => 'allcontentref']
            );
            ?>
        </div>


        <div class="col-md-6">
            <?=Html::a('<div class=workoutcontent>Упражнения</div>',
                Url::toRoute(['content','cathegory'=>'exercises']), ['class' => 'allcontentref']
            );
            ?>
        </div>

        <div class="col-md-6">
            <?=Html::a('<div class=workoutcontent>Экипировка</div>',
                Url::toRoute(['content','cathegory'=>'equipment']), ['class' => 'allcontentref']
            );
            ?>
        </div>

        <div class="col-md-6">
            <?=Html::a('<div class=workoutcontent>Инвентарь</div>',
                Url::toRoute(['content','cathegory'=>'inventory']), ['class' => 'allcontentref']
            );
            ?>
        </div>

    </div>


</div>
