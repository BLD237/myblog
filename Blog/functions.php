<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
function gets(){
    if($_GET){
        if($_GET["r"] == "email"){
            echo'
            <div class="alert-success">
            <p><strong>ALERT:</strong>email already in use.</p>
        </div>';
        }
        if($_GET["r"] == "signup"){
        echo'
        <div class="alert-success">
                <p><strong>ALERT:</strong> Resgistered sucessfully.</p>
            </div>';   
                  }
        if($_GET["r"] == "incorrect"){
        echo' <div class="alert-success">
        <p><strong>ALERT:</strong>Incorrect password.</p>
    </div>';          
 }
 if($_GET["r"] == "nouser"){
    echo' <div class="alert-success">
    <p><strong>ALERT:</strong>User not found.</p>
</div>';          
          }
          if($_GET["r"] == "login"){
            session_start();
            echo' <div class="alert-success">
            <p><strong>WELCOME.</strong></p>
        </div>';          
                  }    
                  if($_GET["r"] == "unsuported"){
                    echo' <div class="alert-success">
                    <p><strong>Unsurpported image.</strong></p>
                </div>';          
                          }  
       if($_GET["r"] == "blogged"){
       echo' <div class="alert-success">
       <p><strong>Blog created.</strong></p>
       </div>';          
           }    
        if($_GET["r"] == "notlogged"){
        echo' <div class="alert-success">
        <p><strong>Login in other to create blog.</strong></p>
        </div>';          
                }             
        }
}

function signup($username, $email, $password){
    include "connect.php";
    $temp = $email;
    $sql = "SELECT * FROM  `users` where `email` = '$temp'";
    $results = $dbconnect -> query($sql);  
    if($results -> num_rows > 0){
        header("LOCATION: ../Blog/signup.php?r=email");
    
    }else{
        $password = md5($password);       
        $sql = "INSERT INTO `users`(`username` , `email`, `password`) 
        VALUES('$username', '$email', '$password')";
         $results = $dbconnect->query($sql);  
         if($results > 0){
            header("LOCATION: ../Blog/login.php?r=signup");
         }  

    }
}
function login($username, $email, $password){
    include "connect.php";
  $sql = "SELECT * FROM `users` WHERE `email`= '$email' ";
  $results = $dbconnect -> query($sql);
  if($results -> num_rows > 0){
    while($rows = $results->fetch_object()){
        $dbid = $rows -> id;
        $dbusername = $rows -> username;
        $dbemail =   $rows -> email;
        $dbpassword = $rows -> password;
        if($dbpassword == md5($password)){
            session_start();
            $_SESSION['userid']   = $dbid;
            $_SESSION['username'] =   $dbusername;
            $_SESSION['password'] = $dbpassword;
            $_SESSION['email']    = $dbemail;
            header("LOCATION: ../Blog/index.php?r=login");
            
        }else{
            header("LOCATION: ../Blog/login.php?r=incorrect");


        }
            }
      }else{
        header("LOCATION: ../Blog/login.php?r=nouser");


      }
}   
function checklogin(){
        if(isset($_SESSION["username"])){
        return 1;

    }else{
        return 0;
        
    }
}

function protect(){
    $login = checklogin();
    if($login > 0){
        echo'
        <li class="nav-item">
        <a class="nav-link" href="logout.php">logout</a>
    </li>';

    }else{
        echo '
        <li class="nav-item">
        <a class="nav-link" href="login.php">login</a>
    </li>';
    }
}
function commentprotect($id){
    $login = checklogin();
    if($login > 0){
      include "comment.php";

    }else{
       include 'message.php';
    }

}
function myprotect(){
    $login = checklogin();
    if($login > 0){
      include "post.php";

    }else{
       include 'message.php';
    }

}
function logout(){
session_start();
session_destroy();
header("LOCATION:  index.php");
exit();
}
function createprotect(){
    $check = checklogin();
    if($check > 0){  
        header("LOCATION:  create.php");      

    }else{
        header("LOCATION:  login.php?=notlogged");

    }
}
function createBlog($id,$title, $content, $imgname){
include "connect.php";
$sql = "INSERT INTO `blogs`(`user_id`, `title`, `content`, `image`, `likes`, `views`)
        VALUES('$id','$title', '$content', '$imgname', 0, 0)";
        $results = $dbconnect -> query($sql);

        if($results > 0){
            return 1;

        }else{
            return 0;            
        }
}
function myblogs(){   
    include'connect.php';
    $id = $_SESSION['userid'];
    $sql = "SELECT * FROM blogs WHERE user_id = $id";
    $result = $dbconnect->query($sql);
    while($row = $result->fetch_assoc()){
        $id = $row['id'];
             
        echo "<tr>
                <td>" .$row["title"] ."</td>
                <td>" .$row["created_at"] ."</td>            
                <td>
                <!-- Placeholder buttons (to be replaced with anchor tags) -->
                <a href='edit.php?updateid=$id' class='btn btn-primary'>Edit</a>
                <a href='delete.php?deleteid=$id'class='btn btn-danger'>Delete</a>                     </td>"
                ;    
           }     
    }
