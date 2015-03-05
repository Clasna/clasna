<?php if($order) {?>
<hr>
<a href="/admin/user/view?get=<?php echo $model->email; ?>">Заказы пользотвателя <?php echo $profile->fio; ?></a>
<hr>
<?php } ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'specialty-category-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'class'=>'form-horizontal',
		'enctype' => 'multipart/form-data'
	)
)); ?>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
		<?php echo $form->labelEx($model,'alt'); ?>
	</label>

	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
			<?php echo $form->textField($model,'alt',array('class'=>'col-xs-12 col-sm-6')); ?>
		</div>
		<?php echo $form->error($model,'alt'); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
		<?php echo $form->labelEx($model,'path'); ?>
	</label>

	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
			<img src="<?php echo $model->path; ?>" width="250" height="250">
		</div>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
		<?php echo $form->labelEx($model,'status'); ?>
	</label>

	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
			<?php echo $form->dropDownList($model,'status',array(1=>"Показать",0=>"Скрыть")); ?>
		</div>
		<?php echo $form->error($model,'status'); ?>
	</div>
</div>


<div class="clearfix form-actions">
	<div class="col-md-offset-3 col-md-9">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-info')); ?>
	</div>
</div>
<?php $this->endWidget(); ?>