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
    $flag = 0;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = "SELECT * FROM casetype";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        if (empty($_POST["casetype"])) {
            $error = "Casetype is required";
            $flag = 1;
        } else {
            $casetype = test_input($conn->real_escape_string($_POST['casetype']));
            if (!preg_match("/^[a-zA-Z ]*$/", $casetype)) {
                $flag = 1;
                $error = "Only letters and white space allowed in casetype";
            }
        }
        if (empty($_POST["desc"])) {
            $error = "Description is required";
            $flag = 1;
        } else {
            $description = test_input($conn->real_escape_string($_POST['desc']));
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $description)) {
                $flag = 1;
                $error = "Only letters and white space allowed for description";
            }
        }
        if ($flag == 0) {
            $sql = "INSERT INTO casetype (casetype, description) VALUES ('$casetype', '$description')";
            if (mysqli_query($conn, $sql)) {
                echo '<script type="text/javascript">
                        window.location = ""
                        </script>';
            }
        }
    } else {
        $sql = "SELECT * FROM casetype";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
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
    <link rel="stylesheet" type="text/css" href="../assets/css/footer.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../home.html"><b>FYLAW</b></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./lawyer.php"><button class="btn btn-outline-warning">Lawyer</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./user.php"><button class="btn btn-outline-warning">User</button></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./courts.php"><button class="btn btn-outline-warning">Courts</button></a>
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
        <div class="mt-5 mb-5 px-2 py-2">
            <div class="row mt-3 mb-3">
                <div class="col-md-6">
                    <table class="table table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>Case type</th>
                                <th>Description</th>
                                <th>Remove </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $a) { ?>
                                <tr>
                                    <td><?php echo $a['casetype']; ?></td>
                                    <td><?php echo $a['description']; ?></td>
                                    <td class="text-center "><a class="text-danger" href="removecastype.php?id=<?php echo $a['casetype_id']; ?>"><b>X</b></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <h2 class="">Add Casetypes</h2>
                    <div class="form-group">
                        <form action="" method="POST">

                            <label>Casetype</label>
                            <input type="text" class="form-control" name="casetype">

                            <label>Description</label>
                            <textarea class="form-control" rows="3" id="desc" name="desc"></textarea>
                            <span class="badge badge-pill badge-warning"><?php echo $error; ?></span>
                            <br>
                            <button class="btn btn-success form-control" type="submit">SUBMIT</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../footer.php'; ?>
</body>

</html>