function singleblog(){
    include "connect.php";
    if(isset($_GET['r'])){
        $id = $_GET['r'];
        $title;
        $content;
        $image;
        $likes;
        $sql = "SELECT * FROM `blogs` WHERE `id` = $id";
        $results = $dbconnect -> query($sql);
        while($row = $results->fetch_assoc()){
            $id = $row['id'];
            $title = $row['title'];
            $content = $row['content'];
            $image = $row['image'];  
            $views = $row['views'];
            $likes = $row['likes']; } 
        }
        $views = $views+1;
        $sql = "UPDATE  `blogs` SET `views` = $views WHERE `id` = $id";
        $results = $dbconnect -> query($sql);
} 
function blogs(){
    include "connect.php";
    $sql = "SELECT * FROM `blogs` ORDER BY created_at ASC  ";
    $results = $dbconnect -> query($sql);
        
        while($row = $results->fetch_assoc()){
            $id = $row['id'];
            $title = $row['title'];
            $content = $row['content'];
            $image = $row['image'];
            $time = $row['created_at'];
            $len = strlen ($content);
            if($len > 108){
                $content = substr($content, 0 , 108);
            }else{
                $content = $content;
            }
        
echo "
<div class='col-md-4 mb-4'>
<div class='card h-100'>
    <img src='uploads/$image' class='card-img-top' alt='Blog Image'>
    <div class='card-body'>
        <h5 class='card-title'>$title</h5>
        <p class='card-text'>$content......</p>
        <h5>$time</h5>
        <a href='single-blog.php?r=$id' class='btn btn-primary'>View Details</a>
    </div>
</div>
</div>
        ";
    }
}   
    
function editBlog($id, $title, $content, $image){
    include "connect.php";
    $sql = "UPDATE blogs SET `title` = '$title', `content` ='$content', `image` =' $image' WHERE `id` = $id  ";
$result = $dbconnect -> query($sql);
if ($result) {
    // Blog edited successfully
    header("Location: mypost.php?r=edited");
    exit;
} else {
    // Error editing blog
    echo "Error editing blog.";
}


}
function deleteBlog($id){

    include "connect.php";
    $sql = "DELETE FROM blogs WHERE id = $id";
$results = $dbconnect -> query($sql);
if($results){
    header('LOCATION: mypost.php?r=deleted');
}else{
    header('LOCATION: mypost.php?r=faileddelete');
}



}
function comment($blogid, $userid, $comment){
    include "connect.php";
    $sql = "INSERT INTO `comments`(`blog_id`, `user_id`, `comment`)
    VALUES('$blogid', '$userid', '$comment')";
$results = $dbconnect -> query($sql);
if($results){
header("LOCATION:  single-blog.php?r=$blogid");
} else{
header("LOCATION: single-blog.php?r=$blogid&&er=error");
}      
}
function selectcomment($id){
include 'connect.php';
$id = $_GET['r'];
$sql="SELECT c.comment, u.username
FROM comments c
INNER JOIN users u ON c.user_id = u.id
WHERE c.blog_id =$id;";
$results = $dbconnect -> query($sql);

while($row = $results -> fetch_assoc()){
    $username = $row['username'];
    $comment = $row['comment'];                    
      echo"
        <div class='media mt-3'>
            <img src='https://via.placeholder.com/64' class='mr-3 rounded-circle' alt='User Image'>
            <div class='media-body'>
                <h5 class='mt-0'>$username</h5>
                $comment.
            </div>
        </div>
        ";
    
}




}



