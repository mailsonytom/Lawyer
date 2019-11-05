<?php include 'connect.php' ?>
<?php

$firstname = $lastname = $username = $password = $address = $phone = $error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $flag = 0;
    $name = $_POST['name'];
    $username = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $select_query = "SELECT * FROM user_details";
    $result = mysqli_query($conn, $select_query);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['email'] == $username) {
            $flag = 1;
            $error = "The user email already exists";
        }
    }
    if ($flag == 0) {
        $sql = "INSERT INTO user_details (name, email, password, phone) VALUES ('$name',  '$username', '$password', '$phone')";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">
                    window.location = "index.php"
                    </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>User Register</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-bg">
        <a class="navbar-brand" href="#">Find your LAWYER</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link mt-1" href="../lawyers.php">Lawyers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mt-1" href="../court.php">Courts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mt-1" href="index.php">LOGIN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../lawyer/signup.php">
                    <button class="btn btn-success" type="submit">I am a LAWYER</button>
                </a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5 mb-5 border border-primary rounded">
                <h4 class=" col-md-8 mt-2 mx-auto text-center">USER REGISTRATION</h4>
                <form action="" method="POST">
                    <?php echo $error; ?>
                    <div class="row mx-1 mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 mt-2 mb-2 text-center mx-auto">
                        <a href="">
                            <button class="btn btn-success mt-2" type="submit">SIGNUP</button>
                        </a>
                    </div>
                </form>
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