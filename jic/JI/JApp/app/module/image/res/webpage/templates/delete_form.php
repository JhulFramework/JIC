<div class="uk-section form_background">
<div class="uk-container">
<form action="" method="post" enctype="multipart/form-data">

<div class="uk-margin">
	<label for="delete_image_name">Name</label>
	<input class="uk-input uk-form-width-1-1" id="delete_image_name" type="text" name="<?= $delete_form->fieldName('name') ?>"  placeholder="enter the name of image to be deleted">
</div>

<div class="uk-margin">
	<label for="delete_image_key">Key</label>
	<input class="uk-input uk-form-width-1-1" id="delete_image_key" type="text" name="<?= $delete_form->fieldName('key') ?>"  placeholder="enter the key of image to be deleted">
</div>

<div class="uk-margin">
	<button class="uk-button uk-button-primary" type="submit">Delete</button>
 </div>

</form>

</div>
</div>
