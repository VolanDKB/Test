<?php
/**
 * Created by PhpStorm.
 * User: AlexanderV
 * Date: 31.03.14
 * Time: 12:56
 */
?>
<?php $form1 = $this->beginWidget('bootstrap.widgets.TbActiveForm', array()); ?>
<?php $this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'myModal_login',
    'header' => 'Авторизация пользователя',
    'content' => "
        <fieldset>
            ". $form1->errorSummary($login) ."
            ". $form1->hiddenField($login, 'scenario', array('value'=>'login')) ."
            ". $form1->textFieldControlGroup($login, 'username') ."
            ". $form1->passwordFieldControlGroup($login, 'password') ."
        </fieldset>
        ",
        'footer' => TbHtml::submitButton('Авторизация', array('color' => TbHtml::BUTTON_COLOR_SUCCESS)),
    )); ?>
<?php $this->endWidget(); ?>

<?php $form2 = $this->beginWidget('bootstrap.widgets.TbActiveForm', array()); ?>
<?php $this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'myModal_reg',
    'header' => 'Регистрация пользователя',
    'content' => "
        <fieldset>
            ". $form2->errorSummary($registrate) ."
            ". $form2->hiddenField($registrate, 'scenario', array('value'=>'registrate')) ."
            ". $form2->textFieldControlGroup($registrate, 'username') ."
            ". $form2->textFieldControlGroup($registrate, 'password') ."
            ". $form2->textFieldControlGroup($registrate, 'password_repeat') ."
            ". $form2->textFieldControlGroup($registrate, 'name') ."
            ". $form2->dropDownListControlGroup($registrate, 'role', array('3'=>'Продавец', '4'=>'Покупатель'), array()) ."
        </fieldset>
        ",
    'footer' => TbHtml::submitButton('Регистрация', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
)); ?>
<?php $this->endWidget(); ?>
<?php $this->widget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => 'Добро пожаловать на сайт',
    'content' => '<p>Информация о том, что тут есть, было и будет)) </p><p>'
        . TbHtml::button('Авторизация на сайте', array(
            'style' => TbHtml::BUTTON_COLOR_INFO,
            'size' => TbHtml::BUTTON_SIZE_DEFAULT,
            'data-toggle' => 'modal',
            'data-target' => '#myModal_login',
        )) . "&nbsp;&nbsp;"
        . TbHtml::button('Регистрация на сайте', array(
            'style' => TbHtml::BUTTON_COLOR_INFO,
            'size' => TbHtml::BUTTON_SIZE_DEFAULT,
            'data-toggle' => 'modal',
            'data-target' => '#myModal_reg',
        )),
)); ?>
<script>
    $(document).ready(function()
    {
        if($("#yw1").find(".alert-error").html())
            $("#myModal_reg").modal('show');
        if($("#yw0").find(".alert-error").html())
            $("#myModal_login").modal('show');
    })
</script>