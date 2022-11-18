
<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "cse309contact";
$conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<?php
    $login = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $sql ="Select * from USERS where username = '$username' AND password = '$password'"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num==1){
     $login = true;
     session_start();
     $_SESSION['loggedin'] = true;
     $_SESSION['username'] = $username;
     header("location: AdminDashBoard.php");
    }

    else{
        $showError = "Passwords don't match!";
    }

  }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CSE309-Login</title>

    <style>

      body{
        background-color: #061f1c;
            background-image: url(bg1.png);
            background-position: fixed;
            background-size: cover; 
            background-repeat: no-repeat;
      }

      #username, #password{
            border: 1px solid #199f8b; 
            background-color: #0c4c43;
            border-radius: 0px;
            color: white;
      }
      .myc{
            margin-top: 100px;
            width: 60%;
        }
    </style>

  </head>
  <body class="text-white">


  <?php

    if($login){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    Success! You are logged in.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>' ;
    }

    if($showError){
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Sorry! Please check the password again.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>' ;
        }

    ?>

<!--**********************-->
<!--    navbar starts     -->
<!--**********************-->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0f4038">
    <div class="container">
      <img src="logo.png" alt="zerocode" width="120px">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="flex-row-reverse collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">

          <a class="nav-link" href="index.php" style="background-color: #199f8b; color: white; border-radius: 0px;">Index Page</a>
        </div>
      </div>
    </div>
  </nav>
<!--**********************-->
<!--    navbar ends       -->
<!--**********************--> 

    <div class="container myc" >

    <div class="row align-items-center">
        <div class="col-md-6 col-lg-6 col-12">
        <img src="login.png" alt="email" class="img-fluid" style="width: 100%; margin: 20px;   display: block;
            margin-left: auto;
            margin-right: auto;">
        </div>

        <div class="col-md-6 col-lg-6 col-12">
        <h2 class="text-center" style="margin-bottom: 40px;">Already have an account? Login Now! </h2>

            <form action="/CSE309 Contact/login.php" method = "POST">

            <div class="mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
            </div>
                
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" style="border-radius: 0px;" >Login</button>
                <a href="index.php" class="btn btn-success" tabindex="-1" role="button" style="border-radius: 0px;">Back</a>
            </div>

            </form> 
        </div>

    </div>

  </div>
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>