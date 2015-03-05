<?php $this->renderPartial('//layouts/_elementFilter',array('Allcatalog'=>$Allcatalog,'Color'=>$Color,'Size'=>$Size)); ?>
<?php if($product) {?>
<script type="text/javascript">
$(document).mouseup(function(e) {
   var igorekNagibaets = $('#vyber_razmera');
    if (igorekNagibaets.has(e.target).length === 0) {
      $('#vyber_razmera').hide();
   }
});
</script>
<style type="text/css">
.size-div {
    position: absolute;
    z-index: 99999999999;
    width: 100%;
    height: 100%;
}
.size-div .size-img {
    width: 1000px;
    margin: 50px auto 0 auto;
}
#close-div {
    color: #fff;
    cursor: pointer;
    font-size: 30px;
    float: right;
    margin: 0 16px 10px 0;
    padding: 0 10px;
    border: 1px solid #000;
}
#close-div:hover{
    border: 1px solid #fff;
}
</style>
<div id="size-ua-div"  class="size-div" style="display:none;">
    <div class="size-img">
     <div class="close-size-ua-div" id="close-div">X</div>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/zhenskaya_ukr.png">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/muzhskaya_ukr.png">
    </div>
</div>
<div id="size-ru-div"  class="size-div" style="display:none;">
    <div class="size-img">
     <div class="close-size-ru-div" id="close-div">X</div>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/zhenskaya_ru.png">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/muzhskaya_russ.png">
    </div>
