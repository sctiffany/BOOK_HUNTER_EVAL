<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include_once '../app/views/templates/partials/_head.php'; ?>
  </head>
  <body class="bg-gray-900 text-white font-sans leading-normal tracking-normal">
    <!-- Header -->
    <?php include_once '../app/views/templates/partials/_nav.php'; ?>

    <!-- Main -->
    <div class="container mx-auto flex flex-wrap pt-4 pb-12 text-white">
        
      <!-- Aside -->
      <?php include_once '../app/views/templates/partials/_aside.php'; ?>

      <!-- Main content -->
      <?php include_once '../app/views/templates/partials/_main.php'; ?>
    </div>

    <!-- Footer -->
    <?php include_once '../app/views/templates/partials/_footer.php'; ?>
  </body>
</html>
