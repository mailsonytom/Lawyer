<?php include 'connect.php' ?>
<?php
session_start();
$username = $password = $error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user_details WHERE email = '$username'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['uid'] = $row['uid'];
            echo '<script type="text/javascript">
                window.location = "home.php"
                 </script>';
        } else {
            $error = " Wrong password";
        }
    } else {
        $error = "Wrong username";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>FYLAW</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/footer.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="../index.php"><b>FYLAW</b></a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="./signup.php"><button class="btn btn-outline-warning">Sign up</button></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../lawyer/"><button class="btn btn-outline-warning">Lawyer portal</button></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/"><button class="btn btn-outline-warning">Admin portal</button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container content">
        <div class="row">
            <div class="col-md-6">
                <img class="featurette-image img-fluid mx-auto" src="../assets/images/user.jpg" alt="Generic placeholder image">
            </div>
            <div class="col-md-6 form-group mt-5 pt-5">
                <h2>Client sign in</h2>
                <p>You can use the full functionality of FYLAW only after signing in</p>
                <form action="" method="POST">
                    <label>Username</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email here">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password">
                    <span class="badge badge-pill badge-warning"><?php echo $error; ?></span>
                    <br>
                    <input class="btn btn-success" type="submit" value="Sign in">
                </form>
            </div>
        </div>
    </div>
    <?php include '../footer.php'; ?>
</body>

</html>