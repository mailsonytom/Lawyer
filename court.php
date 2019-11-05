<?php include 'connect.php' ?>
<?php
$sql = "SELECT * FROM courts";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Courts</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-bg">
        <a class="navbar-brand" href="#">Find your LAWYER</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="lawyers.php">Lawyers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active">Courts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user/index.php">LOGIN</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="mt-5 mb-5 py-2 border border-primary rounded">
            <div class="row">
                <h4 class=" col-md-4 mx-auto text-center">
                    Courts
                </h4>
            </div>
            <div class="row mx-1">
                <div class="col-md-12">
                    <div class="list-group">
                        <?php foreach ($data as $a) { ?>
                            <li class="list-group-item list-group-item-info mt-2">
                                <?php echo "Court Name: ".$a['court_name'].", Location: ".$a['place']; ?>
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