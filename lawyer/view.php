<?php include 'connect.php' ?>
<!DOCTYPE html>
<html>

<head>
    <title> Lawyer-comment page </title>
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
                        <a class="nav-link" href="home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="courts.html">Courts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="details.html">Comments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hsdetails.html">History</a>
                    </li>
                </ul>
        <div class="mt-5 mb-5 py-2 border border-primary rounded">
            <div class="row mx-1 mt-2 mb-2">
                <div class="col-md-6">
                    <div class="list-group">
                    <?php
                            $sql = "SELECT * FROM comments";
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_assoc($result)){
                                if($row['status'] == 0){
                                    $user_query = "SELECT first_name FROM user_details WHERE Id=".$row['user_id'];
                                    $user_result = mysqli_query($conn, $user_query);
                                    $user_row = mysqli_fetch_assoc($user_result);
                                    echo '<p>' .$user_row['first_name']. ' commented</p>';
                                    echo '<p>' .$row['comment']. '</p>';
                                    echo '<p>' .$row['date']. '</p>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>