<?php
/**
 * Created by PhpStorm.
 * User: AlexanderV
 * Date: 01.04.14
 * Time: 12:11
 */
?>
<div class="row" style="padding: 20px; padding-bottom: 0px;">
        <div class="span-15">
            <p>Основная категория: <?php echo TbHtml::b("Автотранспорт"); ?></p>
            <p>Количество товаров: <? echo TbHtml::b("123"); ?></p>
        </div>
</div>
<div class="row" style="padding: 20px; padding-bottom: 0px;">
    <div class='span-5'>
        <?php echo TbHtml::quote('Лучший товар'); ?>
    </div>
    <div class='span-5' style="vertical-align: text-bottom">
        <?php echo TbHtml::quote('Рейтинг магазина'); ?>
    </div>
</div>
<div class="row" style="background-color: #d3d3d3; padding: 10px;">
        <div class='span-2'><?php echo TbHtml::imageCircle('/images/system/test.jpg'); ?> </div>
        <div class='span-8' style="vertical-align: text-bottom"> <? echo TbHtml::lead($shop->name); ?></div>
</div>