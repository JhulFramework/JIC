Hellow News

<?php foreach( $news as $news_item ): ?>
	<h3><?= $news_item['title'] ?></h3>
	<div><?= $news_item['text'] ?></div>
	<p><a href="<?= site_url( 'news/'.$news_item['slug'] ) ?>" >Read Full</a></p>
<?php endforeach; ?>
