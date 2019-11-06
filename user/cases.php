<?php include 'connect.php' ?>
<?php
session_start();
if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
    echo '<script type="text/javascript">
                window.location = "index.php"
                 </script>';
} else {
    $uid = $_SESSION['uid'];
    $sql = "SELECT cases.active_status, cases.description, casetype, case_id FROM cases 
    INNER JOIN casetype ON cases.casetype_id = casetype.casetype_id WHERE uid = '$uid'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    $datacount = 0;
    $count = 0;
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
                <a class="nav-link" href="lawyer.php">Lawyers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="courts.php">Courts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active">Cases</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">SIGNOUT</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="mt-5 mb-5 py-2 border border-primary rounded">
            <h4 class=" col-md-4 mx-auto text-center">Cases</h4>
            <div class="row mx-1">
                <div class="col-md-6">
                    <div class="list-group">
                        <h5>Requested</h5>
                        <?php
                        foreach ($data as $a) { ?>
                            <?php if ($a['active_status'] == 0) {
                                    $datacount = 1 ?>
                                <li class="list-group-item list-group-item-info mt-2">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p><?php echo $a['casetype']; ?></p>
                                            <p><?php echo $a['description']; ?></p>
                                        </div>
                                        <div class="col-md-5">
                                            <a href="comments.php?id=<?php echo $a['case_id']; ?>" class="mt-2 btn btn-primary btn-block">View/Add Comment</a>
                                        </div>
                                        </a>
                                    </div>
                                </li>
                        <?php }
                        }
                        if ($datacount == 0) {
                            echo '<span class="badge badge-pill badge-light mt-5 mx-1">There are no cases currently requested</span>';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="list-group">
                        <h5>Approved</h5>
                        <?php foreach ($data as $a) { ?>
                            <?php if ($a['active_status'] == 1) {
                                    $count = 1; ?>
                                <li class="list-group-item list-group-item-info mt-2">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p><?php echo $a['casetype']; ?></p>
                                            <p><?php echo $a['description']; ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="comments.php?id=<?php echo $a['case_id']; ?>" class="mt-2 btn btn-primary btn-block">View/Add Comment</a>
                                            <a href="history.php?id=<?php echo $a['case_id']; ?>" class="mt-2 btn btn-primary btn-block">View/Add History</a>
                                        </div>
                                        </a>
                                    </div>
                                </li>
                        <?php }
                        }
                        if ($count == 0) {
                            echo '<span class="badge badge-pill badge-light mt-5 mx-1"> There are no cases currently approved </span>';
                        }
                        ?>
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