<?php 
include "functions.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && $_POST["action"] == "create") {
        // Create a new blog
        $id = $_SESSION["userid"];        
        $title = $_POST["title"];
        $content = $_POST["content"];
        $imgname = $_FILES['image']['name'];
        $image=$_FILES['image'];   
        $destination= 'uploads/' ;
        $target_file = $destination . basename( $image["name"]);
        //$extention = pathinfo($image['name'], PATHINFO_EXTENSION);           
        $upload = move_uploaded_file($image['tmp_name'], $target_file);
      
        if($upload){
          
        $result = createBlog($id, $title, $content, $imgname);
        if ($result) {
        // Blog created successfully
        header("Location: blog.php?r=blogged");
        exit;
        } else {
        // Error creating blog
        header("Location: create.php?r=blogged");
                                }            
                           
            }else{
                
              
               header('LOCATION: blog.php?r=failed');
               }
        }


     elseif (isset($_POST["action"]) && $_POST["action"] == "edit") {
        // Edit an existing blog
        $id = $_POST["id"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $image = $_FILES["image"]['name'];
        
        editBlog($id, $title, $content, $image);
        
    }
    
elseif (isset($_POST["action"]) && $_POST["action"] == "delete") {
        // Delete an existing blog
        $id = $_POST["id"];
        $result = deleteBlog($id);
        if ($result) {
            // Blog deleted successfully
            header("Location: index.php");
            exit;
        } else {
            // Error deleting blog
            echo "Error deleting blog.";
        }
    }
    else if(isset($_POST["action"]) && $_POST["action"] == "signup"){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];       

        signup($username, $email, $password);
    }

    else if(isset($_POST["action"]) && $_POST["action"] == "login"){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        login($username, $email, $password);
        function  checklog(){
            
        }
    } else if(isset($_POST["action"]) && $_POST["action"] == "comment"){
        $comment = $_POST["comment"];
        $blogid = $_GET['r'];
        $userid = $_SESSION['userid'];
        comment($blogid, $userid, $comment);
       //echo"$comment";

     
        
    }
}