<?php $this->embedCss(); ?>
<div uk-grid>
	<div class="uk-width-expand"><div class="uk-button uk-button-secondary">Manage Images</div></div>
	<div class="uk-width-auto"><button uk-toggle="#upload_form" class="uk-button uk-button-primary">ADD IMAGE</button></div>
</div>

<div id="upload_form" <?= $upload_form->visibility(); ?>>
<?php require( __DIR__.'/upload_form.php' ); ?>
</div>


<!-- listing images -->
<div class="uk-section uk-background-primary" style="background:#333;">

<div class="uk-grid-small uk-flex-middle" uk-grid>

<?php foreach ($images as $image): ?>
<div>

<div class="uk-card uk-card-secondary uk-card-small">
	<div class="uk-card-header">
		NAME : <?= $image->name() ?>
	</div>
	<div class="uk-card-body" style="">
		<div style="max-height:200px;max-width:200px;overflow:hidden;"><img style="max-width:200px;" src="<?= $image->url() ?>"></div>
	</div>
	<div class="uk-card-footer">
		KEY : <?= $image->key() ?>
	</div>
	<div class="uk-card-footer" style="font-size:12px;">
		<div style="max-width:200px;">
		URL : <?= $image->url() ?>
		</div>
	</div>
</div>

</div>

<?php endforeach; ?>

</div>
</div>


<div uk-grid>
	<div class="uk-width-1-1">
	<a class="uk-button uk-button-primary uk-align-right"  href="#delete_form" uk-scroll>DELETE IMAGE</a>
	</div>
</div>

<div id="delete_form">
	<?php require( __DIR__.'/delete_form.php' ); ?>
</div>
