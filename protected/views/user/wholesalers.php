<?php if($_user) {?>
<style type="text/css">
#user-wholesalers-form_es_ p {
    color: #fff;  
}
#user-wholesalers-form_es_ ul li {
    color: #fff;
}
</style>
        <div class="cabinet">
            <h1><?php echo Yii::t('user','private_office'); ?></h1>
            <div class="left_cabinet">
                <h2 style="margin-bottom:0;"><?php echo Yii::t('user','wholesalers'); ?></h2>
                <?php if(!empty($updateClient)) {?>
                <div class="flash-who">
                <?php echo Yii::t('user','your_application'); ?>
                <div class="back-who">
                <a href="/<?php echo Yii::app()->language;  ?>/user/index"><?php echo Yii::t('user','back'); ?></a>
                </div>
                </div>
                <?php } else { ?>
                <?php if(Yii::app()->user->hasFlash('wholesalers')) {?>
                <div class="flash-who">
                    <?php echo Yii::app()->user->getFlash('wholesalers'); ?>
                <div class="back-who">
                <a href="/<?php echo Yii::app()->language;  ?>/user/index"><?php echo Yii::t('user','back'); ?></a>
                </div>
                </div>

                <?php } else {?>
                <script type="text/javascript">
                $(document).ready(function(){
                    $('.getCountry_id').change(function(){
                        //console.log($(this).val());
                        var id = $(this).val();
                        var data = jQuery(id).serialize();
                        jQuery.ajax({
                        type:'POST',
                        data:{'id':id},
                        url:'/<?php echo Yii::app()->language; ?>/user/UpdateAjaxRegionId/',
                        cache:false,
                        success:function(html){jQuery("#country_city").html(html)}});

                        return false; 
                    });
                });
                </script>
				<?php $form=$this->beginWidget('CActiveForm', array(
				    'id'=>'user-wholesalers-form',
				    'enableAjaxValidation'=>true,
                    'enableClientValidation'=>true,
 				)); ?>
                <p class="data-user"><?php echo Yii::t('user','user_wholesalers'); ?> <a href="/<?php echo Yii::app()->language; ?>/content/<?php echo $_client->url ?>"><?php echo Yii::t('user', 'wholesale_buyers'); ?></a></p>
                <p style="color:#fff;"><i><?php echo Yii::t('user', 'general_information'); ?></i></p>
                <?php echo $form->errorSummary($_wholesalers); ?>
                <?php echo $form->dropDownList($_wholesalers,'country',$this->getCountryAPI(),array('empty'=>'','class'=>'getCountry_id select')); ?>
                <div id="country_city"></div>
                <ul>
                    <li class="cabinet_name">
                        <p><?php echo Yii::t('basket', 'name'); ?>:
                            <span>
                                <?php echo $form->textField($_wholesalers,'name'); ?>
                                <?php echo $form->error($_wholesalers,'name'); ?>
                            </span>
                        </p>
                    </li>
                    <li class="cabinet_name">
                        <p><?php echo Yii::t('basket', 'last_name'); ?>:
                            <span>
                                <?php echo $form->textField($_wholesalers,'surname'); ?>
                                <?php echo $form->error($_wholesalers,'surname'); ?>
                            </span>
                        </p>
                    </li>
                    <li>
                        <p><?php echo Yii::t('basket', 'country'); ?>:
                            <span>
                                <?php echo $form->dropDownList($_wholesalers,'country',$this->getCountryAPI()); ?>
                                <?php echo $form->error($_wholesalers,'country'); ?>
                            </span>
                        </p>
                    </li>
                    <li class="cabinet_name">
                        <p><?php echo Yii::t('basket', 'city'); ?>:
                            <span>
                                <?php echo $form->textField($_wholesalers,'city'); ?>
                                <?php echo $form->error($_wholesalers,'city'); ?>
                            </span>
                        </p>
                    </li>
                    <li class="cabinet_name">
                        <p><?php echo Yii::t('basket', 'phone_number'); ?>:
                            <span>
                                <?php echo $form->textField($_wholesalers,'phone'); ?>
                                <?php echo $form->error($_wholesalers,'phone'); ?>
                            </span>
                        </p>
                    </li>
                    <li>
                        <p style="color:#fff;"><i><?php echo Yii::t('user', 'info_wholesalers'); ?></i></p>
                    </li>
                    <li class="cabinet_name">
                    	<p><?php echo Yii::t('user', 'trade_activity'); ?>:
                    		<span>
                    			<?php echo $form->textField($_wholesalers,'trade_activity'); ?>
        						<?php echo $form->error($_wholesalers,'trade_activity'); ?>
                    		</span>
                    	</p>
                    </li>
                    <li class="cabinet_name">
                    	<p><?php echo Yii::t('user', 'city_activities'); ?>:
                    		<span>
                    			<?php echo $form->textField($_wholesalers,'city_activities'); ?>
        						<?php echo $form->error($_wholesalers,'city_activities'); ?>
                    		</span>
                    	</p>
                    </li>
                </ul>
                <p style="color: #fff;border-bottom: 1px solid #fff;"></p>
                <?php echo CHtml::submitButton(Yii::t('user', 'send_an_inquiry')); ?>
                <?php $this->endWidget(); ?>
                <div class="back-who">
                <a href="/<?php echo Yii::app()->language;  ?>/user/index"><?php echo Yii::t('user','back'); ?></a>
                </div>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
<?php } ?>