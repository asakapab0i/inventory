<?php 
session_start();
include("includes/connect.php");
include("includes/html_codes.php");
$error_message = '';

if(isset($_POST['submit'])){
// if a person click submit it, this if function will trigger
	$error = array();
	
	//username
	if(empty($_POST['username'])){
		$error[] = 'Please enter a username.<br/><br/>';
	}else if( ctype_alnum($_POST['username']) ){
		$username = $_POST['username'];
	}
	else{
		$error[] = '<br/><br/>Username must consist of letters and numbers only. ';
	}
	
	//email
    if(empty($_POST['email'])){
        $error[] = 'Please enter your email. ';
    }else if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])){
		$email = mysql_real_escape_string($_POST['email']);
    }else{
		$error[] = '<br/><br/>Your e-mail address is invalid. ';
    }
	
	//password
	if(empty($_POST['password'])){
		$error[] = '<br/><br/>Please enter a password. ';
	}else{
		$password = mysql_real_escape_string($_POST['password']);
	}
	//address
	if(empty($_POST['address'])){
		$error[] = '<br/><br/>Please enter a proper address.';
	}else{
		$address = mysql_real_escape_string($_POST['address']);
	}
	//contact_no
	if(empty($_POST['contact_no'])){
		$error[] = '<br/><br/>Please enter a proper contact number.';
	}else{
		$contact_no = mysql_real_escape_string($_POST['contact_no']);
	}
	
	//emp_name
	if(empty($_POST['emp_name'])){
		$error[] = '<br/><br/>Please put a correct name.';
	}else{
		$emp_name = mysql_real_escape_string($_POST['emp_name']);
	}
	
	
