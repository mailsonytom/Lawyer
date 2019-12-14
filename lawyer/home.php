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
    ON cases.uid = user_details.uid WHERE active_status = 0 AND lid = $lid";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
}
$lawyer_name_data = [];
$lawyer_name_sql = "SELECT name FROM lawyer_details WHERE lid =$lid";
$lawyer_name_result = mysqli_query($conn, $lawyer_name_sql);
while ($row = mysqli_fetch_assoc($lawyer_name_result)) {
    $lawyer_name_data[] = $row;
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
                        <a class="nav-link" href="./courts.php"><button class="btn btn-outline-warning">Courts</button></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./cases.php"><button class="btn btn-outline-warning">My cases</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php"><button class="btn btn-danger">Sign out</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2 class="mt-5">Hello <?php foreach ($lawyer_name_data as $l) {echo $l['name'];} ?> !!</h2>
        <p class="">Please find your new case requests here</p>
        <div class="mt-5 mb-5 py-2 case-form">

            <div class="row mx-1">
                <div class="col-md-12">
                    <div class="list-group">
                        <?php
                        if ($num_rows == 0) {
                            echo '<span class="badge badge-pill badge-light mt-5 mx-1"> No recent case requests </span>';
                        } else {
                            foreach ($data as $a) { ?>
                                <li class="list-group-item list-group-item-info mt-2"><?php $a['casetype']; ?>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <?php echo $a['name'] . ","; ?>
                                            <?php echo $a['description']; ?>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="accept.php?id=<?php echo $a['case_id']; ?>" class="mt-2 btn btn-primary btn-block">Accept Case</a>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../footer.php'; ?>
</body>

</html>