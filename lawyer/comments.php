<?php include 'connect.php'?>
<?php
$comment = $date = $user_id = "";
$user_id = "SELECT Id FROM user_details";
$comment = $_POST['comment'];
$date = date('d-m-Y H:i');
$sql = "INSERT INTO comments (user_id,comment,date) VALUES ('user_id','$comment','$date')";
if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">
            window.location = ""
            </script>';
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Comment </title>
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
        <div class="row mt-4">
            <div class="col-md-10 mx-auto">
                <h4>Add Comment</h4>
                <div class="list-group mt-2">
                    <form action="" method="post">
                        <div class="form-group">
                            <textarea class="form-control" rows="10" id="comment" name="comment">
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
</body>

</html>