<?= $this->breadCrumbs(); ?>

<br/>

<div class="FC BGTP">
<center>
<form method="post" action="" class="CNT400">


		<div class="TA">
			<label><?= $form->string('Tagline') ?></label>
			<textarea name="<?= $form->fieldName('tagline') ?>" rows="6" > <?= $form->restore( 'tagline' ) ?> </textarea>
			<?=  $this->html()->showError( $form->error('tagline') ) ; ?>
		</div>

		<div class="VPad24">
		<button type="submit" class="button">
			<?= \app\components\Bar::I(30)->addClass('E')->T( $form->string('Save') )->done(); ?>
			<?= \app\components\Bar::I(30)->pl(24)->pr(18)->addClass('DB E')->icon('arrow_right', 30)->FR()->done(); ?>
		</button>
		</div>


</form>
</center>
</div>
