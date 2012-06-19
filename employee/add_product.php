<?php 
session_start();
include("../includes/connect.php");
include("../includes/employee_html.php");
include("../includes/addproduct_codes.php");
$error_message = '';
?>

<?php 

if(isset($_POST['submit'])){
	$error = array();
	

	
	//get the employee name who added the product
include("../includes/knowthename.php");
include("../includes/generateTimestamp.php");



//Lets check if the data in each variables is correct by validating it in its
//respected properties and assign variables each
	
	//for product_name
	if(empty($_POST['product_name'])){
		$error[] = 'Please the product name. ';
	}else{
		$product_name = mysql_real_escape_string($_POST['product_name']);
		}
	//for generic_name
	if(empty($_POST['generic_name'])){
		$error[] = '<br/><br/>Please the generic name. ';
	}else {
		$generic_name = mysql_real_escape_string($_POST['generic_name']);
		}


	//descriptions
	if(empty($_POST['description'])){
		$error[] = '<br/><br/>Please enter a brief description of the product.';
	}else{
		$description = mysql_real_escape_string($_POST['description']);
	}
	//reason
	if(empty($_POST['reason'])){
		$error[] = '<br/><br/>Please enter a brief description for adding.';
	}else{
		$reason = mysql_real_escape_string($_POST['reason']);
	}
	//price
	if(empty($_POST['price'])){
		$error[] = '<br/><br/>Please enter a price per unit.(Numbers only).';
	}else if(!is_numeric($_POST['price'])){
			$error[] = '<br/><br/>Please only put numbers(Price).';
		}else{
			$price = mysql_real_escape_string($_POST['price']);
			}
	//quantity
	if(empty($_POST['quantity'])){
		$error[] = '<br/><br/>Please enter a quantity per unit.(Numbers only).';
	}else if(!is_numeric($_POST['quantity'])){
			$error[] = '<br/><br/>Please only put numbers(Quantity).';
		}else{
			$quantity = mysql_real_escape_string($_POST['quantity']);
			}
// handle the data after checking it for cleansing it.
	if(empty($error)){
		$check = mysql_query("SELECT * FROM product_detail WHERE product_name = '$product_name' ") or die(mysql_error());
		
		if(mysql_num_rows($check) == 0) // check for duplicates
		{ 
					// insert the information to the product/detail database
					$sql2 = mysql_query(" INSERT INTO product (unit_price, balance_qty) VALUES('$price','$quantity')") or die(mysql_error());
					$id_gen = mysql_insert_id();
					$sql = mysql_query(" INSERT INTO product_detail(product_id,product_name,product_generic_name,
					product_description,who_added,date_added)
					VALUES('$id_gen','$product_name','$generic_name','$description','$employee_name','$timestamp')") or die(mysql_error());
					// update/insert info the product log for future log reference
					$id_gen = mysql_insert_id();
					$action = "ADD PRODUCT";
					$sql3 = mysql_query(" INSERT INTO product_logs
					(log_id,product_id,product_action,action_reason,date_added)VALUES
					('','$id_gen','$action','$reason','$timestamp')") or die(mysql_error());
				
								if($sql && $sql2 && $sql3){
									header('Location: prompt.php?x=1');
										}
		}else{		
					//There is something wrong if the data reached here
					echo '<span class="error">Error here!</span>';
					//header('Location: prompt.php?x=2');
										}
					}else
					{
							//print if
							$error_message = '<span class="error">';
							foreach($error as $key => $values)
							{
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
<title>Add Product Informations</title>
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/minibutton.css">
<link rel="stylesheet" href="../css/forms.css">
<link rel="stylesheet" href="../css/addproduct.css">




<script type="text/javascript" src="../scripts/date_time.js"></script>
<script type="text/javascript" src="../scripts/mainjs.js"></script>


</head>

<body>
<div id="wrapper">
    	<header id="main_header">
        <?php mainHeader(); ?>
        </header> 
        	<div id="top_search">
            <?php mainAnouncements(); ?>
  </div>
<div id="main_section" class="dates">
<h3>Add Product Form</h3>

 
  <form id="generalform1" class="container" method="post" action="add_product.php">
  
 				<h4>Please double check everything before submitting the form.</h4><br/>
               <?php // echo the error message
			    echo '<p align="center"> '.$error_message.' </p>';
			   ?>
                <div class="field">
					<label for="product_name">Product Name:</label>
					<input type="text" class="input3" id="product_name" name="product_name" maxlength="50"/>
					<p class="hint">50 characters maximum (letters and numbers only)</p>
				</div>
				<div class="field">
					<label for="generic_name">Generic Name:</label>
					<input type="text" class="input4" id="generic_name" name="generic_name" maxlength="50"/>
                    <p class="hint">50 characters maximum (letters and numbers only)</p>
				</div>
                 <div class="field">
					<label for="description">Description:</label>
					<textarea name="description" class="input" id="description" rows=4 c></textarea>
					<p class="hint">Add additional descriptions.</p>
				</div>
               	<div class="field">
					<label for="price">Unit Price:</label>
					<input type="text" class="input2" id="price" name="price" maxlength="20"/>
					<p class="hint">Put a price per unit(Peso Currency)</p>
				Pesos</div>
                <div class="field">
					<label for="quantity">Unit Quantity:</label>
					<input type="text" class="input2" id="quantity" name="quantity" maxlength="30"/>
					<p class="hint">How many stocks do we have?</p>
				Pieces(Each)</div>
                <div class="field">
					<label for="upload_pic">Upload Picture</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="2048000" />
					<input type="file" class="input" id="product_image" name="product_image" maxlength="20"/>					<p class="hint">Add a product picture.</p>
				</div>
                 <div class="field">
					<label for="reason">Reason:</label>
					<textarea name="reason" class="input" id="reason" rows=1 c></textarea>
					<p class="hint">Add a brief description for adding.</p>
				</div>
                
                
      <div align="center">
        <input type="submit" name="submit" id="submit" class="button" value="Add Product"/>
      </div>
  </form>
</div>    
            <div id="main_footer" class="links">
   			<?php mainFooter(); ?>
            </div> 
</div>
</body>
</html>