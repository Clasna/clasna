<div class="registry">
<div class="user">
<?php if(Yii::app()->user->hasFlash('active_true')){ ?>
<div class="flash-success">
    <?php echo Yii::app()->user->getFlash('active_true'); ?>
</div>
<?php } ?>
<style type="text/css">
#login-form_es_ {
	margin-left: 30px;
}
#login-form_es_ p {
	color: #fff;
}
#login-form_es_ ul li {
	list-style: none;
	color: #fff;
}
#LoginForm_username, #LoginForm_password {
	margin-bottom: 10px;
}
#LoginForm_username_em_, #LoginForm_password_em_ {
	color: #fff;
}
</style>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>
<h1><?php echo Yii::t('user','sign_in'); ?></h1>
<?php echo $form->errorSummary($model); ?>
<div class="user_login">
<?php echo $form->textField($model,'username',array('placeholder'=>Yii::t('user','youre_mail'),'class'=>'e-mail')); ?>
<?php echo $form->passwordField($model,'password',array('placeholder'=>Yii::t('user','youre_password'),'class'=>'password')); ?>
<?php echo $form->error($model,'username'); ?>
<?php echo $form->error($model,'password'); ?>
</div>
<a href="/<?php echo Yii::app()->language;  ?>/user/recovery"><?php echo Yii::t('basket','forgot_your_password'); ?></a>
<button type="submit"><?php echo Yii::t('user','enter'); ?></button>
<?php $this->endWidget(); ?>
<div class="clearfix"></div>
</div>
</div>