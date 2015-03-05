<div class="registry">
<div class="user">
<?php if(Yii::app()->user->hasFlash('pass_true')) {?>
<div class="flash-success">
    <?php echo Yii::app()->user->getFlash('pass_true'); ?>
</div>
<?php } else {?>
<p>Восстановление пароля</p>
<style type="text/css">
#recovery-form_es_ p {
    color: #fff;
}
#recovery-form_es_ li {
    list-style: none;
    color: #fff;
}
#RecoveryPass_email {
    margin-bottom: 10px;
}
#RecoveryPass_email_em_, #RecoveryPass_email_span {
    color: #fff;
}
</style>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'recovery-form',
    'enableAjaxValidation'=>true,
        'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>
    <?php echo $form->errorSummary($_user); ?>
        <span id="RecoveryPass_email_span">Введите свой E-mail.<span>
        <?php echo $form->textField($_user,'email'); ?>
        <?php echo $form->error($_user,'email'); ?>
<?php if(Yii::app()->user->hasFlash('pass_recovery')) {?>
<div class="flash-success">
    <?php echo Yii::app()->user->getFlash('pass_recovery'); ?>
</div>
<?php } ?>
<button type="submit">Восстановление</button>
<?php $this->endWidget(); ?>
<?php } ?>
</div>
</div>
