<?php $this->getApp()->mResource()->ui()->addCssFile( 'login_icons', __DIR__.'/icons' ); ?>
<center>

<div class="title_container"><span class="title fr" >Login</span></div>
<form action="" method="post" name="login-form" class="CNT400">


	<div class="field_container">
		<label ><i class="icon-user-outline"> </i> <?= $form->string('Usernamsdse') ?></label>
		<input type="text" name="<?= $form->fieldName('login_key') ?>" value="<?= $form->restore( 'login_key' ) ?>" />
		<div><?= $form->error('login_key') ; ?></div>
	</div>


	<div class="field_container">
		<label ><i class="demo-icon icon-lock-open-empty"> </i> <?= $form->string('Password') ?> </label>
		<input type="password" name="<?= $form->fieldName('password') ?>" value=""/>
		<div><?= $form->error('password') ; ?></div>

	</div>


	<input type="hidden" name="<?= $form->token()->fieldName() ?>" value="<?= $form->token()->value() ?>" />

	<?= $form->captcha()->field(); ?>


	<div class="button_two" >
		<button type="submit" ><?=\app\components\Bar::I(30)->T( 'LOGIN' )->done().
			\app\components\Bar::I([60, 30])->icon( 'arrow_right' , 30)->FR()->done()?></button>
	</div>

</form>

<div class="clear VPad12"></div>


<div class="B H36">
<?= \app\components\Bar::I([30, 50])
->link( $this->getApp()->url( 'register' ) )->p(12)->T( $form->string('Register') )

->link( $this->getApp()->url().'/recovery' )->p(12)->T( $form->string('Forgot Password ?') )
->FL()->done(); ?>
</div>



</center>


<?= $this->app()->m()->form( $form->fields() ); ?>

<div class=" uk-width-1-1 uk-width-large@s uk-align-center">
<form>
    <fieldset class="uk-fieldset">

        <legend class="uk-legend">Login</legend>

	  <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-text">Text</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="form-stacked-text" type="text" placeholder="Some text...">
        </div>
    </div>



        <div class="uk-margin">
            <textarea class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
        </div>

        <div class="uk-margin uk-grid-small uk-child-width-auto" uk-grid>
            <label><input class="uk-radio" type="radio" name="radio2" checked> A</label>
            <label><input class="uk-radio" type="radio" name="radio2"> B</label>
        </div>

        <div class="uk-margin uk-grid-small uk-child-width-auto" uk-grid>
            <label><input class="uk-checkbox" type="checkbox" checked> A</label>
            <label><input class="uk-checkbox" type="checkbox"> B</label>
        </div>

        <div class="uk-margin">
            <input class="uk-range" type="range" value="2" min="0" max="10" step="0.1">
        </div>

    </fieldset>
</form>

</div>
