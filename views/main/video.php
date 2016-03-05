<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 26.01.2016
 * Time: 23:35
 */
?>
<div class="col-md-7">

        <?php
        foreach($video as $list) {
            ?>

                <div class="video-block">
                    <h3><?=$list->name?></h3>
                    <p><?=$list->ref?></p>
                </div>

        <?php
        }
        ?>




</div>