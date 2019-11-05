<?php include 'connect.php' ?>
<?php
$name = $username = $password = $spec = $exp = $fees = $contact = $gender = $birthdate = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $flag = 0;
    $name = $_POST['name'];
    $username = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $speciality = $_POST['specs'];
    $experience = $_POST['exp'];
    $fees = $_POST['fees'];
    $contact = $_POST['phone'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['dob'];
    $select_query = "SELECT * FROM lawyer_details";
    $result = mysqli_query($conn, $select_query);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['email'] == $username) {
            $flag = 1;
            echo '<script type="text/javascript">
                    window.location = "user_duplicate_error.php"
                    </script>';
        }
    }
    if ($flag == 0) {
        $sql = "INSERT INTO lawyer_details (name,email, password, speciality, experience, fees, phone, gender, dob, approved) VALUES ('$name', '$username', '$password', '$speciality', '$experience ', '$fees', '$contact', '$gender', '$birthdate', '0')";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">
                    window.location = "login.php"
                    </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
                <a class="nav-link mt-1" href="login.php">LOGIN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../user/signup.php">
                    <button class="btn btn-success" type="submit">I am a USER</button>
                </a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5 mb-5 border border-primary rounded">
                <form action="" method="POST">
                    <div class="row">
                        <h4 class=" col-md-5 mt-2 mx-auto text-center">REGISTER</h4>

                    </div>
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