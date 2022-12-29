<?php include "user_header.php"?>

<nav class="navbar navbar-expand-lg navbar-light py-4">
  <div class="container">
    <a class="navbar-brand font-weight-bold" href="index.php">Share-lter</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"     data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    </div>

    <div class="dropdown">
        <button class="btn text-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-user-large"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="./add_posts.php">Create Post</a>
          <a class="dropdown-item" href="./view_posts.php">View Posts</a>
          <a class="dropdown-item" href="./view_posts.php"> <?php echo $_SESSION['firstname'];
echo " ";
echo $_SESSION['lastname']; ?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../includes/logout.php">Logout</a>
        </div>
    </div>
  </div>
</nav>
