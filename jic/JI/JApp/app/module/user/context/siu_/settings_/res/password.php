<?= $this->breadcrumbs() ;?>

<br/>

<div class="FC BGTP">
<center>
<form method="post" action="" class="CNT400">

	<div class="title">Change Password</div>

		<div class="IT">
			<label><?= $form->string( 'Password' ); ?></label>
			<input type="password" name="<?= $form->fieldName('password_old') ?>" value="<?= $form->restore( 'password_old' ) ?>" />
			<?= $this->html()->showError( $form->error('password_old') ) ; ?>
		</div>


		<div class="IT">
			<label><?= $form->string( 'New Password' ); ?></label>
			<input type="password" name="<?= $form->fieldName('password_new') ?>" value="<?= $form->restore( 'password_new' ) ?>" />
			<?= $this->html()->showError( $form->error('password_new') ) ; ?>
		</div>

		<div class="IT">
			<label><?= $form->string( 'Retype New Password' ); ?></label>
			<input type="password" name="<?= $form->fieldName('password_new_confirm') ?>" value="<?= $form->restore( 'password_new_confirm' ) ?>" />
			<?= $this->html()->showError( $form->error('password_new_confirm') ) ; ?>
		</div>

		<input type="hidden" name="<?= $form->token()->fieldName() ?>" value="<?= $form->token() ?>" />

		<div class="IT VPad24">
		<button type="submit" class="button">
			<?= \app\components\Bar::I(30)->addClass('E')->T( $form->string('Save') )->done(); ?>
			<?= \app\components\Bar::I(30)->pl(24)->pr(18)->addClass('DB E')->icon('arrow_right', 30)->FR()->done(); ?>
		</button>
		</div>

</form>
</center>

</div>
