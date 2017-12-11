<?php $this->getApp()->mResource()->ui()->addCssFile( 'kahani_list', __DIR__.'/style' );  ?>
<?php $this->getApp()->mResource()->ui()->linkGoogleFont('Yantramanav');  ?>
<div class="uk-section" >
	<?php foreach ($kahaniya as $k ): ?>
	<div class="uk-card uk-card-default uk-width-1-1 uk-margin" >

		<div class="uk-card-header" style="border-bottom: 1px dashed #363636;">

			<h3 class="uk-card-title uk-margin-remove-bottom" style="color:#ddd;font-family:Yantramanav" ><?= $k->name() ?></h3>
			<p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00"><?= $k->addedOn() ?></time></p>

		</div>

		<div class="uk-card-body">
			<p><?= $k->preview() ?> <b>. . .</b> </p>
		</div>

		<div class="uk-card-footer" style="border-top: 1px dashed #363636; font-weight:bold; letter-spacing:1px;" >
			<a href="<?= $k->url() ?>" class="uk-button uk-button-text uk-align-right" style="font-size:16px;" >कहानी पढ़े</a>
		</div>

	</div>
<?php endforeach; ?>
</div>
