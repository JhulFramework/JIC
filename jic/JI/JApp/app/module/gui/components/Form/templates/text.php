<div class="uk-margin">
	<label class="uk-form-label" for="<?= $form->mField()->id( $field_name ) ?>"> <?= $form->mField()->label( $field_name ) ?></label>
	<div class="uk-form-controls">
		<input class="uk-input" id="<?= $form->mField()->id( $field_name ) ?>" type="text" name="<?= $form->fieldName( $field_name ) ?>"  value="<?= $form->restore( $field_name ) ?>" />
	</div>
</div>
