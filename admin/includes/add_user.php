
<?php include "includes/admin_header.php";?>
<?php include_once "includes/admin_navigation.php";?>

<?php
if (isset($_POST['create_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];
    // $post_tags = $_POST['post_tags'];
    // $post_content = $_POST['post_content'];
    // $post_date = date('d-m-y');
    // $post_comment_count = 4;

    // move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO users (user_firstname ,user_lastname ,user_role, username,user_email,user_password) ";

    $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}' )";

    $create_user_query = mysqli_query($connection, $query);

}
?>


<section class="mt-3">

    <h1 class="display-4 font-weight-bold text-capitalize">create a new user</h1>
    <form action="" method="post" enctype="multipart/form-data" class="w-75">
      <div class="form-group">
        <label for="user_firstname" class="font-weight-bold">First Name</label>
        <input type="text" name="user_firstname" id="" class="form-control" required>
      </div>



      <div class="form-group">
        <label for="" class="font-weight-bold">Last Name</label>
        <input type="text" name="user_lastname" id="" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="" class="font-weight-bold">Role</label>
        <select name="user_role" id="" class="form-control">
          <option value="subscriber">Select Options</option>
          <option value="admin">Admin</option>
          <option value="subscriber">Subscriber</option>
        </select>
      </div>

      <!-- <div class="form-group">
        <label for="post_image" class="font-weight-bold">Post Image</label>
        <br>
        <input type="file" name="image" id="" class="">
      </div> -->

      <div class="form-group">
        <label for="username" class="font-weight-bold">Username</label>
        <input type="text" name="username" id="" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="email" class="font-weight-bold">Email</label>
        <input type="email" name="user_email" id="" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="user_password" class="font-weight-bold">Password</label>
        <input type="password" name="user_password" id="" class="form-control" required>
      </div>


      <div class="form-group d-flex">
        <button class="btn btn-danger text-white" name="create_user" type="submit">Add User</button>
      </div>
    </form>

</section>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" ></script>
