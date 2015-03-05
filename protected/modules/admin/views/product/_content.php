<div id="div-content"> <!-- CONTENT -->
<h4>Контент</h4>
<hr>
	<div class="form-group" >
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'content_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php $this->widget('application.extensions.ckeditor.CKEditor',array('model'=>$model,'attribute'=>'content_ua','language'=>'ru','editorTemplate'=>'full'));?>
			</div>
			<?php echo $form->error($model, 'content_ua'); ?>
		</div>
	</div>
	<div class="form-group" >
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'content_ru'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php $this->widget('application.extensions.ckeditor.CKEditor',array('model'=>$model,'attribute'=>'content_ru','language'=>'ru','editorTemplate'=>'full'));?>
			</div>
			<?php echo $form->error($model, 'content_ru'); ?>
		</div>
	</div>
	<div class="form-group" >
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'content_en'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php $this->widget('application.extensions.ckeditor.CKEditor',array('model'=>$model,'attribute'=>'content_en','language'=>'ru','editorTemplate'=>'full'));?>
			</div>
			<?php echo $form->error($model, 'content_en'); ?>
		</div>
	</div>

	<div class="form-group" >
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'material_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php $this->widget('application.extensions.ckeditor.CKEditor',array('model'=>$model,'attribute'=>'material_ua','language'=>'ru','editorTemplate'=>'full'));?>
			</div>
			<?php echo $form->error($model, 'material_ua'); ?>
		</div>
	</div>
	<div class="form-group" >
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'material_ru'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php $this->widget('application.extensions.ckeditor.CKEditor',array('model'=>$model,'attribute'=>'material_ru','language'=>'ru','editorTemplate'=>'full'));?>
			</div>
			<?php echo $form->error($model, 'material_ru'); ?>
		</div>
	</div>
	<div class="form-group" >
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'material_en'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php $this->widget('application.extensions.ckeditor.CKEditor',array('model'=>$model,'attribute'=>'material_en','language'=>'ru','editorTemplate'=>'full'));?>
			</div>
			<?php echo $form->error($model, 'material_en'); ?>
		</div>
	</div>
<hr>
</div>	<!-- END CONTENT  -->