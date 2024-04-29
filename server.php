<?php
session_start();

// Initializing variables
$email = "";
$errors = array(); 

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'PRICEHIVE');

// REGISTER USER
if (isset($_POST['signup'])) {
  // Receive input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_confirm']);

  // Form validation
  if (empty($email)) { 
    array_push($errors, "Email is required"); 
  }
  if (empty($password_1)) { 
    array_push($errors, "Password is required"); 
  }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  // Check if user already exists
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { 
    array_push($errors, "Email already exists");
  }

  // If no errors, register user
  if (count($errors) == 0) {
    $password = password_hash($password_1, PASSWORD_DEFAULT); // Encrypt password before saving in database
    $query = "INSERT INTO users (email, password) 
              VALUES('$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['email'] = $email;
    $_SESSION['success'] = "You are now registered and logged in";
    header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login'])) {
  // Receive input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // Form validation
  if (empty($email)) { 
    array_push($errors, "Email is required"); 
  }
  if (empty($password)) { 
    array_push($errors, "Password is required"); 
  }

  // If no errors, log user in
  if (count($errors) == 0) {
    $query = "SELECT * FROM users WHERE email='$email'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $user = mysqli_fetch_assoc($results);
      if (password_verify($password, $user['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.html');
      } else {
        header("Location:index.php?errror=Incorect User name or password");
      }
    } else {
      header("Location:index.php?errror=Incorect User name or password");
    }
  }
}
?>