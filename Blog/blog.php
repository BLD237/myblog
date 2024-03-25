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
                        <a class="nav-link" href="create.php">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">logout</a>
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

    <div class="container">
    <h2 class="text-center mb-4">Latest Blogs</h2>
    <div class="row">
      <?php
include "functions.php";
gets();
blogs();
?>

       
    </div>
</div>
</<div>    
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
