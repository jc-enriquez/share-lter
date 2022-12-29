<?php include "includes/header.php";?>
<?php include "includes/db.php";?>
<?php session_start();?>

<?php
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $select_user_query = mysqli_query($connection, $query);

    if (!$select_user_query) {
        die('QUERY FAILED' . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($select_user_query)) {

        $db_id = $row['user_id'];
        $db_username = $row['username'];
        $db_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];

    }

    if ($username !== $db_username && $password !== $db_password) {
        header("Location: login.php");
    } else if ($username == $db_username && $password == $db_password && $db_user_role == 'subscriber') {
        $_SESSION['user_id'] = $db_id;
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
        header("Location: ./user");
    } else if ($username == $db_username && $password == $db_password && $db_user_role == 'admin') {
        header("Location: ./admin");
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
    } else {
        header("Location: login.php");
    }

}
?>
  <section class="row" id="login-header">
    <div class="col-lg-6">
      <div class="mt-5 pt-5"></div>
      <div class="mt-5 pt-5"></div>
      <div class="text-center mt-5 pt-5">
        <p class="text-muted mb-0">Welcome Back!</p>
        <span><h1 class="display-4 font-weight-bold">Login your Account</h1></span>

        <div class="container">
        <form class="mx-auto w-75" method = "post" id="login_form">
          <div class="justify-content-center align-items-center">
            <div class="form-group ml-5">
              <input type="text" name="username" class="form-control w-75 ml-5" id="exampleFormControlInput1" placeholder="Enter your username" required data-parsley-patter="^[a-zA-z]+$]" data-parsely-trigger="keyup">
            </div>
            <div class="form-group ml-5">
              <input name="password" type="password" class="form-control w-75 ml-5" id="exampleFormControlInput1" placeholder="Password" required>
            </div>
            <button name ="login" class="btn btn-custom text-white w-75 rounded-pill p-3" type="submit">Login</button>
          </div>
        </form>
        <p class="text-muted mt-4"><a class="text-muted" href = "sign_up.php">Create New Account?</a></p>
        <div class="mt-5 pt-5"></div>
        <div class="mt-5 pt-5"></div>
        <div class="mt-5 pt-5"></div>
        <p class="text-muted mt-4">Powered by Brocode</p>
        </div>
        </div>
    </div>
    <div class="col-lg-6">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/images/login-header-1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/images/login-header-2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/images/login-header-3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </button>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" ></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/script.js"></script>

</body>
</html>
