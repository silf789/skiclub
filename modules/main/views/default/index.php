<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>

<div class="col-md-7">
    <h1>Раздел редактирования контента сайта</h1>
    <p>
        <?= Html::a('Редактировать контент статей, расписание, и раздел "О нас',Url::toRoute(['default/editcontent']),[])?>
    </p>
    <p>
        <?= Html::a('Редактировать фотоальбомы',Url::toRoute(['default/editfoto']),[])?>
    </p>
    <p>
        <?= Html::a('Редактировать видеозаписи',Url::toRoute(['default/editvideo']),[])?>
    </p>

</div>
