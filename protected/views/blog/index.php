<?php if($blog) {?>
<?php foreach($blog as $value) {?>
        <?php 
            if(Yii::app()->language == 'ua'){
                echo  $value->name_ua;
            } elseif(Yii::app()->language == 'ru') {
                echo  $value->name_ru;
            } elseif(Yii::app()->language == 'en') {
                echo  $value->name_en;
            }
        ?>
        <?php 
            if(Yii::app()->language == 'ua'){
                echo  $value->content_ua;
            } elseif(Yii::app()->language == 'ru') {
                echo  $value->content_ru;
            } elseif(Yii::app()->language == 'en') {
                echo  $value->content_en;
            }
        ?>
<?php } ?>
<?php } ?>