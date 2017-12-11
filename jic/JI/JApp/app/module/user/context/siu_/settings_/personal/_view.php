<?= $this->breadcrumbs() ?>


<br/>

<div class="FC BGTP">

<center>

	<form method="post" action="" class="CNT400">


		<div class="IT">
			<label><?= $form->string('Name') ?></label>
			<input type="text" name="<?= $form->fieldName('name') ?>" value="<?= $form->restore( 'name' ) ?>" />
			<?= $this->html()->showError( $form->error('name') ) ; ?>
		</div>


		<div class="options">
			<label><?= $form->string('Gender') ?></label>
			<select name="<?= $form->fieldName('gender') ?>" >
				<?php
					$g = $form->user()->read('gender');

					$sf = $sm = '';

					if( $g == 'female' )
					{
						$sf = 'selected="selected"';
					}
					else
					{
						$sm = 'selected="selected"';
					}
				?>
				<option value="male" <?= $sm ?> ><?= $form->string('Male') ?></option>
				<option value="female" <?= $sf ?> ><?= $form->string('Female') ?></option>
			</select>
		</div>


		<div class="IT VPad24">
		<button type="submit" class="button">
			<?= \app\components\Bar::I(30)->addClass('E')->T( $form->string('Save') )->done(); ?>
			<?= \app\components\Bar::I(30)->pl(24)->pr(18)->addClass('DB E')->icon('arrow_right', 30)->FR()->done(); ?>
		</button>
		</div>

</form>
</center>
</div>
