<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kingsukh";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $message = $_POST['message'];

  $sql = "INSERT INTO contactus (first_name, last_name, email, mobile, message)
          VALUES ('$first_name', '$last_name', '$email', '$mobile', '$message')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Thank you for your message!');
            setTimeout(function() {
              window.location.href = './index.html'; // Redirect after 1 second
            }, 1000);
          </script>";
  } else {
    echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
  }

  $conn->close();
}
?>
