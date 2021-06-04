<?php include "header.php";

if ($_SESSION['user_role'] == '0')
    header("Location: {$hostname}/admin/post.php");
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
