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
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
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
        <h3>Cases</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="list-group">
                    <h5>Requested</h5>
                    <?php foreach ($data as $a) { ?>
                        <?php if ($a['active_status'] == 0) {?>
                            <li class="list-group-item list-group-item-info">
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
                    <?php }?>
                   <?php } ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="list-group">
                    <h5>Approved</h5>
                    <?php foreach ($data as $a) {?>
                        <?php if ($a['active_status'] == 1) { ?>
                            <li class="list-group-item list-group-item-info">
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
                    <?php }?>
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