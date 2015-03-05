<div id="div-seo"><!-- SEO -->
<h4>SEO</h4>
<hr>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'title_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'title_ua', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'title_ua'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'title_ru'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'title_ru', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'title_ru'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'title_en'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'title_en', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'title_en'); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'keywords_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'keywords_ua', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'keywords_ua'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'keywords_ru'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'keywords_ru', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'keywords_ru'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'keywords_en'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'keywords_en', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'keywords_en'); ?>
		</div>
	</div>


	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'description_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'description_ua', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'description_ua'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'description_ru'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'description_ru', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'description_ru'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'description_en'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'description_en', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'255')); ?>
			</div>
			<?php echo $form->error($model, 'description_en'); ?>
		</div>
	</div>
<hr>
</div><!-- END SEO -->