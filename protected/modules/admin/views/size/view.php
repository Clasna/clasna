<div class="main-content">
	<div class="breadcrumbs" id="breadcrumbs">
		<script type="text/javascript">
			try {
				ace.settings.check('breadcrumbs', 'fixed')
			} catch (e) {
			}
		</script>

		<ul class="breadcrumb">
			<li>
				<i class="icon-home home-icon"></i>
				<a href="/admin/index">Главная</a>
			</li>

			<li>
				<a href="/admin/option">Размер</a>
			</li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1>Опций размера</h1>
		</div>

		<div class="row-fluid">
			<div class="col-xs-12">
	<script type="text/javascript" src="/assets/e556b26a/jquery.js"></script>
<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'color-form',
	'enableAjaxValidation' => false,
	'htmlOptions' => array(
		'class' => 'form-horizontal',
		'enctype' => 'multipart/form-data'
	)
)); ?>
<script type="text/javascript">
$( document ).ready(function(){
$('#add-option').click(function(){
	var table = $('#option').html();
	var count = $('#table-tr div').length;
	$('#table-tr').append('<div class="row" id="row'+count+'">'+table+'<span style="margin: 0 0 0 1px;"><a href="javascript:void(0)" onclick="deletetr(\'row'+count+'\');">x</a></span></div>');
});

$('#add-option-update').click(function(){
	var table = $('#table-tr-label #option').html();
	var count = $('#table-tr div').length;
	$('#table-tr').append('<div class="row" id="row'+count+'">'+table+'<span style="margin: 0 0 0 1px;"><a href="javascript:void(0)" onclick="deletetr(\'row'+count+'\');">x</a></span></div>');
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
<hr>
<div id="add-option" class="btn btn-primary create_button">Добавить размер</div>
<table style="margin-bottom: 5px;">
	<tr>
 		<td style="width: 209px; text-align: center;font-size: 17px;">Опция</td>
 		<td style="width: 127px; text-align: center;font-size: 17px;">Размер</td>
 		<td style="width: 70px; text-align: center;font-size: 17px;">Видимость</td>
	</tr>
</table>
<?php if(isset($model)) {?>

<?php if(isset($modelAll)) {?>
<?php foreach($modelAll as $value) {?>
<div class="row">
<div style="float:left;margin: 0 10px 0 0;">
	<?php echo $form->hiddenField($value,'id[]',array('type'=>"hidden",'value'=>$value->id)); ?>
	<?php echo $this->listDataDropOptions($value->id_option);  ?>
</div>
<div style="margin: 0 10px 0 0;width: 290px; float:left;">
	<input type="text" class="col-xs-12 col-sm-6 w" value="<?php echo $value->size; ?>" name="Size[size][]">
<select name="Size[status][]">
	<option <?php echo $value->status == 1?'selected':''; ?> value="1">Да</option>
	<option <?php echo $value->status == 0?'selected':''; ?> value="0">Нет</option>
</select>
<span style="margin: 0 0 0 10px;"> <a href="?getid=<?php echo $value->id; ?>"  onclick="return confirmDelete();">x</a></span>
</div>
</div>
<?php } ?>
<?php } ?>

<div id="table-tr">
<div class="row" id="option">
<div style="float:left;margin: 0 10px 0 0;">
	<?php 
	echo $form->dropDownList($_model, 'id_option[]', 
	CHtml::listData(Option::model()->findAll(),'id','title_option'),
	array(
	'empty'=>'Выберите опцию',
	'class'=>'input-large'
	)); 
	?>
</div>
<div style="margin: 0 10px 0 0;width: 189px; float:left;">
	<input type="text" class="col-xs-12 col-sm-6 w" value="" name="Size[size][]">
	<?php echo $form->dropDownList($model, 'status[]', array('1'=>'Да', '0'=>'Нет')); ?>
</div>
</div>
</div>
<?php } ?>



	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-info')); ?>
		</div>
	</div>
<?php $this->endWidget(); ?>

</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	.w {
		width: 120px;
		margin-right: 10px;
		margin-bottom: 5px;
	}
</style>