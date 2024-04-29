<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website with Login & Registration Form</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>
<style>
  .about_us_content {
  padding: 50px 20px; /* Adjust padding as needed */
  background-color:white; /* Background color for the About Us section */
  text-align: center; 
/* Center-align text */
}

/* Adjustments for home section */
.home {
  min-height: 100vh; /* Ensure home section covers the full viewport height */
  padding-bottom: 100px; /* Ensure enough space for the About Us section */
}
</style>
<body>
  <header class="header">
    <nav class="nav">
      <a href="#" class="nav_logo">PriceHive</a>
      <ul class="nav_items">
        <li class="nav_item">
          <a href="#about_us" class="nav_link">About Us</a>
          <a href="#" class="nav_link" id="open-feedback-popup">Feedback</a>
        </li>
      </ul>
      <button class="button" id="form-open">Login</button>
    </nav>
  </header>

  <section class="home">
    <div class="form_container">
      <i class="uil uil-times form_close"></i>
      <div class="form login_form">
        <form action="server.php" method="post">
          <h2>Login</h2>
          <div class="input_box">
            <input type="email" name="email" placeholder="Enter your email" required />
            <i class="uil uil-envelope-alt email"></i>
          </div>
          <div class="input_box">
            <input type="password" name="password" placeholder="Enter your password" required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
          </div>
          <button type="submit" name="login" class="button">Login Now</button>
          <p id="error-message" style="color: red;"></p>
          <div class="login_signup">Don't have an account? <a href="#" id="signup">Signup</a></div>
        </form>
      </div>
      <div class="form signup_form">
        <form action="server.php" method="post" id="signup-form">
          <h2>Signup</h2>
          <div class="input_box">
            <input type="email" name="email" placeholder="Enter your email" required />
            <i class="uil uil-envelope-alt email"></i>
          </div>
          <div class="input_box">
            <input type="password" name="password" placeholder="Create password" required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
          </div>
          <div class="input_box">
            <input type="password" name="password_confirm" placeholder="Confirm password" required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
          </div>
          <button type="submit" name="signup" class="button">Signup Now</button>
          <div class="login_signup">Already have an account? <a href="#" id="login">Login</a></div>
        </form>
      </div>
    </div>
  </section>
  <section id="about_us" class="about_us_content">
      <h2>About Us</h2>
      <p>PriceHive helps you find the best prices for the products 
        you want by comparing them across different online stores. 
        With us, you can quickly search for any item and see where 
        it's available and at what price. 
        We make it easy for you to make smart shopping choices and save money.</p>
  </section>
  <div id="feedback-popup" class="feedback-popup">
  <div class="feedback-form-container">
    <form action="feedback_server.php" method="post">
      <h2 class="feedback-heading">Feedback</h2>
      <div class="input_box feedback-input">
        <input type="email" name="email" placeholder="Your Email" required>
      </div>
      <div class="input_box feedback-input">
        <textarea name="feedback" placeholder="Your Feedback" required></textarea>
      </div>
      <button type="submit" name="submit_feedback" class="button feedback-submit">Submit Feedback</button>
    </form>
    <button id="close-feedback-popup" class="close-button">Close</button>
  </div>
</div>

  <script src="script.js"></script>
  <script>
    // JavaScript code to open the login popup window when the page loads
    document.addEventListener("DOMContentLoaded", function() {
      const home = document.querySelector(".home");
      home.classList.add("show");
    });
  </script>
    <?php if (isset($_SESSION['success'])): ?>
      window.location.href = 'tickbox.html';
    <?php endif; ?>
  </script>
</body>
</html>
