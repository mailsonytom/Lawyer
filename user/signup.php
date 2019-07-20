<?php include 'connect.php' ?>
<?php
    $firstname = $lastname = $username = $password = $address = $phone = "";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $flag = 0;
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['ph_no'];
        $address = $_POST['address'];
        $select_query = "SELECT * FROM user_details";
    $result = mysqli_query($conn, $select_query);
    while($row=mysqli_fetch_assoc($result)){
        if($row['email'] == $username){
        $flag = 1;
            echo '<script type="text/javascript">
                    window.location = "user_duplicate_error.php"
                    </script>';
        }
    }
    if($flag == 0){
        $sql = "INSERT INTO user_details (first_name, last_name, email_id, password, phone, address) VALUES ('$firstname', '$lastname', '$username', '$password', '$phone', '$address')";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">
                    window.location = "login.php"
                    </script>';
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>
        sign-up list
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Lawyer Management Module</a>
        <a href="signin.php">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign In</button>
        </a>
    </nav>
    <div class="container">
        <h2 class= " col-md-4 text-center mx-auto"> Sign-up as user</h2>
        <form action="" method="POST" class="col-md-8 mx-auto mt-5 px-2 py-2 border border-primary rounded" >
            <div class="form-group">
                <label for="Inputfirstname">First name</label>
                <input type="text" class="form-control" name="firstname" id="Inputfirstname" aria-describedby="nameHelp" placeholder="Enter first name">
            </div>
            <div class="form-group">
                <label for="Inputlastname">Last name</label>
                <input type="text" class="form-control" name="lastname" id="Inputlastname" aria-describedby="nameHelp" placeholder="Enter last name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="ph_no" id="ph_no"
                    placeholder="Enter phone number">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" id="exampleInputEmail1" 
                    placeholder="Enter address">
            </div>
            <input type="submit" name="submit" class="btn btn-primary">
        </form>
        <br>
    </div>
</body>

</html>