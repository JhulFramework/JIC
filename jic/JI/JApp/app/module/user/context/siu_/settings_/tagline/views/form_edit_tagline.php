<?php

	$this->com('Page')->renderCss(['button', 'textarea', 'form-container']) ;
?>

<?= \app\components\Breadcrumbs::I([
      'Settings' => $this->com('User')->c()->url('settings'),
	'Tagline' => '',
      ])->create()
;?>

<br/>

<div class="FC BGTP">
<center>
<form method="post" action="" class="CNT400">


		<div class="TA">
			<label><?= $this->com('Lipi')->P('Tagline') ?></label>
			<textarea <?= $form->fieldName('tagline') ?> rows="6" > <?= $form->restore( 'tagline' ) ?> </textarea>
			<?= $form->error('tagline') ; ?>
		</div>


		<?= $this->com('AntiCSRF')->field($form->name()) ; ?>

		<div class="VPad24">
		<button type="submit" class="button">
			<?= \app\components\Bar::I(30)->addClass('E')->T( $this->com('Lipi')->get('Change') )->done(); ?>
			<?= \app\components\Bar::I(30)->pl(24)->pr(18)->addClass('DB E')->icon('arrow_right', 30)->FR()->done(); ?>
		</button>
		</div>


</form>
</center>
</div>
