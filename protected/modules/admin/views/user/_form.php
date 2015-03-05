<?php if($order) {?>
<hr>
<a href="/admin/user/view?get=<?php echo $model->email; ?>">Заказы пользотвателя <?php echo $profile->name.' '.$profile->surname; ?></a>
<hr>
<?php } ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'class'=>'form-horizontal',
		'enctype' => 'multipart/form-data'
	)
)); ?>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
		<?php echo $form->labelEx($model,'username'); ?>
	</label>

	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
			<?php echo $form->textField($model,'username',array('class'=>'col-xs-12 col-sm-6')); ?>
		</div>
		<?php echo $form->error($model,'username'); ?>
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
<hr>
<div class="form-group">

	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
		<?php echo $form->labelEx($profile,'password'); ?>
	</label>
<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
<input type="password" name="User[password]" value="" maxlength="255" class="col-xs-12 col-sm-6">
		</div>
</div>
</div>
<hr>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
		<?php echo $form->labelEx($model,'role'); ?>
	</label>

	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
			<?php echo $form->dropDownList($model,'role',array(0=>'Guest',1=>'User',2=>'Admin')); ?>
		</div>
		<?php echo $form->error($model,'role'); ?>
	</div>
</div>
<div class="clearfix form-actions">
	<div class="col-md-offset-3 col-md-9">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-info')); ?>
	</div>
</div>
<hr>
<?php $this->endWidget(); ?>
<?php if(!$model->isNewRecord) {?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profiles-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'class'=>'form-horizontal',
		'enctype' => 'multipart/form-data'
	)
)); ?>
<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
		<?php echo $form->labelEx($profile,'name'); ?>
	</label>

	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<input type="text" name="Profiles[name]" id="Profiles_fio" class="col-xs-12 col-sm-6" value="<?php echo $profile->name;?>">
		</div>
		<?php echo $form->error($profile,'name'); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
		<?php echo $form->labelEx($profile,'surname'); ?>
	</label>

	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<input type="text" name="Profiles[surname]" id="Profiles_fio" class="col-xs-12 col-sm-6" value="<?php echo $profile->surname;?>">
		</div>
		<?php echo $form->error($profile,'surname'); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
		<?php echo $form->labelEx($profile,'country'); ?>
	</label>

	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<input type="text" name="Profiles[country]" id="Profiles_county" class="col-xs-12 col-sm-6" value="<?php echo $profile->country;?>">
		</div>
		<?php echo $form->error($profile,'country'); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
		<?php echo $form->labelEx($profile,'region'); ?>
	</label>

	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<input type="text" name="Profiles[region]" id="Profiles_city" class="col-xs-12 col-sm-6" value="<?php echo $profile->region;?>">
		</div>
		<?php echo $form->error($profile,'region'); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
		<?php echo $form->labelEx($profile,'city'); ?>
	</label>

	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<input type="text" name="Profiles[city]" id="Profiles_city" class="col-xs-12 col-sm-6" value="<?php echo $profile->city;?>">
		</div>
		<?php echo $form->error($profile,'city'); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
		<?php echo $form->labelEx($profile,'street'); ?>
	</label>

	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<input type="text" name="Profiles[street]" id="Profiles_adress" class="col-xs-12 col-sm-6" value="<?php echo $profile->street;?>">
		</div>
		<?php echo $form->error($profile,'street'); ?>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
		<?php echo $form->labelEx($profile,'phone'); ?>
	</label>

	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<input type="text" name="Profiles[phone]" id="Profiles_phone" class="col-xs-12 col-sm-6" value="<?php echo $profile->phone;?>">
		</div>
		<?php echo $form->error($profile,'phone'); ?>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
		<?php echo $form->labelEx($profile,'d_phone'); ?>
	</label>

	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<input type="text" name="Profiles[d_phone]" id="Profiles_phone" class="col-xs-12 col-sm-6" value="<?php echo $profile->d_phone;?>">
		</div>
		<?php echo $form->error($profile,'d_phone'); ?>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
		<?php echo $form->labelEx($profile,'postal_code'); ?>
	</label>

	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<input type="text" name="Profiles[postal_code]" id="Profiles_phone" class="col-xs-12 col-sm-6" value="<?php echo $profile->postal_code;?>">
		</div>
		<?php echo $form->error($profile,'postal_code'); ?>
	</div>
</div>
<div class="clearfix form-actions">
	<div class="col-md-offset-3 col-md-9">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-info')); ?>
	</div>
</div>
<?php $this->endWidget(); ?>
<?php } ?>
