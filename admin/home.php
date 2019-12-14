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
        <h1 class="mt-2">Admin Homepage!!</h1>
        <p>Welcome to admin homepage. You have full authority over the system here !! </p>
        <div class="mt-2 mb-5 p-3 case-form">
            <div class="row">
                <div class="col-md-12">
                    <div class="list-group mx-1">
                        <?php
                        $datacount = 0;
                        $sql = "SELECT * FROM lawyer_details";
                        $result = mysqli_query($conn, $sql);
                        $num_rows = mysqli_num_rows($result);
                        if ($num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row['approved'] == 0) {
                                    $datacount = 1;
                                    echo '<li class="list-group-item list-group-item-info mt-2">' . $row['name'] .
                                        "," . $row['email'] .
                                        "," . $row['phone'] .
                                        '<a href="approve.php?lid=' . $row['lid'] . '"><button class="btn btn-primary float-right" role="button">Approve</button></a></li>';
                                }
                            }
                        }
                        if ($datacount == 0) {
                            echo '<span class="badge badge-pill badge-light mt-5 mx-1">There are no lawyers currently requested</span>';
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
    <?php include '../footer.php'; ?>
</body>

</html>