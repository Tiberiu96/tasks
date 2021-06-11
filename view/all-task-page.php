<?php include 'header.php'?>
<?php $tasks = $_SESSION['tasks'];?>
<?php (!isset($_SESSION['user'])) ? header("location: login-page.php") : ""?>


<div class="tasks2-container">
    <div class="tasks">
        <h2><a href ="index.php" class="add-new-task"> Add New Task </a></h2>
        <?php foreach($tasks as $task){?>
            <div class="group" id="group"><
            <div class= <?php if($task['checked']=="1"){echo "notask";}else{echo "task";}?> id="task">
                <div class="task-details1"><?php echo $task['taskID'] ?></div> 
                <div class="task-details2"><?php echo $task['title'] ?> </div>
                <div class="task-details3"><?php echo $task['description'] ?> </div>
            </div>
            
            <button type ="submit" class="btn taskDeleted" name ="submit-deleting-task"><i class="fa fa-trash"></i></button>
            
            <button <?php if($task['checked']=="1"){echo 'style=background:#5aff15';}?> type ="submit" class="btn check" name ="submit-check"><i class="fa fa-check"></i></button>
             
        </div> 
       <?php } ?>
    </div>

    <div class="full-task" id="full-task">
       <div class="header-full-task">Full Width Window<span id="closebtn">X</span></div> 
        
       <input type="text" id="input1" disabled="disabled" name="name"/>
       <input type="text" id="input2" disabled="disabled" name ="title" style="margin-bottom:50px;"/>
       <input type="text" id="input3" disabled="enabled" name="description" style="height:300px; margin-bottom:20px;"/>
       <button  id ="submit-update">Edit Task</button>
       <button  id ="save-update">Save</button>
       
    </div>
</div>

<?php include 'footer.php'?>
<?php include '../jquerry/full-task.php'?>
