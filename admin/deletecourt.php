<?php include 'connect.php' ?>
<?php
session_start();
if (!isset($_SESSION['id'])) {
    echo '<script type="text/javascript">
                    window.location = "login.php"
                     </script>';
} else {
    if (isset($_GET['id'])) {
        $court_id = $_GET['id'];
        $sql = "DELETE FROM courts WHERE cid='$court_id'";
        if (mysqli_query($conn, $sql)) {
            echo '<script type="text/javascript">
            window.location = "courts.php"
             </script>';
        }
    } else {
        echo '<script type="text/javascript">
        window.location = "courts.php"
         </script>';
    }
}

?>