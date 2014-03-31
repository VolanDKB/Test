<?php
/* @var $this SiteController */
/*
for($i = 0; $i < 20; $i++)
{
    echo "<div class='row price_grid'>";
    for($j = 0; $j < 5; $j++)
    {
        echo "<div class='span2 price_element'>";
            echo "<p>testtesttest</p>";
        echo "</div>";
    }
    echo "</div>";
}
*/
$this->widget('bootstrap.widgets.TbHeroUnit', array(
    'htmlOptions' => array("style"=>"background-color: white; color: green;",),
    'headingOptions' => array("style"=>"font-size: 45px;",),
    'heading' => 'Добро пожаловать!',
    'content' => '',
));



