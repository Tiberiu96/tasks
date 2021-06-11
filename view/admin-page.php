<?php include '../view/header.php'?>
<?php if(!isset($_SESSION['user']) && $_SESSION['user']['admin']=="1"){header("location: ../view/index.php");}?>
<?php if(isset($_SESSION['admin'])){
    $array = $_SESSION['admin'];
} ?>



    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Admin</th>
                <th>T.Title</th>
                <th>T.Description</th>
                <th>T.Id</th>
                <th>T.Del</>

            </tr>
        </thead>
        <tbody>
                <?php $count = 0;?>
                <?php foreach($array as $index){?>
                    <tr>
                        <td><?php echo $count ?></td>
                        <td> <?php echo $index['name'] ?></td>
                        <td> <?php echo $index['email'] ?></td>
                        <td> <?php echo ($index['admin'] ==="1") ? "Da" : "Nu" ?></td>
                        <td> <?php echo $index['title'] ?></td>
                        <td> <?php echo $index['description'] ?></td>
                        <td> <?php echo $index['taskID'] ?></td>
                        <td class ="td-delete" onclick = "deleteTask(<?php echo $index['taskID'] ?>, this)">Delete</td>
                    </tr>
                    <?php $count+=1;?>
                <?php }; ?>
        </tbody>
    </table>

<script>
    function deleteTask(taskID,obj){
        $.post('../controller/admin-delete-task.php',
        {
            delete: "",
            taskID: taskID
        },function(data,succes){
            $(obj).parent().css('background',"red").addClass('animation').fadeOut(2000);
            $
        }

        );
    }
</script>



















<?php include '../view/footer.php';?>