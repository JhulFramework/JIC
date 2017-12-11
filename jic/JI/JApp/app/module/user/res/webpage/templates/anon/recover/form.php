
<center>
<form method="post" action="" class="CNT400">

	<div class="title">Password Recovery</div>

		<div class="IT">
			<label><?= $form->string( 'New Password' ); ?></label>
			<input type="password" name="<?= $form->fieldName('newPassword') ?>" value="<?= $form->restore( 'newPassword' ) ?>" />
			<?= $this->html()->showError( $form->error('newPassword') ) ; ?>
		</div>

		<div class="IT">
			<label><?= $form->string( 'Confirm New Password' ); ?></label>
			<input type="password" name="<?= $form->fieldName('newPasswordConfirm') ?>" value="<?= $form->restore( 'newPasswordConfirm' ) ?>" />
			<?= $this->html()->showError( $form->error('newPasswordConfirm') ) ; ?>
		</div>

		<input type="hidden" name="<?= $form->token()->fieldName() ?>" value="<?= $form->token() ?>" />


		<button type="submit" class="button">
			<?= \app\components\Bar::I(30)->addClass('E')->T( $form->string('Send Reset Link') )->done(); ?>
			<?= \app\components\Bar::I(30)->pl(24)->pr(18)->addClass('DB E')->icon('arrow_right', 30)->FR()->done(); ?>
		</button>

</form>
</center>
