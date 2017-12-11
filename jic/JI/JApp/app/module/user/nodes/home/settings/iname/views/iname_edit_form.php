
<?php $this->com('Page')->renderCss('common_form'); ?>

<div class="fwrap">


	<form action="" method="post" name="login-form">
	<div><b> Please CHOOSE IName CAREFULLY. Changes will be permanent and you will not be able to chage it Again </b></div>

	<ul>

		<li>
			<label><?= $this->com('Lipi')->get('IName') ?></label>
			<input type="text" name="<?= $form->name() ?>" value="<?= $form->restore( 'iName' ) ?>" />
			<?= $form->error('iName') ; ?>
		</li>

		<?= $form->CSRFCheckField(); ?>

		<li> <input type="submit" value="<?= $this->com('Lipi')->get('Save') ?> " class="btn" /> </li>
		
	</ul>

	</form>

</div><!--mform-->

