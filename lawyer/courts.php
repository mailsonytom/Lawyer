<?php include 'connect.php' ?>
<!DOCTYPE html>
<html>

<head>
    <title> Lawyer-courts page </title>
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
                        <a class="nav-link active" href="courts.html">Courts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="details.html">Comments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hsdetails.html">History</a>
                    </li>
                </ul>
        <div class="mt-5 mb-5 py-2 border border-primary rounded">
            <div class="row">
                <h4 class=" col-md-4 mx-auto mt-2 text-center">
                    Courts Available
                </h4>
            </div>
            <div class="row mx-1 mt-3 mb-3">
                <div class="col-md-6">
                    <div class="list-group">
                    <?php
                            $sql = "SELECT * FROM courts";
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_assoc($result)){
                                if($row['active_status'] == 1){
                                    echo '<p>' .$row['court_name']. '</p>';
                                    echo '<p>' .$row['location']. '</p>';

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