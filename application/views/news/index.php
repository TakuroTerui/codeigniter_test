<h2><?php echo $title; ?></h2>
<p><a href="<?php echo site_url('news/create'); ?>">新規作成</a></p>
<?php foreach ($news as $news_item): ?>

    <h3><?php echo $news_item['title']; ?></h3>
    <div class="main">
        <?php echo $news_item['text']; ?>
    </div>
    <p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>
    <p><a href="<?php echo site_url('news/edit/'.$news_item['id']); ?>">編集</a></p>
    <?php echo form_open('news/delete/'.$news_item['id']); ?>
        <button type="submit">削除</button>
    </form>

<?php endforeach; ?>