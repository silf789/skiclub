<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 26.01.2016
 * Time: 23:34
 */
use yii\helpers\Html;
use yii\helpers\Url;
//use Imagine\Imagick\Imagine;
?>
<div class="col-md-7">
    <div class="row albums">
    <?php
        foreach($albums as $list) {
            ?>
                <div class="col-md-6">
                    <a href="<?=Url::toRoute(['view-foto','albid' => $list->id])?>">
                    <div class="foto">
                        <?php
                            $url=Yii::getAlias('@web/foto/thumbs/'.$list->id.'.jpg');
                            echo '<img src="'.$url.'" width="100%">';
                        ?>
                    </div>
                    <div class="album-name">
                        <h4><?= $list->name ?></h4>
                    </div>
                    </a>
                </div>
        <?php
        }
    ?>
    </div>




</div>
