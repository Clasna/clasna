<script type="text/javascript">
    $(document).ready(function(){
        $('#update_user').on('click',function(){
            $('#cart_data').hide();
            $('#update_data').show();
        })
    });
</script>
<?php   
$session=new CHttpSession;
$session->open();
if($session['basket']){
    $basket = json_decode($session['basket'], true);
}
?>
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
            <div class="cart1_left" id="cart_data">
            <h1><?php echo Yii::t('basket', 'data_user'); ?></h1>
            <a id="update_user">Изменить данные</a>
            <p class="important"><?php echo Yii::t('basket', 'name'); ?> - <?php echo $order['order']['name']; ?></p>
             <p class="important"><?php echo Yii::t('basket', 'last_name'); ?> - <?php echo $order['order']['sername']; ?></p>
             <p><?php echo Yii::t('basket', 'to_transfer_destination'); ?> - <?php echo $order['order']['to_transfer_destination']; ?></p>
             <p class="important"><?php echo Yii::t('basket', 'phone_number'); ?> - <?php echo $order['order']['phone']; ?></p>
             <p><?php echo Yii::t('basket', 'extras_phone_number'); ?> - <?php echo $order['order']['d_phone']; ?></p>
             <p class="important"><?php echo Yii::t('basket', 'address'); ?> - <?php echo $order['order']['street']; ?></p>
             <p class="important"><?php echo Yii::t('basket', 'postal_code'); ?> - <?php echo $order['order']['postal_code']; ?></p>
             <p class="important"><?php echo Yii::t('basket', 'country'); ?> - <?php echo $order['order']['country']; ?></p>
             <p class="important"><?php echo Yii::t('basket', 'area'); ?> - <?php echo $order['order']['region']; ?></p>
             <p class="important"><?php echo Yii::t('basket', 'area'); ?> - <?php echo $order['order']['city']; ?></p>
             <hr>
             <p class="important"><?php echo Yii::t('basket', 'city'); ?> - <?php echo $order['order']['city_method']; ?></p>
             <p class="important"><?php echo Yii::t('basket', 'address'); ?> - <?php echo $order['order']['street_method']; ?></p>
             <p class="important"><?php echo Yii::t('basket', 'sm'); ?> - <?php echo $order['order']['sm']; ?></p>
             <p class="important"><?php echo Yii::t('basket', 'payment_method'); ?> - <?php echo $order['order']['payment_method']; ?></p>
             <p class="important"><?php echo Yii::t('basket', 'your_comments'); ?> - <?php echo $order['order']['your_comments']; ?></p>
            </div>
                <div class="cart1_left" id="update_data" style="display:none;">
                    <h1><?php echo Yii::t('basket', 'data_for_shipping'); ?><span>?</span></h1>
                    <?php echo $form->errorSummary($profiles); ?>
                    <div class="user_contacts">
                        <p class="important"><?php echo Yii::t('basket', 'name'); ?></p>
                        <?php echo $form->textField($profiles,'name'); ?>
                        <?php echo $form->error($profiles,'name'); ?>
                        <p class="important"><?php echo Yii::t('basket', 'last_name'); ?></p>
                        <input type="text" name="surname" value="<?php echo $profiles->surname; ?>">
                        <p><?php echo Yii::t('basket', 'to_transfer_destination'); ?></p>
                        <input type="text" name="to_transfer_destination">
                        <p class="important"><?php echo Yii::t('basket', 'phone_number'); ?></p>
                        <?php echo $form->textField($profiles,'phone'); ?>
                        <?php echo $form->error($profiles,'phone'); ?>
                        <p><?php echo Yii::t('basket', 'extras_phone_number'); ?></p>
                        <input type="text" name="d_phone" value="<?php echo $profiles->d_phone; ?>">
                        <p class="important">E-mail</p>
                        <?php echo $form->textField($profiles,'email'); ?>
                        <?php echo $form->error($profiles,'email'); ?>
                    </div>
                    <div class="user_adress">
                        <p class="important"><?php echo Yii::t('basket', 'address'); ?></p>
                        <input type="text" name="street" value="<?php echo $profiles->street; ?>">
                        <p class="important"><?php echo Yii::t('basket', 'city'); ?></p>
                        <?php echo $form->textField($profiles,'city'); ?>
                        <?php echo $form->error($profiles,'city'); ?>
                        <p class="important"><?php echo Yii::t('basket', 'postal_code'); ?></p>
                        <input type="text" name="postal_code">
                        <p class="important"><?php echo Yii::t('basket', 'country'); ?></p>
                        <?php if(!empty($profiles->city)) {?>
                        <?php echo $form->textField($profiles,'country'); ?>
                        <?php echo $form->error($profiles,'country'); ?>
                        <?php } else { ?>
                        <?php echo $form->textField($profiles,'country'); ?>
                        <?php echo $form->error($profiles,'country'); ?>
                        <?php } ?>
                        <p class="important"><?php echo Yii::t('basket', 'area'); ?></p>
                        <input type="text" name="region" value="<?php echo $profiles->region; ?>">
                        <input type="checkbox" name="mach" id="mach">
                        <label for="mach"><?php echo Yii::t('basket', 'the_data'); ?></label>
                    </div>
                </div>
                <div class="go_next">
                    <button type="submit" name="send_shopping"><?php echo Yii::t('basket', 'continue_order'); ?></button>
                    <p><?php echo Yii::t('basket', 'remebmer'); ?></p>
                </div>
           <?php $this->endWidget(); ?>
        </div>
<?php } ?>