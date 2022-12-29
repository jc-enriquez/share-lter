<?php ob_start();?>
<?php include "../includes/db.php";?>
<?php include "includes/user_header.php";?>
<?php include "includes/user_navigation.php";?>

<?php $author = $_SESSION['username'];?>

<section class="mt-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="display-4 font-weight-bold text-capitalize">your listings</h1>

      <!-- Search -->

    </div>
    <p class="text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic ipsa inventore omnis numquam velit optio dolorem facilis sequi aspernatur voluptas libero corrupti mollitia aut cupiditate saepe nostrum, nam illo quibusdam dolore repellendus ipsam suscipit minima ea voluptates! Molestiae, animi ipsum.</p>

    <div class="row">

<?php

$query = "SELECT * FROM posts WHERE post_author = '$author'";

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
            <h5 class="card-title mb-0 font-weight-bold"><?php echo $post_title ?></h5>
            <small class="text-muted">Posted by <?php echo $post_author ?> on: <?php echo $post_date ?> ID: <?php echo $post_id ?></small>
            <p class="card-text mt-2"><?php echo $post_content ?></p>
            <a href="edit_post.php?p_id=<?php echo $post_id ?>" class="btn btn-warning mr-2 text-white"><i class="fa-solid fa-pen mr-1"></i> Edit Post</a>
            <a href="view_posts.php?delete=<?php echo $post_id ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can mr-1"></i> Delete Post</a>
          </div>
      </div>
    </div>
<?php }?>
</div>

<?php
if (isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = $the_post_id";
    $delete_query = mysqli_query($connection, $query);
    header("Location: view_posts.php");

}
?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" ></script>

