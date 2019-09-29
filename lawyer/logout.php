<?php
   session_start();
   unset($_SESSION['counter']);
   session_destroy();
   echo '<script type="text/javascript">
                window.location = "login.php"
                 </script>';
?>