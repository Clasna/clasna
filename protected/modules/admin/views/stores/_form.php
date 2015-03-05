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
			<?php echo $form->labelEx($model, 'name'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'name', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'name'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model,'city'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->dropDownList($model, 'city', Stores::getCity()); ?>
			</div>
			<?php echo $form->error($model,'city'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'map'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'map', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'map'); ?>
		</div>
	</div>
<!-- Content -->
	<div class="form-group" >
			<label class="control-label col-xs-12 col-sm-3 no-padding-right">
				<?php echo $form->labelEx($model, 'stores_ua'); ?>
			</label>

			<div class="col-xs-12 col-sm-9">
				<div class="clearfix">
					<?php $this->widget('application.extensions.ckeditor.CKEditor',array('model'=>$model,'attribute'=>'stores_ua','language'=>'ru','editorTemplate'=>'full'));?>
				</div>
				<?php echo $form->error($model, 'stores_ua'); ?>
			</div>
	</div>

	<div class="form-group" >
			<label class="control-label col-xs-12 col-sm-3 no-padding-right">
				<?php echo $form->labelEx($model, 'stores_ru'); ?>
			</label>

			<div class="col-xs-12 col-sm-9">
				<div class="clearfix">
					<?php $this->widget('application.extensions.ckeditor.CKEditor',array('model'=>$model,'attribute'=>'stores_ru','language'=>'ru','editorTemplate'=>'full'));?>
				</div>
				<?php echo $form->error($model, 'stores_ru'); ?>
			</div>
	</div>

	<div class="form-group" >
			<label class="control-label col-xs-12 col-sm-3 no-padding-right">
				<?php echo $form->labelEx($model, 'stores_en'); ?>
			</label>

			<div class="col-xs-12 col-sm-9">
				<div class="clearfix">
					<?php $this->widget('application.extensions.ckeditor.CKEditor',array('model'=>$model,'attribute'=>'stores_en','language'=>'ru','editorTemplate'=>'full'));?>
				</div>
				<?php echo $form->error($model, 'stores_en'); ?>
			</div>
	</div>
<!-- END Content -->
	<div class="form-group">
			<label class="control-label col-xs-12 col-sm-3 no-padding-right">
				<?php echo $form->labelEx($model,'images'); ?>
			</label>
			<div class="col-xs-12 col-sm-9">
				<?php echo $form->fileField($model,'images',array()); ?>
					<?php if ( $model->images ) { ?>
						<img class="admin_grid_image" src="<?php echo $model->images; ?>" width='167px' height="137px"/>
					<?php } ?>
				<?php echo $form->error($model,'images'); ?>
			</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model,'status'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->dropDownList($model, 'status', array('1'=>'Да', '0'=>'Нет')); ?>
			</div>
			<?php echo $form->error($model,'status'); ?>
		</div>
	</div>

	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class' => 'btn btn-info')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

