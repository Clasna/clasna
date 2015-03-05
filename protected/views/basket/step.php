<div class="steps_panel">
            <ul>
                <li><a href="<?php echo $this->getReturnUrl(); ?>"><?php echo Yii::t('basket', 'continue'); ?></a></li>
                <li><p 
                <?php
                if($step_1 == 1){
                	echo 'class="passing"';
                } else {
                	echo 'class="passed"';
                }
                ?>
                ><span>1</span><?php echo Yii::t('basket', 'my_shopping'); ?></p></li>

                <li><p
                <?php
                if(isset($step_2)) {
                    if($step_2 == 2){
                    	echo 'class="passing"';
                    } elseif($step_3 == 3) {
                    	echo 'class="passed"';
                    } 
                } elseif(isset($step_3)){
                    echo 'class="passed"';
                }
                ?>><span>2</span><?php echo Yii::t('basket', 'address_step'); ?></p></li>
                <!-- <li><p><span>3</span><?php echo Yii::t('basket', 'payment_step'); ?></p></li> -->
                <li><p
                <?php
                if(isset($step_3)) {
                    if($step_3 == 3){
                        echo 'class="passing"';
                    }
                }
                ?>><span>3</span><?php echo Yii::t('basket', 'confirmation'); ?></p></li>
            </ul>
</div>