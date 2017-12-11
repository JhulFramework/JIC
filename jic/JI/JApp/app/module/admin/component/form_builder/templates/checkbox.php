<div class="uk-margin">
	<label class="uk-form-label" for="<?= $form->mField()->id( $field_name ) ?>"> <?= $form->mField()->label( $field_name ) ?></label>
	<div class="uk-form-controls">
		<?php

		$selected_options = $form->selectedOptions();

		foreach ( $form->getOptions( $field_name ) as $option):
			$checked = '';
			if( isset( $selected_options[ $option->key() ] ) )
			{
				$checked = 'checked';
			}
			?>


			<label><input class="uk-checkbox" name="<?= $form->fieldName( $field_name ) ?>[]" value="<?= $option->key() ?>" type="checkbox" <?= $checked ?> /> <?= $option->name() ?></label>
		<?php endforeach; ?>

	</div>
</div>
