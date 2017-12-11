<?php  $s = $this->com('User')->c()->url('settings'); ?>

<?= \app\components\Breadcrumbs::I([
      'Settings' => '',
      ])->create()
;?>
<br/>
<div class="BGTP">
<div class="pad12" ><a href="<?= $s ?>/personal"><?= $this->com('Lipi')->p('Personal'); ?></a></div>
<div class="pad12" ><a href="<?= $s ?>/avatar"><?= $this->com('Lipi')->p('Avatar'); ?></a></div>
<div class="pad12" ><a href="<?= $s ?>/background"><?= $this->com('Lipi')->p('Background'); ?></a></div>
<div class="pad12" ><a href="<?= $s ?>/tagline"><?= $this->com('Lipi')->p('Tagline'); ?></a></div>
<div class="pad12" ><a href="<?= $s ?>/password"><?= $this->com('Lipi')->p('Password'); ?></a></div>
<div>
<br/>
