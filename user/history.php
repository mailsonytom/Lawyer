<?php include 'connect.php' ?>
<?php
session_start();
if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
    echo '<script type="text/javascript">
                window.location = "../index.php"
                 </script>';
} else {
    $data = [];
    $uid = $_SESSION['uid'];
    if (isset($_GET['id'])) {
        $case_id = $_GET['id'];
        $sql = "SELECT * FROM history INNER JOIN lawyer_details ON history.lid = lawyer_details.lid WHERE case_id=" . $case_id;
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    } else {
        echo '<script type="text/javascript">
    window.location = "cases.php"
    </script>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>History</title>
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
                <a class="nav-link" href="cases.php">Cases</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">SIGNOUT</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="mt-5 mb-5 py-2 border border-primary rounded">
            <h3 class="mx-auto text-center">Case History</h3>
            <div class="row mx-1 mt-2 mb-2">
                <div class="col-md-12">
                    <div class="list-group">
                        <?php foreach ($data as $a) { ?>
                            <li class="list-group-item list-group-item-success">
                                <?php echo $a['name']; ?> Updated: <br>
                                <p><?php echo $a['history']; ?></p>
                                <p><?php echo $a['date']; ?></p>
                            </li>
                        <?php } ?>
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