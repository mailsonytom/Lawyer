<?php include 'connect.php' ?>
<?php
         if(isset($_GET)){
             $lid = $_GET['lid']; 
          }
          $sql = "UPDATE lawyer_details SET approved =1 WHERE lid= $lid ";
          $result = mysqli_query($conn, $sql);
          header("Refresh:0; url=home.php");
?>