<?php
/**
 * Created by PhpStorm.
 * User: AlexanderV
 * Date: 31.03.14
 * Time: 16:18
 */
$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider' => $person,
    'template' => "{items}",
    'columns' => array(
        array(
            'name' => 'id',
            'header' => '#',
            'htmlOptions' => array('color' =>'width: 60px'),
        ),
        array(
            'name' => 'username',
            'header' => 'Логин пользователя',
        ),
        array(
            'name' => 'password',
            'header' => 'Хэш пароля пользователя',
        ),
        array(
            'name' => 'name',
            'header' => 'Отображаемое имя',
        ),
    ),
)); ?>