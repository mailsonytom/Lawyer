<?php include 'connect.php' ?>
<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$name = $username = $password = $spec = $exp = $fees = $contact = $gender = $birthdate = $error = "";
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
    $speciality = $_POST['specs'];
    if (empty($_POST["exp"])) {
        $error = "Experience years is required";
        $flag = 1;
    } else {
        $experience = test_input($_POST['exp']);
        if (!preg_match("/^[0-9]{2}$/", $experience)) {
            $flag = 1;
            $error = "Wrong exp number format";
        }
    }
    $fees = $_POST['fees'];
    if (empty($_POST["fees"])) {
        $error = "Fees is required";
        $flag = 1;
    } else {
        $fees = test_input($_POST['fees']);
        if (!preg_match("/^[0-9]*$/", $fees)) {
            $flag = 1;
            $error = "Wrong fees number format";
        }
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
    $gender = $_POST['gender'];
    if (empty($_POST["dob"])) {
        $error = "Date of birth is required";
        $flag = 1;
    } else {
        $birthdate = test_input($_POST['dob']);
    }
    $select_query = "SELECT * FROM lawyer_details";
    $result = mysqli_query($conn, $select_query);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['email'] == $username) {
            $flag = 1;
            $error = "User already exist";
        }
    }
    if ($flag == 0) {
        $sql = "INSERT INTO lawyer_details (name,email, password, speciality, experience, fees, phone, gender, dob, approved) VALUES ('$name', '$username', '$password', '$speciality', '$experience ', '$fees', '$contact', '$gender', '$birthdate', '0')";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">
                    window.location = "login.php"
                    </script>';
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
$casetype_data = [];
$casetype_sql = "SELECT * FROM casetype";
$casetype_result = mysqli_query($conn, $casetype_sql);
while ($row = mysqli_fetch_assoc($casetype_result)) {
    $casetype_data[] = $row;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Lawyer Register</title>
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
                        <a class="nav-link" href="./login.php"><button class="btn btn-outline-warning">Sign in</button></a>
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
        <div class="row">
            <div class="col-md-4 pt-5">
                <img class="featurette-image img-fluid mx-auto" src="../assets/images/lawyersignup1.png" alt="Generic placeholder image">
                <img class="featurette-image img-fluid mx-auto mt-5" src="../assets/images/lawyersignup.png" alt="Generic placeholder image">
            </div>
            <div class="col-md-8 mt-5 mb-5">
                <h2 class="mt-2">Lawyer sign up</h2>
                <form action="" method="POST">
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
                        <label>Speciality</label>
                        <select class="form-control" name="speciality">
                            <?php foreach ($casetype_data as $a) { ?>
                                <option value="<?php echo $a['casetype_id']; ?>">
                                    <?php echo $a['casetype']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Experience [in yrs]</label>
                        <input type="text" class="form-control" name="exp">
                    </div>
                    <div class="form-group">
                        <label> Fees [per sitting]</label>
                        <input type="text" class="form-control" name="fees">

                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date of birth</label>
                        <input type="date" class="form-control" name="dob">
                    </div>
                    <span class="badge badge-pill badge-warning"><?php echo $error; ?></span>
                    <br>
                    <input class="btn btn-success form-control" type="submit" value="Sign up" />
                </form>
            </div>
        </div>
    </div>
    <?php include '../footer.php'; ?>
</body>

</html>