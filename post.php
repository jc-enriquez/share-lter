<?php include "./includes/db.php";?>
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

<?php

if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
$select_all_posts_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    ?>
  <div class="container mt-5">
    <h1 class="display-4 text-capitalize"><?php echo $post_title ?></h1>
    <p class="text-muted">by <?php echo $post_author ?></p>
    <p class="text-muted"> <?php echo $post_date ?></p>
    <img src="./images/<?php echo $post_image ?>" alt="" class="img-fluid w-100">

    <hr>
    <p class="mt-3"><?php echo $post_content ?></p>


<?php }?>
</div>

<?php
if (isset($_POST['create_comment'])) {
    $the_post_id = $_GET['p_id'];
    $comment_author = $_POST['comment_author'];
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];

    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";

    $query .= " VALUES($the_post_id,'{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";

    $create_comment_query = mysqli_query($connection, $query);

    if (!$create_comment_query) {
        die('QUERY FAILED' . mysqli_error($connection));
    }

    $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
    $query .= "WHERE post_id = $the_post_id ";

    $update_comment_count = mysqli_query($connection, $query);
}
?>
<form action="" method="post" class="container">
      <div class="form-group">
        <label for="" class="text-capitalize font-weight-bold">Name</label>
        <input type="text" class="form-control" name="comment_author" required>
      </div>
      <div class="form-group">
        <label for="" class="text-capitalize font-weight-bold">Email</label>
        <input type="email" class="form-control" name="comment_email" required>
      </div>
      <div class="form-group">
        <label for="" class="text-capitalize font-weight-bold">leave a comment:</label>
        <textarea name="comment_content" id="" class="form-control" required></textarea>
      </div>
      <button class="btn btn-custom text-white" type="submit" name="create_comment">Submit</button>
      <hr>
    </form>
<div class="container">
<h3 class="font-weight-bold my-4">Comments:</h3>
<?php
$query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
$query .= "AND comment_status = 'approved' ";
$query .= "ORDER by comment_id DESC";

$select_comment_query = mysqli_query($connection, $query);
if (!$select_comment_query) {
    die('QUERY FAILED' . mysqli_error($connection));
}

while ($row = mysqli_fetch_array($select_comment_query)) {
    $comment_date = $row['comment_date'];
    $comment_content = $row['comment_content'];
    $comment_author = $row['comment_author'];
    ?>

      <div class="border p-3 mb-2">
        <h4 class="font-weight-bold mb-0"><?php echo $comment_author; ?></h4> <span><?php echo $comment_date; ?></span>
        <p><?php echo $comment_content; ?></p>
      </div>



<?php }?>

</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" ></script>