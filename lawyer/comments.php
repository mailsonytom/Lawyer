<?php include 'connect.php' ?>
<?php
session_start();
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (!isset($_SESSION['lid']) || empty($_SESSION['lid'])) {
    echo '<script type="text/javascript">
    window.location = "login.php"
     </script>';
} else {
    $error = $comment = "";
    $flag = 0;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (empty($_POST["comment"])) {
            $error = "Comment is required";
            $flag = 1;
        } else {
            $comment = test_input($conn->real_escape_string($_POST['comment']));
        }
        $case_id = $_POST['case_id'];
        if ($flag == 0) {
            $csql = "INSERT INTO comments (case_id, user, comment) VALUES ('$case_id', '1', '$comment')";
            if (mysqli_query($conn, $csql)) {
                echo '<script type="text/javascript">
                window.location = "comments.php?id=', $case_id, '
                </script>';
            }
        }
    }
    if (isset($_GET['id'])) {
        $case_id = $_GET['id'];
        $sql = "SELECT * FROM comments WHERE case_id=" . $case_id;
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
    <title>Comments</title>
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
                        <a class="nav-link" href="./cases.php"><button class="btn btn-outline-warning">Cases</button></a>
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
            <div class="row mx-1 mt-2 mb-2">
                <div class="col-md-6">
                    <div class="list-group">
                        <?php foreach ($data as $a) { ?>
                            <li class="list-group-item list-group-item-info mt-2">
                                <?php if ($a['user'] == 1) {
                                        echo "You";
                                    } else {
                                        echo "Client";
                                    } ?> Commented: <br>
                                <p><?php echo $a['comment']; ?></p>

                            </li>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="">Add Comment</h4>
                    <div class="list-group mt-2">
                        <form action="" method="post">
                            <div class="form-group">
                                <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                                <input type="text" hidden name="case_id" value=<?php echo $case_id; ?> />
                                <span class="badge badge-pill badge-warning"><?php echo $error; ?></span>
                                <br>
                                <input class="btn btn-success form-control" value="Submit" type="submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../footer.php'; ?>
</body>

</html>