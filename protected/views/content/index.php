<?php if($getUrl) {?>
<!-- Content block -->
<div class='some_text' style="background: #000; padding: 40px 0;">
<div class='container'>
<h1 style="color:#fff;border-bottom: 1px solid #fff;margin: 20px 0 30px 0;">
<?php 
            if(Yii::app()->language == 'ua'){
	            echo $getUrl->name_ua;
            } elseif(Yii::app()->language == 'ru') {
	            echo $getUrl->name_ru;
            } elseif(Yii::app()->language == 'en') {
	            echo $getUrl->name_en;
            }
?>
</h1>
<?php 
            if(Yii::app()->language == 'ua'){
	            echo $getUrl->content_ua;
            } elseif(Yii::app()->language == 'ru') {
	            echo $getUrl->content_ru;
            } elseif(Yii::app()->language == 'en') {
	            echo $getUrl->content_en;
            }
?>
<p style="border-bottom: 1px solid #fff;margin: 20px 0 30px 0;"></p>
</div>
<div class='container'>
                  <div class="another">
                    <p><?php echo Yii::t('product', 'novelty'); ?></p>
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
</div>
</div>
<!-- end block -->
<?php } ?>
