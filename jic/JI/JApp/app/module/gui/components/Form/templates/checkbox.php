<div class="uk-margin">
	<label class="uk-form-label" for="<?= $form->mField()->id( $field_name ) ?>"> <?= $form->mField()->label( $field_name ) ?></label>
	<div class="uk-form-controls">
		<?php foreach ( $form->getOptions( $field_name ) as $option):?>

			<label><input class="uk-checkbox" name="<?= $form->fieldName( $field_name ) ?>[]" value="<?= $option->key() ?>" type="checkbox"> <?= $option->name() ?></label>
		<?php endforeach; ?>

	</div>
</div>
