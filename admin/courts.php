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
$flag = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sql = "SELECT * FROM courts";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    if (empty($_POST["name"])) {
        $error = "Courtname is required";
        $flag = 1;
    } else {
        $courtname = test_input($_POST['name']);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $flag = 1;
            $error = "Only letters and white space allowed for court name";
        }
    }
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
    if ($flag == 0) {
        $sql = "INSERT INTO courts(court_name, place) VALUES ('$courtname', '$location')";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">
            window.location = "courts.php"
               </script>';
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    $sql = "SELECT * FROM courts";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Courts</title>
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
                        <a class="nav-link" href="./home.php"><button class="btn btn-outline-warning">Home</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./user.php"><button class="btn btn-outline-warning">User</button></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./lawyer.php"><button class="btn btn-outline-warning">Lawyers</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./casetype.php"><button class="btn btn-outline-warning">Casetype</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php"><button class="btn btn-danger">Sign out</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="mt-5 mb-5 py-2">
            <div class="row mx-1 mt-3 mb-3 case-form">
                <div class="col-md-6">
                    <div class="list-group">
                        <table class="table table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>Name of the court</th>
                                    <th>Location</th>
                                    <th>Remove court</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($num_rows > 0) {
                                    foreach ($data as $a) { ?>
                                        <tr>
                                            <td><?php echo $a['court_name']; ?></td>
                                            <td class="text-center "><?php echo $a['place']; ?></td>
                                            <td class="text-center "><a class="text-danger" href="deletecourt.php?id=<?php echo $a['cid']; ?>"><b>X</b></a></td>
                                        </tr>
                                <?php }
                                } else {
                                    echo '<tr><span class="badge badge-pill badge-danger mt-5 mx-1">There are no courts to display</span></tr>';
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="">Add Court</h2>
                    <div class="list-group mt-2">
                        <form action="" method="post">
                            <div class="mx-auto mt-2 mb-2 py-2">
                                <div class="form-group mx-2">
                                    <label>Court name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group mx-2">
                                    <label>Location</label>
                                    <input type="text" class="form-control" name="location">
                                </div>
                                <span class="badge badge-pill badge-warning mx-1"><?php echo $error; ?></span>
                                <button class="btn btn-success form-control" type="submit">SUBMIT</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include '../footer.php'; ?>
</body>

</html>