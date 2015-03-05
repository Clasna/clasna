<div class="registry">
<div class="user">
	<div class="flash-success" style="color:#fff;">
		<?php if($_hash) {?>
		<p><?php echo Yii::t('user','you_have_activated'); ?></p>
		<p><a href="/<?php echo Yii::app()->language;  ?>/user/login"><?php echo Yii::t('user','login_to_members_area'); ?></a></p>
		<?php } ?>
	</div>
</div>
</div>