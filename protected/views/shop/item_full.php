<?php
/**
 * Created by PhpStorm.
 * User: AlexanderV
 * Date: 31.03.14
 * Time: 16:02
 */
?>
<div class="row" style="margin-top: 10px;">
    <div class="span-8">
        <?php echo TbHtml::imagePolaroid("/images/prices_pictures/" . $item->image); ?><br><br>
        <?php echo TbHtml::quote('Стоимость: <b>' . $item->price . ' руб.</b>', array(
            'source' => $item->seller->name,
        )); ?>
        <?php echo TbHtml::linkButton ('В корзину', array('size' => TbHtml::BUTTON_SIZE_SMALL, 'style'=>'width: 90%; margin-top: 2px;')); ?>
    </div>
    <div class="span-16">
        <?php echo TbHtml::lead($item->name); ?>
        <p><?php echo TbHtml::small($item->description); ?></p>
    </div>
</div>