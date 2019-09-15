<?php include 'connect.php' ?>
<?php

    $firstname = $casetype = $lawyer = $lastname = $court = $date = "";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $firstname = $_POST['first_name'];
        $casetype = $_POST['casetype'];
        $lawyer = $_POST['lawyer'];
        $lastname = $_POST['last_name'];
        $court = $_POST['court'];
        $date = $_POST['date'];
        
        $sql = "INSERT INTO new_case (firstname, casetype, lawyer, lastname, court, date) VALUES ('$firstname', '$casetype', '$lawyer', '$lastname', '$court', '$date')";
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