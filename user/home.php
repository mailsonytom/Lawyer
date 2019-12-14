<?php include 'connect.php' ?>
<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
session_start();
if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
} else {
    echo '<script type="text/javascript">
                window.location = "index.php"
                 </script>';
}
$user_name_data = [];
$user_name_sql = "SELECT name FROM user_details WHERE uid =$uid";
$user_name_result = mysqli_query($conn, $user_name_sql);
while ($row = mysqli_fetch_assoc($user_name_result)) {
    $user_name_data[] = $row;
}

$casetype_data = [];
$casetype_sql = "SELECT * FROM casetype";
$casetype_result = mysqli_query($conn, $casetype_sql);
while ($row = mysqli_fetch_assoc($casetype_result)) {
    $casetype_data[] = $row;
}

$lawyer_data = [];
$lawyer_sql = "SELECT * FROM lawyer_details WHERE approved =1";
$lawyer_result = mysqli_query($conn, $lawyer_sql);
while ($row = mysqli_fetch_assoc($lawyer_result)) {
    $lawyer_data[] = $row;
}

$court_data = [];
$court_sql = "SELECT * FROM courts";
$court_result = mysqli_query($conn, $court_sql);
while ($row = mysqli_fetch_assoc($court_result)) {
    $court_data[] = $row;
}
$casetype = $lawyer = $court = $date = $desc = $error = "";
$flag = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uid = $_SESSION['uid'];
    $casetype = $_POST['casetype'];
    $lawyer = $_POST['lawyer'];
    $court = $_POST['court'];
    if (empty($_POST["date"])) {
        $error = "Date is required";
        $flag = 1;
    } else {
        $date = test_input($_POST['date']);
    }
    if (empty($_POST["desc"])) {
        $error = "Description is required";
        $flag = 1;
    } else {
        $desc = test_input($conn->real_escape_string($_POST['desc']));
    }
    if ($flag == 0) {
        $sql = "INSERT INTO cases (uid, casetype_id, lid, cid, date, description, active_status) VALUES ('$uid', '$casetype', '$lawyer', '$court', '$date', '$desc', '0')";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">
                    window.location = "cases.php"
                    </script>';
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/footer.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href=""><b>FYLAW</b></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./lawyer.php"><button class="btn btn-outline-warning">Lawyers</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./courts.php"><button class="btn btn-outline-warning">Courts</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./cases.php"><button class="btn btn-outline-warning">My cases</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php"><button class="btn btn-danger">Sign out</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row home-cover text-light">
            <h2 class=" col-md-4 mx-auto text-center mt-5 mb-5 ">Hello <?php foreach ($user_name_data as $u) {
                                                                            echo $u['name'];
                                                                        } ?> !!</h2>
            <p class="col-md-10 offset-1 text-center mt-3 mb-5">
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
    </div>
    <div class="container">
        <div class="mt-5 py-5 m-md-3">
            <form action="" method="POST" class="mt-5 m-md-3 mr-1 ml-1 case-form p-5">
                <div class="row">
                    <h4 class=" col-md-5 mx-auto text-center">New Case Registration</h4>
                </div>
                <div class="row mx-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Type of Case *</label>
                            <select class="form-control" name="casetype">
                                <?php foreach ($casetype_data as $a) { ?>
                                    <option value="<?php echo $a['casetype_id']; ?>">
                                        <?php echo $a['casetype']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Lawyer *</label>
                            <select class="form-control" name="lawyer">
                                <?php foreach ($lawyer_data as $b) { ?>
                                    <option value="<?php echo $b['lid']; ?>">
                                        <?php echo $b['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label>Court *</label>
                            <select class="form-control" name="court">
                                <?php foreach ($court_data as $c) { ?>
                                    <option value="<?php echo $c['cid']; ?>">
                                        <?php echo $c['court_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Date *</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description*</label>
                            <textarea class="form-control" id="desc" name="desc"></textarea>
                        </div>
                    </div>
                    <span class="badge badge-pill badge-warning"><?php echo $error; ?></span>
                </div>
                <div class="col-md-12 mt-2 text-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" name="agree" required>
                        <label class="form-check-label" for="invalidCheck">
                            I agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                        <br><br>
                        <input type="submit" value="Submit" class="btn btn-success form-control" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include '../footer.php'; ?>
</body>

</html>