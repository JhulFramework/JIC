<div class="uk-card uk-card-body uk-card-default">

	<form action ="" method="post">
		<fieldset class="uk-fieldset">

			<legend class="uk-legend">Add Item</legend>


			<?= $this->getApp()->m('admin')->formBuilder()->build( $item_add_form ); ?>

			<div class="uk-margin" >
				<button class="uk-button uk-button-primary" type="submit" >ADD</button>
			</div>

		</fieldset>
      </form>

</div>
