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
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                <li class="nav-item">
                        <a class="nav-link" href="cases.php">Cases</a>
                    </li>
            <li class="nav-item">
                <a class="nav-link active">Courts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.html">SIGNOUT</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="mt-5 mb-5 py-2 border border-primary rounded">
            <div class="row">
                <h4 class=" col-md-4 mx-auto mt-2 text-center">
                    Courts Available
                </h4>
            </div>
            <div class="row mx-1 mt-3 mb-3">
                <div class="col-md-12">
                    <div class="list-group">
                    <?php
                            $sql = "SELECT * FROM courts";
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_assoc($result)){
                                if($row['activestatus'] == 1){
                                    echo '<li class="list-group-item list-group-item-success">' .$row['court_name']. '</br>';
                                    echo $row['place']. '</li>';

                                }
                            }
                        ?>
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