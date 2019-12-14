<?php include 'connect.php' ?>
<?php
session_start();
if (!isset($_SESSION['id'])) {
    echo '<script type="text/javascript">
                    window.location = "login.php"
                     </script>';
} else {
    if (isset($_GET)) {
        $lid = $_GET['lid'];
        $sql = "UPDATE lawyer_details SET approved =1 WHERE lid= $lid ";
        if (mysqli_query($conn, $sql)) {
            echo '<script type="text/javascript">
            window.location = "home.php"
             </script>';
        } else {
            echo '<script type="text/javascript">
            window.location = "home.php"
             </script>';
        }
    }
}
?>