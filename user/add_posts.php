<?php include "../includes/db.php";?>
<?php include "includes/user_header.php";?>
<?php include "includes/user_navigation.php";?>

<?php $author = $_SESSION['username'];?>

<?php
if (isset($_POST['create_post'])) {
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category_id'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    // $post_comment_count = 4;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts (post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags) ";

    $query .= "VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}' )";

    $create_post_query = mysqli_query($connection, $query);

    confirm($create_post_query);

}
?>


<section class="mt-3">
  <div class="container">
    <h1 class="display-4 font-weight-bold text-capitalize">create a post for your property</h1>
    <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. In non optio, laborum debitis voluptatem reiciendis ex amet dolorum animi eius.</p>

    <form action="" method="post" enctype="multipart/form-data" class="w-75">
      <div class="form-group">
        <label for="post_title" class="font-weight-bold">Post Title</label>
        <input type="text" name="post_title" id="" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="post_category_id" class="font-weight-bold">Post Category</label>
        <select name="post_category_id" id="" class="form-control" required>

<?php
$query = "SELECT * FROM category";
$select_categories = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_categories)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    echo "<option value='{$cat_id}'>{$cat_title}</option>";
}

?>
        </select>
      </div>

      <div class="form-group">
        <label for="post_author" class="font-weight-bold">Post Author</label>
        <input type="text" value = "<?php echo "$author"; ?>" name="post_author" id="" class="form-control" readonly>
      </div>

      <div class="form-group">
        <label for="post_image" class="font-weight-bold">Post Image</label>
        <br>
        <input type="file" name="image" id="" class="" required>
      </div>

      <div class="form-group">
        <label for="post_tags" class="font-weight-bold">Post Tags</label>
        <input type="text" name="post_tags" id="" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="post_content" class="font-weight-bold">Post Description</label>
        <textarea name="post_content" id="body" class="form-control" cols="30" rows="10"></textarea required  >
      </div>

      <div class="form-group d-flex row-reverse">
        <button class="btn btn-custom text-white" name="create_post" type="submit">Publish Post</button>
      </div>



    </form>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" ></script>
