<?php
include "connect.php";
$id = $_GET['deleteid'];
include "functions.php";
deleteBlog($id);

?>
