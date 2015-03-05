<script type="text/javascript">
    $(document).ready(function(){
        $('#city>li').on('click',function(){
            console.log();
            var data = $(this).data('city');
            var div = $('#stores_adress_'+data);
            $('.stores_id').hide();
            $('#city>li').removeClass('current');
            $(this).addClass('current');
            $(div).show();
        });
        $('#open-map-kh>li').on('click',function(){
            var map = $(this).find('#map_kh').html();
            $('.stores_adress_kh>.map_container').html(map);
        });
        $('#open-map-kiev>li').on('click',function(){
            var map = $(this).find('#map_kiev').html();
            $('.stores_adress_kiev>.map_container').html(map);
        });
        $('#open-map-odesa>li').on('click',function(){
            var map = $(this).find('#map_odesa').html();
            $('.stores_adress_odesa>.map_container').html(map);
        });
    })
</script>
        <div class="city">
            <ul id="city">
                <li class="current" data-city="kh">
                    <a href="javascript:void(0);">
                        <?php 
                        $city_kh = $this->setIdCity('2249');
                        if(isset($city_kh)){
                            if(Yii::app()->language == 'ua'){
                                echo $city_kh->name_ua;
                            } elseif(Yii::app()->language == 'ru') {
                                echo $city_kh->name_ru;
                            } elseif(Yii::app()->language == 'en') {
                                echo $city_kh->name_en;
                            }
                        }
                        ?>
                    </a>
                </li>
                <li data-city="kiev">
                    <a href="javascript:void(0);">
                        <?php 
                        $city_kh = $this->setIdCity('908');
                        if(isset($city_kh)){
                            if(Yii::app()->language == 'ua'){
                                echo $city_kh->name_ua;
                            } elseif(Yii::app()->language == 'ru') {
                                echo $city_kh->name_ru;
                            } elseif(Yii::app()->language == 'en') {
                                echo $city_kh->name_en;
                            }
                        }
                        ?>
                    </a>
                </li>
                <li data-city="odesa">
                    <a href="javascript:void(0);">
                        <?php 
                        $city_kh = $this->setIdCity('1551');
                        if(isset($city_kh)){
                            if(Yii::app()->language == 'ua'){
                                echo $city_kh->name_ua;
                            } elseif(Yii::app()->language == 'ru') {
                                echo $city_kh->name_ru;
                            } elseif(Yii::app()->language == 'en') {
                                echo $city_kh->name_en;
                            }
                        }
                        ?>
                    </a>
                </li>
            </ul>
        </div>
        <?php if(isset($kh)) {?>
        <div class="stores_adress stores_id" id="stores_adress_kh">
            <ul id="open-map-kh">
            <?php $i = 1; foreach($kh as $value_kh) {?>
                <li style="cursor:pointer;">
                    <span class="number_store"><?php echo $i++; ?></span>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $value_kh->images; ?>">
                    <?php 
                        if(Yii::app()->language == 'ua'){
                            echo $value_kh->stores_ua;
                        }
                         elseif(Yii::app()->language == 'ru') {
                            echo $value_kh->stores_ru;
                        } elseif(Yii::app()->language == 'en') {
                            echo $value_kh->stores_en;
                        }
                    ?>
                    <div id="map_kh" style="display:none;">
                    <iframe src="<?php echo $value_kh->map; ?>" width="1044" height="734"></iframe>
                    </div>
                </li>
            <?php } ?>
            </ul>
            <div class="map_container">
               <iframe src="<?php echo $kh[0]->map; ?>" width="1044" height="734"></iframe>
            </div>
        </div>
        <?php } ?>
        <?php if(isset($kiev)) {?>
        <div class="stores_adress stores_id" id="stores_adress_kiev" style="display:none;">
            <ul id="open-map-kiev">
            <?php $i = 1; foreach($kiev as $value_kiev) {?>
                <li style="cursor:pointer;">
                    <span class="number_store"><?php echo $i++; ?></span>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $value_kiev->images; ?>">
                    <?php 
                        if(Yii::app()->language == 'ua'){
                            echo $value_kiev->stores_ua;
                        }
                         elseif(Yii::app()->language == 'ru') {
                            echo $value_kiev->stores_ru;
                        } elseif(Yii::app()->language == 'en') {
                            echo $value_kiev->stores_en;
                        }
                    ?>
                    <div id="map_kh_<?php echo $value_kiev->id; ?>" style="display:none;">
                    <iframe src="<?php echo $value_kiev->map; ?>" width="1044" height="734"></iframe>
                    </div>
                </li>
            <?php } ?>
            </ul>
            <div class="map_container">
               <iframe src="<?php echo $kiev[0]->map; ?>" width="1044" height="734"></iframe>
            </div>
        </div>
        <?php } ?>
        <?php if(isset($odesa)) {?>
        <div class="stores_adress stores_id" id="stores_adress_odesa" style="display:none;">
            <ul id="open-map-odesa">
            <?php $i = 1; foreach($odesa as $value_odesa) {?>
                <li style="cursor:pointer;">
                    <span class="number_store"><?php echo $i++; ?></span>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $value_odesa->images; ?>">
                    <?php 
                        if(Yii::app()->language == 'ua'){
                            echo $value_odesa->stores_ua;
                        }
                         elseif(Yii::app()->language == 'ru') {
                            echo $value_odesa->stores_ru;
                        } elseif(Yii::app()->language == 'en') {
                            echo $value_odesa->stores_en;
                        }
                    ?>
                    <div id="map_kh_<?php echo $value_odesa->id; ?>" style="display:none;">
                    <iframe src="<?php echo $value_odesa->map; ?>" width="1044" height="734"></iframe>
                    </div>
                </li>
            <?php } ?>
            </ul>
            <div class="map_container">
               <iframe src="<?php echo $odesa[0]->map; ?>" width="1044" height="734"></iframe>
            </div>
        </div>
        <?php } ?>