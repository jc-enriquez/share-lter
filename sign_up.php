<?php include "includes/db.php";?>
<?php include "includes/header.php";?>


  <section class="row align-items-center">
    <div class="col-lg-6" id="signup-header">
      <div class="my-5">a</div>
      <div class="mt-5">a</div>
      <div class="mt-5">s</div>
      <h1 class="text-center text-white display-4 font-weight-bold mt-5">Share-lter</h1>
      <p class="text-white text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, corporis!</p>
      <div class="mt-5">a</div>
      <div class="mt-5">a</div>
      <div class="mt-5">a</div>
      <div class="mt-5">a</div>
      <div class="mt-5">a</div>
      <div class="mt-5">a</div>
      <p class="text-white text-uppercase text-center">powered by brocode</p>
    </div>
    <div class="col-lg-6">
      <div class="container h-100">
        <div class="row h-100 d-flex justify-content-center align-items-center">
          <div>
            <span><h1 class="display-4 font-weight-bold text-center">Registration</h1></span>
            <p class="text-muted text-center mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
          </div>

          <?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $username = mysqli_real_escape_string($connection, $username);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
    $firstname = mysqli_real_escape_string($connection, $firstname);
    $lastname = mysqli_real_escape_string($connection, $lastname);

    $query = "INSERT INTO users (username, user_email, user_password, user_firstname, user_lastname, user_role) ";
    $query .= "VALUES('{$username}','{$email}','{$password}','{$firstname}','{$lastname}','subscriber')";
    $register_user_query = mysqli_query($connection, $query);

    if (!$register_user_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}
?>
          <form action="" class="w-75 ml-5" method="post">
            <div class="mb-3 row">
              <label for="" class="col-sm-2 col-form-label font-weight-bold">First Name</label>
              <div class="col-sm-10">
                <input type="text" name="firstname" class="form-control bg-form-custom w-75" placeholder="Enter your First Name" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Last Name</label>
              <div class="col-sm-10">
                <input type="text" name="lastname" class="form-control bg-form-custom w-75" placeholder="Enter your Last Name" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="" class="col-sm-2 col-form-label font-weight-bold">Username</label>
              <div class="col-sm-10">
                <input type="text" name="username" class="form-control bg-form-custom w-75" placeholder="Enter your Username" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control bg-form-custom w-75" id="inputPassword" placeholder="Enter your Email" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Password</label>
              <div class="col-sm-10">
                <input type="password" name="password" class="form-control bg-form-custom w-75" id="inputPassword" placeholder="Enter your Password" required>
              </div>
            </div>
              <button name="submit" class="btn btn-custom text-white text-uppercase ml-4 my-3 py-3 px-5 rounded-pill w-75">Confirm</button>
          </form>
        </div>
        <p class="text-center mt-5"><a href="login.php" class="text-muted">Have an Account?</a></p>
      </div>
    </div>
  </section>

</body>
</html>
