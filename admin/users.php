<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <?php
                if(mysqli_num_rows($result) > 0)
                    echo '<h1 class="admin-heading">All Users</h1>';
                else
                    echo '<h1 class="admin-heading">No User Found</h1>';
                ?>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-user.php">add user</a>
            </div>
            <div class="col-md-12">
                <?php include "config.php";

                $QUERY = "SELECT * FROM user ORDER BY user_id DESC";
                $result = mysqli_query($connection, $QUERY);

                if (mysqli_num_rows($result) > 0) {
                    ?>
                    <table class="content-table">
                        <thead>
                        <th>S.No.</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </thead>
                        <tbody>
                        <?php while ($user = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td class='id'><?php echo $user['user_id']; ?></td>
                                <td><?php echo $user['first_name'] . " " . $user['last_name']; ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php
                                    if($user['role'] == 1)
                                        echo "Admin";
                                    else
                                        echo "Normal";
                                    ?></td>
                                <td class='edit'><a href='update-user.php?id=<?php echo $user['user_id'] ?>'><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='delete-user.php?id=<?php echo $user['user_id'] ?>'><i class='fa fa-trash-o'></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
