<?php include 'connect.php' ?>
<?php
session_start();
if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {

    echo '<script type="text/javascript">
    window.location = "index.php"
     </script>';
} else {
    $data = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $case_id = $_POST['case_id'];
        $comment = $_POST['comment'];
        $csql = "INSERT INTO comments (case_id, user, comment) VALUES ('$case_id', '0', '$comment')";
        mysqli_query($conn, $csql);
        echo '<script type="text/javascript">
        window.location = "comments.php?id=', $case_id, '
        </script>';
    }
    $uid = $_SESSION['uid'];
    if (isset($_GET['id'])) {
        $case_id = $_GET['id'];
        $sql = "SELECT * FROM comments WHERE case_id=" . $case_id;
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);
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
        <h2 class="mt-5">Comments</h2>
        <div class="mt-5 mb-5 py-2 case-form">

            <div class="row mx-1 mt-2 mb-2">
                <div class="col-md-6">
                    <div class="list-group">
                        <?php 
                        if ($num_rows > 0) {
                            foreach ($data as $a) { ?>
                            <li class="list-group-item list-group-item-info mt-2">
                                <?php if ($a['user'] == 0) {
                                        echo "You";
                                    } else {
                                        echo "Lawyer";
                                    } ?> Commented: <br>
                                <p><?php echo $a['comment']; ?></p>

                            </li>
                        <?php } }
                        else{
                            echo '<span class="badge badge-pill badge-light mt-5 mx-1">There are no comments</span>';
                        } ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>Add Comment</h4>
                    <div class="list-group mt-2">
                        <form action="" method="post">
                            <div class="form-group">
                                <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                                <input type="text" hidden name="case_id" value=<?php echo $case_id; ?> />
                                <div class="col-md-3 mt-2 text-center mx-auto">
                                    <a href="">
                                        <button class="btn btn-success " type="submit">Submit</button>
                                    </a>
                                </div>
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