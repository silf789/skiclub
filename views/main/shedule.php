<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 31.01.2016
 * Time: 1:24
 */
use yii\helpers\Url;
?>
<div class="col-md-7">
    <h2><?=$shedule->title?></h2>
    <p><?=$shedule->text?></p>
    <div>
        <a href="<?=Url::toRoute(['main/workouts'])?>" style="text-decoration: none">
            <div class="backfotobutton">
                Назад в раздел тренировок
            </div>
        </a>
    </div>
</div>