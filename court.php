<?php include 'connect.php' ?>
<?php
    $sql = "SELECT * FROM courts";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Courts</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/footer.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="./index.php"><b>FYLAW</b></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./user/"><button class="btn btn-outline-warning">Client portal</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./lawyer/"><button class="btn btn-outline-warning">Lawyer portal</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./admin/"><button class="btn btn-outline-warning">Admin portal</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./lawyers.php"><button class="btn btn-outline-warning">Lawyers</button></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2 class="mt-5">
            Courts Available
        </h2>
        <div class="mt-5 mb-5 py-2 case-form">
            <div class="row">

            </div>
            <div class="row mx-1">
                <div class="col-md-12">
                    <div class="list-group">
                        <table class="table table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>Name of the court</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($num_rows > 0){
                                foreach ($data as $a) { ?>
                                    <tr>
                                        <td><?php echo $a['court_name']; ?></td>
                                        <td><?php echo $a['place']; ?></td>
                                    </tr>
                                <?php } }
                                else{
                                    echo '<tr><span class="badge badge-pill badge-danger mt-5 mx-1">There are no courts</span></tr>';

                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include './footer.php'; ?>
</body>

</html>