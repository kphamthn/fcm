<nav class="navbar navbar-inverse" style="margin-bottom:40px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">
         <?php if(isset($_SESSION["username"])): ?>
            Hallo, <?= $_SESSION["username"]; ?>
            
          <?php else: ?>
            Hallo, guest
          <?php endif; ?>

      </a>
    </div>
    

  </div>
</nav>
      