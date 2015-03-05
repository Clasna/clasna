<div class="container">
<div class="container cart_form">
<p>Ваши заказы</p>
<a href="/user">назад</a>
<div class="row">
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
    <td>ID - заказа</td>
    <td>Имя</td>
    <td>Фото</td>
    <td>Материал</td>
    <td>Цвет</td>
    <td>Размер</td>
    <td>Количество</td>
    <td>Цена</td>
    <td>Общая</td>
</tr>
<?php if($_basket) {?>
<?php 
$MasSum = 0;
$i = 0;
foreach($_basket as $val) {
    foreach($val as $_val) {?>
<?php 
$product = Product::model()->find('id = "'.$_val->id_product.'"');
$size = Options::model()->find('id = "'.$_val->size.'"');
$MasSum +=  $product->new_price*$_val->count;
?>
<tr class="b-tab">
    <td><?php echo $_val->id_order; ?></td>
    <td><?php echo $product->name; ?></td>
    <td><img src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $product->images; ?>" width="74" height="74"></td>
    <td><?php echo $product->pre_mat; ?></td>
    <td><?php echo $product->color; ?></td>
    <td><?php echo $size->option; ?></td>
    <td><?php echo $_val->count; ?></td>
    <td>
    <p>Старая цена - <b><?php echo $product->price;?></b></p>
    <p>Новая цена - <b><?php echo $product->new_price;?></b></p>
    </td>
    <td><?php echo $product->new_price*$_val->count; ?></td>
</tr>
    <?php } ?>
<?php } ?>
<tr class="b-tab">
    <td colspan="9">
    Общая сумма: <?php echo $MasSum; ?>
    </td>
</tr>
<?php } ?>

</table>
</center>
</div>
 <div class="clearfix hidden-lg  hidden-md"></div>
</div>
</div>