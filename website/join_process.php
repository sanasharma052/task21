<?php
// DB credentials
$servername = "localhost";
$username = "root";  // use your DB username
$password = "";      // use your DB password
$dbname = "college_club_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$branch = $_POST['branch'];
$interest = $_POST['interest'];

// Insert into DB
$sql = "INSERT INTO club_members (full_name, email, branch, interest)
        VALUES ('$name', '$email', '$branch', '$interest')";

if ($conn->query($sql) === TRUE) {
  echo "Thank you for joining!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

