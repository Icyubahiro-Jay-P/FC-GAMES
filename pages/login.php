<?php
include_once "../php/connect.php";
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $error_msg = "";
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $hash = md5($password);
  
  // Simplified empty checks
  if(empty($username) || empty($password)){
    $error_msg = "All inputs are required";
    exit();
  }

  $sql = "SELECT * FROM users WHERE u_Name = '$username'";
  $query = mysqli_query($conn, $sql);
  if(mysqli_num_rows($query) > 0){
    $row = mysqli_fetch_assoc($query);
    if($hash === $row['u_Password']){
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $hash;
      header("location: index.php");
    }else{
      $error_msg = "Wrong password";
    }
  }else{
    $error_msg = "Username is not found";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FC Games: Sign Up</title>
  <link rel="stylesheet" href="../css/form.css">
  <link rel="stylesheet" href="../icons/bootstrap-icons.css">
</head>
<body>
  <form action='#' method="post">
    <header>
      <h2>FC Games</h2>
      <h3>Log in</h3>
    </header>
    <div class="error-txt" style="display:<?php echo ($error_msg ? 'flex': 'none');?>"><?php echo $error_msg;?></div>
    <div class="input-box">
      <input type="text" name="username" placeholder="Username" required>
    </div>
    <div class="input-box">
      <input type="password" name="password" placeholder="Password" required>
      <i class="bi bi-eye-slash-fill"></i>
    </div>
    <div class="submit">
      <input type="submit" value="Log in">
    </div>
    <div class="links">
      <p>Don't have an acount? <a href="signup.php">Sign up</a></p>
    </div>
  </form>
  <script src="../js/login.js"></script>
</body>
</html>
