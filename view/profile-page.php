<?php include 'header.php' ?>
<?php (!isset($_SESSION['user'])) ? header("location: login-page.php") : ""?>
<?php 
    $name = $_SESSION['user']['name'];
    $email = $_SESSION['user']['email'];
    $id = $_SESSION['user']['id'];
    $img = $_SESSION['user']['img'];
    $admin = $_SESSION['user']['admin'];
?>

<div class="wrapper">
    <div class="profile-container">
        <div class="profile-picture">
            <img class="profileImage" src = "../uploads/<?php echo $img?>.jpg">
            <form action="../controller/upload_image.php" enctype="multipart/form-data" method="POST" class="upload-form">
                <input type = "file" name="file">
                <button type= "submit" name="submit-upload" class="imagebtn">Upload Image</button>
            </form>
            <?php if(isset($_GET['succes'])){echo '<h2 style="color:green;">Upload Succes</h2>';}?>
            <?php if(isset($_GET['error'])){echo '<h2 style="color:red;">Upload Failed</h2>';}?>
        </div>
        <div class="profile-details" class="profile-details">
            <div class ="profile-detail">
                <h2>Name: </h2>
                <p class ="pp"> <?php echo $name?></p>
            </div>
            <div class ="profile-detail">
                <h2>Email: </h2>
                <p class ="pp"> <?php echo $email?></p>
            </div>
            <div class ="profile-detail">
                <h2>userID: </h2>
                <p class ="pp"><?php echo $id?></p>
            </div>
            <div class ="profile-detail">
                <h2>Admin: </h2>
                <p class ="pp"><?php echo ($admin === "1") ? 'Da ->>> <a class="add-new-task" href="../controller/admin.php">Administreaza</a>' : "Nu"?></p>
            </div>
        <div class="change-password">
            <a id="change-password" style ="cursor: pointer;"><h2>Change Password</h2></a>
            <form action ="../controller/change-password.php" method ="POST" class="form-change">
                    <input type="password" name='password' placeholder =" New Password...">
                    <button type="submit" name="submit-change" class="changeButton">Ok</button>
            </form>
        </div>
            
        </div>

    </div>
</div>

<?php include 'footer.php'?>