<?php
// echo "<pre>\$_GET";
// print_r($_GET);
// echo "<pre>";

$errors = null;
$success = false;
$fullname = isset($_GET["fullname"]) ? $_GET["fullname"]: NULL;
$email = isset($_GET["email"]) ? $_GET["email"]: NULL;
$message = isset($_GET["message"]) ? $_GET["message"]: NULL;
// validate the fullname
if (isset($_GET["submit"])) {
  // code...

if (trim($fullname)) {
  $fn = filter_var($fullname,FILTER_SANITIZE_STRING);
}else {
  $errors = "<p>Please enter your fullname.</p>";
}
if (trim($email)) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $em = $email;
  } else {
    // $email = NULL;
    $errors.="<p>Enter Valid Email</p>";

  }
}else {
  $errors.= "<p>Please enter your email.</p>"; //dot means attaching it to the previous value
}
if (trim($message)) {
    $msg = $message;
}else {
  $msg = NULL;
  $errors.="<p>Enter your message.</p>";; //dot means attaching it to the previous value
}
}

// isset = if exists
if (isset($fn)&&isset($em)&&isset($msg)) {
  $success=true;
  $feedback = "<p>Hello {$fn}. Thank yout for your message:<br> {$msg}</p><br><p>We are going to email you at {$em} if any change happens in your program.</p>";
}
 ?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <title>Document</title>
</head>
<body>
  <header>
    <nav>
      <ul>
        <li class="nav-item"><a href="#" class="nav-item-link">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-item-link">Blog</a></li>
        <li class="nav-item"><a href="#" class="nav-item-link">Contact</a></li>
      </ul>
    </nav>
  </header>
  <div class="wrapper">
    <form action="index.php" method="get">
      <fieldset>
        <legend class="m-bottom">Form Assignment</legend>

          <div class="input-block m-bottom">
            <label for="fullname">Full name</label>
            <input value="<?php if (!$success) {
              echo $fullname;
            } ?>"name="fullname" type="text" id="fullname">
          </div>
          <div class="input-block m-bottom">
            <label for="email">Email</label>
            <input value="<?php if (!$success) {
              echo $email;
            } ?>" name="email" type="text" id="email">
          </div>
        <div class="text cleafix m-bottom">
          <label for="message">Message</label>
          <textarea name="message" id="message"><?php if (!$success) {
            echo $message;
          } ?></textarea>
          <p></p>
        </div>
        <input  type="submit" name="submit" id="submit-button">
      </fieldset>
    </form>
    <?php
        if (isset($feedback)) {
          echo $feedback;
        }
        if (isset($errors)) {
          echo $errors;
        }

     ?>

  </div>
  <footer>
    <ul>
      <li class="nav-item"><a href="#" class="nav-item-link"><i class="fab fa-facebook-square"></i><br>Facebook</a></li>
      <li class="nav-item"><a href="#" class="nav-item-link"><i class="fab fa-instagram"></i><br>Instagram</a></li>
      <li class="nav-item"><a href="#" class="nav-item-link"><i class="fab fa-linkedin-in"></i><br>Linkedin</a></li>
      <li class="nav-item"><a href="#" class="nav-item-link"><i class="fab fa-twitter-square"></i><br>Twitter</a></li>
    </ul>
  </footer>
</body>
</html>
