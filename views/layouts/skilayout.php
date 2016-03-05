<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 26.01.2016
 * Time: 21:51
 */

/* @var $content string */
/* @var $this \yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\IdentityInterface;

use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language?>">
<head>
    <?Html::csrfMetaTags()?>
    <meta charset="<?= Yii::$app->charset?>">
    <?php $this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']);?>
    <meta name="keywords" content="skiclubbsu, skiclub">

    <title><?= Yii::$app->name?></title>

    <?php $this->head();?>
</head>
<body>
<?php $this->beginBody() ?>
	<div class="row leftblock">
		<div class="col-md-2 mainmenublock">
			<ul>
				<li><h3><?=  Html::a('Ski Club BSU',Yii::$app->homeUrl,[])?></h3></li>
				<li><h4><?=  Html::a('Новости',Url::toRoute(['/main/content','cathegory'=>'news']),[])?></h4></li>
                <li><h4><?=  Html::a('Фото',Url::toRoute(['/main/foto']),[])?></h4></li>
                <li><h4><?=  Html::a('Видео',Url::toRoute(['/main/video']),[])?></h4></li>
                <li><h4><?=  Html::a('Тренировки',Url::toRoute(['/main/workouts']),[])?></h4></li>
                <li><h4><?=  Html::a('О нас',Url::toRoute(['/main/about']),[])?></h4></li>
			</ul>

            <div class="infoblock">
                <?php
                    if(Yii::$app->user->isGuest) {
                ?>
                        <?= Html::a('<div class="reg"><h4>Войти</h4></div>', Url::toRoute(['main/login']), []) ?>
                        <?= Html::a('<div class="reg"><h4>Регистрация</h4></div>', Url::toRoute(['main/reg']), []) ?>
                <?php
                    }
                else{
                ?>

                        <p>Вы зашли под именем <?= Yii::$app->user->identity['username']?></p>

                    <?= Html::a('<div class="reg"><h4>Выйти</h4></div>', Url::toRoute([
                        'main/logout',
                        'username'=>Yii::$app->user->identity['username']]),
                        ['linkOptions'=> ['data-metod'=>'post']]) ?>
                <?php
                };
                ?>
            </div>
			<div class="infoblock">
				<h4>Наш адрес:</h4>
				<address>г.Минск, ул.Октябрьская, д.8а</address>
				<h4>Телефон:</h4>
				<address>209 – 56 – 38</address>
				<h4>e-mail:</h4>
				<address>baza.bsu@gmail.com</address>
			</div>

		</div>
        <?= $content ?>

	</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>