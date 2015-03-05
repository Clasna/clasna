<div class="registry">
<div class="user">
<?php if(Yii::app()->user->hasFlash('registration')): ?>

<div class="flash-success" style="color:#fff;">
    <?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>
<style type="text/css">
#User_email, #User_password {
    margin-bottom: 10px;
}
#User_email_em_, #User_password_em_ {
    color: #fff;
    margin-left: 25px;
}
</style>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'userreg-form',
    'enableAjaxValidation'=>true,
        'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>
<h1><?php echo Yii::t('user', 'reg'); ?></h1>
<p><?php echo Yii::t('user', 'to_register'); ?></p>
    <?php echo $form->errorSummary($model); ?>
    <?php if(Yii::app()->user->hasFlash('email')){ ?>
            <p><?php echo Yii::app()->user->getFlash('email'); ?></p>
    <?php } ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255,'class'=>'e-mail','placeholder'=> Yii::t('user', 'youre_mail'))); ?>
        <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255,'class'=>'password','placeholder'=> Yii::t('user', 'youre_password'))); ?>
        <?php echo $form->error($model,'email'); ?>
        <?php echo $form->error($model,'password'); ?>

<button type="submit"><?php echo Yii::t('user', 'reg'); ?></button>
<?php $this->endWidget(); ?>
<?php endif; ?>          
<div class="clearfix"></div>
</div>
</div>


