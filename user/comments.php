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
                <a class="nav-link" href="lawyer.html">Lawyers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="courts.html">Courts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active">Comments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="history.html">History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.html">SIGNOUT</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="mt-5 mb-5 py-2 border border-primary rounded">
            <div class="row mx-1 mt-2 mb-2">
                <div class="col-md-6">
                    <div class="list-group">
                    <?php
                            if(isset($_GET)){
                                $case_id = $_GET['id']; 
                            }
                            $sql = "SELECT * FROM comments WHERE case_id=".$case_id;
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_assoc($result)){
                                if($row['status'] == 0){
                                    $user_query = "SELECT first_name FROM user_details WHERE Id=".$row['user_id'];
                                    $user_result = mysqli_query($conn, $user_query);
                                    $user_row = mysqli_fetch_assoc($user_result);
                                    echo '<li class="list-group-item list-group-item-success">' .$user_row['first_name']. ' commented<br>';
                                    echo $row['date'].'<br>';
                                    echo $row['comment'].'<br>';
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                <h4>Add Comment</h4>
                <div class="list-group mt-2">
                    <form action="" method="post">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="comment" name="comment">
                                </textarea>
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