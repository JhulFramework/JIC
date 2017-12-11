<?= $this->embedStyleSheet('index'); ?>
<?php if( !empty( $item_add_form ) ): ?>
<div  uk-grid style="background:#eee">
	<div class="uk-width-1-1 "> <button uk-toggle="target: #add_page" class="uk-align-right uk-button uk-button-default" type="button">Add ITEM</button> </div>
</div>

<div id="add_page" <?= $item_add_form->visibility() ?>>
<?php require( __DIR__.'/add_form.php' ) ?>
</div>
<?php endif; ?>

<!-- item list section -->

<div class="uk-section">

<div class="uk-grid-small uk-flex-middle" uk-grid>
<?php foreach($items as $item ) : ?>
<div>
	<div class="uk-card uk-card-default uk-card-small">
	<div class="uk-card-header">
	<b># <?= $item->key() ?></b> <?= $item->name() ?>
	</div>

    <div class="uk-card-footer">
	<a href="<?= $item->adminURL() ?>" class="uk-button">EDIT</a>
    </div>
</div>

</div>
<?php endforeach; ?>
</div>

</div>


<!-- delete form section-->
<?php if( !empty( $item_delete_form ) ): ?>
<div uk-grid>
	<div class="uk-width-1-1">
	<a class="uk-button uk-button-primary uk-align-right"  href="#delete_form" uk-scroll>DELETE Item</a>
	</div>
</div>

<div id="delete_form">
	<?php require( __DIR__.'/delete_form.php' ); ?>
</div>

<?php endif; ?>
