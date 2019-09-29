<?php include 'connect.php' ?>
<?php
session_start();
if (!isset($_SESSION['lid']) || empty($_SESSION['lid'])) {
    echo '<script type="text/javascript">
                window.location = "login.php"
                 </script>';
} else {
    $lid = $_SESSION['lid'];
    $sql = "SELECT casetype, cases.description, case_id FROM cases INNER JOIN casetype ON cases.casetype_id = casetype.casetype_id WHERE lid = '$lid' AND active_status = 1";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
        // echo '<li class="list-group-item list-group-item-success">' . $row['casetype_id'] . '<br>';
        // echo $case_row['casetype'] . '<br>';
        // echo $row['description'] . ' 
        // <a href="comments.php?case_id=' . $row['case_id'] . '"><button class="btn btn-primary" role="button">View/Add Comment</button></a>
        // <a href="history.php?case_id=' . $row['case_id'] . '"<button class="btn btn-primary" role="button">View/Add History</button></a>
        //     </a></li>';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cases</title>
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
                <a class="nav-link active">Cases</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="courts.php">Courts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">SIGNOUT</a>
            </li>

        </ul>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Current case list</h3>
                <div class="list-group">
                    <?php foreach ($data as $a) { ?>
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
                    <?php } ?>
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