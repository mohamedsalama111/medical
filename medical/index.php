<?php  require 'config.php';  
        require_once(BL.'function/validate.php');?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/style.css" ><link 	rel="stylesheet" 
		  	href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
		  	integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" 
		  	crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" 
			integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
			crossorigin="anonymous"></script>

			    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">

    <title>Home Page</title>
  </head>
  <body>
   


    <div class="cont-main" style="background:url(<?php echo ASSETS .'images/bg-1.jpg';?>)">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                <?php 
                if (isset($_POST['submit'])) 
                {
                    $service = $_POST['service'];
                    $city = $_POST['city'];
                    $mobile = $_POST['mobile'];
                    $notes = ($_POST['notes']);
                    $name =  ($_POST['name']);
                    $email = ($_POST['email']);
                    
                    if (checkEmpty($mobile) && checkEmpty($name)) 
                    {
                        
                        $sql  = "INSERT INTO order (order_name,order_email,order_phone,order_serv_id,order_city_id,order_note)
                            VALUES ($name,$email,$mobile,$service,$city,$notes)
                         ";
                         $success_message = db_insert($sql);
                    }
                    else 
                    {
                        $error_message = "Please Type Your Name And Your Mobile";
                    }

                    
                    
                }
        ?>




                <form class="row" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mt-5" >
                    <?php require BL.'function/messages.php'; ?>
                    <div class="col-sm-6 ">
                        <div class="form-group mt-3">

                            <label for="serv" class="font-1">Choose Service</label>
                            <select name="service" id="serv" class="form-control font-1">
                                <?php $data = getRows('servisies');  $x=1; ?>
                                <?php foreach($data as $row){   ?>
                                <option value="<?php echo $row['serv_id']; ?>">
                                    <?php echo $row['serv_name']; ?>
                                </option>
                                <?php } ?> 
                            </select>
                            
                        </div>
                    </div>


                    <div class="col-sm-6 ">
                        <div class="form-group mt-3">

                            <label for="serv" class="font-1">Choose City</label>
                            <select name="city" id="serv" class="form-control font-1">
                                <?php $dataCity = getRows('cities');  $x=1; ?>
                                <?php foreach($dataCity as $row){   ?>
                                <option value="<?php echo $row['city_id']; ?>">
                                    <?php echo $row['city_name']; ?>
                                </option>
                                <?php } ?> 
                            </select>
                            
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">

                            <label for="serv" class="font-1">Type Your Name *</label>
                            <input type="text" name="name"  class="form-control font-1 bg-base">
                            
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group ">

                            <label for="serv" class="font-1">Type Your Email</label>
                            <input type="email" name="email"  class="form-control font-1 bg-base">
                            
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group ">

                            <label for="serv" class="font-1">Type Your Mobile *</label>
                            <input type="text" name="mobile"  class="form-control font-1 bg-base">
                            
                        </div>
                    </div>
                    



                    <div class="col-sm-12">
                        <div class="form-group">

                            <label for="serv" class="font-1">Type Notes</label>
                            <textarea name="notes"  class="form-control font-1 bg-base"  rows="5"></textarea>
                            
                        </div>
                    </div>



                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-success form-control">Send</button>
                        </div>
                    </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>




    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		 <script src="<?php echo $js ?>style.js"></script>
		 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" 
			integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" 
			crossorigin="anonymous"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </body>
</html>
