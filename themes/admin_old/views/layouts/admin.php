<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Bootstrap -->
	<?php
		$baseUrl = Yii::app()->theme->baseUrl;
		$cs = Yii::app()->getClientScript();
		Yii::app()->clientScript->registerCoreScript('jquery');
	?>
	<link href="<?php echo $baseUrl; ?>/css/style.css" rel="stylesheet">
	<link href="<?php echo $baseUrl; ?>/css/grid.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/add_styles.css" />
	
	<!--
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.3.custom.js"></script>
	-->
	<style type="text/css">
	.adminContactsDiv .filters input[type=text] {
		width:100%;
		height:inherit;
		margin:initial;
		padding:initial;
	}
	.admin_grid_image {
		width:20px;
		height:20px;
	}
	ul.operations li {
		display:block;
		float:left;
		padding:0 5px;
	}
	.create-button {
		float:right;
		text-decoration:none;
		display:block;
		background: none repeat scroll 0 0 #F54E37;
    border: medium none;
    color: #FFFFFF;
    margin: 0 0 0 42px;
    padding: 7px 15px;
	-webkit-border-top-left-radius:3px;
	-moz-border-radius-topleft:3px;
	border-top-left-radius:3px;
	-webkit-border-top-right-radius:3px;
	-moz-border-radius-topright:3px;
	border-top-right-radius:3px;
	-webkit-border-bottom-right-radius:3px;
	-moz-border-radius-bottomright:3px;
	border-bottom-right-radius:3px;
	-webkit-border-bottom-left-radius:3px;
	-moz-border-radius-bottomleft:3px;
	border-bottom-left-radius:3px;
	cursor:pointer;
	}
	</style>
	<body>
		<header>
			<div class="bubbleMain bubble1">
			<div class="left">
				<p class="Gothic blue adminP">ADMIN PANEL</p>
				<a href="#" class="Gothic silver adminA"><?php echo strtoupper( $_SERVER['HTTP_HOST'] ); ?></a>
			</div>
			<div class="right">
			</div>
				<div class="rectangle">
					<nav class="horizontal-nav">	 
		<?php
		$this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'items'=>array(
				/*array('label'=>'Главная', 'url'=>array('/admin/')),
				array('label'=>'Входящие', 'url'=>array('#')),
				array('label'=>'Пользователи', 'url'=>array('/admin/users/'),
					'active' => Yii::app()->controller->getId() == 'users'),
				array('label'=>'Страницы', 'url'=>array('#'),
					'active' => Yii::app()->controller->getId() == 'pages'),
				array('label'=>'Статьи', 'url'=>array('#'),
					'active' => Yii::app()->controller->getId() == 'articles'),
				array('label'=>'Настройки', 'url'=>array('#'),
					'active' => Yii::app()->controller->getId() == 'config'),
				array('label'=>'Статистика сайта', 'url'=>array('#'),
					'active' => Yii::app()->controller->getId() == 'stat'),
				*/
			),
		) );
		?>
					</nav>
				</div>
				<div class="triangle-l"></div>
				<div class="triangle-r"></div>
			</div>
			<div class="bubbleMain bubble2">
			</div>
		</header>
		
		
		<div class="content">
			
			<div class="bubbleMain bubble4">
				<div class="left">
					<p class="silver">
					<?php if(isset($this->breadcrumbs)):?>
						<?php $this->widget('zii.widgets.CBreadcrumbs', array(
							'links'=>$this->breadcrumbs,
							'htmlOptions' => array( 'class' => 'silver' ),
						)); ?><!-- breadcrumbs -->
					<?php endif?>
					</p>
				</div>
				<div class="right">
					<form action="#">
						<input type="text">
						<input class="blue" type="submit" value="Искать">
					</form>	
				</div>
			</div>
			
			<div class="adminContactsDiv">
				
				<?php $this->widget('zii.widgets.CMenu', array(
					'items'=>$this->menu,
					'htmlOptions'=>array('class'=>'operations'),
				)); ?>
				
				<?php echo $content; ?>
			</div>
			
		</div>
		
		<footer class="bubbleMain">
			<p class="copy silver"> Powered by Smithysoft™ All rights reserved. support@smithysoft</p>
		</footer>
	</body>
</html>
