
<div class="uk-section form_background" >
<div class="uk-container">
<form action="" method="post" enctype="multipart/form-data">

	<div class="uk-margin">
		<label for="image_name">Image Name</label>
		<input class="uk-input uk-form-width-1-1" id="image_name" type="text" name="<?= $upload_form->fieldName('name') ?>"  placeholder="image name">
		<?= $upload_form->showError('name') ?>
       </div>



<div class="uk-margin">
<div class="test-upload uk-placeholder uk-text-center">
	<span uk-icon="icon: cloud-upload"></span>
	<span class="uk-text-middle">ADD IMAGE by dropping them here or</span>
	<div uk-form-custom>
	<input name="image" type="file">
	<span class="uk-link">Selecting One</span>
	</div>
</div>
	<?= $upload_form->showError('image') ?>
<progress id="progressbar" class="uk-progress" value="0" max="100" hidden></progress>
</div>


<div class="uk-margin">
     <label for="image_caption">Caption</label>
     <textarea class="uk-textarea uk-form-width-1-1" id="image_caption" name="<?= $upload_form->fieldName('caption') ?>"  placeholder="about image"><?= $upload_form->restore('caption') ?></textarea>
     <?= $upload_form->showError('caption') ?>
 </div>

<div class="uk-margin">
	<button class="uk-button uk-button-primary" type="submit">Upload</button>
 </div>

</form>

</div>
</div>
