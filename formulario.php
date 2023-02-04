<?php
function processFormData() {
  // Check if the form was submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $user_name = $_POST["user_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Validate the data
    if (empty($user_name) || empty($last_name) || empty($email) || empty($phone)) {
      echo "All fields are required.";
      return;
    }

    // Connect to the MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase";
    $port = 3306;

    $conn = mysqli_connect($servername, $username, $password, $dbname, $port);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Insert the data into the database
    $sql = "INSERT INTO users (user_name, last_name, email, phone)
            VALUES ('$user_name', '$last_name', '$email', '$phone')";
    if (mysqli_query($conn, $sql)) {
      echo "Data added successfully.";
    } else {
      echo "Error adding data: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
  }
}
?>