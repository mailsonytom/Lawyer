<?php include 'connect.php' ?>
<?php
session_start();
if(isset($_SESSION['lawyer_id']) && !empty($_SESSION['lawyer_id'])){
    $lawyer_id = $_SESSION['lawyer_id'];
}
else{
    echo '<script type="text/javascript">
                window.location = "../index.php"
                 </script>';
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
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
                <a class="nav-link" href="../index.php">SIGNOUT</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
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
                                    $casetype_query = "SELECT casetype FROM casetype WHERE case_id=".$row['casetype_id'];
                                    $casetype_result =  mysqli_query($conn, $casetype_query);
                                    $casetype_row = mysqli_fetch_assoc($casetype_result);
                                    echo '<li class="list-group-item list-group-item-success">' .$casetype_row['casetype']. '<br>';
                                    $user_query = "SELECT name FROM user_details WHERE uid=".$row['uid'];
                                    $user_result = mysqli_query($conn, $user_query);
                                    $user_row = mysqli_fetch_assoc($user_result);
                                    echo $user_row['name']. '<br>';
                                    echo $row['description'].'</li>';
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