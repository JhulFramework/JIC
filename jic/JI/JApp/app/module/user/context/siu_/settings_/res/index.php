<?php
	$s = $this->getApp()->user()->url('settings');

	$labels = $this->getApp()->lipi()->t
	([
	 	'personal'=>'Personal',  'avatar' => 'Avatar', 'background' => 'Background', 'tagline' => 'Tagline', 'password' => 'Password', 'language' => 'Language',
	]);
?>

<?= $this->breadcrumbs(); ?>

<br/>
<div class="BGTP">
	<div class="pad12" ><a href="<?= $s ?>/?a=avatar"><?= $labels['avatar']; ?></a></div>
	<div class="pad12" ><a href="<?= $s ?>/?a=background"><?= $labels['background']; ?></a></div>
	<div class="pad12" ><a href="<?= $s ?>/?a=language"><?= $labels['language']; ?></a></div>
	<div class="pad12" ><a href="<?= $s ?>/?a=password"><?= $labels['password']; ?></a></div>
	<div class="pad12" ><a href="<?= $s ?>/?a=personal"><?= $labels['personal'] ?></a></div>
	<div class="pad12" ><a href="<?= $s ?>/?a=tagline"><?= $labels['tagline']; ?></a></div>
<div>
<br/>