//processing the information after cleansing it	
	if(empty($error)){
	//this is good info
	  $result = mysql_query("SELECT * FROM employee WHERE email='$email' OR username='$username' ") or die(mysql_error());
		if(mysql_num_rows($result)==0){
			//thats good information
			$result2 = mysql_query(" INSERT INTO employee (emp_id,emp_name,address,contact_no,date_hired,username,password,email) 
			VALUES ('','$emp_name','$address','$contact_no',now(),'$username','$password','$email') ") or die(mysql_error());
			
			if(!$result2){
				die('Could not insert to database: '.mysql_error());
			}else{
				$message = "To activate your account, Please click on this link: \n\n";
				$message .= "http://localhost/lisa".'/activate.php?email='.urlencode($email)."$key=$activation";
				mail($email, 'Registration Confirmation', $message);
				header('Location: prompt.php?x=1');
			}
		}else{
			header('Location: prompt.php?x=2');
		}
	}else{
		$error_message = '<span class="error">';
		foreach($error as $key => $values){
			$error_message.="$values";
		}
		$error_message.= '</span><br/><br/>';
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/forms.css">
<link rel="stylesheet" href="css/register.css">
<link rel="stylesheet" href="css/minibutton.css">



<script type="text/javascript" src="scripts/date_time.js"></script>
<script type="text/javascript" src="scripts/jquery.js"></script>
</head>

<body>
	<div id="wrapper">
    	<?php mainHeader();  ?>  
        	<div id="top_search">
            <?php mainAnouncements(); ?>
        	</div>
<div id="main_section">
<h3><a href="login.php" class="minibutton">Back</a></h3>
   <form id="generalform" class="container" method="post" action="">
				<h3>Register</h3>
				<p>&nbsp;</p>
				<?php  
				echo $error_message;
				?>
				<div class="field">
					<label for="fname" class="pos">First Name:</label>
					<input type="text" class="input" id="fname" name="fname" maxlength="20"/>
					<p class="hint">20 characters maximum (letters and numbers only)</p>
				</div>
                <div class="field">
					<label for="mname" class="pos">Middle Name:</label>
					<input type="text" class="input" id="mname" name="mname" maxlength="20"/>
					<p class="hint">20 characters maximum (letters and numbers only)</p>
				</div>
                <div class="field">
					<label for="lname" class="pos">Last Name:</label>
					<input type="text" class="input" id="lname" name="lname" maxlength="20"/>
					<p class="hint">20 characters maximum (letters and numbers only)</p>
				</div>
                <div class="field">
					<label for="nickname" class="pos">Nickname:</label>
					<input type="text" class="input" id="nickname" name="nickname" maxlength="20"/>
					<p class="hint">20 characters maximum (letters and numbers only)</p>
				</div>
				<div class="field">
					<label for="gender" class="pos">
					<div align="left">Gender</div></label>
					<select class="input" name="gender" id="gender">
					<option></option>
					<option >Male</option>
					<option >Female</option>
					</select>
					<p class="hint">20 characters maximum (letters and numbers only)</p>
			  </div>
			  <div class="field">
					<label for="position" class="pos">
					<div align="left">Position</div>
					</label>
					<select class="input" name="position" id="position">
					<option></option>
					<option >Sales Representative</option>
					<option >Adminitrator</option>
					<option >Billing Manager</option>
					<option >Marketing Manager</option>
					<option >Maintenance</option>
					</select>
					<p class="hint">20 characters maximum (letters and numbers only)</p>
			  </div>
			  <div class="field">
					<label for="department" class="pos">
					<div align="left">Department</div>
					</label>
					<select class="input" name="department" id="department">
					<option></option>
					<option >Sales Department</option>
					<option >Executive Department</option>
					<option >Billing Department</option>
					<option >Marketing Department</option>
					<option >Maintenance Department</option>
					</select>
					<p class="hint">20 characters maximum (letters and numbers only)</p>
			  </div>
			  <div class="field">
					<label for="username" class="pos">Username:</label>
					<input type="text" class="input" id="username" name="username" maxlength="20"/>
					<p class="hint">20 characters maximum (letters and numbers only)</p>
				</div>
                <div class="field">
					<label for="password"  class="pos">Password:</label>
					<input type="password" class="input" id="password" name="password" maxlength="20"/>
					<p class="hint">20 characters maximum</p>
				</div>
					<div class="field">
					<label for="dob" class="pos">Date of Birth:</label>
					<input type="text" class="input" id="dob" name="dob" maxlength="20"/>
					<p class="hint">20 characters maximum (letters and numbers only)</p>
				</div>
				<div class="field">
					<label for="cellphone"  class="pos">Cellphone:</label>
					<input type="text" class="input" id="cellphone" name="cellphone" maxlength="10"/>
					<p class="hint">10 numbers maximum</p>
				</div>
				<div class="field">
					<label for="telephone"  class="pos">Telephone:</label>
					<input type="text" class="input" id="telephone" name="telephone" maxlength="10"/>
					<p class="hint">10 numbers maximum</p>
				</div>
				<div class="field">
					<label for="econtact"  class="pos">E-Contact:</label>
					<input type="text" class="input" id="econtact" name="econtact" maxlength="10"/>
					<p class="hint">10 numbers maximum</p>
				</div>
				<div class="field">
					<label for="relation" class="pos">
					<div align="left">Relation</div>
					</label>
					<select class="input" name="relation" id="relation">
					<option></option>
					<option >Relative</option>
				<option >Husband</option>
				<option >Wife</option>
				<option >Sister</option>
				<option >Brother</option>
				<option >Mother</option>
				<option >Father</option>
				<option >Relative</option>
				<option >Friend</option>
				<option >Son</option>
				<option >Daughter</option>
				</select>
						<p class="hint">20 characters maximum (letters and numbers only)</p>
			  </div>
			  <div class="field">
					<label for="address1"  class="pos">Address Line1:</label>
					<input type="text" class="input" id="address1" name="address1" maxlength="10"/>
					<p class="hint">10 numbers maximum</p>
				</div>
				<div class="field">
					<label for="address2"  class="pos">Address Line2:</label>
					<input type="text" class="input" id="address2" name="address2" maxlength="10"/>
					<p class="hint">10 numbers maximum</p>
				</div>
				<div class="field">
					<label for="address3"  class="pos">Address Line3:</label>
					<input type="text" class="input" id="address3" name="address3" maxlength="10"/>
					<p class="hint">10 numbers maximum</p>
				</div>
                <div class="field">
					<label for="address"  class="pos">E-Contact #:</label>
					<input type="text" class="input" id="address" name="address" maxlength="30"/>
					<p class="hint">30 characters maximum</p>
				</div>
				<div class="field">
					<label for="citizenship" class="pos">
					<div align="left">Citizenship</div>
					</label>
					<select class="input" name="citizenship" id="citizenship">
					<option></option>
					<option >Filipino</option>
					<option >American</option>
					</select>
					
					<p class="hint">20 characters maximum (letters and numbers only)</p>
			  </div>
			  <div class="field">
					<label for="religion" class="pos">
					<div align="left">Religion</div>
					</label>
					<select class="input" name="religion" id="religion">
					<option></option>
					<option value="Buddhist">Buddhist</option>
					<option value="Christian Alliance">Christian Alliance</option>
					<option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
					<option value="Islam">Islam</option>
					<option value="None">None</option>
					<option value="Philippine Independent Church">Philippine Independent Church</option>
					<option value="Protestants">Protestants</option>
					<option selected value="Roman Catholic">Roman Catholic</option>
					</select>
					
					<p class="hint">20 characters maximum (letters and numbers only)</p>
			  </div>
			  
                   <div class="field">
					<label for="emp_name"  class="pos">Employee Name:</label>
					<input type="text" class="input" id="emp_name" name="emp_name" maxlength="20"/>
					<p class="hint">20 characters maximum</p>
				</div>

				   <input type="submit" name="submit" id="submit" class="minibutton" value="Submit"/>
			</form>
      </div>    
      	<div id="main_footer" class="links">
            <?php mainFooter(); ?>	
            </div>
    </div>
    
</body>
</html>