<?php include 'header.php' ?>
<?php if(isset($_GET['details'])){
    $details = unserialize($_GET['details']);
  } 
      if(isset($_GET['error'])){
        $error = $_GET['error'];
        $text = "";
        switch($error){
          case "name":
            $text = 'Enter a valid name';
              break;
          case "email": 
            $text = "Enter a valid email";
              break;
            case "password":
              $text = "Enter a valid password";
                break;
            case "password2": 
              $text= "Passwords don`t match";
                break;
            case "userExists": 
              $text = "Email already in use";
        }
      }
    ?>

<form action="../controller/registration-page.php" class = "register-form" method ="POST">
  <div class="register-container">
    <h1>Register</h1>
    <p>Please register to start tracking your tasks.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" value="<?php if(isset($_GET['details'])){ echo $details[0];}?>" required>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Name" name="name" id="name1" value="<?php if(isset($_GET['details'])){ echo $details[1];}?>" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password2" id="psw-repeat" required>
    <hr>

    <h2 id="errors"><?php if(isset($_GET['error'])) {echo $text;}?></h2>
    <button type="submit" name ="submit-registration" class="registerbtn">Register</button>

    <p>Already have an account? <a href="login-page.php">LogIn</a>.</p>
    </div>
  
</form>

<?php include 'footer.php'; ?>


