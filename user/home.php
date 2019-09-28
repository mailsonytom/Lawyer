<?php include 'connect.php' ?>
<?php
session_start();
if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
    $uid = $_SESSION['uid'];
}
else{
    echo '<script type="text/javascript">
                window.location = "../index.php"
                 </script>';
}
?>
<?php

    $firstname = $casetype = $lawyer = $lastname = $court = $date = "";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $firstname = $_POST['first_name'];
        $casetype = $_POST['casetype'];
        $lawyer = $_POST['lawyer'];
        $lastname = $_POST['last_name'];
        $court = $_POST['court'];
        $date = $_POST['date'];
        
        $sql = "INSERT INTO ##### (firstname, casetype, lawyer, lastname, court, date) VALUES ('$firstname', '$casetype', '$lawyer', '$lastname', '$court', '$date')";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">
                    window.location = "cases.php"
                    </script>';
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
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
                <a class="nav-link" href="lawyer.php">Lawyers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="courts.php">Courts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cases.php">Cases</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php">SIGNOUT</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <h2 class=" col-md-4 mx-auto text-center mt-5 mb-5 ">Hello user!!</h2>
            <p class="col-md-10 mx-auto text-center mt-5 mb-5">
                This is a team of skilled lawyers dedicated to smart, aggressive and
                strategic advocacy. Our practice areas include all criminal offences including drug offences, sexual
                offences, driving offences, violent offences and white collar crime. Recognized for defending some of
                Alberta's most notorious high-profile criminal cases, the lawyers are committed
                to providing their clients with a high-calibre, dynamic defence aimed at achieving successful results.
                Our
                lawyers have a combined background of impressive achievements and qualifications as well as a commitment
                to
                professional excellence, client services and expert legal advice.
            </p>
        </div>
        <div class="mt-5 m-md-3 border border-primary rounded">
            <form action="" method="POST" class="mt-5 m-md-3 mr-1 ml-1">
                <div class="row">
                    <h4 class=" col-md-5 mx-auto text-center">NEW CASE REGISTRATION</h4>

                </div>
                <div class="row mx-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Type of Case</label>
                            <select class="form-control" name="casetype">
                                <option></option>
                                <option>Civil case</option>
                                <option>Criminal case</option>
                                <option>Enforcement case</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Lawyer</label>
                            <select class="form-control" name="lawyer">
                                <option></option>
                                <option>Jacob Sacharia</option>
                                <option>Madhav Raj</option>
                                <option>Sunny Abraham</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Court</label>
                            <select class="form-control" name="court">
                                <option></option>
                                <option>District Court</option>
                                <option>High Court</option>
                                <option>Supreme Court</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-2 text-center mx-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" name="agree" required>
                        <label class="form-check-label" for="invalidCheck">
                            I agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                        <a href="newcase.html">
                            <button class="btn btn-success " type="submit">Submit</button>
                        </a>
                    </div>
                </div>
        </div>
    </div>
    </form>
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