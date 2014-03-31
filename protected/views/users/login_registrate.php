<?php
/**
 * Created by PhpStorm.
 * User: AlexanderV
 * Date: 31.03.14
 * Time: 12:56
 */
?>
<div class="login">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    )); ?>
    <fieldset>

        <legend>Авторизация зарегестрированного пользователя</legend>
        <?php echo $form->errorSummary($login); ?>
        <?php echo $form->hiddenField($login, 'scenario', array('value'=>'login')); ?>
        <?php echo $form->textFieldControlGroup($login, 'username'); ?>
        <?php echo $form->passwordFieldControlGroup($login, 'password'); ?>
    </fieldset>

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton('Авторизация', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    )); ?>

    <?php $this->endWidget(); ?>
</div>
<div class="registrate">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    )); ?>

    <fieldset>

        <legend>Регистрация нового пользователя</legend>
        <?php echo $form->errorSummary($registrate); ?>
        <?php echo $form->hiddenField($registrate, 'scenario', array('value'=>'registrate')); ?>
        <?php echo $form->textFieldControlGroup($registrate, 'username'); ?>
        <?php echo $form->textFieldControlGroup($registrate, 'password'); ?>
        <?php echo $form->textFieldControlGroup($registrate, 'password_repeat'); ?>
        <?php echo $form->textFieldControlGroup($registrate, 'name'); ?>
        <?php echo $form->dropDownListControlGroup($registrate, 'role',
            array('3'=>'Продавец', '4'=>'Покупатель'), array()); ?>
    </fieldset>

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton('Регистрация', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    )); ?>

    <?php $this->endWidget(); ?>
</div>