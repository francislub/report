<?php
// require_once '../config.php';
require_once "../../include/functions.php";

// Assuming you have established a database connection and stored it in the $conn variable

  // Get the course id from the URL
  $sno = $_GET['sno'];
   // Delete the course from the database
   $sql = "DELETE FROM streem WHERE sno = $sno";

   if ($conn->query($sql) === TRUE) {
     // Redirect back to the course.php page
     header("Location: ../index.php?streem");
    //  echo "<script>window.location = '../index.php?streem'</script>";
     exit;
   } else {
     echo "Error deleting record: " . $conn->error;
   }

// Close the database connection
$conn->close();
?>
