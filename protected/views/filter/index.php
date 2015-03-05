<?php $this->renderPartial('//layouts/_elementFilter',array('Allcatalog'=>$Allcatalog,'Color'=>$Color,'Size'=>$Size)); ?>
<?php if(isset($findFilterSize)) {?>    
        <div class="catalog_content">
            <div class="catalog_wraper">
                <?php foreach ($findFilterSize as $_value) {?>
                <section>
                <?php if(isset($_value)){ ?>
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
                    " src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $_value->images; ?>">
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
                <?php } ?>
                </section>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
        </div>
<?php } elseif(isset($findFilterColor)) {?>
        <div class="catalog_content">
            <div class="catalog_wraper">
                <?php foreach ($findFilterColor as $_value) {?>
                <section>
                    <img alt="
                    <?php 
                    if(Yii::app()->language == 'ua'){
                        echo $_value['title_ua'];
                    } elseif(Yii::app()->language == 'ru') {
                        echo $_value['title_ru'];
                    } elseif(Yii::app()->language == 'en') {
                        echo $_value['title_en'];
                    }
                    ?>
                    " src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $_value['images']; ?>">
                    <a href="/<?php echo Yii::app()->language; ?>/product/<?php echo $_value['url']; ?>">
                        <p class="name">
                            <?php 
                            if(Yii::app()->language == 'ua'){
                               echo $_value['name_ua'];
                            } elseif(Yii::app()->language == 'ru') {
                                echo $_value['name_ru'];
                            } elseif(Yii::app()->language == 'en') {
                                echo $_value['name_en'];
                            }
                            ?>
                        </p>
                        <p class="price">
                            <?php echo $_value['price']; ?>
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
                </section>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
        </div>
<?php } ?>