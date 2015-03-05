<?php if($_user) {?>
        <div class="cabinet">
            <h1><?php echo Yii::t('user','private_office'); ?></h1>
            <div class="left_cabinet">
                <h2 style="margin-bottom:0;"><?php echo Yii::t('user','profile'); ?></h2>
				<?php $form=$this->beginWidget('CActiveForm', array(
				    'id'=>'user-recovery-form',
				    'enableAjaxValidation'=>true,
				)); ?>
				<?php echo $form->errorSummary($_profile); ?>
                <p class="data-user"><?php echo Yii::t('user','data'); ?>:</p>
                <ul>
                    <li class="cabinet_name">
                    	<p><?php echo Yii::t('basket', 'name'); ?>:
                    		<span>
                    			<?php echo $form->textField($_profile,'name'); ?>
        						<?php echo $form->error($_profile,'name'); ?>
                    		</span>
                    	</p>
                    </li>
                    <li class="cabinet_name">
                    	<p><?php echo Yii::t('basket', 'last_name'); ?>:
                    		<span>
                    			<?php echo $form->textField($_profile,'surname'); ?>
        						<?php echo $form->error($_profile,'surname'); ?>
                    		</span>
                    	</p>
                    </li>
                    <li>
                    	<p>E-mail:
                    		<span>
                    			<?php echo $form->textField($_user,'email'); ?>
        						<?php echo $form->error($_user,'email'); ?>
                    		</span>
                    	</p>
                    </li>
                    <li>
                    	<p><?php echo Yii::t('basket', 'country'); ?>:
                    		<span>
                    			<?php echo $form->textField($_profile,'country'); ?>
        						<?php echo $form->error($_profile,'country'); ?>
                    		</span>
                    	</p>
                    </li>
                    <li><p><?php echo Yii::t('basket', 'area'); ?>:
	                    	<span>
	                    		    <?php echo $form->textField($_profile,'region'); ?>
	        						<?php echo $form->error($_profile,'region'); ?>
	                    	</span>
                    	</p>
                	</li>
                    <li><p><?php echo Yii::t('basket', 'city'); ?>:
	                    	<span>
	                    		    <?php echo $form->textField($_profile,'city'); ?>
	        						<?php echo $form->error($_profile,'city'); ?>
	                    	</span>
                    	</p>
                	</li>
                	<li><p><?php echo Yii::t('basket', 'address'); ?>:
	                    	<span>
	                    		    <?php echo $form->textField($_profile,'street'); ?>
	        						<?php echo $form->error($_profile,'street'); ?>
	                    	</span>
                    	</p>
                	</li>
                	<li><p><?php echo Yii::t('basket', 'phone_number'); ?>:
	                    	<span>
	                    		    <?php echo $form->textField($_profile,'phone'); ?>
	        						<?php echo $form->error($_profile,'phone'); ?>
	                    	</span>
                    	</p>
                	</li>
                	<li><p><?php echo Yii::t('basket', 'extras_phone_number'); ?>:
	                    	<span>
	                    		    <?php echo $form->textField($_profile,'d_phone'); ?>
	        						<?php echo $form->error($_profile,'d_phone'); ?>
	                    	</span>
                    	</p>
                	</li>
                    <li><p><?php echo Yii::t('basket', 'postal_code'); ?>:
                            <span>
                                    <?php echo $form->textField($_profile,'postal_code'); ?>
                                    <?php echo $form->error($_profile,'postal_code'); ?>
                            </span>
                        </p>
                    </li>
                </ul>
                <div class="recovery">
                <a href="/<?php echo Yii::app()->language;  ?>/user/change"><?php echo Yii::t('user','change_password'); ?></a>
                </div>
                <?php if($updateClient->status != 1){ ?>
                <div class="wholesalers">
                <a href="/<?php echo Yii::app()->language;  ?>/user/wholesalers"><?php echo Yii::t('user','wholesalers'); ?></a>
                </div>
                <?php } else { ?>
                <p style="color: #fff;"><?php echo Yii::t('user','your_status'); ?>: <b><?php echo Yii::t('user','wholesale_customer'); ?></b>.</p>
                <?php } ?>
                <p style="color: #fff;border-bottom: 1px solid #fff;"><?php echo Yii::t('user','prof_date'); ?> - <?php echo $_user->created; ?></p>
                <button type="submit" name="sendprofiles"><?php echo Yii::t('user', 'save'); ?></button>
                <?php $this->endWidget(); ?>
                <br>
                <?php if($productAll) {?>
                <div class="another">
                    <p><?php echo Yii::t('user', 'new_collection'); ?></p>
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
  <!--           <div class="right_cabinet">
                <h4>заказы</h4>
                <p>Сумма:<span>256 260 грн.</span></p>
                <p>Всего заказов:<span>266</span></p>
                <table>
                    <tr class="names">
                        <td class="ordernumber">
                            <p>
                                Дата и № заказа
                            </p>
                        </td>
                        <td class="goods">
                            <p>
                                Товары
                            </p>
                        </td>
                        <td class="total">
                            <p>
                                Сумма
                            </p>
                        </td>
                        <td class="delivery">
                            <p>
                                Доставка
                            </p>
                        </td>
                        <td class="pay">
                            <p>
                                Оплата
                            </p>
                        </td>
                        <td class="state">
                            <p>
                                Статус
                            </p>
                        </td>
                    </tr>
                    <tr class="lots">
                        <td class="lot_number">
                            09.04.2015
                            № 12332233443
                        </td>
                        <td class="lot">
                            
                                <a href="#">C106A</a>
                                <a href="#">W10</a>
                                <a href="#">W25A</a>
                            
                        </td>
                        <td class="lot_total">25 000 грн</td>
                        <td class="lot_delivery">Доставлен</td>
                        <td class="lot_pay">Оплачен</td>
                        <td class="lot_state">Выполнен</td>
                    </tr>
                    <tr class="lots">
                        <td class="lot_number">
                            09.04.2015
                            № 12332233443
                        </td>
                        <td class="lot">
                            
                                <a href="#">C106A</a>
                                <a href="#">W10</a>
                                <a href="#">W25A</a>
                            
                        </td>
                        <td class="lot_total">25 000 грн</td>
                        <td class="lot_delivery">Доставлен</td>
                        <td class="lot_pay">Оплачен</td>
                        <td class="lot_state">Выполнен</td>
                    </tr>
                    <tr class="lots">
                        <td class="lot_number">
                            09.04.2015
                            № 12332233443
                        </td>
                        <td class="lot">
                            
                                <a href="#">C106A</a>
                                <a href="#">W10</a>
                                <a href="#">W25A</a>
                            
                        </td>
                        <td class="lot_total">25 000 грн</td>
                        <td class="lot_delivery">Доставлен</td>
                        <td class="lot_pay">Оплачен</td>
                        <td class="lot_state">Выполнен</td>
                    </tr>
                </table>
            </div> -->
        </div>
<?php } ?>