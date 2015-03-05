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
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/add_styles.css" />

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
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
				<div class="left"><p class="silver"><?php echo isset($this->pageTitle)?$this->pageTitle:'Admin'; ?></p></div>
				<div class="right">
					<form action="#">
						<input type="text">
						<input class="blue" type="submit" value="Искать">
					</form>	
				</div>
			</div>
			
			<?php echo $content; ?>
			
		</div>
		
		<footer class="bubbleMain">
			<p class="copy silver"> Powered by Smithysoft™ All rights reserved. support@smithysoft</p>
		</footer>
	</body>
</html>
