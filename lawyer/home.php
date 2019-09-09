<?php include 'connect.php' ?>


<!DOCTYPE html>
<html>

<head>
    <title>Choose</title>
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
                <a class="nav-link" href="comments.php">Comments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="history.php">History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.html">SIGNOUT</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <h2 class=" col-md-4 mx-auto mt-5 text-center">Hello Lawyer!!</h2>
        <div class="mt-5 mb-5 py-2 border border-primary rounded">
            <h4 class=" col-md-4 mt-2  mx-auto text-center">
                New Case Requests
            </h4>
            <div class="row mx-1">
                <div class="col-md-12">
                        <div class="list-group">
                           <?php
                            $sql = "SELECT * FROM cases";
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_assoc($result)){
                                if($row['active_status'] == 0){
                                    $casetype_query = "SELECT casetype FROM casetype WHERE id=".$row['casetype_id'];
                                    $casetype_result =  mysqli_query($conn, $casetype_query);
                                    $casetype_row = mysqli_fetch_assoc($casetype_result);
                                    echo '<div class="col-md-3"> <span class="badge badge-success">' .$casetype_row['casetype']. '</span></div>';
                                    $user_query = "SELECT first_name FROM user_details WHERE Id=".$row['user_id'];
                                    $user_result = mysqli_query($conn, $user_query);
                                    $user_row = mysqli_fetch_assoc($user_result);
                                    echo '<div class="col-md-5"> <span class="badge badge-danger">' .$user_row['first_name']. '</span></div>';
                                    echo '<p>' .$row['description'].'</p>';
                                }
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