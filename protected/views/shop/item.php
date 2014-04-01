<?php
/**
 * Created by PhpStorm.
 * User: AlexanderV
 * Date: 31.03.14
 * Time: 14:52
 */
?>
<div class="row">
        <div class="span-3">
            <?php echo TbHtml::imagePolaroid("/images/prices_pictures/" . $item->image); ?><br><br>
            <?php echo TbHtml::linkButton ('Просмотр', array('size' => TbHtml::BUTTON_SIZE_SMALL, 'style'=>'width: 90%', 'url'=>array('shop/item_full', 'item_id'=>$item->id))); ?>
            <?php echo TbHtml::linkButton ('В корзину', array('size' => TbHtml::BUTTON_SIZE_SMALL, 'style'=>'width: 90%; margin-top: 2px;')); ?>
        </div>
        <div class="span-4">
            <p><?php echo TbHtml::b('Наименование:'); ?><br><?php echo $item->name ?></p>
            <p><?php echo TbHtml::b('Стоимость:'); ?><br><?php echo $item->price ?> руб.</p>
        </div>
</div>