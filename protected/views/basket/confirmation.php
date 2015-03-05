<?php   
$session=new CHttpSession;
$session->open();
if($session['basket']){
    $basket = json_decode($session['basket'], true);
}
?>
<?php if(isset($basket['basket'])){?>
<?php echo $this->renderPartial('//basket/step',array('step_3'=>$step_3)); ?>        
        <div class="cart1">
            <form method="POST">
                <div class="cart1_left">

                </div>
                <div class="cart1_right">
                    <div class="ordered_items_container">
                        <h1><?php echo Yii::t('basket', 'order_total'); ?></h1>
                        <p><?php echo Yii::t('basket', 'you_make_order'); ?>: <span> <?php echo $_basket["email"]; ?></span></p>
                        <div class="ordered_items">
                            <ul>
                        <?php foreach ($basket['basket'] as $value) { ?>
                        <?php foreach ($value as $proD) { ?>
                        <?php $product = Product::getProductBasketId($proD['id']); ?>
                        <?php if(isset($proD['size'])) {?>
                        <?php $size = Product::getProductOneOptions($proD['size']); ?>
                        <?php } ?>
                                <li style="margin-top: 5px;">
                                    <img alt="ordered" src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $product->images ?>" width="85px">
                                    <ul>
                                        <li><?php echo Yii::t('basket', 'color'); ?> :
                                            <span>
                                                <?php echo Product::getColorBasket($proD['id']); ?>
                                            </span>
                                        </li>
                                        <li><?php echo Yii::t('basket', 'size'); ?> :<span><?php echo $size->option; ?></span></li>
                                        <li><?php echo Yii::t('basket', 'count'); ?> :<span><?php echo $proD['count'] ?></span></li>
                                        <li><?php echo Yii::t('basket', 'price'); ?> :<span><?php echo $product->price; ?> <?php echo Yii::t('basket', 'usb'); ?></span></li>
                                    </ul>
                                </li>
                        <?php } ?>
                        <?php } ?>
                            </ul>
                        </div>
                        <p class="deliv_metod"><?php echo Yii::t('basket', 'name'); ?>: <span><?php echo $_basket["name"]; ?></span></p>
                        <p class="deliv_metod"><?php echo Yii::t('basket', 'last_name'); ?>: <span><?php echo $_basket["surname"]; ?></span></p>
                        <p class="deliv_metod"><?php echo Yii::t('basket', 'sm'); ?>: <span><?php echo $_basket["sm"]; ?></span></p>
                        <p class="deliv_metod"><?php echo Yii::t('basket', 'payment_method'); ?>: <span><?php echo $_basket["payment_method"]; ?></span></p>
                        <p class="deliv_metod"><?php echo Yii::t('basket', 'city'); ?>: <span><?php echo $_basket["city"]; ?></span></p>
                        <p class="deliv_metod"><?php echo Yii::t('basket', 'phone_number'); ?>: <span><?php echo $_basket["phone"]; ?></span></p>
                        <hr>
                        <p class="total"><?php echo Yii::t('basket', 'in_total'); ?>: <?php echo Product::getSum(); ?> <?php echo Yii::t('basket', 'usb'); ?></p>
                        <div class="clearfix"></div>
                    </div>
<!--                     <div class="paytext">
                        <h1><?php echo Yii::t('basket', 'secure_payment'); ?></h1>
                        <div class="pay_images">
                            <a href="#" class="norton"><img alt="Norton" src="<?php echo Yii::app()->request->baseUrl; ?>/img/pay_img.jpg"></a>
                            <a href="#"><img alt="TrustWave" src="<?php echo Yii::app()->request->baseUrl; ?>/img/pay_img1.jpg"></a>
                        </div>
                        <p>
						<?php echo Yii::t('basket', 'secure_comment'); ?>
                        </p>
                    </div> -->
                <div class="go_next">
                    <button type="submit" name="conform"><?php echo Yii::t('basket', 'confirmation'); ?></button>
                </form>
                <form method="POST">
                    <button type="submit" name="cancel"><?php echo Yii::t('basket', 'cancel'); ?></button>
                </form>
                    <p><?php echo Yii::t('basket', 'remebmer'); ?></p>
                </div>
                </div>
        </div>
<?php } ?>