</div>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/cloudzoom.css" rel="stylesheet" type="text/css">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/thumbelina.css" rel="stylesheet" type="text/css">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ga.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/cloudzoom.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/thumbelina.js"></script>
        <script type="text/javascript">
            CloudZoom.quickStart();
            $(function(){
                $('#slider1').Thumbelina({
                    $bwdBut:$('#slider1 .left'), 
                    $fwdBut:$('#slider1 .right')
                });
            });

            
        </script>
           <div class="prod_card">
            <div class="container">
                <div class="row">
                    <div class="prod_photo col-lg-6 col-md-6 col-sm-6">
                    <div class="super_wraper">
  
    <img class="cloudzoom" id="zoom1" width="400" src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $product->images;?>" data-cloudzoom="
           zoomSizeMode:&quot;image&quot;,
           autoInside: 550
       " 
           alt="
            <?php 
               if(Yii::app()->language == 'ua'){
                      echo $product->title_ua;
               } elseif(Yii::app()->language == 'ru') {
                     echo $product->title_ru;
               } elseif(Yii::app()->language == 'en') {
                     echo $product->title_en;
               }
            ?>
            "
       style="-webkit-user-select: none;">
 
 
    <div id="slider1">
    <div class="thumbelina-but horiz left disabled arrow_prev_goods"></div>
    <div style="position:absolute;overflow:hidden;width:100%;height:100%;">
        <ul class="thumbelina" style="left: 0px;">
            <li style="display: inline-block;"><img class="cloudzoom-gallery" width="83"  src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $product->images;?>" data-cloudzoom="useZoom:&#39;.cloudzoom&#39;, image:'<?php echo Yii::app()->request->baseUrl; ?><?php echo $product->images;?>'"
                alt="
            <?php 
               if(Yii::app()->language == 'ua'){
                      echo $product->title_ua;
               } elseif(Yii::app()->language == 'ru') {
                     echo $product->title_ru;
               } elseif(Yii::app()->language == 'en') {
                     echo $product->title_en;
               }
            ?>
            "></li>
        <?php foreach($imagesproduct as $imagesP) { ?>    
            <li style="display: inline-block;"><img class="cloudzoom-gallery" width="83"  src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $imagesP->path; ?>" data-cloudzoom="useZoom:&#39;.cloudzoom&#39;, image:'<?php echo Yii::app()->request->baseUrl; ?><?php echo $imagesP->path; ?>'"
                alt="
            <?php 
               if(Yii::app()->language == 'ua'){
                      echo $product->title_ua;
               } elseif(Yii::app()->language == 'ru') {
                     echo $product->title_ru;
               } elseif(Yii::app()->language == 'en') {
                     echo $product->title_en;
               }
            ?>
            "></li>
        <?php } ?> 

        </ul>
    </div>
        <div class="thumbelina-but horiz right arrow_next_goods"></div>
    </div>
                        </div>
                    </div>
                    <div class="description col-lg-6 col-md-4 col-sm-5">
                        <div class="head_info">
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
                            <div class="descr_info">
                                <p><?php echo Yii::t('product', 'description'); ?><a href="#"><?php echo Yii::t('product', 'terms'); ?></a></p>
                                <ul>
                                    <li><span><?php echo Yii::t('product', 'material'); ?>:</span>
                                    <?php 
                                    if(Yii::app()->language == 'ua'){
                                        echo $product->material_ua;
                                    } elseif(Yii::app()->language == 'ru') {
                                        echo $product->material_ru;
                                    } elseif(Yii::app()->language == 'en') {
                                        echo $product->material_en;
                                    }
                                    ?>
                                    </li>
                                    <li><span><?php echo Yii::t('product', 'lining'); ?>:</span>
                                    <?php 
                                    if(Yii::app()->language == 'ua'){
                                        echo $product->lining_ua;
                                    } elseif(Yii::app()->language == 'ru') {
                                        echo $product->lining_ru;
                                    } elseif(Yii::app()->language == 'en') {
                                        echo $product->lining_en;
                                    }
                                    ?>
                                    </li>
                                    <li><span><?php echo Yii::t('product', 'size'); ?>:</span> 
                                    <?php 
                                    if(Yii::app()->language == 'ua'){
                                        echo $product->length_ua;
                                    } elseif(Yii::app()->language == 'ru') {
                                        echo $product->length_ru;
                                    } elseif(Yii::app()->language == 'en') {
                                        echo $product->length_en;
                                    }
                                    ?>
                                    </li>
                                    <li><span><?php echo Yii::t('product', 'range'); ?>:</span> 
                                    <?php 
                                    if(Yii::app()->language == 'ua'){
                                        echo $product->size_range_ua;
                                    } elseif(Yii::app()->language == 'ru') {
                                        echo $product->size_range_ru;
                                    } elseif(Yii::app()->language == 'en') {
                                        echo $product->size_range_en;
                                    }
                                    ?>
                                    </li>
                                    <li>
                                        <span><?php echo Yii::t('product', 'price'); ?>:</span>
                                        <?php echo $product->price; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="color_prod">
                            <h1><?php echo Yii::t('product', 'colour_of_product'); ?>:</h1>
                            <?php if(isset($parentColor)) {
                                    echo $parentColor;
                             } ?>
                        </div>
                        <div class="color_prod">
                            <h1><?php echo Yii::t('product', 'choose'); ?>:</h1>
                            <?php if(isset($color)) {?>
                            <?php 
                                foreach ($color as $valueColor) {
                                    echo $valueColor;
                                }
                            ?>
                            <?php } ?>
                        </div>
                        <script type="text/javascript">
                        $(document).ready(function(){
                            $('#size-ua').on('click',function(){
                                $('#size-ua-div').css('display','block');
                            });
                            $('.close-size-ua-div').on('click',function(){
                                $('#size-ua-div').css('display','none');
                            });
                            $('#size-ru').on('click',function(){
                                $('#size-ru-div').css('display','block');
                            });
                            $('.close-size-ru-div').on('click',function(){
                                $('#size-ru-div').css('display','none');
                            });
                        });
                        </script>
                        <form method="post" id="form-product" class="size-form">
                        <div class="size_block">
                            <p><?php echo Yii::t('product', 'chooseS'); ?>:
                                <select class="id_size" name="size">
                                    <option value><?php echo Yii::t('catalog', 'size'); ?></option>
                                    <?php if($size) { ?>
                                    <?php foreach($size as $sizes) {?>
                                    <option value="<?php echo $sizes->id; ?>"><?php echo $sizes->option; ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                                <?php 
                                if(Yii::app()->language == 'ua'){
                                    $size_div = 'size-ua';
                                } elseif(Yii::app()->language == 'ru') {
                                    $size_div = 'size-ru';
                                } elseif(Yii::app()->language == 'en') {
                                    $size_div = 'size-en';
                                }
                                ?>
                                <a href="#" id="<?php echo isset($size_div)?$size_div:null; ?>"><?php echo Yii::t('product', 'sizes'); ?></a>
                            </p>
                        </div>
                        <div class="buttons_prod"  style="position: relative;">
                        <div id="vyber_razmera" style="display:none;">
                             <?php echo Yii::t('product', 'chooseS'); ?>
                        </div>
                        <input   type="hidden" name="id_product" id="id_product" value="<?php echo $product->id; ?>">
                            <?php echo CHtml::ajaxSubmitButton(Yii::t('product', 'checkout'),
                              CController::createUrl('product/UpdateAjaxBasket/'.$product->url), 
                              array(
                                'type' => 'POST',
                                'update' => '#pack',
                                'data'=>array('form'=>'js:$(\'.size-form\').serializeArray()')
                              ),
                              array('class'=>'active_button','name'=>'toCart','id'=>'to_cart'));
                            ?>
                        </form> 
                        </div>
                        <div class="prod_text">
                            <p class="descr_text">
                            <?php 
                            /*if(Yii::app()->language == 'ua'){
                                echo $product->content_ua;
                            } elseif(Yii::app()->language == 'ru') {
                                echo $product->content_ru;
                            } elseif(Yii::app()->language == 'en') {
                                echo $product->content_en;
                            }*/
                            echo Yii::t('product','dear_visitors');
                            ?>
                            </p>
                        </div>
                        <br>
                        <p class="share"><a href="#" class="fb"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/fb.jpg" alt="fb"><span><?php echo Yii::t('product', 'like'); ?></span></a><a href="#" class="tw"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/twiter.jpg" alt="tw"><span><?php echo Yii::t('product', 'twitter'); ?></span></a></p>
                        <div class="another">
                            <?php if(isset($int_prod)) {?>
                            <style type="text/css">
                            .prod_card .container .row .another .another_images ul li a{
                                height: 228px !important;
                                width: 150px!important;
                            }
                            .prod_card .container .row .another .another_images ul li a .name {
                                width: 150px !important;
                                margin: 80px auto 0 auto !important;
                            }
                            </style>
                            <p><?php echo Yii::t('product', 'well'); ?>:</p>
                            <div class="another_images">
                                <ul>
                                    <?php foreach($int_prod as $value_s) {?>
                                    <li class="cont1">
                                        <img alt="<?php echo $value_s->name_ua; ?>" src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $value_s->images; ?>" width="150">
                                        <a href="/<?php echo Yii::app()->language; ?>/product/<?php echo $value_s->url; ?>">
                                            <p class="name">
                                                <?php echo $value_s->name_ua; ?>
                                            </p>
                                            <p class="price"><?php echo $value_s->price; ?> грн</p>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php } ?>