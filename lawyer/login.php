<?php include 'connect.php' ?>
<?php
session_start();
$username = $password = $error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM lawyer_details WHERE email = '$username'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password']) && $row['approved'] == 1) {
            $_SESSION['lid'] = $row['lid'];
            echo '<script type="text/javascript">
                window.location = "home.php"
                 </script>';
        } else {
            $error = "Wrong password or you are not approved";
        }
    } else {
        $error = "Wrong username";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Lawyer Login</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/footer.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../home.html"><b>FYLAW</b></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./signup.php"><button class="btn btn-outline-warning">Sign up</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../user/"><button class="btn btn-outline-warning">Client portal</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/"><button class="btn btn-outline-warning">Admin portal</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row px-5 py-5">
            <div class="col-md-6">
                <img class="featurette-image img-fluid mx-auto" src="../assets/images/usersignup.png" alt="Generic placeholder image">
            </div>
            <div class="col-md-6">
                <h4 class="">Lawyer sign in</h4>
                <p>We have the most experienced lawyers in the world signed up for this portal</p>
                <form action="" method="POST">

                    <div class="form-group">
                        <label>Username</label>
                        <input type="email" name="email" class="form-control" placeholder="Eg: john@fylaw.com">

                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password">
                    </div>
                    <span class="badge badge-pill badge-warning"><?php echo $error; ?></span>
                    <br>
                    <input class="btn btn-success" type="submit" value="SUBMIT">
                </form>
            </div>

        </div>
    </div>
    </div>
    </div>
    <?php include '../footer.php'; ?>
</body>

</html>