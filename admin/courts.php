<?php include 'connect.php' ?>
<?php
session_start();
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    echo '<script type="text/javascript">
                window.location = "login.php"
                 </script>';
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$courtname = $location = $error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $flag = 0;
        if (empty($_POST["name"])) {
            $error = "Courtname is required";
            $flag = 1;
        } else {
            $name = test_input($_POST['name']);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $flag = 1;
                $error = "Only letters and white space allowed";
            }
        }
        $flag = 0;
        if (empty($_POST["location"])) {
            $error = "location is required";
            $flag = 1;
        } else {
            $location = test_input($_POST['location']);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $location)) {
                $flag = 1;
                $error = "Only letters and white space allowed";
            }
        }
    if($flag == 0 )
    {
        $courtname = $_POST['name'];
    $location = $_POST['location'];
    $sql = "INSERT INTO courts(court_name, place) VALUES ('$courtname', '$location')";
    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">
            window.location = "courts.php"
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
    <title>Courts</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Find your LAWYER</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="lawyer.php">Lawyers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user.php">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active">Courts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="casetype.php">Casetypes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">SIGNOUT</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="mt-5 mb-5 py-2 border border-primary rounded">
            <div class="row mx-1 mt-3 mb-3">
                <div class="col-md-6">
                    <div class="list-group">
                        <?php
                        $sql = "SELECT * FROM courts";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<li class="list-group-item list-group-item-info mt-2">' . $row['court_name'] .
                                "," . $row['place'] . '</li>';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="mx-auto text-center">Add Court</h4>
                    <div class="list-group mt-2">
                        <form action="" method="post">
                            <div class="mx-auto mt-2 mb-2 py-2 border border-secondary rounded">
                                <div class="form-group mx-2">
                                    <label>Court name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group mx-2">
                                    <label>Location</label>
                                    <input type="text" class="form-control" name="location">
                                </div>
                                <span class="badge badge-pill badge-warning mx-1"><?php echo $error; ?></span>
                                <div class="col-md-3 mt-2 text-center mx-auto">
                                    <a href="">
                                        <button class="btn btn-success " type="submit">SUBMIT</button>
                                    </a>

                                </div>
                            </div>
                        </form>
                    </div>
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