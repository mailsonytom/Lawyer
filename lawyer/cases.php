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
                <a class="nav-link" href="">Lawyers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Courts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Signout</a>
            </li>

        </ul>
    </nav>
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                    <h3>Cases</h3>
                        <div class="list-group">
                        <?php
                            $sql = "SELECT * FROM cases";
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_assoc($result)){
                                    $case_query = "SELECT casetype FROM casetype WHERE id=".$row['casetype_id'];
                                    $case_result = mysqli_query($conn, $case_query);
                                    $case_row = mysqli_fetch_assoc($case_result);
                                    echo '<li class="list-group-item list-group-item-success">' .$row['id'].'<br>';
                                    echo $case_row['casetype'].'<br>' ;
                                    echo $row['description'].' 
                                    <a href="comments.php?id='.$row['id'].'"<button class="btn btn-primary" role="button">View/Add Comment</button></a>
                                    <a href="history.php?id='.$row['id'].'"<button class="btn btn-primary" role="button">View/Add History</button></a>
                                     </a></li>';
                            }
                        ?>
                        </div>
                </div>
        </div>
    </div>
    </div>
</body>

</html>