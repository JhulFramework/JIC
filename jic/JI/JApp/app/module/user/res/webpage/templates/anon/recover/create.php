
<br/>

<div class="FC BGTP">
<center>
<form method="post" action="" class="CNT400">

	<div class="title">Password Recovery</div>

		<div class="IT">
			<label><?= $form->string( 'Email' ); ?></label>
			<input type="email" name="<?= $form->fieldName('email') ?>" value="<?= $form->restore( 'email' ) ?>" />
			<?= $this->html()->showError( $form->error('email') ) ; ?>
		</div>


		<input type="hidden" name="<?= $form->token()->fieldName() ?>" value="<?= $form->token() ?>" />

		<div class="IT VPad24">
		<button type="submit" class="button">
			<?= \app\components\Bar::I(30)->addClass('E')->T( $form->string('Send Reset Link') )->done(); ?>
			<?= \app\components\Bar::I(30)->pl(24)->pr(18)->addClass('DB E')->icon('arrow_right', 30)->FR()->done(); ?>
		</button>
		</div>

</form>
</center>

</div>
