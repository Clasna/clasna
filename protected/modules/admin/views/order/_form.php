<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'specialty-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'class'=>'form-horizontal',
		'enctype' => 'multipart/form-data'
	)
)); ?>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model,'fio'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model,'fio',array('class'=>'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model,'fio'); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model,'email'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model,'email',array('class'=>'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model,'email'); ?>
		</div>

	</div>


	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model,'phone'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model,'phone',array('class'=>'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model,'phone'); ?>
		</div>

	</div>

<hr>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-info')); ?>
		</div>
	</div>
<?php $this->endWidget(); ?>