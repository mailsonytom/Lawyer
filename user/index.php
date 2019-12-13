<?php include 'connect.php' ?>
<?php
    session_start();
    $username = $password = $error = "";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user_details WHERE email = '$username'";
        $result = mysqli_query($conn, $sql);
        if($row=mysqli_fetch_assoc($result)){
            if(password_verify($password, $row['password'])){
                $_SESSION['uid'] = $row['uid'];
                echo '<script type="text/javascript">
                window.location = "home.php"
                 </script>';
            }
            else{
                   $error =" Wrong password";  
            }
        }
        else{
               $error = "Wrong username";
            }
        }
?> 
<!DOCTYPE html>
<html>

<head>
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
<header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../home.html">Find your lawyer</a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../admin/login.php">ADMIN <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../lawyer/login.php">LAWYER</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php">USER-REGISTRATION</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <div class="container-fluid content">
        <div class="row px-5 py-5">
            <div class="col-md-6 px-1 mb-5">
                <h2 class="mt-5 mx-4 mb-3 heading">LAWYER MANAGEMENT PORTAL</h2>
                <div class="row ">
                    <p class="col-md-12 mx-auto text-center mt-5 mb-5 px-5">
                        Our
                        lawyers have a combined background of impressive achievements and qualifications as well as a
                        commitment
                        to
                        professional excellence, client services and expert legal advice.
                    </p>
                    <div class="row mx-auto">
                    <a href="../admin/login.php"><button type="submit" class="btn btn-info mx-2 px-4">SIGNIN as  Admin</button></a>
                    <a href="../lawyer/login.php"><button type="submit" class="btn btn-info mx-2 px-4">SIGNIN as Lawyer</button></a>
                   </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row mx-5">
                    <div class="col-md-12 mt-5 mb-5 border border-primary rounded">
                        <form action="" method="POST">
                            <div class="row">
                                <h4 class="col-md-8 mt-2 mx-auto text-center">SIGNIN AS USER</h4>

                            </div>
                            <div class="row mx-1 mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <span class="badge badge-pill badge-warning"><?php echo $error;?></span>
                                </div>
                                <div class="col-md-5 mt-2 mb-2 text-center mx-auto">
                                            <input class="btn btn-success" type="submit" value="SUBMIT">
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer class="footer px-5 py-5 ">
        <p class="float-right">
            <a href="">
                Back to top
            </a>
        </p>
        <p>
            2018-2019 Company, Inc.
            <a href="">Privacy</a>
            <a href="">Terms</a>
        </p>
    </footer>
</body>

</html>