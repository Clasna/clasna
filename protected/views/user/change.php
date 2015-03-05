<div class="cabinet">
<div class="left_cabinet">
<h1><?php echo Yii::t('user','change_password'); ?></h1>
<div class="recovery">
<a href="/<?php echo Yii::app()->language;  ?>/user/index"><?php echo Yii::t('user','back'); ?></a>
</div>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-recovery-form',
    'enableAjaxValidation'=>true,
)); ?>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                    <br />
    <?php echo $form->errorSummary($_user); ?>

    <?php if(isset($_return)) {?>
    <p><?php echo $_return; ?></p>
    <?php } ?>

    <?php if(isset($_password)) {?>
    <p><?php echo $_password; ?></p>
    <?php } ?>

    <?php if(isset($_new)) {?>
    <p><?php echo $_new; ?></p>
    <?php } ?>

    <p class="surname">
        <?php echo $form->labelEx($_user,'password'); ?>
        <?php echo $form->passwordField($_user,'password',array('value'=>'')); ?>
        <?php echo $form->error($_user,'password'); ?>
    </p>
    <p class="surname">
    <label for="User_password" class="required">Повторить пароль </label>
    <input type="password" name="User[return]"> 
    <?php echo $form->error($_user,'return'); ?>
    </p>

    <p class="surname">
    <label for="User_password" class="required">Новый пароль </label>
    <input type="password" name="User[newpassword]">
    <?php echo $form->error($_user,'newpassword'); ?> 
    </p>

<div class="col-lg-6 col-md-6">
<div class="pay_text">
<?php echo CHtml::submitButton('Сохранить',array('class'=>'input-send')); ?>
</div>
</div>

<?php $this->endWidget(); ?>
</div>
</div>
 <div class="clearfix hidden-lg  hidden-md"></div>
</div>
</div>