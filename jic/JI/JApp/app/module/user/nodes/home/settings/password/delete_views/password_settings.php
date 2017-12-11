<?php

	$this->com('Page')->renderCss(['button', 'form-container', 'text-field']) ;
?>

<?= \app\components\Breadcrumbs::I([
      'Settings' => $this->com('User')->c()->url('settings'),
	'Password' => '',
      ])->create()
;?>


<br/>

<div class="FC BGTP">
<center>
<form method="post" action="" class="CNT400">

	<div class="title">Change Password</div>

		<div class="IT">
			<label><?= $this->com('Lipi')->P( 'Password' ); ?></label>
			<input type="password" <?= $form->fieldName('oldPassword') ?> value="<?= $form->restore( 'oldPassword' ) ?>" />
			<?= $form->error('oldPassword') ; ?>
		</div>


		<div class="IT">
			<label><?= $this->com('Lipi')->P( 'New Password' ); ?></label>
			<input type="password" <?= $form->fieldName('newPassword') ?> value="<?= $form->restore( 'newPassword' ) ?>" />
			<?= $form->error('newPassword') ; ?>
		</div>

		<div class="IT">
			<label><?= $this->com('Lipi')->P( 'Retype New Password' ); ?></label>
			<input type="password" <?= $form->fieldName('confirm_password') ?> value="<?= $form->restore( 'confirm_password' ) ?>" />
			<?= $form->error('confirm_password') ; ?>
		</div>



		<?= $this->com('AntiCSRF')->field($form->name()) ; ?>

		<div class="IT VPad24">
		<button type="submit" class="button">
			<?= \app\components\Bar::I(30)->addClass('E')->T( $this->com('Lipi')->get('Change') )->done(); ?>
			<?= \app\components\Bar::I(30)->pl(24)->pr(18)->addClass('DB E')->icon('arrow_right', 30)->FR()->done(); ?>
		</button>
		</div>

</form>
</center>

</div>
