<form action="" method="post" class="mt-4">
                          <div class="form-group">
                              <label for="" class="font-weight-bold">Edit Category Title</label>

<?php
$query = "SELECT * FROM category";
$select_categories = mysqli_query($connection, $query);

if (isset($_GET['edit'])) {

    $cat_id = $_GET['edit'];

    $query = "SELECT * FROM category WHERE cat_id = $cat_id";
    $select_categories_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories_id)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        ?>

        <input value="<?php if (isset($cat_title)) {echo $cat_title;}?>"type="text" class="form-control w-50" placeholder="Update a Category Title" name="cat_title">

<?php }}?>

<?php

//Update Query
if (isset($_POST['update_category'])) {
    $the_cat_title = $_POST['cat_title'];
    $query = "UPDATE category SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";
    $update_query = mysqli_query($connection, $query);

    if (!$update_query) {
        die('QUERY FAILED' . mysqli_error($connection));
    }
}
?>

                          </div>
                          <button type="submit" name="update_category" class="btn btn-danger">Edit Category</button>
                        </form>