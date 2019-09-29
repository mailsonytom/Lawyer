<?php include 'connect.php' ?>
<?php
session_start();
if (!isset($_SESSION['lid']) || empty($_SESSION['lid'])) {
    echo '<script type="text/javascript">
                window.location = "login.php"
                 </script>';
} else {
    $lid = $_SESSION['lid'];
    $sql = "SELECT * FROM cases INNER JOIN casetype ON cases.casetype_id = casetype.casetype_id INNER JOIN user_details 
    ON cases.uid = user_details.uid WHERE active_status = 0";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
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
                <a class="nav-link" href="cases.php">Cases</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="courts.php">Courts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">SIGNOUT</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <h2 class=" col-md-4 mx-auto mt-5 text-center">Hello Lawyer!!</h2>
        <div class="mt-5 mb-5 py-2 border border-primary rounded">
            <h4 class=" col-md-4 mt-2  mx-auto text-center">
                New Case Requests
            </h4>
            <div class="row mx-1">
                <div class="col-md-12">
                    <div class="list-group">
                        <?php foreach ($data as $a) { ?>
                            <li class="list-group-item list-group-item-info"><?php $a['casetype']; ?>
                                <div class="row">
                                    <div class="col-md-9">
                                        <?php echo $a['name']; ?>
                                        <?php echo $a['description']; ?>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="accept.php?id=<?php echo $a['case_id']; ?>" class="mt-2 btn btn-primary btn-block">Accept Case</a>
                                    </div>
                                </div>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer px-5 py-5">
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