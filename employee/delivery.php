<?php 
session_start();
include("../includes/connect.php");
include("../includes/employee_html.php");
include("../includes/delivery_codes.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delivery</title>
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/forms.css">
<link rel="stylesheet" href="../css/minibutton.css">
<link rel="stylesheet" href="../css/delivery.css">

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
<h3><a href="../index.php" class="minibutton">Back</a></h3>


<div id="main_section2" class="dates">
<?php producttoDeliver(); ?>
</div>

<div id="generalform">
               <hr/><br/>
				
                <?php deliveryNumber();?>
                
               <?php displaySupplier();?>
                 

      <table class="tablemargin" align="center"  cellspacing="0">
  <tr>
    <th width="105" height="30" scope="col"><div align="center">Product ID</div></th>
    <th width="388" scope="col"><div align="center">Product Name</div></th>
    <th width="85" scope="col">Quantity</th>
    <th width="70" scope="col">Price</th>
    <th width="112" scope="col">Total</th>
  </tr>
</table>
	

   <script type="text/javascript">
for(x=0;x<5;x++)

{
	document.write("<div class=field>");
	document.write("<label for='productorder'> Product Order </label>");
	document.write("<input readonly='readonly' class='inputpid' type='text' id='id_array["+x+"]' name='pid["+x+"]' ' align='left' style='text-align:left' value=''>");
	document.write("<input readonly='readonly' class='inputpname' type='text' id='name_array["+x+"]'  style='text-align:left' value=''>");	
	document.write("<input class='inputnum' type='text' id='qty_array["+x+"]'  style='text-align:left' value='' onKeyUp='total()'>");	
	document.write("<input readonly='readonly' class='inputnum' type='text' id='price_array["+x+"]' style='text-align:left' value=''>");	
	document.write("<input readonly='readonly' class='inputnum' type='text' id='total_array["+x+"]'  style='text-align:left' value=''>");	
	document.write("</div>");
}


</script>
<p class=""><a href="#">+Add Order Form</a></p>
<hr/>
</div>   
<h3>Charge Summary</h3>
<table id="generalform2" width="428"  cellspacing="0"  class="tablestats">



<div class=field>

  <tr>
    <td width="57%"><div align="center"><h3>Total Amount Due:</h3></div></td>
    <td width="43%"><input readonly='readonly' class='inputstat' type='text' id='due'></td>
    
  </tr>
  <tr>
    <td><div align="center"><h3>Total Amount Paid:</h3></div></td>
    <td><input class='inputstat' type='text' id='payment' onkeyup="subtract()"></td>
    
  </tr>
  <tr>
    <td><div align="center"><h3>Change: </h3></div></td>
    <td><input readonly='readonly' class='inputstat' type='text' id='sukli'></td>
  </tr>


</div>
</table>
<form name="pass_data"  class="container" method="post" action="checkdelivery.php">
<input type="text" name="submit_id" style="visibility:hidden;position:absolute">
<input type="text" name="submit_name" style="visibility:hidden;position:absolute">
<input type="text" name="submit_total" style="visibility:hidden;position:absolute">
<input type="text" name="submit_qty" style="visibility:hidden;position:absolute">
<input type="text" name="submit_price" style="visibility:hidden;position:absolute">
<input type="text" name="submit_unit" style="visibility:hidden;position:absolute">
<input type="text" name="count" style="visibility:hidden;position:absolute">
<input type="text" name="submit_sukli" style="visibility:hidden;position:absolute">
<input type="text" name="submit_payment" style="visibility:hidden;position:absolute">
<input type="text" name="supplier2" id="supplier2" style="visibility:hidden;position:absolute" >
<input type="button" class="minibutton2" value="Check Delivery" onclick="inSale()"/>
</form>   
  
</div>



<div id="main_footer" class="links">
	<?php mainFooter(); ?>
  </div> 
</div>
</body>
</html>
