 <div class="select_panel">
            <form>
                <select onchange="document.location=this.options[this.selectedIndex].value">
                    <option selected disabled><?php echo Yii::t('catalog', 'category'); ?></option>
                    <?php if(isset($Allcatalog)) {?>
                    <?php foreach($Allcatalog as $_Allcatalog) {?>
                    <option value="/<?php echo Yii::app()->language; ?>/catalog/<?php echo $_Allcatalog->url ?>">
                        <?php 
                        if(Yii::app()->language == 'ua'){
                            echo $_Allcatalog->name_ua;
                        } elseif(Yii::app()->language == 'ru') {
                            echo $_Allcatalog->name_ru;
                        } elseif(Yii::app()->language == 'en') {
                            echo $_Allcatalog->name_en;
                        }
                        ?>
                    </option>
                    <?php } ?>
                    <?php } ?>
                </select>
                <select onchange="document.location=this.options[this.selectedIndex].value">
                    <option selected disabled><?php echo Yii::t('catalog', 'size'); ?></option>
                    <?php if(isset($Size)) {?>
                    <?php foreach($Size as $value_size) {?>
                    <option value="/<?php echo Yii::app()->language; ?>/filter/<?php echo $value_size->size; ?>"><?php echo $value_size->size; ?></option>
                    <?php } ?>
                    <?php } ?>
                </select>
                <select onchange="document.location=this.options[this.selectedIndex].value">
                    <option selected disabled><?php echo Yii::t('catalog', 'color'); ?></option>
                    <?php if(isset($Color)) {?>
                    <?php foreach($Color as $value_color) {?>
                    <option value="/<?php echo Yii::app()->language; ?>/filter/<?php echo str_replace("#", "rgb", $value_color->rgb); ?>"><?php echo $value_color->color; ?></option>
                    <?php } ?>
                    <?php } ?>
                </select>
            </form>
            <div class="clearfix"></div>
</div>