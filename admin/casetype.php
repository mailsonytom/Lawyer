<?php include 'connect.php' ?>
<?php
session_start();
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    echo '<script type="text/javascript">
    window.location = "login.php"
     </script>';
} else {
    $id = $_SESSION['id'];
    $casetype = $description = $error = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $flag = 0;
        if (empty($_POST["casetype"])) {
            $error = "Casetype is required";
            $flag = 1;
        } else {
            $casetype = test_input($_POST['casetype']);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $casetype)) {
                $flag = 1;
                $error = "Only letters and white space allowed";
            }
        }
        $flag = 0;
        if (empty($_POST["desc"])) {
            $error = "Description is required";
            $flag = 1;
        } else {
            $description = test_input($_POST['desc']);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $description)) {
                $flag = 1;
                $error = "Only letters and white space allowed";
            }
        }
        if ($flag == 0) {
            $casetype = $_POST['casetype'];
            $description = $_POST['desc'];
            $sql = "INSERT INTO casetype (casetype, description) VALUES ('$casetype', '$description')";
            if ($conn->query($sql) === TRUE) {
                echo '<script type="text/javascript">
        window.location = ""
    </script>';
            } else {
                $error = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Casetype</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-bg">
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
                <a class="nav-link" href="courts.php">Courts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active">Casetypes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">SIGNOUT</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="mt-5 mb-5 px-2 py-2 border border-primary rounded">
            <div class="row mt-3 mb-3">
                <div class="col-md-6">
                    <div class="list-group">
                        <?php
                        $sql = "SELECT * FROM casetype";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<li class="list-group-item list-group-item-info mt-2">' . $row['casetype'] .
                                ": " . $row['description'] . '</li>';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="text-center">Add Casetypes</h4>
                    <div class="list-group mt-2">
                        <form action="" method="POST">
                            <div class="mx-auto mt-2 mb-2 px-2 py-2 border border-secondary rounded">
                                <div class="form-group">
                                    <label>Casetype</label>
                                    <input type="text" class="form-control" name="casetype">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" id="desc" name="desc">
                                </textarea>
                                    <span class="badge badge-pill badge-warning"><?php echo $error; ?></span>
                                    <div class="col-md-3 mt-2 mx-auto text-center">
                                        <a href="">
                                            <button class="btn btn-success " type="submit">SUBMIT</button>
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