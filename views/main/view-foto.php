<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 15.02.2016
 * Time: 1:27
 */
use yii\helpers;
use yii\helpers\Url;
?>
<div class="col-md-7">
    <h2> <?=$albname?></h2>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php
                $active="active";
                $i=1;
                foreach($fotos as $foto)
                {
                    if($i != 1) {$active="";}
            ?>
                <div class="item fotocarousel <?=$active?>">
                    <div>
                        <img class="fotocarousel" src="<?=Yii::getAlias('@web/foto/'.$albid.'/'.$foto->ref)?>" alt="...">
                    </div>

                </div>
            <?php
                    $i++;
                }
            ?>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
    <?php
            $this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
    ?>
    <div>
        <a href="<?=Url::toRoute(['main/foto'])?>" style="text-decoration: none">
            <div class="backfotobutton">
                Назад к списку альбомов
            </div>
        </a>
    </div>

</div>