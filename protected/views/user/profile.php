<div class="container">
<div class="container cart_form">
<p>Изменение Ваших данных</p>
<a href="/user">назад</a>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-recovery-form',
    'enableAjaxValidation'=>true,
)); ?>

    <?php echo $form->errorSummary($_profile); ?>
<div class="row">
<div class="col-lg-6 col-md-6">
    <p class="surname">
        <?php echo $form->labelEx($_user,'username'); ?>
        <?php echo $form->textField($_user,'username'); ?>
        <?php echo $form->error($_user,'username'); ?>
    </p>

    <p class="surname">
        <?php echo $form->labelEx($_user,'email'); ?>
        <?php echo $form->textField($_user,'email'); ?>
        <?php echo $form->error($_user,'email'); ?>
    </p>

    <p class="surname">
        <?php echo $form->labelEx($_profile,'fio'); ?>
        <?php echo $form->textField($_profile,'fio'); ?>
        <?php echo $form->error($_profile,'fio'); ?>
    </p>

    <p class="surname">
        <?php echo $form->labelEx($_profile,'birthday'); ?>
        <?php echo $form->textField($_profile,'birthday'); ?>
        <?php echo $form->error($_profile,'birthday'); ?>
    </p>

    <p class="surname">
        <?php echo $form->labelEx($_profile,'phone'); ?>
        <?php echo $form->textField($_profile,'phone'); ?>
        <?php echo $form->error($_profile,'phone'); ?>
    </p>

    <p class="surname">
        <?php echo $form->labelEx($_profile,'county'); ?>
        <?php echo $form->textField($_profile,'county'); ?>
        <?php echo $form->error($_profile,'county'); ?>
    </p>

    <p class="surname">
        <?php echo $form->labelEx($_profile,'city'); ?>
        <?php echo $form->textField($_profile,'city'); ?>
        <?php echo $form->error($_profile,'city'); ?>
    </p>

    <p class="surname">
        <?php echo $form->labelEx($_profile,'adress'); ?>
        <?php echo $form->textField($_profile,'adress'); ?>
        <?php echo $form->error($_profile,'adress'); ?>
    </p>

<div class="col-lg-6 col-md-6">
<div class="pay_text">
<?php echo CHtml::submitButton('Сохранить',array('class'=>'input-send')); ?>
</div>
</div>

<?php $this->endWidget(); ?>

</div>
</div>
</div>
 <div class="clearfix hidden-lg  hidden-md"></div>
</div>
</div>