<div class="uk-section" >
<div class="uk-container">

<?php foreach( $items as $item ) : ?>

<a href="<?= $this->app()->m('admin')->url( $item ) ?>" >
	<div class="uk-card uk-card-secondary uk-card-body">
                 <h3 class="uk-card-title"><?= ucfirst($item) ?></h3>
      </div>
</a>

<?php endforeach;  ?>

</div>

</div>
