<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'articles-form',
	'enableAjaxValidation' => false,
	'htmlOptions' => array(
		'class' => 'form-horizontal',
		'enctype' => 'multipart/form-data'
	)
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'title_option'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'title_option', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'100','onkeyup'=>'oJS.strNormalize(this)')); ?>
			</div>
			<?php echo $form->error($model, 'title_option'); ?>
		</div>
	</div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class' => 'btn btn-info')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

