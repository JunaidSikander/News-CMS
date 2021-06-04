<?php
include "config.php";
session_start();
if (!isset($_SESSION['username']))
    header("Location: {$hostname}/admin/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ADMIN Panel</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header-admin">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class="col-md-2">
                <a href="post.php"><img class="logo" src="images/news.jpg"></a>
            </div>
            <!-- /LOGO -->

            <div class="col-md-offset-8 col-md-2 text-white bg-dark">
                <!--USERNAME-->
                <h4 style="color: #FFF">Hello <?php echo $_SESSION['username'] ?></h4>
                <!--/USERNAME-->

                <!-- LOGO-Out -->
                <a href="logout.php" class="admin-logout">Logout<i style="color: #FFF; margin-left: 10px"
                                                                   class="fa fa-sign-out"></i></a>
                <!-- /LOGO-Out -->
            </div>
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="admin-menubar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="admin-menu">
                    <li>
                        <a href="post.php">Post</a>
                    </li>
                    <?php
                    if ($_SESSION['user_role'] == '1') {
                        ?>
                        <li>
                            <a href="category.php">Category</a>
                        </li>
                        <li>
                            <a href="users.php">Users</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
