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
				<a href="/admin/option">Цвет</a>
			</li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1>Опций цвета</h1>
		</div>

		<div class="row-fluid">
			<div class="col-xs-12">
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
	$('#table-tr').append('<div class="row" id="row'+count+'" style="margin-left: 40px;">'+table+'<span style="margin: 0 0 0 -10px;"><a href="javascript:void(0)" onclick="deletetr(\'row'+count+'\');">x</a></span></div>');
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
<div id="add-option" class="btn btn-primary create_button">Добавить Цвет</div>
<table style="margin-bottom: 5px;">
	<tr>
 		<td style="width: 261px; text-align: center;font-size: 17px;">Опция</td>
 		<td style="width: 99px; text-align: center;font-size: 17px;">Номер цвета</td>
 		<td style="width: 99px; text-align: center;font-size: 17px;">Цвет</td>
 		<td style="width: 133px; text-align: center;font-size: 17px;">RGB</td>
 		<td style="width: 99px; text-align: center;font-size: 17px;">Подкладка</td>
 		<td style="width: 70px; text-align: center;font-size: 17px;">Видимость</td>
	</tr>
</table>
<?php if(isset($model)) {?>

<?php if(isset($modelAll)) {?>
<?php $i = 1; ?>
<?php foreach($modelAll as $value) {?>
<div class="row">
<div style="float:left;margin: 0 10px 0 0;">
	<p class="p-number"><?php echo $i++; ?></p>
	<?php echo $form->hiddenField($value,'id[]',array('type'=>"hidden",'value'=>$value->id)); ?>
	<p class="p-select">Цвет</p>
</div>
<div style="margin: 0 10px 0 0;width: width: 496px; float:left;">
	<input type="text" class="col-xs-12 col-sm-6 w" value="<?php echo $value->number_color; ?>" name="Color[number_color][]">
	<input type="text" class="col-xs-12 col-sm-6 w" value="<?php echo $value->color; ?>" name="Color[color][]">
	<input type="text" class="col-xs-12 col-sm-6 w" value="<?php echo $value->rgb; ?>" name="Color[rgb][]">
	<input type="text" class="col-xs-12 col-sm-6 w" value="<?php echo $value->lining; ?>" name="Color[lining][]">
	<select name="Color[status][]">
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
	<p class="p-select">Цвет</p>
</div>
<div style="margin: 0 10px 0 0;width: 509px; float:left;">
	<input type="text" class="col-xs-12 col-sm-6 w" value="" name="Color[number_color][]">
	<input type="text" class="col-xs-12 col-sm-6 w" value="" name="Color[color][]">
	<input type="text" class="col-xs-12 col-sm-6 w" value="" name="Color[rgb][]">
	<input type="text" class="col-xs-12 col-sm-6 w" value="" name="Color[lining][]">
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
		width: 100px;
		margin-right: 10px;
		margin-bottom: 5px;
	}
	#option {
		margin-left: 40px;
	}
	.p-select {
		width: 210px;
		max-width: 100%;
		padding: 3px 4px;
		height: 30px;
		border-radius: 0;
		-webkit-box-shadow: none!important;
		box-shadow: none!important;
		color: #858585;
		background-color: #fff;
		border: 1px solid #d5d5d5;
		font: normal normal normal 13.3333330154419px/normal Arial;
		text-indent: 0px;
		text-shadow: none;
		display: inline-block;
		text-align: start;
		text-align: center;
		line-height: 23px;
	}
	.p-number {
		width: 50px;
		max-width: 100%;
		padding: 3px 4px;
		height: 30px;
		border-radius: 0;
		-webkit-box-shadow: none!important;
		box-shadow: none!important;
		color: #858585;
		background-color: #fff;
		border: 1px solid #d5d5d5;
		font: normal normal normal 13.3333330154419px/normal Arial;
		text-indent: 0px;
		text-shadow: none;
		display: inline-block;
		text-align: start;
		text-align: center;
		line-height: 23px;
	}
</style>
