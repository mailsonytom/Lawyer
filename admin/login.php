<?php include 'connect.php' ?>
<?php
session_start();
$username = $password = $error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            echo '<script type="text/javascript">
                window.location = "home.php"
                 </script>';
        } else {
            $error = "Wrong password";
        }
    } else {
        $error = "Wrong username";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/footer.css">
</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php"><b>FYLAW</b></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../user/"><button class="btn btn-outline-warning">Client portal</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../lawyer/"><button class="btn btn-outline-warning">Lawyer portal</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">

        <div class="row my-5">
            <div class="col-md-6">
                <img class="featurette-image img-fluid mx-auto" src="../assets/images/user.jpg" alt="Generic placeholder image">
            </div>
            <div class="col-md-6 pt-5">
                <h2 class="">Admin sign in</h2>
                <p class="">Our lawyers have a combined background of impressive achievements and qualifications !!</p>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter username">

                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                        <br>
                        <span class="badge badge-pill badge-warning"><?php echo $error; ?></span>
                        <br>
                        <input type="submit" value="SUBMIT" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include '../footer.php'; ?>

</html>