<?php include 'connect.php' ?>
<?php
$email=$_POST['email'];
$password=$_POST['password'];
echo $email."<br>";
echo $password;
$sql = "INSERT INTO user_details (first_name, last_name, email_id, password, phone, address) VALUES ('$firstname', '$lastname', '$username', '$password', '$phone', '$address')";
$conn->query($sql)
?>
