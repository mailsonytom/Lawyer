<?php include 'connect.php' ?>
<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$firstname = $lastname = $username = $password = $address = $contact = $error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $flag = 0;
    if (empty($_POST["name"])) {
        $error = "Name is required";
        $flag = 1;
    } else {
        $name = test_input($_POST['name']);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $flag = 1;
            $error = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["email"])) {
        $error = "Email is required";
        $flag = 1;
    } else {
        $username = test_input($_POST['email']);
        // check if name only contains letters and whitespace
        if (!filter_var($username, FILTER_VALIDATE_EMAIL, $username)) {
            $flag = 1;
            $error = "Wrong email format";
        }
    }
    if (empty($_POST["password"])) {
        $error = "Password is required";
        $flag = 1;
    } else {
        $password = password_hash(test_input($_POST['password']), PASSWORD_DEFAULT);
    }
    if (empty($_POST["phone"])) {
        $error = "Phone number is required";
        $flag = 1;
    } else {
        $contact = test_input($_POST['phone']);
        if (!preg_match("/^[1-9][0-9]{9}$/", $contact)) {
            $flag = 1;
            $error = "Wrong phone number format";
        }
    }
    $select_query = "SELECT * FROM user_details";
    $result = mysqli_query($conn, $select_query);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['email'] == $username) {
            $flag = 1;
            $error = "The user with this email already exists";
        }
    }
    if ($flag == 0) {
        $sql = "INSERT INTO user_details (name, email, password, phone) VALUES ('$name',  '$username', '$password', '$contact')";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">
                    window.location = "index.php"
                    </script>';
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
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
    <link rel="stylesheet" type="text/css" href="../assets/css/footer.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php"><b>FYLAW</b></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php"><button class="btn btn-outline-warning">Sign in</button></a>
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
    <div class="container">
        <div class="row my-5 py-5">
            <div class="col-md-6">
                <h2>Client sign up</h2>
                <p>Signing up will give you all access to the FYLAW features</p>
                <form action="" method="POST">

                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Eg: John Wick">

                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Eg: john@fylaw.com">

                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="***********">

                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Eg: +91 9184759960">
                    <span class="badge badge-pill badge-warning"><?php echo $error; ?></span>
                    <br>
                    <input type="submit" class="btn btn-success" value="Sign up">
                </form>
            </div>
            <div class="col-md-6">
                <img class="featurette-image img-fluid mx-auto" src="../assets/images/usersignup.png" alt="Generic placeholder image">
            </div>
        </div>
    </div>
    <?php include '../footer.php'; ?>
</body>

</html>