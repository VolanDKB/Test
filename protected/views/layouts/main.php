<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <?php Yii::app()->bootstrap->register(); ?>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="container" id="page">
    <div id="fullmenu">
        <div id="mainmenu">
            <?php $this->widget('bootstrap.widgets.TbNav', array(
                'type' => TbHtml::NAV_TYPE_PILLS,
                'items' => array(
                    array('label' => 'Домашняя страница', 'url' => array('site/index'),),
                    array('label' => 'Магазины', 'url' => array('shop/AllShops'), 'visible'=>Yii::app()->user->role == Roles::BUYER),
                    array('label' => 'Продавцы', 'url' => array('site/adminsellers'), 'visible'=>Yii::app()->user->role == Roles::ADMIN),
                    array('label' => 'Мой магазин', 'url' => array('shop/UserMagazine'), 'visible'=>Yii::app()->user->role == Roles::SELLER),
                    array('label' => 'Мои товары', 'url' => array('shop/UserItems'), 'visible'=>Yii::app()->user->role == Roles::SELLER),
                    array('label' => 'Выйти', 'url' => '/index.php/users/logout', 'visible'=>!Yii::app()->user->isGuest, 'style'=>'float: right'),
                    array('label' => 'Мой профиль', 'url' => array('users/Profile'), 'visible'=>!Yii::app()->user->isGuest, 'style'=>'float: right'),
                ),
            )); ?>
        </div>
        <div id="usermenu">
            <?php $this->widget('bootstrap.widgets.TbNav', array(
                'items' => array(
                    TbHtml::navbarSearchForm('#'),
                ),
            ));?>
        </div>
    </div>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">

	</div><!-- footer -->

</div><!-- page -->
<?php $this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'image_modal',
    'content' => '',
)); ?>
</body>
<script>
    $(document).ready(function()
    {
        $(".img-polaroid").on("click", function()
        {
            $("#image_modal").find(".modal-body").html('<img style="width: 100%" src=' + $(this).attr("src") + ' ?>');
            $("#image_modal").modal("show");
        })
    });
</script>
</html>
