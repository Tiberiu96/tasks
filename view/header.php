
<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <title>Task Assigment 🙂 </title>
</head>
<body>
<div style id="loadingpage">
    <h2>Loading... Wait a sec :D</h2>
</div>
    
<div class="navbar">
    <div class="title">
        <a href="index.php" class="homea">Task Assigment 🚀</a> 
    </div>
    <p id="name"><?php echo (isset($_SESSION['user'])) ? $_SESSION['user']['name'] : ""?></p>
    <div class="login">
    <?php if(isset($_SESSION['user'])){?>
        <a href="../controller/profile.php"><img id ="profile-img" src = "../uploads/<?php echo $_SESSION['user']['img']?>.jpg" ></a>
    <?php }?>
        <?php 
            if(isset($_SESSION['user'])){
                echo "<a style ='margin-left:10px;' href='../controller/logout-page.php'>LogOut</a>";
            }else{
                echo "<a style ='margin-left:10px;' href='../view/login-page.php'>LogIn</a>";
            }
        ?>
    </div> 
</div>
</div>
