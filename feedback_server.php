<?php
session_start();

// Initialize variables
$name = "";
$email = "";
$feedback = "";
$errors = array(); 

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'PRICEHIVE');

// If the submit feedback button is clicked
if (isset($_POST['submit_feedback'])) {
  // Receive input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $feedback = mysqli_real_escape_string($db, $_POST['feedback']);

  // Form validation
  
  if (empty($email)) { 
    array_push($errors, "Email is required"); 
  }
  if (empty($feedback)) { 
    array_push($errors, "Feedback is required"); 
  }

  // If no errors, save feedback to the database
  if (count($errors) == 0) {
    $query = "INSERT INTO feedback (email, feedback) 
              VALUES('$email', '$feedback')";
    mysqli_query($db, $query);
    $_SESSION['success'] = "Your feedback has been submitted successfully";
    header('location: index.php');
  }
}
?>
