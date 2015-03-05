<?php echo CHtml::link('Добавить новый продукт', array('create'), array('class' => 'btn btn-primary create_button')); ?>
<?php if(isset($models)){ ?>
<form method="post">
<input type="hidden" name="id_product" value="<?php echo $model->id;?>">
<input type="submit" name="CP" value="Копировать продукт" class="btn btn-primary create_button">
</form>
<form method="post">
<input type="hidden" name="id_color" value="<?php echo $model->parent_color == 0?$model->id:$model->parent_color;?>">
<input type="submit" name="Color" value="Добавить товар в другом цвете" class="btn btn-primary create_button">
</form>
<?php } ?>
<?php if(isset($copy_product)){ ?>
<p><?php echo $copy_product; ?></p>
<?php } ?>
<hr>
<script type="text/javascript">
$( document ).ready(function() {
$('.default').click(function(){
	$('#div-default').show();
	$('#div-seo').hide();
	$('#div-content').hide();
	$('#div-images').hide();
	$(this).addClass('active-sp');
	$('.images').removeClass('active-sp');
	$('.content').removeClass('active-sp');
	$('.seo').removeClass('active-sp');
});
$('.content').click(function(){
	$('#div-default').hide();
	$('#div-seo').hide();
	$('#div-content').show();
	$('#div-images').hide();
	$(this).addClass('active-sp');
	$('.images').removeClass('active-sp');
	$('.default').removeClass('active-sp');
	$('.seo').removeClass('active-sp');
});
$('.seo').click(function(){
	$('#div-default').hide();
	$('#div-seo').show();
	$('#div-content').hide();
	$('#div-images').hide();
	$(this).addClass('active-sp');
	$('.images').removeClass('active-sp');
	$('.content').removeClass('active-sp');
	$('.default').removeClass('active-sp');
});
$('.images').click(function(){
	$('#div-default').hide();
	$('#div-seo').hide();
	$('#div-content').hide();
	$('#div-images').show();
	$(this).addClass('active-sp');
	$('.seo').removeClass('active-sp');
	$('.content').removeClass('active-sp');
	$('.default').removeClass('active-sp');
});
	$('.pr-sof li:first').addClass('active-sp');
	$('#div-seo').hide();
	$('#div-content').hide();
	$('#div-images').hide();
});
</script>
<style type="text/css">
.pr-sof {
	display: inline-block;
	border-bottom: 1px solid #ccc;
}
.pr-sof li {
	list-style: none;
	display: inline-block;
	cursor: pointer;
	padding: 5px 15px 5px 15px;
}
.active-sp {
	font-weight: bold;
}
</style>
<div>
	<ul class="pr-sof">
		<li class="default">Основная</li>
		<li class="seo">SEO</li>
		<li class="content">Контент</li>
		<li class="images">Изображение</li>
	</ul>
</div>

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'articles-form',
	'enableAjaxValidation' => false,
	'htmlOptions' => array(
		'class' => 'form-horizontal',
		'enctype' => 'multipart/form-data'
	)
)); ?>

	<?php echo $form->errorSummary($model); ?>

