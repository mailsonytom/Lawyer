<?php include 'connect.php' ?>


<!DOCTYPE html>
<html>

<head>
    <title> Lawyer home page </title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Lawyer Management</a>
        <a href="login.php">
            <button class="btn btn-warning" type="submit">Signout</button>
        </a>
    </nav>
    <div class="container-fluid">

        <ul class="nav nav-tabs nav-fill">
            <li class="nav-item">
                <a class="nav-link active" href="home.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="courts.html">Courts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="details.html">Comments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="hsdetails.html">History</a>
            </li>
        </ul>
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
    <footer id="sticky-footer" class="py-4 bg-primary">
        <div class="container text-center">
            <small>@ 2019 Copyright - Lawyer Management</small>
        </div>
    </footer>
</body>

</html>