<?php
include "config.php";

if ($_SESSION['user_role'] == '0')
    header("Location: {$hostname}/admin/post.php");

$user_id = $_GET['id'];

$QUERY = "DELETE FROM user WHERE user_id = '{$user_id}'";

if(mysqli_query($connection, $QUERY))
    header("Location: {$hostname}/admin/users.php");
else
    echo "<p style='color: red; margin: 10px 0;'>Can\'t Delete the user Record.</p>";

mysqli_close($connection);

?>