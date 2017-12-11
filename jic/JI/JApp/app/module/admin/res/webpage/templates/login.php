<div class="uk-section uk-background-secondary">
<div class="uk-container">

<div class="uk-margin-top uk-margin-bottom">
<h2 style="color:#ddd;"  >LOGIN</h2>
</div>
	<form class="uk-form-stacked" method="post" action=""  >

    <div class="uk-margin">
        <label class="uk-form-label" for="iname" style="color:#eee">INAME</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="iname" type="text" name="<?= $form->fieldName('iname')?>" >
        </div>
    </div>

    <div class="uk-margin">
	  <label class="uk-form-label" for="password" style="color:#eee">PASSWORD</label>
	  <div class="uk-form-controls">
		<input class="uk-input" id="password" type="password" name="<?= $form->fieldName('password')?>" >
	  </div>
    </div>


    <div class="uk-margin uk-padding-top">
    <button class="uk-button uk-button-primary" > LOGIN </button>
    </div>

</form>

</div>
</div>
