<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="./index.php?controller=MotoController&action=homePage">Home</a>
        </li>
        <?php
          if (!empty($_SESSION['user'])) {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="./index.php?controller=AdminController&action=home">Admin Home</a>
            </li>
            <?php
          }
        ?>
      </ul>
    </div>
    <?php
      if (!empty($_SESSION['user'])) {
        ?>
        <div class="left">
          <a href="./index.php?controller=SecurityController&action=logout" class="btn btn-info">Log Out</a>
        </div>
        <?php
      } else {
        ?>
        <div class="left">
          <a href="./index.php?controller=SecurityController&action=login" class="btn btn-info">Log In</a>
        </div>
        <?php
      }
    ?>
  </div>
</nav>