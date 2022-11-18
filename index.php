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
    $showAlert = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = $_POST["username"];
        $subject = $_POST["subject"];
        $email = $_POST["email"];
        $questions= $_POST["questions"];
        $exists = false;
        
            $sql ="INSERT INTO `contact` (`username`, `subject`, `email`, `questions`) VALUES ('$username', '$subject', '$email', '$questions')";

            if ($conn->query($sql) === TRUE) {
                echo  '<script>alert("New record created successfully")</script>';

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <title>Document</title>
    <style>
        body{
            /* background-color:rgb(191, 227, 248); */
            background-color: #061f1c;
            background-image: url(bg1.png);
            background-position: fixed;
            background-size: cover; 
            background-repeat: no-repeat;
        }
        #username, #subject, #email{
            border: 1px solid #199f8b; 
            background-color: #0c4c43;
            border-radius: 0px;
            color: white;
        }
        .block {
            color: white;
            display: block;
            width: 100%;
            border: none; 
            padding: 8px 18px;
            background-color: #199f8b;
            /* border-radius: 90px; */
            /* background-image: linear-gradient(to right, rgb(187, 78, 250) , rgb(98, 188, 248)); */
        }

        #questions{
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

<!--**********************-->
<!--    navbar starts     -->
<!--**********************-->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0f4038">
    <div class="container">
      <img src="logo.png" alt="" width="120px">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="flex-row-reverse collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="login.php" style=" background-color: #199f8b; color: white; border-radius: 0px; padding: 8px 18px;">Login to System</a>
        </div>
      </div>
    </div>
  </nav>
<!--**********************-->
<!--    navbar ends       -->
<!--**********************--> 

<div class="container myc">

    <div class="text-center mb-4 mt-4">
        <h1>HAVE SOME QUESTIONS?</h1>
        <p>MOLDOVA <a href="#">UK</a> : Strada 31 August 1989 78, Chisinau, MD-2012</p>
    </div>
    
    <div class="row align-items-center" style="margin-top: 40px;">
        <div class="col-md-6 col-lg-6 col-12">

            <img src="email1.png" alt="email" class="img-fluid" style="width: 60%; margin: 20px; display: block;
            margin-left: auto;
            margin-right: auto;">
        </div>
        <div class="col-md-6 col-lg-6 col-12">
            <form action="index.php" method="POST">
                <div class="mb-3">
                    <input type="text" class="form-control" id="username" placeholder="Your Username" name="username" style="color: white;" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" placeholder="What's your email?" name="email" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="questions" rows="3" placeholder="Your Questions..." name="questions" required></textarea>
                </div>
                <button type="submit" class="block">SEND MESSAGE</button>
              </form>
              
        </div>
    
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>