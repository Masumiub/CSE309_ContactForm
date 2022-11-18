<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "cse309contact";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>

<?php
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
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

    <title>CSE309 - Admin DashBoard</title>

    <style>
        body{
            /* background-color:rgb(191, 227, 248); */
            background-color: #061f1c;
            background-image: url(bg1.png);
            background-position: fixed;
            background-size: cover; 
            background-repeat: no-repeat;
        }
      </style>

  </head>

  <body class="text-white">
     
  <nav class="navbar navbar-expand-lg p-md-3" style="background-color: #0f4038;">
    <div class="container">
      <img src="logo.png" alt="zerocode" width="120px">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        </ul>
        <form class="d-flex">

          <a href="index.php" class="btn btn-success" tabindex="-1" role="button" style="border-radius: 0px;">Logout</a>
            
        </form>
      </div>
    </div>
  </nav>

    <div class="container my-4">

    <div class="row">
        <div class="col-md-7 col-lg-7" style="display: flex">
            <div>
              <img src="avater.png" alt="Avatar" style="width: 120px; height: 120px; margin: 5px">
            </div>
            <div style="margin: 5px;">
              <h1>ADMIN DASHBOARD</h1>
              <h5>Welcome, <?php echo $_SESSION['username']?></h5>
              <button type="button" class="btn btn-primary btn-sm" style="border-radius: 30px;">Active</button>
            </div>
        </div>
        <div class="col-md-2 col-lg-2"></div>

        <div class="col-md-3 col-lg-3">
        </div>
    </div>
    
        
        <div class="div text-center" id="feedback">
          <h3 style="padding: 40px;">
            Viewer Questions
          </h3>
        </div>
      
            <table class="table text-white">
              <thead>
                <tr>
                  <th scope="col">Username</th>
                  <th scope="col">Subject</th>
                  <th scope="col">Email</th>
                  <th scope="col">Questions</th>
                </tr>
              </thead>
              <tbody>

                <?php 
                 $host = 'localhost';
	               $user = 'root';
	               $pass = '';
	               $db = 'cse309contact';
	               $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	               //query to get data from the table
	               $sql = "select * FROM CONTACT";
                
                  $result = mysqli_query($mysqli, $sql);
                    if ($result->num_rows > 0): 
                  
                ?>

                <?php while($array=mysqli_fetch_row($result)): ?>
                <tr>
                    <td><?php echo $array[1];?></td>
                    <td><?php echo $array[2];?></td>
                    <td><?php echo $array[3];?></td>
                    <td><?php echo $array[4];?></td>
                </tr>
                <?php endwhile; ?>
                <?php else: ?>

                <tr>
                   <td colspan="3" rowspan="1" headers="">No Data Found</td>
                </tr>

                <?php endif; ?>
                <?php mysqli_free_result($result); ?>
              </tbody>
            </table>
      
    </div>
      
      
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      
      
  </body>
</html>