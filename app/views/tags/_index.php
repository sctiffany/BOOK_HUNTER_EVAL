<ul class="list-reset">
<?php
include_once '../app/models/tagsModel.php';
$tags = \App\Models\TagsModel\findAll($connexion); 
foreach ($tags as $tag): ?>
<li class="inline-block">
    <a class="text-gray-300 hover:text-white text-<?php 
    if ($tag['nb_livres_par_tag'] == 0) {
        echo "sm ";
    }

    elseif ($tag['nb_livres_par_tag'] == 1) {
        echo "md ";
    }

    elseif ($tag['nb_livres_par_tag'] == 2) {
        echo "lg ";
    }

    elseif ($tag['nb_livres_par_tag'] == 3) {
        echo "xl ";
    }

    elseif ($tag['nb_livres_par_tag'] == 4) {
        echo "2xl ";
    }

    elseif ($tag['nb_livres_par_tag'] == 5) {
        echo "3xl ";
    }
    ?>" href="?tags=show&id=<?php echo $tag['id']; ?>"><?php echo $tag['name']; ?></a>
</li>
<?php endforeach; ?>
</ul>