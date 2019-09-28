<?php include 'connect.php' ?>
<?php
         if(isset($_GET)){
             $uid = $_GET['uid']; 
          }
          $sql = "UPDATE cases SET active_status = 1 WHERE uid= $uid ";
          $result = mysqli_query($conn, $sql);
          header("Refresh:0; url=home.php");
?>