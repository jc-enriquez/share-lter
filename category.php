<?php include "includes/db.php";?>
<?php include "includes/header.php";?>

<nav class="navbar navbar-expand-lg navbar-light py-4">
  <div class="container">
    <a class="navbar-brand font-weight-bold" href="index.php">Share-lter</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"     data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="listings.php">Listings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sign_up.php">Sign Up</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<section class="mt-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="display-4 font-weight-bold text-capitalize">find the right place for you</h1>

      <!-- Search -->
      <form class="form-inline" action="search.php" method="post">
        <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-dark my-2 my-sm-0" name="submit"type="submit">Search</button>
      </form>

      <div class="dropdown">
        <button class="btn btn-custom text-white dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-filter"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <?php

$query = "SELECT * FROM category";
$select_all_categories_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];
    echo "<button class='dropdown-item'><a href='category.php?category=$cat_id'class = 'text-dark'>{$cat_title}</a></button>";

}
?>
        </div>
      </div>

    </div>
    <p class="text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic ipsa inventore omnis numquam velit optio dolorem facilis sequi aspernatur voluptas libero corrupti mollitia aut cupiditate saepe nostrum, nam illo quibusdam dolore repellendus ipsam suscipit minima ea voluptates! Molestiae, animi ipsum.</p>

    <div class="row">

<?php

if (isset($_GET['category'])) {
    $post_category_id = $_GET['category'];
}

$query = "SELECT * FROM posts WHERE post_category_id = $post_category_id";

$select_all_posts_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
    $post_id = $row['post_id'];
    $post_title = substr($row['post_title'], 0, 30);
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = substr($row['post_content'], 0, 50);

    ?>

    <div class="col-lg-4 mb-3">
      <div class="card">
          <img src="images/<?php echo $post_image ?>" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title mb-0 font-weight-bold"><a class="text-dark" href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a></h5>
            <small class="text-muted">Posted by <?php echo $post_author ?> on: <?php echo $post_date ?></small>
            <p class="card-text mt-2"><?php echo $post_content ?></p>
            <a href="#" class="btn btn-custom text-white">Read More <i class="fa-solid fa-eye ml-1"></i></a>
          </div>
      </div>
    </div>
<?php }?>
</div>

</section>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" ></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/script.js"></script>
