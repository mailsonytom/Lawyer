<?php include 'connect.php' ?>
<?php
session_start();
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM user_details";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
} else {
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
    <link rel="stylesheet" type="text/css" href="../assets/css/footer.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../home.html"><b>FYLAW</b></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./lawyer.php"><button class="btn btn-outline-warning">Lawyer</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./user.php"><button class="btn btn-outline-warning">User</button></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./courts.php"><button class="btn btn-outline-warning">Courts</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./casetype.php"><button class="btn btn-outline-warning">Casetype</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php"><button class="btn btn-danger">Sign out</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container ">
        <h2 class="mt-3">Users in the system</h2>
        <div class="row py-4 mb-4 case-form">
            <div class="col-md-12">
                <div class="list-group">
                    <table class="table table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $a) { ?>
                                <tr>
                                    <td><?php echo $a['name']; ?></td>
                                    <td class="text-center"><?php echo $a['email']; ?></td>
                                    <td class="text-center"><?php echo $a['phone']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include '../footer.php'; ?>
</body>

</html>