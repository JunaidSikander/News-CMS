<?php include "header.php";
if (isset($_POST['submit'])) {
    include "config.php";

//  mysqli_real_escape_string used to save from injecting javascript scripts validate from special characters
    $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
    $fname = mysqli_real_escape_string($connection, $_POST['f_name']);
    $lname = mysqli_real_escape_string($connection, $_POST['l_name']);
    $user = mysqli_real_escape_string($connection, $_POST['username']);
//$password = mysqli_real_escape_string($connection, md5($_POST['password']));
    $role = mysqli_real_escape_string($connection, $_POST['role']);

    $QUERY_UPDATE = "UPDATE user SET first_name = '{$fname}', last_name = '{$lname}', username = '{$user}', role = '{$role}' WHERE user_id = '{$user_id}' ";
    $result_update = mysqli_query($connection, $QUERY_UPDATE);

    if(mysqli_query($connection, $QUERY_UPDATE))
        header("Location: {$hostname}/admin/users.php");
    else
        die('Query Failed');
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Modify User Details</h1>
            </div>
            <div class="col-md-of fset-4 col-md-4">
                <?php
                include "config.php";

                $user_id = $_GET['id'];
                $QUERY = "SELECT * FROM user WHERE user_id = '{$user_id}'";
                $result = mysqli_query($connection, $QUERY);
                if (mysqli_num_rows($result) > 0) {
                    while ($user = mysqli_fetch_assoc($result)) {
                        ?>
                        <!-- Form Start -->
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="user_id" class="form-control"
                                       value="<?php echo $user['user_id']; ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="f_name" class="form-control"
                                       value="<?php echo $user['first_name']; ?>" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="l_name" class="form-control"
                                       value="<?php echo $user['last_name']; ?>" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="username" class="form-control"
                                       value="<?php echo $user['username']; ?>" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>User Role</label>
                                <select class="f orm-control" name="role" value="<?php echo $user['role']; ?>">
                                    <?php
                                    if ($user['role'] == 1)
                                        echo '<option value="0">normal User</option>
                                        <option selected value="1">Admin</option>';
                                    else
                                        echo '<option selected value="0">normal User</option>
                                        <option value="1">Admin</option>';
                                    ?>
                                </select>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Update" required/>
                        </form>
                    <?php }
                }
                ?>
                <!-- /Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>