<?php $count = count($product); ?>
                  <?php foreach($product as $products) {?>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="product_img">
                            <a href="/product/<?php echo $products->url;?>"><img alt="товар" src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $products->images; ?>" width="213" hegiht="254"></a>
                            <div class="discount">
                            </div>
                        </div>
                        <ul class="product_characteristics">
                            <li class="product_name"><?php echo $products->name; ?></li>
                            <li class="product_material">МАТЕРИАЛ: <?php echo $products->pre_mat; ?></li>
                            <li class="product_color">ЦВЕТ: <?php echo $products->color; ?></li>
                            <li class="old_price"><?php echo $products->price; ?> ГРН</li>
                            <li class="new_price"><?php echo $products->new_price; ?> ГРН</li>
                        </ul>
                        <a href="/product/<?php echo $products->url;?>" class="more_info">подробнее... </a>
                    </div>
                <?php } ?>
<input type="hidden" id="count" name="count" value="<?php echo $count; ?>">
<?php if($fullCount == $count) {?>
<script>
$(document).ready(function(){
	$('#more_prod').css('display','none');
});
</script>
<?php } ?>