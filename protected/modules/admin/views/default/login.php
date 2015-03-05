<div id="login-box" class="login-box visible widget-box no-border">
	<div class="widget-body">
		<div class="widget-main">
			<h4 class="header blue lighter bigger">
				<i class="icon-coffee green"></i>
				Добро пожаловать!
			</h4>

			<div class="space-6"></div>

			<?php
			$form = $this->beginWidget('CActiveForm', array(
				'id'=>'loginform',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
				'htmlOptions'=>array(
					'class'=>'form-vertical'
				)
			) );
			?>
				<fieldset>
					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<?php echo $form->textField($model,'username', array('class'=>'form-control', 'placeholder'=>'Имя')); ?>
							<?php echo $form->error($model,'username', array('inputContainer' => 'div.login')); ?>
							<i class="icon-user"></i>
						</span>
					</label>

					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<!--<input type="password" class="form-control" placeholder="Password">-->
							<?php echo $form->passwordField($model,'password', array('class'=>'form-control', 'placeholder'=>'Пароль')); ?>
							<?php echo $form->error($model,'password', array('inputContainer' => 'div.login')); ?>
							<i class="icon-lock"></i>
						</span>
					</label>

					<div class="space"></div>

					<div class="clearfix">
						<!--<label class="inline">
							<input type="checkbox" class="ace">
							<span class="lbl"> Remember Me</span>
						</label>-->

						<!--<button type="button" class="width-35 pull-right btn btn-sm btn-primary">
							<i class="icon-key"></i>
							Login
						</button>-->
						<?php echo CHtml::submitButton('Войти', array('class'=>'width-35 pull-right btn btn-sm btn-primary'))?>
					</div>

					<div class="space-4"></div>
				</fieldset>
			<?php $this->endWidget(); ?>
<!-- 
			<div class="social-or-login center">
				<span class="bigger-110">Or Login Using</span>
			</div>

			<div class="social-login center">
				<a class="btn btn-primary">
					<i class="icon-facebook"></i>
				</a>

				<a class="btn btn-info">
					<i class="icon-twitter"></i>
				</a>

				<a class="btn btn-danger">
					<i class="icon-google-plus"></i>
				</a>
			</div> -->
		</div><!-- /widget-main -->

		<!--<div class="toolbar clearfix">
			<div>
				<a href="#" onclick="show_box('forgot-box'); return false;" class="forgot-password-link">
					<i class="icon-arrow-left"></i>
					I forgot my password
				</a>
			</div>

			<div>
				<a href="#" onclick="show_box('signup-box'); return false;" class="user-signup-link">
					I want to register
					<i class="icon-arrow-right"></i>
				</a>
			</div>
		</div>-->
	</div><!-- /widget-body -->
</div>