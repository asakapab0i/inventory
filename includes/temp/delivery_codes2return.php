<?php 

function productoDeliver(){
	include("../includes/connect.php");
	$varDisplay = "0";
	$searchBox = "";
	 $formSearchBy = "";


if(empty($_GET['formDisplay'])){
		if(empty($_GET['searchBox'])){

	

/*
	$tempsql = mysql_query("
SELECT p.product_id,
unit_price,
balance_qty,
product_name,
product_generic_name
FROM product AS p
INNER JOIN product_detail AS pd on p.product_id = pd.product_id
ORDER BY p.product_id DESC
LIMIT 100");
*/
//to display deliver

$deliver = mysql_query("SELECT d.product_id,
						delivery_id,
						delivered_qty,
						d_unit_price,
						d_total_price,
						product_name
						FROM delivery_detail AS d
						INNER JOIN product_detail AS p ON d.product_id = p.product_id") 
						or die(mysql_error());




		}
		}else{
			 $varDisplay = $_GET['formDisplay'];
			 $searchBox = $_GET['searchBox'];
			 $formSearchBy = $_GET['formSearchBy'];
			 
	$tempsql = mysql_query("
SELECT p.product_id,
unit_price,
balance_qty,
product_name,
product_generic_name
FROM product AS p
INNER JOIN product_detail AS pd on p.product_id = pd.product_id
WHERE ".$formSearchBy."
LIKE '%$searchBox%'
ORDER BY p.product_id DESC
LIMIT ".$varDisplay."");

$deliver = mysql_query("SELECT d.product_id,
						delivery_id,
						delivered_qty,
						d_unit_price,
						d_total_price
						FROM delivery_detail AS d
						INNER JOIN product AS p ON d.product_id = p.product_id
						WHERE ".$formSearchBy."
						ORDER BY d.product_id DESC
						LIMIT ".$varDisplay."
						") 
						
						or die(mysql_error());
	
	/*
	//narrow the seach
		*/		
			}
		
	
	
	echo '<h3>Delivery Search</h3>';
	
	if(empty($varDisplay) && empty($searchBox)){
		echo 'Displaying products.';
	
	}else{
		
		echo "<p>Displaying ".$varDisplay." products.";
		echo "<br/><p>Results for: '".$searchBox."' ";
	
		
		}
	
	productDisplayMenu2();
	
	
	echo'
	 <table border="1">
	<tr>
    <th class="theth" scope="col">Delivery ID</th>
    <th class="theth" scope="col">Product ID</th>
    <th class="theth" scope="col">Product Name</th>
	<th class="theth" scope="col">Product Price</th>
	<th class="theth" scope="col">Quantity</th>
	<th class="theth" scope="col">Total Amount</th>
    </tr></br>';
	$count = 0;

	while($row2 = mysql_fetch_array($deliver)){	
		echo "<tr bgcolor='#006699' id='row".$count."' onmouseover='over(".$count.")' onmouseout='out(".$count.")' onClick='addtosale(".$count.")'>";
		echo "<td id='did".$count."'>".$row2['delivery_id']."</td>";
		echo "<td id='pid".$count."'>".$row2['product_id']."</td>";
		echo "<td id='pname".$count."'>".$row2['product_name']."</td>";
		echo "<td id='dqty".$count."'>".$row2['delivered_qty']."</td>";
		echo "<td id='unitprice".$count."'>".$row2['d_unit_price']."</td>";
		echo "<td id='dtotalprice".$count."'>".$row2['d_total_price']."</td>";
		//echo "<td name='balance[]'>".$row2['balance_qty']."</td>";
		echo '</tr>';
		
		$count++;
		}
	
	echo '</table>';
	}

	
function productDisplayMenu2(){
	


echo '
<div align="center">
<form class="forms" action="sales.php" method="get" name="productDisplayForm">

	<select class="input" name="formSearchBy">
	<option value="product_name">Search By</option> 
  <option value="product_name">Product Name</option>
  <option value="product_generic_name">Generic Name</option>
	</select>
	
	<select class="input" name="formDisplay">
	<option value="5">Display by</option> 
  <option value="5">5</option>
  <option value="10">10</option>
  <option value="15">15</option>
  <option value="100">100</option>
	</select>
	
	<input class="input" name="searchBox" type="text" value="" size="15" maxlength="20" />
	<a href="#" class="minibutton">Type Term</a>
	
	
	</form> 
	</div>';
	
/* 
<select class="input" name="formSearchBy">
	<option value="product_name">Search By</option> 
  <option value="product_name">Product Name</option>
  <option value="product_generic_name">Generic Name</option>
	</select>
	
	<select class="input" name="formDisplay">
	<option value="5">Display by</option> 
  <option value="5">5</option>
  <option value="10">10</option>
  <option value="15">15</option>
  <option value="100">100</option>
	</select> */

}



?>