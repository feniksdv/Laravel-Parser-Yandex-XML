<?php foreach($newsList as $news): ?>
    <div>
        <strong><a href="<?=route('news.show', [
                'id' => $news['id']
            ])?>"><?=$news['title']?></a></strong>
        <p><?=$news['description']?></p>
    </div>
<?php endforeach; ?>
