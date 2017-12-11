<h2><?= $title ?></h2>

<?= validation_errors(); ?>
<?= form_open('news/create'); ?>
<label>Title</label>
<input type="text" name="title"/></br/>

<label>Text</label>
<textarea name="text"></textarea><br/>

<input type="submit" name="submit" value="create news item" />
</form>
