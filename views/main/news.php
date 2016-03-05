<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 26.01.2016
 * Time: 23:29
 */
use app\components\RightBlockContentWidget;
?>

<div class="col-md-7">
    <h2><?= $row->title ?></h2>
    <p><?= $row->text ?></p>
</div>
<div class="col-md-3">
    <h3>Последние записи</h3>
        <?php
            foreach($list as $info)
            {
                echo '<p>'.$info->title.'</p>';
            }
        ?>

</div>