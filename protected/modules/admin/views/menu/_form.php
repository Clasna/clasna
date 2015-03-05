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
			<?php echo $form->labelEx($model,'title'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model,'title',array('class'=>'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model,'title'); ?>
		</div>
	</div>

	<!--<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model,'sort'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model,'sort',array('class'=>'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model,'sort'); ?>
		</div>
	</div>-->

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model,'page_id'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->dropDownList($model, 'page_id', CHtml::listData(Content::model()->findAll(),'id','name'),array(
				'empty'=>'Выберите страницу',
				'class'=>'input-large'
			)); ?>
			</div>
			<?php echo $form->error($model,'page_id'); ?>
		</div>

	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model,'parent_id'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->dropDownList($model, 'parent_id', CHtml::listData(Menu::model()->findAll(),'id','title'),array(
				'empty'=>'Выберите пункт меню',
				'class'=>'input-large'
			)); ?>
			</div>
			<?php echo $form->error($model,'parent_id'); ?>
		</div>

	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model,'status'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->dropDownList($model, 'status', array(''=>'','1'=>'Да', '0'=>'Нет')); ?>
			</div>
			<?php echo $form->error($model,'status'); ?>
		</div>

	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model,'index'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->dropDownList($model, 'index', array(''=>'','1'=>'Да', '0'=>'Нет')); ?>
			</div>
			<?php echo $form->error($model,'index'); ?>
		</div>

	</div>
<hr>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-info')); ?>
		</div>
	</div>
<?php $this->endWidget(); ?>

