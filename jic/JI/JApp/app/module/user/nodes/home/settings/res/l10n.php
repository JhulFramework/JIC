<?= $this->breadcrumbs() ;?>

<br/>

<div class="FC BGTP">
<center>
<form method="post" action="" class="CNT400">

	<div class="title">Change Language</div>

		<div>
			Your Current Langauge is : <?= ucfirst($this->getApp()->lipi()->get($this->getApp()->user()->l10n(), 'name') ); ?>
		</div>

		<label for="language" >Select Language</lable>
		<select id="language" name="<?= $form->fieldName('l10n')?>" >
			<?= $this->html()->selectOptions( $this->getApp()->lipi()->map(), $this->getApp()->user()->l10n() ); ?>
		</select>

		<div class="IT VPad24">
		<button type="submit" class="button">
			<?= \app\components\Bar::I(30)->addClass('E')->T( $form->string('Save') )->done(); ?>
			<?= \app\components\Bar::I(30)->pl(24)->pr(18)->addClass('DB E')->icon('arrow_right', 30)->FR()->done(); ?>
		</button>
		</div>

</form>
</center>

</div>
