<?php
/**
 * Created by PhpStorm.
 * User: AlexanderV
 * Date: 01.04.14
 * Time: 10:54
 */


?>
<div class="row">
    <div class="span-8">
        <?php echo TbHtml::imageRounded("/images/system/test.jpg"); ?><br><br>
        <?php
            echo TbHtml::buttonGroup(array(
                array('label' => 'К магазину'),
                array('label' => 'Изменить'),
                array('label' => 'Выход из системы'),
        ), array('vertical' => true, "style"=>"width: 100%;")); ?>
    </div>
    <div class="span-16">
        <?php echo TbHtml::lead($user->name); ?>
        <?php echo TbHtml::small('Логин в системе:'); echo TbHtml::b($user->username); ?><br>
        <?php echo TbHtml::small('Количество возможных товаров:'); echo TbHtml::b($user->AllowedPriceCount->counter); ?><br>
        <?php echo TbHtml::small('Количество активных товаров:'); echo TbHtml::b(count($user->price_items)); ?><br>
        <?php echo TbHtml::small('Средняя цена на товар:'); echo TbHtml::b($user->AvgPrice); ?>
    </div>
</div>