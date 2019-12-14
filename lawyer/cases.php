<?php include 'connect.php' ?>
<?php
session_start();
if (!isset($_SESSION['lid']) || empty($_SESSION['lid'])) {
    echo '<script type="text/javascript">
                window.location = "login.php"
                 </script>';
} else {
    $lid = $_SESSION['lid'];
    $sql = "SELECT casetype, cases.active_status, cases.description, case_id FROM cases INNER JOIN casetype ON cases.casetype_id = casetype.casetype_id WHERE lid = '$lid' AND active_status = 1";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cases</title>
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
                        <a class="nav-link" href="./courts.php"><button class="btn btn-outline-warning">Courts</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php"><button class="btn btn-danger">Sign out</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="mt-5 mb-5 py-2 case-form">
            <div class="row mx-1">
                <div class="col-md-12">
                    <h4 class=" col-md-4 mx-auto text-center">Current case list</h4>
                    <div class="list-group">
                        <?php if ($num_rows == 0) {
                            echo '<span class="badge badge-pill badge-light mt-2 mx-1"> No live cases</span>';
                        } else {
                            foreach ($data as $a) { ?>
                                <li class="list-group-item list-group-item-info mt-2">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <p><?php echo $a['casetype']; ?></p>
                                            <p><?php echo $a['description']; ?></p>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="comments.php?id=<?php echo $a['case_id']; ?>" class="mt-2 btn btn-primary btn-block">View/Add Comment</a>
                                            <a href="history.php?id=<?php echo $a['case_id']; ?>" class="mt-2 btn btn-primary btn-block">View/Add History</a>
                                        </div>
                                        </a>
                                    </div>
                                </li>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include '../footer.php'; ?>
</body>

</html>