<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Landing Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css"> <!-- Your custom CSS file -->
</head>

<body>
<nav class="navbar navbar-expand-lg sticky-top shadow">

        <div class="container">
            <a class="navbar-brand" href="index.php">My Blog</a>
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
                        <a class="nav-link" href="createblog.php">Create</a>
                    </li>
                    <li class="nav-item">
                        
                        <a class="nav-link" href="blog.php"> Blogs</a>
                    </li>
                    <li class="nav-item">
                        
                        <a class="nav-link" href="mypost.php">MY Post</a>
                    </li>
                    <?php
                    
                   include "functions.php";
                   protect();
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <header class="jumbotron jumbotron-fluid text-white bg-primary">
        <div class="container">
            <h1 class="display-4">Welcome to My Blog</h1>
            <p class="lead">Explore amazing articles and stories from our community.</p>
            <a href="blog.php" class="btn btn-light btn-lg">Read Our Blogs</a>
        </div>
    </header>

    <style>
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 20px;
    }

    h2 {
        color: #333;
    }

    p {
        color: #666;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

<div class="container">
    <div class="row p-4">
        <div class="col-md-6 card pt-5">
            <div class="">
                <div class="">
                    <h2>About Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu mattis odio. Phasellus eget
                        arcu ut mi tempus vehicula sit amet sed sapien.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <img src="images/about.jpeg" alt="About Us" class="card-img-top">
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6 card pt-5">
            <div class="">
                <div class="card-body">
                    <h2>Contact Us</h2>
                    <p>Feel free to contact us if you have any questions or feedback.</p>
                    <a href="#" class="btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <img src="images/contact.jpeg" alt="Contact Us" class="card-img-top">
            </div>
        </div>
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
