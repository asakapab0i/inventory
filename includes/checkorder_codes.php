<?php 

function checkYourOrder() {

	if(isset($_POST['sample'])){
		include("../includes/connect.php");
		include("../includes/generateTimestamp.php");
		include("../includes/knowthename.php");
		/* 
			echo 'Success'; */
			
		$pid=$_POST['submit_id'];
		$pname = $_POST['submit_name'];
		$total = $_POST['submit_total'];
		$quantity = $_POST['submit_qty'];
		$price = $_POST['submit_price'];
		$unit = $_POST['submit_unit'];
		$change = $_POST['submit_sukli'];
		$payment = $_POST['submit_payment'];
		$count = $_POST['count'];
		//explode
		$newpid = explode(";",$pid);
		$newpname = explode(";",$pname);
		$newquantity = explode(";",$quantity);
		$newprice = explode(";",$price);
		$newpriceunit = explode(";",$unit);
		
	/* 	echo '<hr/>';
	echo 'This is the data! '.$pid.' <br/>';
	echo 'This is the names! '.$pname.' <br/>';
	echo 'This is the quantity! '.$quantity.' <br/>';
	
	echo 'This is the prices! '.$price.' <br/>';
	echo 'This is the unit price! '.$unit.' <br/>';
	echo 'This is the total! '.$total.' <br/>';
	echo 'This is the payment! '.$payment.' <br/>';
	echo 'This is the change! '.$change.' <br/>';
	echo 'This is the product count! '.$count.' <br/>';
	echo 'This is the exploded data! '.$newpid[0].' ';
	echo '<hr/>';  */
	
	
		$sql = mysql_query("INSERT INTO sales 
		(sales_date, 
		total_price, emp_id) 
		VALUES ('$timestamp',
		'$total', 
		'$employee_id')") 
		or die(mysql_error());
		
		
		$id_gen = mysql_insert_id();
		mysql_query($sql);
		
		$count = $count - 1;
		$balance = '';
		
		while($count > -1){
			
				$product_id = $newpid[$count];
				$product_name = $newpname[$count];
				$product_quantity = $newquantity[$count];
				$product_price = $newprice[$count];
				$product_newpriceunit = $newpriceunit[$count];
				
				
				// updating the balance_qty
				$product = ("UPDATE product
							 SET balance_qty = ((balance_qty)-('$product_quantity'))
							 WHERE product_id = '$product_id'
							 ");
							mysql_query($product) or die(mysql_error());
				
				//getting the recent quantity balance
				$qty = mysql_query("SELECT balance_qty 
									FROM product 
									WHERE product_id = '$product_id'") 
									or die(mysql_error());
											
								while($row = mysql_fetch_array($qty)){
										$balance = $row['balance_qty'];
									}
							echo 'SUCCESS';
						

							
				// inserting the data into the ledger table
				$none='NONE';
				$sales='SALE';
				$debit='DEBIT';
				$ledger = ("INSERT INTO product_ledger 
							(product_id,
							trans_type,trans_id,
							inventory_debit,
							inventory_credit,
							balance_qty) VALUES(
							'$product_id','$sales',
							'$id_gen',
							'$debit',
							'$none',
							'$balance')") or die(mysql_error());
							
							mysql_query($ledger) or die(mysql_error());
				
				
				//inserting the data to sales table
				$sql2 = ("INSERT INTO sales_details 
				(sales_id,
				product_id,
				sales_qty,
				unit_price,
				net_price) 
				VALUES 
				('$id_gen',
				'$product_id',
				'$product_quantity',
				'$product_newpriceunit',
				'$product_price')") 
				or die(mysql_error());
				
				
				mysql_query($sql2);	
				$count--;		
			}
		//header('Location: prompt.php?x=5');
	
	
		
		}else{
				'Nothing to do!';
			}

/* if(isset($_POST['submit'])){
		include("../includes/connect.php");
		include("../includes/generateTimestamp.php");
		include("../includes/knowthename.php");
		
		
		
		$_POST = unserialize($_POST['submit']);
		$x = $_POST['submit'];
		echo ('This is the serialized' +$x);
		
		
		
/* 		$pid=$_POST['submit_id'];
		$pname = $_POST['submit_name'];
		$total = $_POST['submit_total'];
		$quantity = $_POST['submit_qty'];
		$price = $_POST['submit_price'];
		$unit = $_POST['submit_unit'];
		$change = $_POST['submit_sukli'];
		$payment = $_POST['submit_payment'];
		$count = $_POST['count'];
		//explode
		$newpid = explode(";",$pid);
		$newpname = explode(";",$pname);
		$newquantity = explode(";",$quantity);
		$newprice = explode(";",$price);
		$newpriceunit = explode(";",$unit);
		
		
		$sql = mysql_query("INSERT INTO sales (sales_date, total_price, emp_id) VALUES ('$timestamp','$total', '$employee_id')");
		mysql_query($sql);
		$id_gen = mysql_insert_id();
		$count = $count - 1;
		while($count = -1){
			
				$product_id = $newpid[$count];
				$product_name = $newpname[$count];
				$product_quantity = $newquantity[$count];
				$product_price = $newprice[$count];
				
				$sql2("INSERT INTO sales_details (sales_id,product_id,sales_qty,unit_price,net_price) VALUES ('$id_gen','$newpid[$count]','$product_quantity[$count]',
				'$product_price[$count]','$newpriceunit[$count]')");
				mysql_query($sql2);			
			}
		header('Location: prompt.php?x=5');

		}else{
			echo 'Nothing here!'; 
		}



 */



// there is came from sales .php	
	
if(isset($_POST['submit_id'])){
	




/* 	
	document.write("<div class=field>");
	document.write("<label for='id_array'> Product Order </label>");
	document.write("<input readonly='readonly' class='inputpid' type='text' id='id_array["+x+"]' ' align='left' style='text-align:left' value=''>");
	document.write("<input readonly='readonly' class='inputpname' type='text' id='name_array["+x+"]'  style='text-align:left' value=''>");	
	document.write("<input class='inputnum' type='text' id='qty_array["+x+"]'  style='text-align:left' value='' onKeyUp='total()'>");	
	document.write("<input readonly='readonly' class='inputnum' type='text' id='price_array["+x+"]' style='text-align:left' value=''>");	
	document.write("<input readonly='readonly' class='inputnum' type='text' id='total_array["+x+"]'  style='text-align:left' value=''>");	
	document.write("</div>");
 */
 
/*  <input type="text" name="submit_id" style="visibility:hidden;position:absolute">
<input type="text" name="submit_name" style="visibility:hidden;position:absolute">
<input type="text" name="submit_total" style="visibility:hidden;position:absolute">
<input type="text" name="submit_qty" style="visibility:hidden;position:absolute">
<input type="text" name="submit_price" style="visibility:hidden;position:absolute">
<input type="text" name="submit_unit" style="visibility:hidden;position:absolute">
<input type="text" name="submit_sukli" style="visibility:hidden;position:absolute">
<input type="text" name="submit_payment" style="visibility:hidden;position:absolute">
<input type="text" name="count" style="visibility:hidden;position:absolute">
<input type="button" class="minibutton2" value="Check Order" onclick="inSale()"/> */
	
	$pid=$_POST['submit_id'];
	$pname = $_POST['submit_name'];
	$total = $_POST['submit_total'];
	$quantity = $_POST['submit_qty'];
	$price = $_POST['submit_price'];
	$unit = $_POST['submit_unit'];
	$change = $_POST['submit_sukli'];
	$payment = $_POST['submit_payment'];
	$count = $_POST['count'];
		//explode the array
	$newpid = explode(";",$pid);
	$newpname = explode(";",$pname);
	$newquantity = explode(";",$quantity);
	$newprice = explode(";",$price);	
		
/*  	echo '<hr/>';
	echo 'This is the data! '.$pid.' <br/>';
	echo 'This is the names! '.$pname.' <br/>';
	echo 'This is the quantity! '.$quantity.' <br/>';
	
	echo 'This is the prices! '.$price.' <br/>';
	echo 'This is the unit price! '.$unit.' <br/>';
	echo 'This is the total! '.$total.' <br/>';
	echo 'This is the payment! '.$payment.' <br/>';
	echo 'This is the change! '.$change.' <br/>';
	echo 'This is the product count! '.$count.' <br/>';
	echo 'This is the exploded data! '.$newpid[0].' ';
	echo '<hr/>';  */
	
	
	
	$count = $count - 1;
	echo '<h3>ORDER SUMMARY</h3>';
	echo '<hr/>';
	echo '<table width="79%" border="0">
 
	<tr >
		<td width="9%" id="pid" >ID</td>
		<td width="61%" id="pname">Product Name</td>
		<td width="14%" id="gen_name">Quantity</td>
		<td width="16%" id="price">Price</td>
		</tr> 
</table>
<hr/>

';
	echo '<table width="79%" border="0">';
 while($count > -1){	
		echo "<tr bgcolor='#006699' id='row".$count."' onmouseover='over(".$count.")' onmouseout='out(".$count.")' >";
		echo "<td width='9%' id='pid".$count."'>".$newpid[$count]." </td>";
		echo "<td width='61%' id='pname".$count."'>".$newpname[$count]."</td>";
		echo "<td width='14%' id='gen_name".$count."'>".$newquantity[$count]."</td>";
		echo "<td width='16%' id='price".$count."'>".$newprice[$count]."</td>";
		echo '</tr>';	
$count--;
}

echo  '</table>';
echo '<hr/>';
echo '<table class="tableorder" width="79%" border="0">
 
	<tr >
		<td width="53%" id="pid" ></td>
		<td width="17%" id="pname"></td>
		<td width="100%" id="gen_name">Total Price: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.$total.' PHP </td>
		<td width="25%" id="price"> </td>
		</tr> 
';
echo '
 
	<tr >
		<td width="16%" id="pid" >Payment: &nbsp; &nbsp; &nbsp; '.$payment.' PHP </td>
		<td width="14%" id="pname"> </td>
		<td width="17%" id="gen_name"></td>
		<td width="53%" id="price"></td>
		</tr> 

';
echo '
 
	<tr >
		<td  width="53%" id="pid" >Change:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   '.$change.' PHP</td>
		<td width="17%" id="pname"></td>
		<td width="14%" id="gen_name"></td>
		<td width="16%" id="price"> </td>
		</tr> 
</table>

';
echo '<hr/>';

 
	echo '<form name="pass_data2" method="post" action="checkorder.php">
	<br/><div align="center">
	<form name="pass_data"  class="container" method="post" action="checkorder.php">
		<input name="sample" style="visibility:hidden;position:absolute">
	<input type="text" name="submit_id" value="'.$pid.'"style="visibility:hidden;position:absolute">
	<input type="text" name="submit_name" value="'.$pname.'" style="visibility:hidden;position:absolute">
	<input type="text" name="submit_total" value="'.$total.'" style="visibility:hidden;position:absolute">
	<input type="text" name="submit_qty" value="'.$quantity.'"style="visibility:hidden;position:absolute">
	<input type="text" name="submit_price" value="'.$price.'" style="visibility:hidden;position:absolute">
	<input type="text" name="submit_unit" value="'.$unit.'" style="visibility:hidden;position:absolute">
	<input type="text" name="count" value="'.$_POST['count'].'" style="visibility:hidden;position:absolute">
	<input type="text" name="submit_sukli" value="'.$change.'" style="visibility:hidden;position:absolute">
	<input type="text" name="submit_payment" value="'.$payment.'" style="visibility:hidden;position:absolute">
  <input type="submit" value="Submit Order" class="minibutton">
  </form>
</div>';

	 
	
	
	}else{
		echo 'YOU DID NOT CHOOSED A PRODUCT';
		}

}

?>