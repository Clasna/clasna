<a href="/<?php echo Yii::app()->language; ?>/basket/shopping" class="cart">
<?php $session=new CHttpSession;
$session->open();
    if($session['basket']){
        $basket = json_decode($session['basket'], true);
    }
?>
<?php   
    if(isset($basket['basket'])) {    
	    $bSum = 0;
	    $CountPrice = array(); 
	?>
    <?php foreach($basket['basket'] as $valCount) {?>
    <?php foreach($valCount as $valBasket) {?>
    <?php $bSum += $valBasket['count'];  ?>
    <?php } ?>
    <?php } ?>
    <?php echo Yii::t('main', 'basket'); ?> - <span><?php echo $bSum; ?></span>
                <div class="basket_enter_popup" style="display: <?php echo $block ? $block : 'none'; ?>">
                    <table>
                        <tbody>
                            <?php foreach ($basket['basket'] as $value) { ?>
                            <?php foreach ($value as $proD) { ?>
                            <?php $product = Product::getProductBasketId($proD['id']); ?>
                            <?php if(isset($proD['size'])) {?>
                            <?php $size = Product::getProductOneOptions($proD['size']); ?>
                            <?php } ?>
                            <tr>
                                <td>
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $product->images ?>" alt="e">
                                </td>
                                <td style="padding: 2px;">
                                <?php 
                                if(Yii::app()->language == 'ua'){
                                    echo $product->name_ua;
                                } elseif(Yii::app()->language == 'ru') {
                                    echo $product->name_ru;
                                } elseif(Yii::app()->language == 'en') {
                                    echo $product->name_en;
                                }
                                ?>
                                </td>
                                <td><?php echo $size->option; ?></td>
                                <td><?php echo $product->price * $proD['count']; ?></td>
                                <td style="padding: 0 3px;"><?php echo $proD['count'] ?></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="/<?php echo Yii::app()->language; ?>/basket/shopping" title="К покупкам"><div class="button hand">ПОСМОТРЕТЬ КОРЗИНУ</div></a>
                </div>
    <?php } else {?>
    <?php echo Yii::t('main', 'basket'); ?> - <span>0</span>
<?php } ?>
</a>