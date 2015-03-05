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
				<a href="/admin">Главная</a>
			</li>

			<li>
				<a href="/admin/order">Заказы</a>
			</li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1>Заказ <?php echo $model->fio; ?></h1>
		</div>

<?php if($userCheck) {?>
		<div class="row-fluid">
		<div class="col-xs-12">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			Такой пользователь зарегистрирован  - <b><a href="/admin/user/update/<?php echo $userCheck->id; ?>"><?php echo $userCheck->id; ?></a></b>
		</label>
		</div>
		</div>
<?php } else { ?>
Не зарегистрирован.
<?php } ?>


		<div class="row-fluid">
		<div class="col-xs-12">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			Имя, Фамилия  - <b><?php echo $model->fio; ?></b>
		</label>
		</div>
		</div>

		<div class="row-fluid">
		<div class="col-xs-12">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			E-mail - <b><?php echo $model->email; ?></b>
		</label>
		</div>
		</div>

		<div class="row-fluid">
		<div class="col-xs-12">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			Телефон  - <b><?php echo $model->phone; ?></b>
		</label>
		</div>
		</div>


		<div class="row-fluid">
		<div class="col-xs-12">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			Город  - <b><?php echo $model->country; ?></b>
		</label>
		</div>
		</div>

		<div class="row-fluid">
		<div class="col-xs-12">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			Регион  - <b><?php echo $model->region; ?></b>
		</label>
		</div>
		</div>

		<div class="row-fluid">
		<div class="col-xs-12">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			Город  - <b><?php echo $model->city; ?></b>
		</label>
		</div>
		</div>

		<div class="row-fluid">
		<div class="col-xs-12">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			Адресс  - <b><?php echo $model->address; ?></b>
		</label>
		</div>
		</div>

		<div class="row-fluid">
		<div class="col-xs-12">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			Комментарий  - <b><?php echo $model->comment; ?></b>
		</label>
		</div>
		</div>

		<div class="row-fluid">
		<div class="col-xs-12">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			Дата  - <b><?php echo $model->time_order; ?></b>
		</label>
		</div>
		</div>
<br>
<h3>Оплата и Доставка</h3>
<hr>
		<div class="row-fluid">
		<div class="col-xs-12">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			Оплата  - <b><?php echo $model->pay; ?></b>
		</label>
		</div>
		</div>

<?php if($model->other){ ?>
		<div class="row-fluid">
		<div class="col-xs-12">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right">
			Иначе  - <b><?php echo $model->other; ?></b>
		</label>
		</div>
		</div>
<?php } ?>
<br>
<hr>
<style type="text/css">
.head-tab {
	background: #ccc;
	text-align: center;
}
.head-tab td {
	padding: 5px;
	margin: 5px;
	font-weight: bold;
}
.tab {
	margin:0 0 140px 0; 
}
.b-tab td {
	padding: 5px;
	margin: 5px;
	text-align: center;
	border-bottom: 1px solid #454545;
}
</style>
<center><table class="tab">
<tr class="head-tab">
	<td>Имя</td>
	<td>Фото</td>
	<td>Материал</td>
	<td>Цвет</td>
	<td>Размер</td>
	<td>Количество</td>
	<td>Цена</td>
	<td>Общая</td>
</tr>
<?php if($basket) {?>
<?php 
$MasSum = 0;
foreach($basket as $val) {?>
<?php 

$product = Product::model()->find('id = "'.$val->id_product.'"');
$size = Options::model()->find('id = "'.$val->size.'"');
$MasSum +=  $product->new_price*$val->count;
?>
<tr class="b-tab">
	<td><?php echo $product->name; ?></td>
	<td><img src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $product->images; ?>" width="74" height="74"></td>
	<td><?php echo $product->pre_mat; ?></td>
	<td><?php echo $product->color; ?></td>
	<td><?php echo $size->option; ?></td>
	<td><?php echo $val->count; ?></td>
	<td>
	<p>Старая цена - <b><?php echo $product->price;?></b></p>
	<p>Новая цена - <b><?php echo $product->new_price;?></b></p>
	</td>
	<td><?php echo $product->new_price*$val->count; ?></td>
</tr>
<?php } ?>
<tr class="b-tab">
	<td colspan="8">Общая сумма: <?php echo $MasSum; ?></td>
</tr>
<?php } ?>

</table>
</center>
	</div>
</div>
