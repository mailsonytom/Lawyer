<?php include 'connect.php' ?>
<?php
session_start();
if (!isset($_SESSION['lid']) && empty($_SESSION['lid'])) {
    echo '<script type="text/javascript">
                        window.location = "login.php"
                         </script>';
} else {

    $lid = $_SESSION['lid'];
    echo $lid;
    $sql = "UPDATE cases SET active_status = 1 WHERE lid= $lid ";
    $result = mysqli_query($conn, $sql);
    header("Refresh:; url=");
}
?>