<?php include 'connect.php' ?>
<?php
    session_start();
    $username = $password = "";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM lawyer_details WHERE email_id = '$username'";
        $result = mysqli_query($conn, $sql);
        if($row=mysqli_fetch_assoc($result)){
            if(password_verify($password, $row['password'])){
                $_SESSION['user_id'] = $row['id'];
                echo '<script type="text/javascript">
                window.location = ""
                 </script>';
            }
            else{
                    echo "Wrong password. <a href='login.html'>Click here to try again.</a>";  
            }
        }
        else{
                echo "Wrong username. <a href='login.html'>Click here to try again.</a>";
            }
        }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Choose</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-bg">
        <a class="navbar-brand" href="#">Find your LAWYER</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../lawyers.html">Lawyers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../court.html">Courts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../register.html">REGISTER</a>
            </li>

        </ul>
    </nav>
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
                </div>
            </div>
            <div class="col-md-6">
                <div class="row mx-4">
                    <div class="mt-5 mb-5 border border-primary rounded">
                        <form action="" method="POST">
                            <div class="row">
                                <h4 class="col-md-5 mt-2 mx-auto text-center">SIGNIN</h4>

                            </div>
                            <div class="row mx-1 mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-5 mt-2 mb-2 text-center mx-auto">
                                        <a href="">
                                            <button class="btn btn-success" type="submit">SUBMIT</button>
                                        </a>
                                        <a href="">
                                            <button class="btn btn-success" type="submit">SIGNIN AS USER</button>
                                        </a>
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