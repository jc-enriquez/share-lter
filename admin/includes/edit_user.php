
<?php include "includes/admin_header.php";?>
<?php include_once "includes/admin_navigation.php";?>

<?php

if (isset($_GET['edit_user'])) {

    $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM users WHERE user_id = $the_user_id";
    $select_users_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_users_query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }

}

if (isset($_POST['edit_user'])) {
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

    $query = "UPDATE users SET ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_role = '{$user_role}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password ='{$user_password}' ";
    $query .= "WHERE user_id = {$the_user_id} ";

    $edit_user_query = mysqli_query($connection, $query);

    confirm($edit_user_query);
}
?>


<section class="mt-3">

    <h1 class="display-4 font-weight-bold text-capitalize">update a user account</h1>
    <form action="" method="post" enctype="multipart/form-data" class="w-75">
      <div class="form-group">
        <label for="user_firstname" class="font-weight-bold">First Name</label>
        <input type="text" value="<?php echo $user_firstname ?>" name="user_firstname" id="" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="" class="font-weight-bold">Last Name</label>
        <input type="text" value="<?php echo $user_lastname ?>" name="user_lastname" id="" class="form-control" required>
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
        <input type="text" value="<?php echo $username ?>" name="username" id="" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="email" class="font-weight-bold">Email</label>
        <input type="email" value="<?php echo $user_email ?>" name="user_email" id="" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="user_password" class="font-weight-bold">Password</label>
        <input type="password" name="user_password" value="<?php echo $user_password ?>" id="" class="form-control" required>
      </div>


      <div class="form-group d-flex">
        <button class="btn btn-danger text-white" name="edit_user" type="submit">Save Changes</button>
      </div>
    </form>

</section>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" ></script>
