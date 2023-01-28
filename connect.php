<?php
$name = $_POST['name'];
$message = $_POST['message'];

// Database connection
$conn = new mysqli('localhost','root','','interact');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
} else{
    $stmt = $conn->prepare("insert into message(name, message) values(?,?)");
    $stmt->bind_param("ss", $name, $message);
    $stmt->execute();
    echo "sending message...";
    $stmt->close();
    $conn->close();
}

?>