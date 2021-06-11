<?php include 'header.php';?>
<?php if(isset($_SESSION['user'])){?>
    <div class="tasks-container">
        <div class="tasks">
            <form action="../controller/add_task.php?id=<?php echo $_SESSION['user']['id']?>" method ="POST" class="task-form">
            <h2>Add here your tasks</h2>
                <input type="text" name="title" placeholder="Enter Title">
                <input type="text" name="description" placeholder="Enter Description">
                <button type="submit" name ="submit-task" class="submit-task">Add Task</button>
                <?php if(isset($_GET['added'])){
                    echo ("<h2>Task Added Succesfuly</h2>");
                     }elseif(isset($_GET['notAdded'])){
                         echo ("<h2>Enter all fields</h2>");
                     }
                
                ?>
            
            </form>

            <br>
            <br>
            <form action ="../controller/all-task.php?userID=<?php echo $_SESSION['user']['id']?>" class="all-task-form" method="POST">
                <button type="submit" name="submit-all-task">Show all tasks</button>
            </form>
        </div>

    </div>
<?php }else{
    header("location: login-page.php");
    }
    ?>
<?php include 'footer.php';?>