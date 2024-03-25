<?php
/*
$x = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus bibendum urna ut ligula porttitor congue.";
$slice = strlen($x);
echo $slice;


    include "connect.php";

if(isset($_GET['r'])){
    $id = $_GET['r'];
    echo "$id";
    $sql = "SELECT * FROM `blogs` WHERE `id` = $id";
    $results = $dbconnect -> query($sql);
    while($row = $results->fetch_assoc()){
        $id = $row['id'];
        $title = $row['title'];
        $content = $row['content'];
        $image = $row['image'];
        
    }
    echo "$title";
   
    
}
      
$result = createBlog($title, $content, $image);
if ($result) {
    // Blog created successfully
    header("Location: index.php");
    exit;
} else {
    // Error creating blog
    echo "Error creating blog.";
}
var_dump($upload);
die();*/

   

while ($row = $result->fetch_assoc())

?>