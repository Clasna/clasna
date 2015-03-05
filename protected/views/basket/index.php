<?php if(Yii::app()->user->id) {?>
    <?php $_user = User::model()->find('id = "'.Yii::app()->user->id.'"'); ?>
<?php } ?>
<script type="text/javascript">
$(document).ready(function(){
    $('.other').on('click',function(){
        $('.textarea-pay').css('display','block');
    });
    $("label[for='pay_privat'],label[for='pay_credit'],label[for='pay_delivery']").on('click',function(){
       $('.textarea-pay').css('display','none'); 
    });

    $("#order-form").submit(function(event){
        <?php if(!isset($_user)) {?>
        if (!$('.yes_reg:checked').val()){
            alert('Выбирите пункт о регестраций!');
            event.preventDefault(); 
        } else <?php } ?> if (!$('.paybuy:checked').val()) {
            alert('Выбирите способ оплаты!');
            event.preventDefault(); 
        }
   });

});
</script>
<?php   
$session=new CHttpSession;
$session->open();
if($session['basket']){
    $basket = json_decode($session['basket'], true);
}
?>
<?php if(isset($basket['basket'])){?>
<div class="steps_panel">
            <ul>
                <li><a href="#"><?php echo Yii::t('basket', 'continue'); ?></a></li>
                <li><p class="passed"><span>1</span><?php echo Yii::t('basket', 'my_shopping'); ?></p></li>
                <li><p class="passing"><span>2</span><?php echo Yii::t('basket', 'address'); ?></p></li>
                <li><p><span>3</span><?php echo Yii::t('basket', 'payment'); ?></p></li>
                <li><p><span>4</span><?php echo Yii::t('basket', 'confirmation'); ?></p></li>
            </ul>
</div>
        <div class="cart">
            <div class="cart_left">
                <form>
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
                                width="85px" height="85" 
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
                                    <li class="yellow" style="background:#<?php echo $product->color ?> !important;"></li>
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
                    <div class="delivery">
                        <h1><?php echo Yii::t('basket', 'delivery'); ?></h1>
                        <div class="adress">
                            <p><?php echo Yii::t('basket', 'city'); ?></p>
                            <select>
                                <option selected>Киев</option>
                                <option>Львов</option>
                                <option>Харьков</option>
                                <option>Запорожье</option>
                                <option>Днепропетровск</option>
                            </select>
                            <p><?php echo Yii::t('basket', 'address'); ?></p>
                            <input type="text">
                        </div>
                        <div class="delivery_methods">
                            <p><?php echo Yii::t('basket', 'sm'); ?></p>
                            <select>
                                <option>Нова Пошта на склад</option>
                                <option>Нова Пошта до двери</option>
                                <option>Курьерская доставка</option>
                                <option selected>Самовывоз</option>
                            </select>
                        </div>
                        <p class="deliv_remember"><?php echo Yii::t('basket', 'remebmer'); ?></p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="pay">
                        <h1><?php echo Yii::t('basket', 'payment'); ?></h1>
                        <div class="left_pay">
                            <p><?php echo Yii::t('basket', 'payment_method'); ?></p>
                            <select>
                                <option selected>Оплата наличными курьеру</option>
                                <option>Львов</option>
                                <option>Харьков</option>
                                <option>Запорожье</option>
                                <option>Днепропетровск</option>
                            </select>
                            <p><?php echo Yii::t('basket', 'your_comments'); ?></p>
                            <textarea></textarea>
                        </div>
                        <div class="right_pay">
                            <p><?php echo Yii::t('basket', 'promo_code'); ?><span>?</span></p>
                            <input type="text">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="order">
                        <p class="total"><?php echo Yii::t('basket', 'in_total'); ?>:<span><?php echo Product::getSum(); ?> <?php echo Yii::t('basket', 'usb'); ?></span></p>
                        <button type="submit"><?php echo Yii::t('basket', 'checkout'); ?></button>
                        <div class="clearfix"></div>
                        <p><?php echo Yii::t('basket', 'by_clicking'); ?> <a href="#"><?php echo Yii::t('basket', 'user_agreement'); ?></a>.</p>
                    </div>
                </form>
            </div>
            <div class="cart_right">
                <div class="safe_pay">
                    <h1><?php echo Yii::t('basket', 'secure_payment'); ?></h1>
                    <div class="paytext">
                        <div class="pay_images">
                            <a href="#" class="norton"><img alt="Norton" src="img/pay_img.jpg"></a>
                            <a href="#"><img alt="TrustWave" src="img/pay_img1.jpg"></a>
                        </div>
                        <p>
                        <?php echo Yii::t('basket', 'secure_comment'); ?>
                        </p>
                    </div>
                </div>
                <div class="another">
                    <p><?php echo Yii::t('basket', 'you_may'); ?></p>
                    <div class="another_images">
                        <ul>
                            <li class="cont1">
                                <img alt="tovar1" src="img/image_mini.png">
                                <a href="#">
                                    <p class="name">
                                        Куртка
                                        <span>
                                            CW14-C100A
                                        </span>
                                    </p>
                                    <p class="price">3100 грн</p>
                                </a>
                            </li>
                            <li class="cont1">
                                <img alt="tovar1" src="img/image_mini1.png">
                                <a href="#">
                                    <p class="name">
                                        Куртка
                                        <span>
                                            CW14-C100A
                                        </span>
                                    </p>
                                    <p class="price">3100 грн</p>
                                </a>
                            </li>
                            <li class="cont1">
                                <img alt="tovar1" src="img/image_mini2.png">
                                <a href="#">
                                    <p class="name">
                                        Куртка
                                        <span>
                                            CW14-C100A
                                        </span>
                                    </p>
                                    <p class="price">3100 грн</p>
                                </a>
                            </li>
                            <li class="cont1">
                                <img alt="tovar1" src="img/image_mini3.png">
                                <a href="#">
                                    <p class="name">
                                        Куртка
                                        <span>
                                            CW14-C100A
                                        </span>
                                    </p>
                                    <p class="price"></p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
<?php } ?>