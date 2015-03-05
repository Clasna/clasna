<div class="wrapper-order" 
<?php 
if(isset($guest_block)) {
    echo 'style="display:block;"';
} elseif(!Yii::app()->user->id){
    echo 'style="display:none;"';
} 
?>
>
<style type="text/css">
    #PayForm_street_em_ {
        padding-left: 10px;
        width: 325px;
        color: #fff;
    }
    #pay-form-basket_es_ p {
        color: #fff;
    }
    #pay-form-basket_es_ ul li {
        color: #fff;
    }
    .error-element {
        color: #fff;
        margin-top: -21px;
    }
</style>
                    <div class="delivery">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'pay-form-basket',
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                        ),
                    )); ?>
                    <?php echo $form->errorSummary($pay); ?>
                        <h1><?php echo Yii::t('basket', 'delivery'); ?></h1>
                        <div class="adress">
                            <p><?php echo Yii::t('basket', 'city'); ?></p>
                            <?php echo $pay->SelectCity(); ?>
                            <?php echo $form->error($pay,'city',array('class'=>'error-element')); ?>
                            <p><?php echo Yii::t('basket', 'address'); ?></p>
                            <?php echo $form->textField($pay,'street'); ?>
                            <?php echo $form->error($pay,'street',array('class'=>'error-element')); ?>
                        </div>
                        <div class="delivery_methods">
                            <p><?php echo Yii::t('basket', 'sm'); ?></p>
                            <?php echo $pay->SelectSm(); ?>
                            <?php echo $form->error($pay,'sm',array('class'=>'error-element')); ?>
                        </div>
                        <p class="deliv_remember"><?php echo Yii::t('basket', 'remebmer'); ?></p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="pay">
                        <h1><?php echo Yii::t('basket', 'payment'); ?></h1>
                        <div class="left_pay">
                            <p><?php echo Yii::t('basket', 'payment_method'); ?></p>
                            <?php echo $pay->SelectPayment(); ?>
                            <?php echo $form->error($pay,'payment_method',array('class'=>'error-element')); ?>
                            <p><?php echo Yii::t('basket', 'your_comments'); ?></p>
                            <?php echo $form->textArea($pay,'your_comments'); ?>
                            <?php echo $form->error($pay,'your_comments',array('class'=>'error-element')); ?>
                        </div>
                        <div class="right_pay">
                            <p><?php echo Yii::t('basket', 'promo_code'); ?><span>?</span></p>
                            <?php echo $form->textField($pay,'promo_code'); ?>
                            <?php echo $form->error($pay,'promo_code',array('class'=>'error-element')); ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="order">
                        <button type="submit" name="send_shopping"><?php echo Yii::t('basket', 'continue_order'); ?></button>
                        <div class="clearfix"></div>
                        <!-- <p><?php //echo Yii::t('basket', 'by_clicking'); ?> <a href="/<?php //echo Yii::app()->language; ?>/content/<?php //echo $ClientAgeent->url ?>"><?php //echo Yii::t('basket', 'user_agreement'); ?></a>.</p> -->
                    </div>
<?php $this->endWidget(); ?>
            </div>
            </div>