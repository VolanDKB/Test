<?php
/* @var $this ShopController */
?>
<?php $counter = 0; ?>
<div class='row price_grid'>
    <?php
    foreach($items as $item)
    {
        echo "<div class='span-8 price_element'>";
        $this->renderPartial("item", array("item"=>$item));
        echo "</div>";
        $counter += 1;
        if($counter == 3)
        {
            echo "</div><div class='row price_grid'>";
            $counter = 0;
        }
    }
    for($i = 0; $i < Yii::app()->user->counter; $i++)
    {
        echo "<div class='span-8 price_element'>";
        echo TbHtml::button('Добавить товар', array('color' => TbHtml::BUTTON_COLOR_SUCCESS, 'size' => TbHtml::BUTTON_SIZE_LARGE, 'style'=>'margin-top: 90px; margin-left: 67px', 'data-toggle' => 'modal', 'data-target' => '#myModal_new_item',));
        echo "</div>";
        $counter += 1;
        if($counter == 3)
        {
            echo "</div><div class='row price_grid'>";
            $counter = 0;
        }
    }
    ?>
</div>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('htmlOptions' => array('enctype' => 'multipart/form-data'),)); ?>
<?php $this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'myModal_new_item',
    'header' => 'Добавление нового товара',
    'content' => "
        <fieldset>
            ". $form->errorSummary($new_item) ."
            ". $form->textFieldControlGroup($new_item, 'name') ."
            ". $form->textAreaControlGroup($new_item, 'description') ."
            ". $form->textFieldControlGroup($new_item, 'price') ."
            ". $form->fileFieldControlGroup($new_item, 'image') ."
        </fieldset>
        ",
    'footer' => TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
)); ?>
<?php $this->endWidget(); ?>
<script>
    $(document).ready(function()
    {
        if($("#yw0").find(".alert-error").html())
            $("#myModal_new_item").modal('show');
    })
</script>
