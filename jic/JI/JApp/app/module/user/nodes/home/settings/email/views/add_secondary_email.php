<?php $this->injectCss( [

	\app\common\views\View::I()->loadCSS('form'),

]); ?>

<div class="fwrap">

<form method="post" action="">

	<ul>

		<li>
			<label>Secondary Email</label>
			<input type="text" <?= $form->fieldName('email') ?> value="<?= $form->restore( 'email' ) ?>" />
			<?= $form->error('email') ; ?>
		</li>


		<?= $this->com('AntiCSRF')->field($form->name()) ; ?>

		<li><input type="submit" class="btn" value="Save" /></li>

	</ul>

</form>

</div>
