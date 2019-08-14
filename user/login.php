<?php include 'connect.php' ?>
<?php
    session_start();
    $username = $password = "";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user_details WHERE email_id = '$username'";
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
<!doctype html>
<html lang="en">

<head>
    <title>
        sign-in list
    </title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Lawyer Management</a>
        <a href="login.html">
            <button class="btn btn-warning" type="submit">Signout</button>
        </a>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <h2 class=" col-md-5 mx-auto text-center">Sign-in to your account</h2>
            <div class="col-md-8 mx-auto mt-5 px-2 py-2 border border-primary rounded">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email Id">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <input type="submit" value="Submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</body>

</html>