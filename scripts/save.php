<?php
$servername = "localhost";
$username = "admin_flix";
$password = "Zaq1xsw2";
$dbname = "admin_flix";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = $_POST["data"];
$id = $_POST["id"];
$date = date('m/d/Y h:i:s a', time());

$sql = "UPDATE `scripts` SET `content`='$data',`lastsave`='$date' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
