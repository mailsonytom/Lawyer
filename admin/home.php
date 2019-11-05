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
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-bg">
        <a class="navbar-brand" href="#">Find your LAWYER</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link active">Home</a>
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
                <a class="nav-link" href="casetype.php">Casetypes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">SIGNOUT</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <h3 class="text-center mt-5 mb-5">Admin Homepage!!</h3>
        <div class="mt-5 mb-5 py-2 border border-primary rounded">
            <div class="row">
                <div class="col-md-12">
                    <div class="list-group mx-1">
                        <?php
                        $sql = "SELECT * FROM lawyer_details";
                        $result = mysqli_query($conn, $sql);
                        $num_rows = mysqli_num_rows($result);
                        if ($num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row['approved'] == 0) {
                                    echo '<li class="list-group-item list-group-item-info mt-2">' . $row['name'] .
                                        "," . $row['email'] .
                                        "," . $row['phone'] .
                                        '<a href="approve.php?lid=' . $row['lid'] . '"><button class="btn btn-primary" role="button">Approve</button></a></li>';
                                }
                            }
                        }
                        if ($num_rows == 0) {
                            echo '<span class="badge badge-pill badge-light mt-2 mx-1"> No recent lawyer requests </span>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row mx-1">
                <div class="col-md-12">
                    <div class="list-group">
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