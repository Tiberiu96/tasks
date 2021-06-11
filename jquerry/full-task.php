<script>
    $(function(){

        $('.task').click(function(){
        // $(this).parent().css("display","none");
            var id = $(this).find('.task-details1').text();
            var title = $(this).find('.task-details2').text();
            var description = $(this).find('.task-details3').text();
            

            $('#full-task').fadeIn("slow");
        var input1 = $('#input1').attr("value", id);
        var input2 = $('#input2').attr("value", title);
        var input3 = $('#input3').attr("value", description);

        $('#submit-update').click(function(){
            //$('#input1').removeAttr("disabled");
            $('#input2').removeAttr("disabled");
            $('#input3').removeAttr("disabled");

            $('#save-update').css("display","block");
            $('#submit-update').css("display","none");
        });

        $('#closebtn').click(function(){
           
            $('#full-task').fadeOut("slow");
            $('#save-update').css("display","none");
            $('#submit-update').css("display","block");

            $('#input1').attr("disabled", "disabled");
            $('#input2').attr("disabled", "disabled");
            $('#input3').attr("disabled", "disabled");

            
        });

        $('#save-update').click(function(){


                var id = $('#input1').val();
                var title = $('#input2').val();
                var description = $('#input3').val();
                ;
                $.post('../controller/update-task.php',
                    {
                        title: title,
                        description: description,
                        id: id
                    },function(data,succes){
                        window.location.replace("../view/index.php?succes");

                    }
                );
        });

        });

    

    $('.check').click(function(){
        var taskID = $(this).parent().find('.task').find('.task-details1').text();
        var that = this;

        $.post('../controller/check.php',
                {
                    taskID: taskID
                },function(data,succes){
                
                    $(that).parent().find('.task').css("background","grey");
                    $(that).parent().find('.task').css("pointer-events","none");
                    $(that).css("background","#5aff15");
                    
                }
            
        );

    });


    $('.taskDeleted').click(function(){
        var taskID = $(this).parent().find('.notask, .task').find('.task-details1').text();
        var that = this; 
        $.post('../controller/delete-task.php',
                {
                    "submit":"1",
                    taskID: taskID
                },function(data,succes){
                
                    $(that).parent().addClass('animation').fadeOut(2000);
                }
            
        );
    });



})




</script>