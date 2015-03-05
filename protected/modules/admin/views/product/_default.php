<div id="div-default">
<h4>Основные</h4>
	<hr>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'name_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'name_ua', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'100','onkeyup'=>'oJS.strNormalize(this)')); ?>
			</div>
			<?php echo $form->error($model, 'name_ua'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'name_ru'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'name_ru', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'100','onkeyup'=>'oJS.strNormalize(this)')); ?>
			</div>
			<?php echo $form->error($model, 'name_ru'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'name_en'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'name_en', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'100','onkeyup'=>'oJS.strNormalize(this)')); ?>
			</div>
			<?php echo $form->error($model, 'name_en'); ?>
		</div>
	</div>


	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'url'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'url', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'100','id'=>'url')); ?>
			</div>
			<?php echo $form->error($model, 'url'); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'price'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'price', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'100')); ?>
			</div>
			<?php echo $form->error($model, 'price'); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'new_price'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'new_price', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'100')); ?>
			</div>
			<?php echo $form->error($model, 'new_price'); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'pre_mat_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'pre_mat_ua', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'100')); ?>
			</div>
			<?php echo $form->error($model, 'pre_mat_ua'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'pre_mat_ru'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'pre_mat_ru', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'100')); ?>
			</div>
			<?php echo $form->error($model, 'pre_mat_ru'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'pre_mat_en'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'pre_mat_en', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'100')); ?>
			</div>
			<?php echo $form->error($model, 'pre_mat_en'); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'color'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'color', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'100')); ?>
			</div>
			<?php echo $form->error($model, 'color'); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model,'catalog_id'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->dropDownList($model, 'catalog_id', CHtml::listData(Catalog::model()->findAll(),'id','name'),array(
				'empty'=>'Выберите каталог',
				'class'=>'input-large'
			)); ?>
			</div>
			<?php echo $form->error($model,'catalog_id'); ?>
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
<script type="text/javascript">
$( document ).ready(function(){

$('#add-option').click(function(){
	var table = $('#option').html();
	var count = $('#table-tr div').length;
	$('#table-tr').append('<div class="row" id="row'+count+'">'+table+'<span style="margin: 0 0 0 10px;"><a href="javascript:void(0)" onclick="deletetr(\'row'+count+'\');">x</a></span></div>');
});

$('#add-option-update').click(function(){
	var table = $('#table-tr-label #option').html();
	var count = $('#table-tr div').length;
	$('#table-tr').append('<div class="row" id="row'+count+'">'+table+'<span style="margin: 0 0 0 10px;"><a href="javascript:void(0)" onclick="deletetr(\'row'+count+'\');">x</a></span></div>');
});

});
function deletetr(id){
	$('div#'+id).remove();
}
function confirmDelete(){
	if (confirm("Вы подтверждаете удаление опции?")) {return true;}
	else {return false;}
}
</script>
<div class="form-group">
<?php $option = new Options; ?>

<h4>Опции продукта</h4>
<hr>
<?php if(isset($models)){?>
<div id="add-option-update" class="btn btn-primary create_button">Добавить опцию</div>
<?php } else { ?>
<div id="add-option" class="btn btn-primary create_button">Добавить опцию</div>
<?php } ?>

<?php if(isset($models)) {?>
<div id="table-tr">
<?php foreach ($models as $value) {?>
<div class="row" id="option">
<div style="float:left;margin: 0 10px 0 0;">
	<?php echo $form->hiddenField($value,'id[]',array('type'=>"hidden",'value'=>$value->id)); ?>
	<?php echo $this->listDataDropOptions($value->id);  ?>
</div>
<div style="margin: 0 10px 0 0;width: 480px;">
	<?php echo $form->textField($value,'option[]',array('value'=>$value->option,'class' => 'col-xs-12 col-sm-6','maxlength'=>'100')); ?>
	<span style="margin: 0 0 0 10px;"> <a href="?getid=<?php echo $value->id; ?>"  onclick="return confirmDelete();">x</a></span>
</div>
</div>
<?php } ?>
</div>
<?php } elseif(!empty($models)) { ?>
<?php  ?>
<div id="table-tr">
<div class="row" id="option">
<div style="float:left;margin: 0 10px 0 0;">
	<?php 
	echo $form->dropDownList($models, 'id_option[]', 
	CHtml::listData(Option::model()->findAll(),'id','title_option'),
	array(
	'empty'=>'Выберите опцию',
	'class'=>'input-large'
	));
	?>
</div>
<div style="margin: 0 10px 0 0;width: 480px;">
	<?php //echo $form->textField($models, 'option[]', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'100')); ?>
</div>
</div>
</div>
<?php } ?>

<?php if(isset($_models)) {?>	
<div id="table-tr">
<div class="row" id="option">
<div style="float:left;margin: 0 10px 0 0;">
	<?php 
	echo $form->dropDownList($_models, 'id_option[]', 
	CHtml::listData(Option::model()->findAll(),'id','title_option'),
	array(
	'empty'=>'Выберите опцию',
	'class'=>'input-large'
	)); 
	?>
</div>
<div style="margin: 0 10px 0 0;width: 480px;">
	<?php echo $form->textField($_models, 'option[]', array('class' => 'col-xs-12 col-sm-6','maxlength'=>'100')); ?>
</div>
</div>
</div>
<?php } ?>


</div>
<hr>
</div>