<?= $this->breadcrumbs() ?>
<?php $this->ui()->addJSFile( 'avatar_upload', __DIR__.'/script' ); ?>

<br/>
<div class="uform">

<form action="" method="post" enctype="multipart/form-data" class="CNT400">
	<span style="padding:6px 0; display:inline-block;"> <?= $form->string('Select Image') ?></span>
	<span class="hide"><input type="file" name="avatar" /></span>
	<div><?= $form->error('avatar' ) ?></div>
	<input type="hidden" name="<?= $form->token()->fieldName() ?>" value="<?= $form->token() ?>" />

	<div class="VPad24">
	<button type="submit" class="uk-button uk-button-primary "> Upload </button>
	</div>

</form>

</div>
