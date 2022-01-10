<?php 
		require_once('../../config.php');

	require_once(BLA.'inc/header.php');
	require_once(BL.'function/validate.php');
	?>

	<?php

		if (isset($_POST['submit'])) {
		 	
		 	$name 		= $_POST['name'];
		 	$email 		= $_POST['email'];
		 	$password 	= $_POST['password'];

		 	if(checkEmpty($name) AND checkEmpty($email) AND checkEmpty($password)) {

		 		if (ValidEmail($email)) {

		 			$hashpass = sha1($password);

		 			$sql = $conn->query("INSERT INTO admin (admin_name,admin_email,admin_password) VALUES('$name','$email','$hashpass')");
		 			$success_message = 'Successful Add';
		 			
		 		} else {
		 			$error_message = 'Email Not Valid';
		 		}

		 	} else {

		 		$error_message = 'PLS Fill All Filds';
		 	}
		 	require_once(BL.'function/messages.php');
		 } 
	?>



			<div class="col-sm-6 offset-sm-3 border p-3">
		        <h3 class="text-center p-3 bg-primary text-white">Add New Admin</h3>
		        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		            <div class="form-group">
		                <label >Name </label>
		                <input type="text" name="name" class="form-control" >
		            </div>

		            <div class="form-group">
		                <label >Email </label>
		                <input type="text" name="email" class="form-control" >
		            </div>

		            <div class="form-group">
		                <label >Password </label>
		                <input type="password" name="password" class="form-control" >
		            </div>

		            
		            <button type="submit" name="submit" class="btn btn-success">Save</button>
		        </form>
		       
		    </div>

		<?php
	require_once(BLA.'inc/footer.php');