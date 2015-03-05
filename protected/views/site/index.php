       <?php if(isset($model)) {?> 
        <div class="content_images">
            <?php foreach($model as $_value) {?>
            <a href="/<?php echo Yii::app()->language;  ?>/catalog/<?php echo $_value->url; ?>" class="<?php $this->classHref($_value); ?>">
            <?php 
            if(Yii::app()->language == 'ua'){
                echo  $_value->content_ua;
            } elseif(Yii::app()->language == 'ru') {
                echo  $_value->content_ru;
            } elseif(Yii::app()->language == 'en') {
                echo  $_value->content_en;
            }
            ?>
             <img src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $_value->path; ?>">
            </a>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <?php } ?>
        <div class="content_images" style="border-top: 1px solid #000;padding: 5px 0;">
            <a class="pull-left" href="/<?php echo Yii::app()->language; ?>/woman"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/Women_collection.jpg"></a>
            <a class="pull-right" href="/<?php echo Yii::app()->language; ?>/men"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/Men_collection.jpg"></a>
            <div class="clearfix"></div>
        </div>
         <div class="clearfix"></div>
        <div class="mp_wraper">
        <?php
        $mainContent = $this->getMainContent('8');
            if(isset($mainContent)){ 
                if(Yii::app()->language == 'ua'){
                    echo  $mainContent->content_ua;
                } elseif(Yii::app()->language == 'ru') {
                    echo  $mainContent->content_ru;
                } elseif(Yii::app()->language == 'en') {
                    echo  $mainContent->content_en;
                }
            }
        ?>
            <div class="clearfix"></div>
        </div>