<div id="div-default">
<h4>Основные</h4>
	<hr>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'name_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'name_ua', array('class' => 'col-xs-12 col-sm-6')); ?>
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
				<?php echo $form->textField($model, 'name_ru', array('class' => 'col-xs-12 col-sm-6')); ?>
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
				<?php echo $form->textField($model, 'name_en', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'name_en'); ?>
		</div>
	</div>


	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'marking'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'marking', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'marking'); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'url'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'url', array('class' => 'col-xs-12 col-sm-6')); ?>
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
				<?php echo $form->textField($model, 'price', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'price'); ?>
		</div>
	</div>

	<!--<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'new_price'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'new_price', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'new_price'); ?>
		</div>
	</div>-->

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'color'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->dropDownList($model, 'color', Product::AttributesColor(),array('empty'=>'Выбирите цвет')); ?>
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
				<?php echo $form->dropDownList($model, 'catalog_id', CHtml::listData(Catalog::model()->findAll(),'id','name_ua'),array(
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

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model,'type'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo Product:: getType($model->id); ?>
			</div>
			<?php echo $form->error($model,'type'); ?>
		</div>

	</div>

<script type="text/javascript">
$( document ).ready(function(){

$('#add-option').click(function(){
	var table = $('#option').html();
	var count = $('#table-tr div').length;
	$('#table-tr').append('<div class="row" id="row'+count+'">'+table+'<span style="margin: 0 0 0 4px;float: left;"><a href="javascript:void(0)" onclick="deletetr(\'row'+count+'\');">x</a></span></div>');
});

$('#add-option-update').click(function(){
	var table = $('#table-tr-label #option').html();
	var count = $('#table-tr div').length;
	$('#table-tr').append('<div class="row" id="row'+count+'">'+table+'<span style="margin: 0 0 0 4px;float: left;"><a href="javascript:void(0)" onclick="deletetr(\'row'+count+'\');">x</a></span></div>');
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
	<?php echo Product::AttributesSizeOptions($value->option); ?>
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
<div style="margin: 0 10px 0 0;width: 135px;float: left;">
	<?php echo $form->dropDownList($_models, 'option[]', Product::AttributesSize(),array('empty'=>'Выбирите размер')); ?>
</div>
</div>
</div>
<?php } ?>


</div>
<hr>
</div>


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



<div id="div-content"> <!-- CONTENT -->
<h4>Контент</h4>
<hr>
    <div class="form-group" >
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'material_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'material_ua', array('class' => 'col-xs-12 col-sm-6')); ?>
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
				<?php echo $form->textField($model, 'material_ru', array('class' => 'col-xs-12 col-sm-6')); ?>
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
				<?php echo $form->textField($model, 'material_en', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'material_en'); ?>
		</div>
	</div>
<!-- -->
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'cloth_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'cloth_ua', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'cloth_ua'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'cloth_ru'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'cloth_ru', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'cloth_ru'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'cloth_en'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'cloth_en', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'cloth_en'); ?>
		</div>
	</div>
<!-- -->
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'lining_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'lining_ua', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'lining_ua'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'lining_ru'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'lining_ru', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'lining_ru'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'lining_en'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'lining_en', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'lining_en'); ?>
		</div>
	</div>
<!-- -->
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'packing_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'packing_ua', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'packing_ua'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'packing_ru'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'packing_ru', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'packing_ru'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'packing_en'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'packing_en', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'packing_en'); ?>
		</div>
	</div>
<!-- -->
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'length_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'length_ua', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'length_ua'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'length_ru'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'length_ru', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'length_ru'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'length_en'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'length_en', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'length_en'); ?>
		</div>
	</div>


	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'size_range_ua'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'size_range_ua', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'size_range_ua'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'size_range_ru'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'size_range_ru', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'size_range_ru'); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			<?php echo $form->labelEx($model, 'size_range_en'); ?>
		</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<?php echo $form->textField($model, 'size_range_en', array('class' => 'col-xs-12 col-sm-6')); ?>
			</div>
			<?php echo $form->error($model, 'size_range_en'); ?>
		</div>
	</div>

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


<hr>
</div>	<!-- END CONTENT  -->

<div id="div-images"><!-- CONTENT GALLERY -->
<h4>Изображение</h4>
<hr>
<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">
		<?php echo $form->labelEx($model,'images'); ?>
	</label>

	<div class="col-xs-12 col-sm-9">
		<?php echo $form->fileField($model,'images',array()); ?>
		<br>
		<?php if ( $model->images ) { ?>
			<img class="admin_grid_image" src="<?php echo $model->images; ?>" width="150"/>
		<?php } ?>
		<?php echo $form->error($model,'images'); ?>
	</div>

</div>

<input name="path[]" id="filesToUpload" type="file" multiple="" onChange="makeFileList();"/>
<script>
function makeFileList() {
var input = document.getElementById("filesToUpload");
var ul = document.getElementById("fileList");
while (ul.hasChildNodes()) {
ul.removeChild(ul.firstChild);
}
for (var i = 0; i < input.files.length; i++) {
var li = document.createElement("li");
li.innerHTML = input.files[i].name;
ul.appendChild(li);
}
if(!ul.hasChildNodes()) {
var li = document.createElement("li");
li.innerHTML = 'No Files Selected';
ul.appendChild(li);
}
}
$(document).ready( function() {
$("#example_maincb").click( function() {
	if($('#example_maincb').attr('checked')){
		$('.example_check:enabled').attr('checked', true);
		$('#check li>.example_check:checked').each(function(){
			var id = $(this).val();
			//$('#del_photos').attr('href','?'+id);
		});
	} else {
		$('.example_check:enabled').attr('checked', false);
	}
});
});
</script>
<div class="notification success png_bg">
<div><b>Массовая загрузка фото</b></div>
</div>

<ul id="fileList"></ul>
<?php if($model->id){?>
<?php $img=Images::model()->findAll('id_product = '.$model->id); ?>
<?php } ?>
<?php if(isset($img)){?>
<!-- <input type="checkbox" name="delete_img[]" id="example_maincb" /> Отметить / снять выделенное -->
<hr>
<ul id="check">
<?php foreach($img as $images){ ?>
<li style="list-style:none;">
<!-- <input type="checkbox" name="delete_img[]" class="example_check" value="<?php echo $images->id;?>"> -->
<img class="admin_grid_image" src="<?php echo $images->path; ?>" width="100" />
<a href="?delimg=<?php echo $images->id;?>" onclick="return confirmDelete();" style="margin: 0 0 0 10px;">x</a>
</li>
<?php } ?>
</ul>
<!-- <a id="del_photos" href="" class="btn btn-info">Удалить отмеченые фото</a> -->
<?php } ?>

<hr>
</div> <!-- END CONTENT GALLERY -->



	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class' => 'btn btn-info')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
<?php if(isset($__models)){ ?>
<div style="display:none;">
<div id="table-tr-label">
<div class="row" id="option">
<div style="float:left;margin: 0 10px 0 0;">
	<?php 
	echo $form->dropDownList($__models, 'id_option[]', 
	CHtml::listData(Option::model()->findAll(),'id','title_option'),
	array(
	'empty'=>'Выберите опцию',
	'class'=>'input-large'
	));
	?>
</div>
<div style="margin: 0 10px 0 0;width: 135px;float: left;">
	<?php echo $form->dropDownList($__models, 'option[]', Product::AttributesSize(),array('empty'=>'Выбирите размер')); ?>
</div>
</div>
</div>
</div>
<?php } ?>
