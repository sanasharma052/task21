<?php
// DB credentials
$servername = "localhost";
$username = "root";      // default XAMPP username
$password = "";          // default XAMPP password is empty
$dbname = "college_club_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if data is posted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Sanitize inputs
  $name = $conn->real_escape_string($_POST['name']);
  $email = $conn->real_escape_string($_POST['email']);
  $message = $conn->real_escape_string($_POST['message']);

  // Insert into DB
  $sql = "INSERT INTO contact_messages (name, email, message) 
          VALUES ('$name', '$email', '$message')";

  if ($conn->query($sql) === TRUE) {
    echo "<h2 style='text-align:center;'>Thank you for contacting us!</h2>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
} else {
  echo "No data received.";
}
?>
