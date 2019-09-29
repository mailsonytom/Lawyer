<?php include 'connect.php' ?>
<?php
session_start();
if (!isset($_SESSION['lid']) || empty($_SESSION['lid'])) {
    echo '<script type="text/javascript">
                        window.location = "login.php"
                         </script>';
} else {
    if (isset($_GET['id'])) {
        $case_id = $_GET['id'];
        $sql = "UPDATE cases SET active_status = 1 WHERE case_id='$case_id'";
        $result = mysqli_query($conn, $sql);
        echo '<script type="text/javascript">
                        window.location = "home.php"
                         </script>';
    }
}
?>