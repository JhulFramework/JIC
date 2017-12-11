<?php
	$s = $this->app()->url('settings');

	$labels = $this->getApp()->lipi()->t
	([
	 	'personal'=>'Personal',  'avatar' => 'Avatar', 'background' => 'Background', 'tagline' => 'Tagline', 'password' => 'Password', 'language' => 'Language',
	]);
?>

<?= $this->breadcrumbs(); ?>

<br/>
<div class="BGTP">
	<?php foreach ($settings as $key => $value): ?>

	<div class="pad12" ><a href="<?= $s ?>/?a=<?= $key ?>"><?= $labels[$key]; ?></a></div>

	<?php endforeach; ?>
<div>
<br/>
