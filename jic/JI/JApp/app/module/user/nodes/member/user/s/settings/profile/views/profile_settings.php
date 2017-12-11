<?php $this->injectCss( [

	\app\common\views\View::I()->loadCSS('form'),

]); ?>

<div class="fwrap">

<form method="post" action="">

	<div class="title">New Account</div>	
	<ul>
		
		<li>
			<label>About me</label>
			<textarea <?= $form->fieldName('aboutMe') ?> ><?= $form->restore( 'aboutMe' ) ?></textarea>
		</li>

		<li>
			<label>Wanna Be</label>
			<textarea <?= $form->fieldName('wannaBe') ?> ><?= $form->restore( 'wannaBe' ) ?></textarea>
		</li>

		<li>
			<label>Life Is</label>
			<textarea <?= $form->fieldName('lifeIs') ?> ><?= $form->restore( 'lifeIs' ) ?></textarea>
		</li>

		<li>
			<label>Likes</label>
			<textarea <?= $form->fieldName('likes') ?> ><?= $form->restore( 'likes' ) ?></textarea>
		</li>


		<li>
			<label>Dislikes</label>
			<textarea <?= $form->fieldName('dislikes') ?> ><?= $form->restore( 'dislikes' ) ?></textarea>
		</li>


		<?=  $this->com('AntiCSRF')->field( $form->name() ) ; ?>

		<li><input type="submit" class="btn" value="Save" <?= $form->fieldName('submit') ?> /></li>
		
	</ul>

</form>

</div>

