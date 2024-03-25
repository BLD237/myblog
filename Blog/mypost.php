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
                    
                    <?php
                  
                  
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>MY POSTS</h2>
       
        
        <!-- Instruction 2: Replace the table with a loop to display contacts -->
        
        
        <!-- Instruction 3: Use anchor tags instead of buttons for edit and delete actions -->
       
        
        <!-- Placeholder for table (to be replaced with PHP loop) -->
        <table class="table">
            <thead>
                <tr>
                    <th>Blod title</th>
                    
                    <th>creation date</th>
                    <th>Actions</th>
                </tr>
            </thead>   
            <tbody>
            <?php

            include "functions.php";           
            myprotect();
?>  <!-- This part will be replaced with PHP loop to display contacts -->
                
                <!-- End of placeholder -->
            </tbody>
        </table>
    </div>
</body>
</html>