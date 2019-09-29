<?php include 'connect.php' ?>
<?php
session_start();
if (!isset($_SESSION['lid']) || empty($_SESSION['lid'])) {
    echo '<script type="text/javascript">
    window.location = "login.php"
     </script>';
} else {
    $data = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $lid = $_SESSION['lid'];
        $case_id = $_POST['case_id'];
        $history = $_POST['history'];
        $uid = mysqli_fetch_assoc(mysqli_query($conn, "SELECT uid FROM cases WHERE case_id ='$case_id'"))['uid'];
        $csql = "INSERT INTO history (lid, case_id, uid, history) VALUES ('$lid', '$case_id', '$uid', '$history')";
        mysqli_query($conn, $csql);
        echo '<script type="text/javascript">
            window.location = "history.php?id=', $case_id, '
            </script>';
    }
    $lid = $_SESSION['lid'];
    if (isset($_GET['case_id'])) {
        $case_id = $_GET['case_id'];
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
                <a class="nav-link" href="cases.php">Cases</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="courts.php">Courts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php">SIGNOUT</a>
            </li>

        </ul>
    </nav>
    <div class="container-fluid">
        <div class="mt-5 mb-5 py-2 border border-primary rounded">
            <div class="row mx-1 mt-2 mb-2">
                <div class="col-md-6">
                    <div class="list-group">
                        <?php foreach ($data as $a) { ?>
                            <li class="list-group-item list-group-item-success">
                                <?php echo $a['name']; ?> Updated: <br>
                                <p><?php echo $a['history']; ?></p>

                            </li>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>Add History</h4>
                    <div class="list-group mt-2">
                        <form action="" method="POST">
                            <div class="form-group">
                                <textarea class="form-control" rows="5" id="history" name="history">
                                </textarea>
                                <input type="text" hidden name="case_id" value=<?php echo $case_id; ?> />
                                <div class="col-md-3 mt-2 text-center mx-auto">
                                    <a href="">
                                        <button class="btn btn-success " type="submit">UPDATE</button>
                                    </a>
                                </div>
                            </div>
                        </form>
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