<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
?>



<div class="col-md-7 maincontent">
    <div class="row">
        <div class="col-md-1"></div>
        <?php
            $this->registerCssFile('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
        ?>
        <div class="col-md-2 mainpage">
            <?=Html::a('<div class="mainpageicon"><h4><i class="fa fa-newspaper-o fa-3x"></i></h4></div>',Url::toRoute(['content','cathegory'=>'news']),[])?>

        </div>
        <div class="col-md-2 mainpage">

            <?=Html::a('<div class="mainpageicon"><h4><i class="fa fa-camera-retro fa-3x"></i></h4></div>',Url::toRoute(['main/foto']),[])?>

        </div>
        <div class="col-md-2 mainpage">
            <?=Html::a('<div class="mainpageicon"><h4><i class="fa fa-film fa-3x"></i></h4></div>',Url::toRoute(['main/video']),[])?>
        </div>
        <div class="col-md-2 mainpage">
            <?=Html::a('<div class="mainpageicon"><h4><i class="fa fa-heartbeat fa-3x"></i></h4></div>',Url::toRoute(['main/workouts']),[])?>

        </div>
        <div class="col-md-2 mainpage">
            <?=Html::a('<div class="mainpageicon"><h4><i class="fa fa-users fa-3x"></i></h4></div>',Url::toRoute(['main/about']),[])?>
        </div>
        <div class="col-md-1"></div>
    </div>
    <hr>
    <h2 class=newsheader>Последние записи</h2>
    <div class="row">
            <?php
                for($i=0;$i<=2;$i++)
                {
                    echo '<div class="col-md-4 mainnewsblock">';
                    echo '<h4>';
                    echo Html::a(
                        $list[$i]->title,
                        Url::toRoute(['content', 'cathegory' => $list[$i]->cathegory, 'id' => $list[$i]->id]),
                        ['class'=> 'newsheader']);

                    echo '</h4>';
                    echo '<p>'.$list[$i]->metad.'</p>';
                    echo '</div>';
                };
            ?>
    </div>
    <hr>
    <h2 class=newsheader>Наша гордость</h2>
    <div class="row">
        <div class="col-md-2">
            <div class="honoricon"><i class="fa fa-trophy fa-3x"></i></div>
        </div>
        <div class="col-md-4 honortext">
            <h4>Награды и достижения</h4>
        </div>

        <div class="col-md-2">
            <div class="honoricon"><i class="fa fa-user fa-3x"></i></div>
        </div>
        <div class="col-md-4 honortext">
            <h4>Спортсмены</h4>
        </div>
    </div>


</div>
<div class="col-md-3 fotoblock">

    <p><img src="http://skiclub.bsu.by/img/demoimg1.jpg"></p>
    <p><img src="https://pp.vk.me/c307603/v307603459/6aa8/F_N75PmZqsA.jpg"></p>
    <p><img src="http://skiclub.bsu.by/albums/3/2.jpg"></p>

</div>