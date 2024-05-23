<?php foreach($tags as $tag): ?>
    <a
        href="#"
        class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm font-semibold mr-2 hover:bg-gray-800 hover:text-white"
        ><?php echo $tag['name']; ?></a>
<?php endforeach; ?>