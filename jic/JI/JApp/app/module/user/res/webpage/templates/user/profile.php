<?= $this->getApp()->getFlash(); ?>



<figure class="snip1232">
  <div class="author">
    <img src="<?= $host->avatar() ; ?>" alt="sq-sample7"/>
    <h5><?= $host->name() ?></h5><span>LittleSnippets</span>
  </div>

  <blockquote><?= $host->tagline(); ?></blockquote>
</figure>

<br/>
<div class="clear"></div>
<div class="BGTP B H36"> <?= \app\components\Bar::I(36)->m(24)->T( $host->name() )->done()
 .\app\components\Bar::I(36)->PR(12)->icon( $host->gender(), 20 )->FR()->done();
?></div> <br/>

<div class="clear"></div>
