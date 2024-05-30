<ul class="list-reset">
<?php
include_once '../app/models/tagsModel.php';
$tags = \App\Models\TagsModel\findAll($connexion); 
foreach ($tags as $tag): ?>
<li>
    <a class="text-gray-300 hover:text-white" href="?tags=show&id=<?php echo $tag['id']; ?>"><?php echo $tag['name']; ?></a>
</li>
<?php endforeach; ?>
</ul>