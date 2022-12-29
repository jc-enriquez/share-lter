<?php include "../includes/db.php";?>
<?php include "includes/user_header.php";?>
<?php include "includes/user_navigation.php";?>


<section class="mt-3">
  <div class="container">
    <h1 class="display-4 font-weight-bold text-capitalize">edit post</h1>
    <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. In non optio, laborum debitis voluptatem reiciendis ex amet dolorum animi eius.</p>


<?php
if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = $the_post_id";

$select_posts_by_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_tags = $row['post_tags'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
}

if (isset($_POST['update_post'])) {

    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_title = $_POST['post_title'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if (empty($post_image)) {
        $query = "SELECT * posts WHERE post_id = $the_post_id";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($select_image)) {
            $post_image = $row['post_image'];
        }
    }

    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content ='{$post_content}', ";
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id = {$the_post_id} ";

    $update_post = mysqli_query($connection, $query);

    confirm($update_post);

}
?>

    <form action="" method="post" enctype="multipart/form-data" class="w-75">
      <div class="form-group">
        <label for="post_title" class="font-weight-bold">Post Title</label>
        <input type="text" value="<?php echo "$post_title"; ?>" name="post_title" id="" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="post_category_id" class="font-weight-bold">Post Category</label>
        <select name="post_category" id="" class="form-control" required>

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
        <input type="text" value="<?php echo "$post_author"; ?>" name="post_author" id="" class="form-control" readonly>
      </div>

      <div class="form-group">
        <label for="post_image" class="font-weight-bold">Post Image</label>
        <br>
        <input type="file" name="image" id="" class="" required>
      </div>

      <div class="form-group">
        <label for="post_tags" class="font-weight-bold">Post Tags</label>
        <input type="text" value="<?php echo "$post_tags"; ?>" name="post_tags" id="" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="post_content" class="font-weight-bold">Post Description</label>
        <textarea name="post_content" id="" class="form-control" cols="30" rows="10" required><?php echo "$post_content"; ?>
        </textarea>
      </div>

      <div class="form-group d-flex row-reverse">
        <button class="btn btn-custom text-white" name="update_post" type="submit">Update Post</button>
      </div>



    </form>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" ></script>
