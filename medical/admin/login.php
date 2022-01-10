<?php require '../config.php';  ?>
<?php 
    if(isset($_SESSION['admin_name']))
    {
        header("location:".BLA.'login.php');
    }
?>
<?php require BL.'function/validate.php';  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <link   rel="stylesheet" 
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
            integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" 
            crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" 
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
            crossorigin="anonymous"></script>

                <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
                </head>
                <style>
                    body {
                        margin-top: 70px;
                        background-color: #4fc3f7;
                    }

                </style>
  <body>

        <div class="cont-login d-flex align-items-center justify-content-around">

        <?php 
                if (isset($_POST['submit'])) 
                {
                    $password = $_POST['password'];
                    $email = $_POST['email'];

                    
                    if (checkEmpty($email) && checkEmpty($password)) 
                    {
                        
                        if (validEmail($email)) 
                        {
                            
                            $check = getRow('admin_email',$email,'admin');
                            if ($check) 
                            {
                                $check_password = sha1($password);
                                if($check_password = $password)
                                {
                                    $_SESSION['admin_name'] = $check['admin_name'];
                                    $_SESSION['admin_email'] = $check['admin_email'];
                                    $_SESSION['admin_id'] = $check['admin_id'];

                                    
                                    header("location:". BURLA.'index.php');
                                }
                                else 
                                {
                                    $error_message = "Incorrect Information";
                                }
                            }
                            else 
                            {
                                $error_message = "Wrong Email";
                            }
                        }
                        else 
                        {
                            $error_message = "Type Correct Email";
                        }
                    }
                    else 
                    {
                        $error_message = "Please Fill All Fields";
                    }
                    
                }
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="border p-5" >
                <div class="row">
                    
                    <?php  require BL.'function/messages.php'; ?>
                    <div class="col-sm-12  ">
                        <h3 class="text-center p-3 text-black">Login</h3>
                    </div>
                    <div class="col-sm-6 offset-sm-3 ">
                      <div class="form-group">
                            <label >Email </label>
                            <input type="email" name="email" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label >Password </label>
                            <input type="password" name="password" class="form-control" >
                        </div>

                        <div class="form-group">
                           
                            <input type="submit" name="submit" class="form-control btn btn-success"   >
                        </div>
                    </div>
                </div>
                
            </form>
        </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" 
            crossorigin="anonymous"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </body>
</html>
