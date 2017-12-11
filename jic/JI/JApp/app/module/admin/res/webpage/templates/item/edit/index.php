<div class="uk-section">
	<div class="uk-grid">
	<?php foreach ($form->mField()->get() as $name => $param ) : ?>
		<div class="uk-width-1-1"><div class="uk-button"><?= $name ?></div> <a href="<?= $this->encode($form->entity()->adminURL( $name ) )?>" class="uk-button uk-align-right">EDIT</a></div>
		<div class="uk-width-1-1" ><?= $this->html()->encode(  $form->restore($name ) ) ;?></div>
	<?php endforeach; ?>
	</div>
</div>
