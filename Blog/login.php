<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>login</title>
</head>
<body>
  
    <br>
    <div class="container">
    <?php
  include "functions.php";
  gets();


?>
        <center>
 <form  class="form"  action="action.php" method="post" >
    <h1>Login</h1>
    <div class="col">
      <input type="text" class="form-control" placeholder="@USERNAME" required name="username" >
    </div>
    <br>
    <br>
    <div class="col">
      <input type="email" class="form-control" placeholder="@EMAIL" required name="email" >
    </div>
    <br><br>
    <div class="col">
      <input type="password" class="form-control" placeholder="@PASSWORD" required name="password" >
    </div><br>
    <a href="signup.php">signup</a>
    <div class="col">
     <button name="action" value="login" class="btn btn-primary"  >Login</button>
    </div>
    
    
</form>
</center>
</div>
</body>
</html>