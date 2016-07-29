<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 28.01.2016
 * Time: 23:53
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="col-md-7">
    <h2 class=newsheader><?= $row->title ?></h2>
    <p><?= $row->text ?></p>
</div>
<div class="col-md-3">
    <h2>Последние записи</h2>
    <?php
    foreach ($list as $info) {
        echo '<p>';
        echo Html::a(
            $info->title,
            Url::toRoute(['content', 'cathegory' => $cathegory, 'id' => $info->id,]),
            ['class' => 'newsrightblock']);
        echo '</p>';
    }
    echo Html::a('<div class=allcontent>все записи</div>',
        Url::toRoute(['all', 'cathegory' => $cathegory]), ['class' => 'allcontentref']
    );
    ?>
</div>