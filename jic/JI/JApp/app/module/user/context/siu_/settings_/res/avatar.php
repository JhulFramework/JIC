<?= $this->breadcrumbs() ?>

<br/>
<div class="uform">

<form action="" method="post" enctype="multipart/form-data" class="CNT400">
	<span style="padding:6px 0; display:inline-block;"> <?= $form->string('Select Image') ?></span>
	<span class="hide"><input type="file" name="inputImage" /></span>
	<div><?= $form->error('avatar' ) ?></div>
	<input type="hidden" name="<?= $form->token()->fieldName() ?>" value="<?= $form->token() ?>" />

	<div class="VPad24"
	<button type="submit" class="button">
		<?= \app\components\Bar::I(30)->addClass('E')->T( $form->string('Upload') )->done(); ?>
		<?= \app\components\Bar::I(30)->pl(24)->pr(18)->addClass('DB E')->icon('upload', 20)->FR()->done(); ?>
	</button>
	</div>

</form>

</div>
