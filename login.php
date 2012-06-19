<?php 
session_start();
include("includes/connect.php");
include("includes/html_codes.php");
$error_message = '';

if( isset($_SESSION['username']) ) {
		
			header('Location: employee/home.php');
	}

if( isset($_POST['submit'])){
//username and password get data from form
$username = $_POST['username'];
$password = $_POST['password'];

//to protect from SQL Injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);


$sql = "SELECT * FROM $tbl_name WHERE username='$username' and password ='$password'";
$result = mysql_query($sql);

// check if there is result atleast one result (table row)
$count = mysql_num_rows($result);

//check is there is only one result it means it will get only one result(unique)
if($count ==1){
$_SESSION['username'] = $_POST['username'];
header("Location: employee/home.php");
}
else
{
// display the error message
$value = "Wrong Username or Password!";
$error_message = '<span class="error">';
$error_message .= "$value";
$error_message.= "</span><br/><br/>";
}
}
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Account</title>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/forms.css">
<link rel="stylesheet" href="css/minibutton.css">
<link rel="stylesheet" href="css/login.css">


<script type="text/javascript" src="scripts/date_time.js"></script>
</head>

<body>
	<div id="wrapper">
    	<?php mainHeader();  ?>   
        	<div id="top_search">
       <?php 
		 if( isset($_SESSION['username']) ) {
			 mainAnouncements();
			 }else{
				 firstPageRules();
				 }	  
		  
		   ?> 
        	</div>
<div id="main_section">
<h3><a href="index.php" class="minibutton">Back</a></h3>

<form id="generalform" class="container" method="post" action="">
				<h3>Login</h3><br/>
                <?php 
				echo $error_message;
				?>
				<div class="field">
					<label for="username">
					  <div align="center">Username:</div>
				  </label>
					<input type="text" class="input" id="username" name="username" maxlength="20"/>
	</div>
	<div class="field">
					<label for="password">
					  <div align="center">Password:</div>
	  </label>
					<input type="password" class="input" id="password" name="password" maxlength="20"/>
                    
	</div>
                
                <br/>
				<input type="submit" name="submit" id="submit" class="minibutton2" value="Submit"/>
  </form>
    
<br/><br/><h4 id="rightAlign2" class="minibutton"><a href="#" >Click here for Admin Access</a></h4>
								  <h4 id="rightAlign2" class="minibutton"><a href="register.php" >Click here to register employee</a></h4>
</div>    
<div id="main_footer" class="links">
            <?php mainFooter(); ?>	
    </div>
    
</body>
</html>