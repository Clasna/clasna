<?php   
$session=new CHttpSession;
$session->open();
if($session['basket']){
    $basket = json_decode($session['basket'], true);
}
?>
<style type="text/css">
.error-address {
    color: #fff;
    margin-top: -17px;
}
.errorSummary > p {
    color: #fff;
}
.errorSummary ul li {
    color: #fff;
}
</style>
<?php if(isset($basket['basket'])){?>
<?php echo $this->renderPartial('//basket/step',array('step_2'=>$step_2)); ?>        
        <div class="cart1">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'address-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                ),
            )); ?>
                <div class="cart1_left">
                    <h1><?php echo Yii::t('basket', 'data_for_shipping'); ?><span>?</span></h1>
                    <?php echo $form->errorSummary($profiles); ?>
                    <div class="user_contacts">
                        <p class="important"><?php echo Yii::t('basket', 'name'); ?></p>
                        <?php echo $form->textField($profiles,'name'); ?>
                        <?php echo $form->error($profiles,'name',array('class'=>'error-address')); ?>
                        <p><?php echo Yii::t('basket', 'last_name'); ?></p>
                        <?php echo $form->textField($profiles,'surname'); ?>
                        <?php echo $form->error($profiles,'surname',array('class'=>'error-address')); ?>
                        <p><?php echo Yii::t('basket', 'to_transfer_destination'); ?></p>
                        <input type="text" name="to_transfer_destination">
                        <p class="important"><?php echo Yii::t('basket', 'phone_number'); ?></p>
                        <?php echo $form->textField($profiles,'phone'); ?>
                        <?php echo $form->error($profiles,'phone',array('class'=>'error-address')); ?>
                        <p><?php echo Yii::t('basket', 'extras_phone_number'); ?></p>
                        <?php echo $form->textField($profiles,'d_phone'); ?>
                        <?php echo $form->error($profiles,'d_phone',array('class'=>'error-address')); ?>
                        <p class="important">E-mail</p>
                        <?php echo $form->textField($profiles,'email',array('value'=>isset($_user->email)?$_user->email:null)); ?>
                        <?php echo $form->error($profiles,'email',array('class'=>'error-address')); ?>
                    </div>
                    <div class="user_adress">
                        <p><?php echo Yii::t('basket', 'address'); ?></p>
                        <?php echo $form->textField($profiles,'street'); ?>
                        <?php echo $form->error($profiles,'street',array('class'=>'error-address')); ?>
                        <p class="important"><?php echo Yii::t('basket', 'city'); ?></p>
                        <?php echo $form->textField($profiles,'city'); ?>
                        <?php echo $form->error($profiles,'city',array('class'=>'error-address')); ?>
                        <p class="important"><?php echo Yii::t('basket', 'postal_code'); ?></p>
                        <?php echo $form->textField($profiles,'postal_code'); ?>
                        <?php echo $form->error($profiles,'postal_code',array('class'=>'error-address')); ?>
                        <p class="important"><?php echo Yii::t('basket', 'country'); ?></p>
                        <?php if(!empty($profiles->city)) {?>
                        <?php echo $form->textField($profiles,'country'); ?>
                        <?php echo $form->error($profiles,'country',array('class'=>'error-address')); ?>
                        <?php } else { ?>
                        <?php echo $form->textField($profiles,'country'); ?>
                        <?php echo $form->error($profiles,'country',array('class'=>'error-address')); ?>
                        <?php } ?>
                        <p><?php echo Yii::t('basket', 'area'); ?></p>
                        <?php echo $form->textField($profiles,'region'); ?>
                        <?php echo $form->error($profiles,'region',array('class'=>'error-address')); ?>
                    </div>
                </div>
            <div class="cart1_right">
                <!--<div class="safe_pay">
                    <h1><?php echo Yii::t('basket', 'secure_payment'); ?></h1>
                    <div class="paytext">
                        <div class="pay_images">
                            <a href="#" class="norton"><img alt="Norton" src="<?php echo Yii::app()->request->baseUrl; ?>/img/pay_img.jpg"></a>
                            <a href="#"><img alt="TrustWave" src="<?php echo Yii::app()->request->baseUrl; ?>/img/pay_img1.jpg"></a>
                        </div>
                        <p>
                        <?php echo Yii::t('basket', 'secure_comment'); ?>
                        </p>
                    </div>
                </div>-->
                <?php if(isset($productAll)) {?>
                <div class="another">
                    <p><?php echo Yii::t('basket', 'you_may'); ?></p>
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
                <?php } ?>
            </div>
                <div class="go_next">
                    <button type="submit" name="send_shopping"><?php echo Yii::t('basket', 'continue_order'); ?></button>
                    <p><?php echo Yii::t('basket', 'remebmer'); ?></p>
                </div>
           <?php $this->endWidget(); ?>
        </div>
<?php } ?>