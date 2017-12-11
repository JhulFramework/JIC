<?php //$this->injectCss( array('form') ) ; ?>

<center>

<div class="FC CNT600 BGDark" >


	<div class="title" style="text-align:left;">Email Verification</div>
	Please enter the verification code which has been sent to email id <?= $form->account()->email()  ?>

<br/>
<br/>


<form action="" method="post" name="email-verification-form" class="CNT400">


	<div class="IT">
		<label> <?= $form->string('Verification Code') ?></label>
		<input type="text" name="<?= $form->fieldName( $form->verificationCodeKey ) ?>"  />
		<?= $form->error('vc') ; ?>
	</div>

	<div class="IT VPad24">
	<button type="submit" class="button">
		<?= \app\components\Bar::I(30)->addClass('E')->T( $this->getApp()->lipi()->t('Verify') )->done(); ?>
		<?= \app\components\Bar::I(30)->pl(24)->pr(18)->addClass('DB E')->icon('arrow_right', 30)->FR()->done(); ?>
	</button>
	</div>

	</form>

</div>

</center>
