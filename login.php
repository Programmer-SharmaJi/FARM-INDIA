<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $login = false;
  $showError = false;
  require 'partials/_dbconnect.php';
  $username = $_POST['username'];
  $password = $_POST['password'];
  // $sql = "Select * from user where username =='$username' AND password =='$password'";
  $sql = "SELECT * FROM `user` WHERE `username` LIKE '$username'";

  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  // echo $num;
}
if ($num == 1) {
  while ($rows = mysqli_fetch_assoc($result)) {
    if ($pck = password_verify($password, $rows['password'])) {
      $login = true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;
      header('location:Farm_India/index.html');
    }
    else{
      $showError="Password dp not match";
    }
  }
} else if ($num === 0 ) {
  $showError = "Invalid User";
} 
else {
  $showError = false;
} 
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    Login
  </title>
  <link rel="stylesheet" href="css/_style1.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<style>
    body {
    background-image: linear-gradient(135deg, #FAB2FF 10%, #1904E5 100%);
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    font-family: "Open Sans", sans-serif;
    color: #333333;
  }
  
  .logdes {
    margin: 0 auto;
    width: 80%;
    background: #FFFFFF;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    flex: 1 1 100%;
    align-items: stretch;
    justify-content: space-between;
    box-shadow: 0 0 20px 6px #090b6f85;
  }
  @media (max-width: 980px) {
    .logdes {
      flex-flow: wrap;
      text-align: center;
      align-content: center;
      align-items: center;
    }
  }
  .logdes {
    height: auto;
  }
  .logdes {
    color: #FFFFFF;
    background-size: cover;
    background-repeat: no-repeat;
    background-image: url("https://i.pinimg.com/736x/5d/73/ea/5d73eaabb25e3805de1f8cdea7df4a42--tumblr-backgrounds-iphone-phone-wallpapers-iphone-wallaper-tumblr.jpg");
    overflow: hidden;
  }
  .logdes .left .overlay {
    padding: 30px;
    width: 100%;
    height: 100%;
    background: #5961f9ad;
    overflow: hidden;
    box-sizing: border-box;
  }
  .logdes .left .overlay h1 {
    font-size: 10vmax;
    line-height: 1;
    font-weight: 900;
    margin-top: 40px;
    margin-bottom: 20px;
  }
  .logdes .left .overlay span p {
    margin-top: 30px;
    font-weight: 900;
  }
  .logdes .left .overlay span a {
    background: #3b5998;
    color: #FFFFFF;
    margin-top: 10px;
    padding: 14px 50px;
    border-radius: 100px;
    display: inline-block;
    box-shadow: 0 3px 6px 1px #042d4657;
  }
  .logdes .left .overlay span a:last-child {
    background: #1dcaff;
    margin-left: 30px;
  }
  .logdes .right {
    padding: 40px;
    overflow: hidden;
  }
  @media (max-width: 980px) {
    .box-form .right {
      width: 100%;
    }
  }
  .logdes .right h5 {
    font-size: 6vmax;
    line-height: 0;
  }
  .logdes .right p {
    font-size: 14px;
    color: #B0B3B9;
  }
  .logdes .right .inputs {
    overflow: hidden;
  }
  .logdes .right input {
    width: 100%;
    padding: 10px;
    margin-top: 25px;
    font-size: 16px;
    border: none;
    outline: none;
    border-bottom: 2px solid #B0B3B9;
  }
  .logdes .right .remember-me--forget-password {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .logdes .right .remember-me--forget-password input {
    margin: 0;
    margin-right: 7px;
    width: auto;
  }
  .logdes .right button {
    color: #fff;
    font-size: 16px;
    padding: 12px 35px;
    border-radius: 50px;
    display: inline-block;
    border: 0;
    outline: 0;
    box-shadow: 0px 4px 20px 0px #49c628a6;
    background-image: linear-gradient(135deg, #70F570 10%, #49C628 100%);
  }
  

  
  label span.text-checkbox {
    display: inline-block;
    height: auto;
    position: relative;
    cursor: pointer;
    transition: all 0.2s linear;
  }
  
  label input[type="checkbox"] {
    display: none;
  }


</style>

<body>
  <?php
    require 'partials/_nav.php';
  ?>
 <!--------------------------------------error handling------------------------------------------------>
<?php
  if ($showError) {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>' . $showError . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>

 <!------------------------------------------login form------------------------------------------------>
<div class="logdes">
  <div class="container">
    <form action="" method="POST">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Login">
      </div>
    </form>
  </div>
  </div>
 <!----------------------------------------------Script------------------------------------------------>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">

  </script>
</body>

</html>