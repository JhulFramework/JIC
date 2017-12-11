<?php $this->embedStyleSheet('icons') ?>

<style type="text/css">
.uk-card
{
	background: #30363b;
}

.uk-card-header
{
	position: relative;
	top: -80px;
	margin-top: 80px;
}

.profile
{
	max-height: 120px;
}


.uk-card-body
{

}

.profile .name
{
	padding-top: 12px;
	font-size: 24px;
}

.tagline .uk-card-body
{
	font-size: 18px;
	color: #eee;
}

.tagline i
{
	padding: 6px;
	color: yellow;
}

img
{
	width: 120px;
	height: 120px;
	border-radius: 50%;
}

</style>

<div class="uk-section" >

<div class="uk-container">

<div class="uk-card uk-card-small profile uk-card-secondary uk-text-center">
    <div class="uk-card-header">
            <div>
                <img src="<?= $this->app()->user()->avatar() ?>">
            </div>
            <div class="name">
                <?= $this->app()->user()->name() ?>
            </div>
    </div>

</div>

</div>


<div class="uk-container uk-margin">

<div class="tagline uk-card uk-card-small uk-card-secondary uk-text-center" >
    <div class="uk-card-body">
      <i class="icon-quote-left"></i><?= $this->app()->user()->tagline() ?><i class="icon-quote-right"></i>
    </div>
</div>

</div>

</div>

<div class="uk-section"></div>
