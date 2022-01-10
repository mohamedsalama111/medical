<?php require '../../config.php';  ?>

<?php require BLA.'inc/header.php';  ?>
<?php require BL.'function/validate.php';  ?>



    <?php 

        if(isset($_POST['submit']))
        {
            $serv_id = $_POST['serv_id'];
            $name = $_POST['name'];
            $notEmpty = checkEmpty($name);
          
            if($notEmpty)
            {
                $less = $name,3;
                if($less)
                {
                    $sql = "UPDATE servisies SET `serv_name`='$name' WHERE `serv_id`='$serv_id' ";
                    $success_message = db_update($sql);
                    header( "refresh:2;url=".BUA."servisies");
                }
                else 
                {
                    $error_message = "Please Type Correct Service";
                }
            }
            else 
            {
                $error_message = "Please Type Service Name";
            }

            require BL.'function/messages.php';
        }


    ?>





<?php require BLA.'inc/footer.php';  ?>
