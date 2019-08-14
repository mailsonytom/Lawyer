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
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Lawyer Management</a>
        <a href="login.html">
            <button class="btn btn-warning" type="submit">Signout</button>
        </a>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <h2 class=" col-md-5 text-center mt-3 mx-auto"> Sign-up as user</h2>
            <div class="col-md-8 mx-auto mt-5 px-2 py-2 border border-primary rounded">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>First name</label>
                        <input type="text" class="form-control" name="firstname" id="Inputfirstname"
                            placeholder="Firstname">
                    </div>
                    <div class="form-group">
                        <label>Last name</label>
                        <input type="text" class="form-control" name="lastname" id="Inputlastname"
                            placeholder="Lastname">
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                            placeholder="Email Id">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                            placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="ph_no" id="ph_no" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1"
                            placeholder="Address">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary">
                </form>
            </div>
            <br>
        </div>
    </div>
</body>

</html>