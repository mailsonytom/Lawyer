<?php include 'connect.php' ?>
<?php
session_start();
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    $id = $_SESSION['id'];
}
else{
    echo '<script type="text/javascript">
                window.location = "login.php"
                 </script>';
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Users</title>
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
                        <a class="nav-link active">Users</a>
                    </li>
            <li class="nav-item">
                <a class="nav-link" href="courts.php">Courts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">SIGNOUT</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="mt-5 mb-5 py-2 border border-primary rounded">
            <div class="row">
                <h4 class=" col-md-4 mx-auto text-center">
                </h4>
            </div>
            <div class="row mx-1">
                <div class="col-md-6">
                    <div class="list-group">
                        <?php
                        $sql = "SELECT * FROM user_details";
                        $result = mysqli_query($conn, $sql);
                        while($row=mysqli_fetch_assoc($result)){
                                echo '<li class="list-group-item list-group-item-success">' .$row['name']. '<br>';
                                echo $row['email']. '<br>';
                                echo $row['phone']. '</li>';
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