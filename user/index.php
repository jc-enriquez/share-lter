<?php include "../includes/db.php";?>
<?php include "includes/user_header.php"?>
<?php include "includes/user_navigation.php"?>


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
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "";
}

if ($page == "" || $page == 1) {
    $page_1 = 0;
} else {
    $page_1 = ($page * 5) - 5;
}

$post_query_count = "SELECT * FROM posts";
$find_count = mysqli_query($connection, $post_query_count);
$count = mysqli_num_rows($find_count);

$count = ceil($count / 5);

$query = "SELECT * FROM posts LIMIT $page_1, 6";

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
          <img src="../images/<?php echo $post_image ?>" class="card-img-top" alt="">
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

<div class="container d-flex justify-content-center mt-2 fixed-bottom">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <?php
for ($i = 1; $i <= $count; $i++) {
    if ($i == $page) {
        echo "<li class='page-item'><a class='page-link text-dark active_link' href='index.php?page={$i}'>{$i}</a></li>";
    } else {
        echo "<li class='page-item'><a class='page-link text-dark' href='index.php?page={$i}'>{$i}</a></li>";
    }

}
?>
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" ></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/script.js"></script>

