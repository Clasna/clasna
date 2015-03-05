<?php if(Yii::app()->user->id) {?>
    <?php $_user = User::model()->find('id = "'.Yii::app()->user->id.'"'); ?>
<?php } ?>
<?php   
$session=new CHttpSession;
$session->open();
if($session['basket']){
    $basket = json_decode($session['basket'], true);
}
?>
<?php if(isset($basket['basket'])){?>
<?php echo $this->renderPartial('//basket/step',array('step_1'=>$step_1)); ?>
<?php } ?>
        <div class="cart">
        <?php if(isset($basket['basket'])){?>
            <div class="cart_left">
                    <table>
                        <tr class="col_name">
                            <td class="prod"><?php echo Yii::t('basket', 'product'); ?></td>
                            <td class="color_prod"><?php echo Yii::t('basket', 'color'); ?></td>
                            <td class="size_prod"><?php echo Yii::t('basket', 'size'); ?></td>
                            <td class="count_prod"><?php echo Yii::t('basket', 'count'); ?></td>
                            <td class="price_prod"><?php echo Yii::t('basket', 'price'); ?></td>
                            <td class="remove_prod"></td>
                        </tr>
                        <?php foreach ($basket['basket'] as $value) { ?>
                        <?php foreach ($value as $proD) { ?>
                        <?php $product = Product::getProductBasketId($proD['id']); ?>
                        <?php if(isset($proD['size'])) {?>
                        <?php $size = Product::getProductOneOptions($proD['size']); ?>
                        <?php } ?>
                        <tr class="prod_item">
                            <td>
                                <img src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $product->images ?>"
                                width="85px"
                                alt="
                                <?php 
                                if(Yii::app()->language == 'ua'){
                                    echo $product->name_ua;
                                } elseif(Yii::app()->language == 'ru') {
                                    echo $product->name_ru;
                                } elseif(Yii::app()->language == 'en') {
                                    echo $product->name_en;
                                }
                                ?>
                                ">
                                <p class="product_name">
                                <?php 
                                if(Yii::app()->language == 'ua'){
                                    echo $product->name_ua;
                                } elseif(Yii::app()->language == 'ru') {
                                    echo $product->name_ru;
                                } elseif(Yii::app()->language == 'en') {
                                    echo $product->name_en;
                                }
                                ?>
                                </p>
                            </td>
                            <td class="color_prod">
                                <ul>
                                    <li class="yellow"><?php echo Product::getColorBasket($proD['id']); ?></li>
                                </ul>
                            </td>
                            <td>
                            <?php if(isset($size)) {?>
                            <p class="cart_size"><?php echo $size->option; ?></p>
                            <?php } ?>
                            </td>
                            <td class="count_prod">
                                <?php if(isset($proD['size'])) {?>
                                <p>
                                    <a href="?min=<?php echo $product->id; ?>&size=<?php echo $proD['size']; ?>" class="no_minus"></a>
                                    <?php echo $proD['count'] ?>
                                    <a href="?basket=<?php echo $product->id; ?>&size=<?php echo $proD['size']; ?>" class="plus"></a>
                                </p>
                                <?php } ?>
                            </td>
                            <td><p class="price"><?php echo $product->price; ?> <?php echo Yii::t('basket', 'usb'); ?></p></td>
                            <td  class="remove_prod">
                            <?php if(isset($proD['size'])) {?>
                            <a href="?del=<?php echo $product->id; ?>&size=<?php echo $proD['size']; ?>"><?php echo Yii::t('basket', 'delete'); ?></a>
                            <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php } ?>
                    </table>
                    <p class="total"><?php echo Yii::t('basket', 'in_total'); ?>:<span><?php echo Product::getSum(); ?> <?php echo Yii::t('basket', 'usb'); ?></span></p>
                    <hr>
                    <?php if(!Yii::app()->user->id) {?>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#reg-user').on('click',function(){
                                $('.registry').show();
                                $('#guest-or-user').hide();
                            });
                            $('#guest').on('click',function(){
                                $('.wrapper-order').show();
                                $('#guest-or-user').hide();
                            });
                        });
                    </script>
                    <?php } ?>
                <?php if(!isset($blockDiv) && !isset($guest_block)) {?>
                <div id="guest-or-user" <?php echo !Yii::app()->user->id?'':'style="display:none;"'; ?>>
                <p><?php echo Yii::t('basket', 'select_action'); ?></p>
                    <div id="reg-user"><?php echo Yii::t('basket', 'registered_user'); ?></div>
                    <div id="guest"><?php echo Yii::t('basket', 'visitor'); ?></div>
                </div>
                <br>
                <?php } ?>
            <?php echo $this->renderPartial('//basket/_login',array('model'=>$model,'blockDiv'=>$blockDiv)); ?>
            <?php echo $this->renderPartial('//basket/_element',array('model'=>$model,'guest_block'=>$guest_block,'pay'=>$pay,'ClientAgeent'=>$ClientAgeent)); ?>
            <?php } ?>
            <div class="cart_right">
                <?php if(isset($basket['basket'])){?>
<!--                 <div class="safe_pay">
                    <h1><?php echo Yii::t('basket', 'secure_payment'); ?></h1>
                    <div class="paytext">
                        <div class="pay_images">
                            <a href="#" class="norton"><img alt="Norton" src="<?php echo Yii::app()->request->baseUrl; ?>/img/pay_img.jpg"></a>
                            <a href="#"><img alt="TrustWave" src="<?php echo Yii::app()->request->baseUrl; ?>/img/pay_img1.jpg"></a>
                        </div>
                        <p>
                        <?php echo Yii::t('basket', 'secure_comment'); ?>
                        </p>
                    </div>
                </div> -->
                <?php } ?>
                <?php if(isset($productAll)) {?>
                <div class="another">
                    <?php if(!isset($basket['basket'])){?>
                    <style type="text/css">
                    .cart_null {
                        text-transform: uppercase;
                        margin-bottom: 10px;
                        font: 14px open_sans_light;
                        color: #fff;
                    }
                    .cart .cart_right .another > p {
                        text-transform: uppercase;
                        margin-bottom: 10px;
                        font: 14px open_sans_light;
                        color: #fff;
                    }
                    .cart .cart_right {
                        float: none !important;
                    }
                    .cart .cart_right .another {
                        width: 692px;
                        overflow: hidden;
                        margin: 0 auto 30px auto;
                    }
                    #order_true {
                        color: #fff;
                        font-size: 20px;
                        font-weight: normal;
                        margin: 0 0 20px 0;
                        border-bottom: 1px solid #fff;
                    }
                    </style>
                    <?php if(Yii::app()->user->hasFlash('order_true')){ ?>
                    <div class="flash-success" id="order_true">
                        <?php echo Yii::app()->user->getFlash('order_true'); ?>
                    </div>
                    <?php } ?>
                    <p class="cart_null">Ваша корзина пуста.</p>
                    <?php } ?>
                    <p><?php echo Yii::t('basket', 'you_may'); ?></p>
                    <div class="another_images">
                        <ul>
                           <?php foreach ($productAll as $_value) {?>
                            <li class="cont1">
                                <img alt="
                                <?php 
                                if(Yii::app()->language == 'ua'){
                                    echo $_value->title_ua;
                                } elseif(Yii::app()->language == 'ru') {
                                    echo $_value->title_ru;
                                } elseif(Yii::app()->language == 'en') {
                                    echo $_value->title_en;
                                }
                                ?>
                                " src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $_value->images; ?>" width="173">
                                <a href="/<?php echo Yii::app()->language; ?>/product/<?php echo $_value->url; ?>">
                                    <p class="name">
                                    <?php 
                                    if(Yii::app()->language == 'ua'){
                                       echo $_value->name_ua;
                                    } elseif(Yii::app()->language == 'ru') {
                                        echo $_value->name_ru;
                                    } elseif(Yii::app()->language == 'en') {
                                        echo $_value->name_en;
                                    }
                                    ?>
                                    </p>
                                    <p class="price">
                                     <?php echo $_value->price; ?>
                                    <?php 
                                    if(Yii::app()->language == 'ua'){
                                        echo 'UAH';
                                    } elseif(Yii::app()->language == 'ru') {
                                        echo 'RUB';
                                    } elseif(Yii::app()->language == 'en') {
                                        echo '$USB';
                                    }
                                    ?>
                                    </p>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
        </div>