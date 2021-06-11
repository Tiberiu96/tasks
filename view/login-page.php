<?php include 'header.php' ?>
<?php (isset($_SESSION['user'])) ? header("location: index.php") : ""?>

<form action="../controller/login-page.php" class = "register-form" method ="POST">
  <div class="register-container">
    <h1>Log-In</h1>
    <p>Please login with your username and password to start tracking your tasks.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw" required>
    <br>
     <button type="submit" name ="submit-login" class="registerbtn">Login</button>

    <p>No account? <a href="register-page.php">Register</a>.</p>
    <h2 id ="errors" style ="color:white; font-size: 22px;"> <?php if(isset($_GET['error'])){
          $error = $_GET['error'];
          if($error == 'login'){
            echo ("Invalid email or password");
          }
        }
    ?></h2>
    </div>
</form>

<?php include 'footer.php'; ?>
