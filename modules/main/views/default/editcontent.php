<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 01.02.2016
 * Time: 1:43
 */
use yii\helpers\Html;
use yii\helpers\Url;

?>
<?php
    $this->registerCssFile('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
?>
<div class="col-md-10">
    <div>
        <a href="<?=Url::toRoute(['edit-row', 'id' => null])?>" style="text-decoration: none">
            <div class="backfotobutton">
                Добавить контент
            </div>
        </a>
    </div>
    <h2>Список контента</h2>

    <table border="1">
        <tr>
            <td>
                id
            </td>
            <td>
                title
            </td>
            <td>
                cathegory
            </td>
            <td>
                date
            </td>
            <td>
                редактировать
            </td>
            <td>
                удалить
            </td>
        </tr>
    <?php
        foreach($content as $row)
        {
    ?>
            <tr>
                <td>
                    <?=$row->id?>
                </td>
                <td>
                    <?=$row->title?>
                </td>
                <td>
                    <?=$row->cathegory?>
                </td>
                <td>
                    <?=$row->date?>
                </td>
                <td style="text-align: center">
                    <?= Html::a('<i class="fa fa-pencil-square-o fa-2x"></i>',Url::toRoute(['edit-row', 'id' => $row->id]),[])?>
                </td>
                <td  style="text-align: center">

                    <?= Html::a('<i class="fa fa-trash-o fa-2x"></i>',Url::toRoute(['delete-row', 'id' => $row->id]),[])?>
                </td>
            </tr>

     <?php

        }
    ?>



    </table>


</div>