<div class="registry"
<?php 
echo !isset($blockDiv)?'style="display:none;"':'';
?>>
<div class="user">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form-basket',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>
<style type="text/css">
	#LoginForm_username, #LoginForm_password {
		margin-bottom: 10px;
	}
	#LoginForm_username_em_, #LoginForm_password_em_ {
		color: #fff;
	}
	 #login-form-basket_es_ p {
	 	color: #fff;
	 }
	 #login-form-basket_es_ ul li {
	 	color: #fff;
	 	list-style: none;
	 }
	 #user-action {
		color: #fff;
		text-align: center;
		font-size: 18px;
		margin: 5px 0;
	 }
</style>
<h1><?php echo Yii::t('basket', 'registered_user'); ?></h1>
<p><?php echo Yii::t('basket', 'log_in'); ?></p>
<div class="user_login">
<?php echo $form->errorSummary($model); ?>
<?php echo $form->textField($model,'username',array('placeholder'=>Yii::t('user','youre_mail'),'class'=>'e-mail')); ?>
<?php echo $form->passwordField($model,'password',array('placeholder'=>Yii::t('user','youre_password'),'class'=>'password')); ?>
<?php echo $form->error($model,'username'); ?>
<?php echo $form->error($model,'password'); ?>
</div>
<a href="/<?php echo Yii::app()->language;  ?>/user/recovery"><?php echo Yii::t('basket','forgot_your_password'); ?></a>
<?php if(Yii::app()->user->hasFlash('active_true')){ ?>
<div class="flash-success" id="user-action">
    <?php echo Yii::app()->user->getFlash('active_true'); ?>
</div>
<?php } ?>
<button type="submit" name="enter_user"><?php echo Yii::t('user','enter'); ?></button>
<div class="clearfix"></div>
<?php $this->endWidget(); ?>
</div>
<a href="?guest=true"><?php echo Yii::t('basket', 'login_as_a_guest'); ?></a>
</div>