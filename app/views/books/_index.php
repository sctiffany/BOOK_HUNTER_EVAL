<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php foreach($books as $book): ?>
    <article
    class="bg-gray-800 rounded-lg overflow-hidden shadow-lg relative"
    >
    <span
        class="bg-white text-gray-800 px-2 py-1 rounded-md text-sm font-semibold absolute top-2 left-2"
    >
        <?php echo $book['name'] ?>
    </span>
    <img
        class="w-full h-48 object-cover"
        src="<?php echo $book['cover']; ?>"
        alt="Movie Cover"
    />
    <div class="p-4">
        <div class="pb-4">
        <?php 
        include_once '../app/models/tagsModel.php';
        $tags = \App\Models\TagsModel\findAllByBookId($connexion, $book['bookID']);
        include '../app/views/books/_tags.php';
        
        ?>

        </div>
        <h3 class="text-xl font-bold"><?php echo \Core\Helpers\truncate($book['title'], 20) ; ?></h3>
        <h4 class="text mb-2 text-gray-400"><?php echo $book['firstname'] . " " . $book['lastname']; ?></h4>
        <div class="flex items-center mb-2">
        <span class="text-yellow-500 mr-1">
            <i class="fas fa-star"></i>
        </span>
        <span><?php echo round($book['moyenne_notation'], 1) ?></span>
        </div>

        <p class="text-gray-400">
        <?php echo \Core\Helpers\truncate($book['resume'], 50); ?>
        </p>

        <a
        href="?books=show&id=<?php echo $book['bookID']; ?>"
        class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
        >
        More details
        </a>
    </div>
    </article>
<?php endforeach; ?>
</div>