<?php include 'connect.php' ?>
<?php
session_start();
if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
    echo '<script type="text/javascript">
                window.location = "index.php"
                 </script>';
} else {
    $uid = $_SESSION['uid'];
    $sql = "SELECT cases.active_status, cases.description, casetype, case_id, lawyer_details.name FROM cases 
    INNER JOIN casetype ON cases.casetype_id = casetype.casetype_id INNER JOIN lawyer_details on cases.lid = lawyer_details.lid WHERE uid = '$uid'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}
$approved_flag = $unapproved_flag = 0;
if ($num_rows > 0) {
    foreach ($data as $a) {
        if ($a['active_status'] == 1) {
            $approved_flag = 1;
        } else {
            $unapproved_flag = 1;
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
            <a class="navbar-brand" href=""><b>FYLAW</b></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./home.php"><button class="btn btn-outline-warning">Home</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./lawyer.php"><button class="btn btn-outline-warning">Lawyers</button></a>
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
        <h2 class="mt-5">Your Cases</h2>
        <div class="mt-5 mb-5 py-2 case-form">
            <div class="row mx-1">
                <div class="col-md-6">
                    <div class="list-group">
                        <h5>Requested</h5>
                        <?php
                        if ($unapproved_flag)
                            foreach ($data as $a) { ?>
                            <?php if ($a['active_status'] == 0) { ?>
                                <li class="list-group-item list-group-item-info mt-2">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p><?php echo $a['casetype']; ?></p>
                                            <p><?php echo $a['name']; ?></p>
                                            <p><?php echo $a['description']; ?></p>
                                        </div>
                                        <div class="col-md-5">
                                            <a href="comments.php?id=<?php echo $a['case_id']; ?>" class="mt-2 btn btn-primary btn-block">View/Add Comment</a>
                                        </div>
                                        </a>
                                    </div>
                                </li>
                        <?php }
                        } else {
                        echo '<span class="badge badge-pill badge-light mt-5 mx-1">There are no requested cases</span>';
                    }
                    ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="list-group">
                        <h5>Approved</h5>
                        <?php
                        if ($approved_flag)
                            foreach ($data as $a) { ?>
                            <?php if ($a['active_status'] == 1) {
                                    ?>
                                <li class="list-group-item list-group-item-info mt-2">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p><?php echo $a['casetype']; ?></p>
                                            <p><?php echo $a['description']; ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="comments.php?id=<?php echo $a['case_id']; ?>" class="mt-2 btn btn-primary btn-block">Comment</a>
                                            <a href="history.php?id=<?php echo $a['case_id']; ?>" class="mt-2 btn btn-primary btn-block">History</a>
                                        </div>
                                        </a>
                                    </div>
                                </li>
                        <?php }
                        } else {
                        echo '<span class="badge badge-pill badge-light mt-5 mx-1"> There are no cases currently approved </span>';
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include '../footer.php'; ?>
</body>

</html>