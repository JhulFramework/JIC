<?php $this->getApp()->mResource()->ui()->addCssFile( __DIR__.'/icons.css' ); ?>
<center>
<div class="form_style_two CNT400" >
<div class="title_container"><span class="title fr" >Login</span></div>
<form action="" method="post" name="login-form" class="CNT400">


	<div class="field_container">
		<label ><i class="icon-user-outline"> </i> <?= $form->string('Usernamsdse') ?></label>
		<input type="text" name="<?= $form->fieldName('login_key') ?>" value="<?= $form->restore( 'login_key' ) ?>" />
		<div><?= $form->error('login_key') ; ?></div>
	</div>


	<div class="field_container">
		<label ><i class="demo-icon icon-lock-open-empty"> </i> <?= $form->string('Password') ?> </label>
		<input type="password" name="<?= $form->fieldName('password') ?>" value=""/>
		<div><?= $form->error('password') ; ?></div>

	</div>


	<input type="hidden" name="<?= $form->token()->fieldName() ?>" value="<?= $form->token()->value() ?>" />

	<?= $form->captcha()->field(); ?>



	<div class="button_two" >
		<button type="submit" ><?=\app\components\Bar::I(30)->T( 'LOGIN' )->done().
			\app\components\Bar::I([60, 30])->icon( 'arrow_right' , 30)->FR()->done()?></button>
	</div>

</form>

<div class="clear VPad12"></div>


<div class="B H36">
<?= \app\components\Bar::I([30, 50])
->link( $this->getApp()->url( 'register' ) )->p(12)->T( $form->string('Register') )

->link( $this->getApp()->mURL()->get( 'password_reset' ) )->p(12)->T( $form->string('Forgot Password ?') )
->FL()->done(); ?>
</div>


</div>
</center>
