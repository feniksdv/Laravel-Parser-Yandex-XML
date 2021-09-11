<h1>Все категории</h1>
<br>
<?php foreach($categories as $category): ?>
    <div>
        <strong><a href="<?=route('category.show', [
                'id' => $category['id']
            ])?>"><?=$category['title']?></a></strong>
        <p><?=$category['description']?></p>
    </div>
<?php endforeach; ?>
