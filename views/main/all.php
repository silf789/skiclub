<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 30.01.2016
 * Time: 17:17
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>
    <div class="col-md-7">
        <h2>Все записи</h2>
    <?php
    foreach ($content as $info) {

        echo Html::a(
            '<h5>'.$info->title.'</h5><h6>'.$info->metad.'</h6>',
            Url::toRoute(['content', 'cathegory' => $info->cathegory, 'id' => $info->id,]),
            ['class' => 'newsrightblock, allcontentreflist']);
        echo '<hr>';

    };


    ?>