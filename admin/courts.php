<?php include 'connect.php' ?>
<?php
    $court = "";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $court = $_POST['court'];
        $sql = "INSERT INTO new_court (court) VALUES ('$court')";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">
                    window.location = ""
                    </script>';
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }

?>