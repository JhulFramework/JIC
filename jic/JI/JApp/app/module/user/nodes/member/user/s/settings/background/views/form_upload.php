<?= \app\components\Breadcrumbs::I([
      'Settings' => $this->com('User')->c()->url('settings'),
	'Background' => '',
      ])->create()
;?>

<?php
$this->injectCss('form_upload');
$this->com('Page')->renderCss('button') ;
?>


<div class="uform BGTP">
<form action="" method="post" enctype="multipart/form-data" class="CNT400">
	<span style="padding:6px 0; display:inline-block;"><?= $this->com('Lipi')->P('Select Image') ; ?></span>
	<span class="hide"><input type="file" name="<?= $form->name() ?>" /></span>
	<div><?= $form->error() ?></div>
	<?= $form->CSRFCheckField(); ?>

	<div class="VPad24">
	<button type="submit" class="button">
		<?= \app\components\Bar::I(30)->addClass('E')->T( $this->com('Lipi')->get('Upload') )->done(); ?>
		<?= \app\components\Bar::I(30)->pl(24)->pr(18)->addClass('DB E')->icon('upload', 20)->FR()->done(); ?>
	</button>
	</div>
</form>
</div>
