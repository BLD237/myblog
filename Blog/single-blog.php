<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css"> <!-- Your custom CSS file -->
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top shadow">

        <div class="container">
            <a class="navbar-brand" href="#">My Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="jumbotron jumbotron-fluid text-white bg-primary">
        <div class="container">
            <h1 class="display-4">Blog</h1>
            <p class="lead">Explore amazing articles and stories from our community.</p>

        </div>
    </header>


    <div class="container mt-4">
        <div class="row">
           
        
                    <?php
    include "connect.php";

if(isset($_GET['r'])){
    $id = $_GET['r'];
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

    ?> 
        <div class="col-lg-8">
                <div class="card">
                    <img src="uploads/<?php echo"$image"?>" class="card-img-top" alt="Blog Image">
                    <div class="card-body"> 
    
    <h2 class="card-title"><?php echo"$title"?></h2>
                        <p class="card-text"><?php echo"$content"?> </p>
                        <?php
                          include 'comment.php';
                        ?>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <span class="text-muted">Likes:<?php echo "$likes"?></span>
                            </div>
                            <div class="col">
                                <span class="text-muted">Views: <?php echo "$views"?></span>
                            </div>
                        </div>
                    </div>
                </div>
              
                <div class="card mt-4">
                    <div class="card-body">
                        <h4>Comments</h4>
                        <?php
                        
                    $id = $_GET['r'];
                    include 'connect.php';
                    $id = $_GET['r'];
                    
                    include 'functions.php';
                    selectcomment($id);
                        ?>
                    </div>
 
</div>
            </div>
            <div class="col-lg-4">
                <!-- Sidebar -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Related Blogs</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="#">Related Blog 1</a></li>
                            <li class="list-group-item"><a href="#">Related Blog 2</a></li>
                            <li class="list-group-item"><a href="#">Related Blog 3</a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Sidebar -->
            </div>
        </div>
    </div>


    <footer class="py-4 bg-dark text-white">
        <div class="container text-center">
            <p>&copy; 2024 BLD. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
';