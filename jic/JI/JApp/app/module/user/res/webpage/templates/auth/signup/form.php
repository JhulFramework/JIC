<?php $this->uix()->linkGoogleFont('Delius+Unicase'); ?>


<center>

<div class="FC CNT600 BGDark ">

<form method="post" action="" class="CNT400">

	<?php $this->uix()->com('ms')->formTitle('SIGN UP'); ?>


	<div class="title"><?= $form->string('New Account') ?></div>


		<div class="IT">
			<label><?= $form->string('Name') ?></label>
			<input type="text" name="<?= $form->fieldName('name') ?>" value="<?= $form->restore( 'name' ) ?>" />
			<?= $form->error('name', true) ; ?>
		</div>

		<div class="IT">
			<label><?= $form->string('Email') ?></label>
			<input type="text" name="<?= $form->fieldName('email') ?>" value="<?= $form->restore( 'email' ) ?>" />
			<?= $form->error('email', true) ; ?>
		</div>

		<div class="IT">
			<label><?= $form->string('Password') ?></label>
			<input type="password" name="<?= $form->fieldName('password') ?>" value=""/>
			<?= $form->error('password', true) ; ?>
		</div>

		<input type="hidden" name="<?= $form->token()->fieldName(); ?>" value="<?= $form->token() ?>" />

		<?= \app\components\GUI::I()->form_button( $form->string( 'Register') ) ?>

</form>


<div class="VPad24"></div>
<div class="B H36">
<?= \app\components\Bar::I(30)
->link( $this->getApp()->url('login') )->p(12)
->T( $form->string('Login') )->FL()->done();
?>
</div>


</div>
</center>
