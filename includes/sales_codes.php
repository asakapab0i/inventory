<?php 
function productAddToSale(){
	include("../includes/connect.php");
	$varDisplay = "0";
	$searchBox = "";
	 $formSearchBy = "";


if(empty($_GET['formDisplay'])){
		if(empty($_GET['searchBox'])){
	
	
	
	//stull buggy
	/*$tempsql = mysql_query("SELECT p.product_id, unit_price, balance_qty, product_name, product_generic_name
FROM product AS p
INNER JOIN product_detail AS pd ON p.product_id = pd.product_id
ORDER BY p.product_id  DESC
LIMIT 5 ");
*/

	$tempsql = mysql_query("
SELECT p.product_id,
unit_price,
balance_qty,
product_name,
product_generic_name
FROM product AS p
INNER JOIN product_detail AS pd on p.product_id = pd.product_id
ORDER BY product_name ASC
LIMIT 150");



	/* 	$sql= mysql_query("SELECT * FROM product ORDER BY product_id DESC LIMIT ".$varDisplay." ");
				$sql2= mysql_query("SELECT * FROM product_detail WHERE ".$formSearchBy." LIKE '%$searchBox%' ORDER BY product_id DESC LIMIT ".$varDisplay." ");
 */
		}
		}else{
			 $varDisplay = $_GET['formDisplay'];
			 $searchBox = $_GET['searchBox'];
			 $formSearchBy = $_GET['formSearchBy'];
			 
		/* 
				$sql2= mysql_query("SELECT * FROM product ORDER BY product_id DESC LIMIT ".$varDisplay." ");
				$sql= mysql_query("SELECT * FROM product_detail WHERE ".$formSearchBy." LIKE '%$searchBox%' ORDER BY product_id DESC LIMIT ".$varDisplay." "); */
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
	
	/*
	//narrow the seach
	//buggy
		$tempsql = mysql_query("SELECT p.product_id, unit_price, balance_qty, product_name, product_generic_name
	FROM product AS p
	INNER JOIN product_detail AS pd ON p.product_id = pd.product_id
	WHERE ".$formSearchBy."
	LIKE '%$searchBox%'
	ORDER BY p.product_id  DESC
	LIMIT ".$varDisplay." ");
		*/
	
			
			}
		
	
	
	echo '<h3>Product Search</h3>';
	
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
    <th class="theth" scope="col">Product ID</th>
    <th class="theth" scope="col">Product Name</th>
    <th class="theth" scope="col">Generic Name</th>
	<th class="theth" scope="col">Product Price</th>
	<th class="theth" scope="col">Balance Qty</th>
    </tr></br>';
	$count = 0;
	//$num_rows = mysql_num_rows($sql);
	//$row = mysql_fetch_array($sql);
	//$num_rows = mysql_num_rows($sql);
	//$row = mysql_fetch_array($sql);
	
	//while($row2 = mysql_fetch_array($sql)){
	while($row2 = mysql_fetch_array($tempsql)){	
		echo "<tr bgcolor='#006699' id='row".$count."' onmouseover='over(".$count.")' onmouseout='out(".$count.")' onClick='addtosale(".$count.")'>";
		echo "<td id='pid".$count."'>".$row2['product_id']."</td>";
		echo "<td id='pname".$count."'>".$row2['product_name']."</td>";
		echo "<td id='gen_name".$count."'>".$row2['product_generic_name']."</td>";
		echo "<td id='price".$count."'>".$row2['unit_price']."</td>";
		echo "<td name='balance[]'>".$row2['balance_qty']."</td>";
		echo '</tr>';
			/*for($itemTotal = 0; $itemTotal < $num_rows; $itemTotal++){
				if($row['product_id'] == $row2['product_id']){
					echo "<td>".$row['unit_price']."</td>";
					echo "<td>".$row['balance_qty']."</td>";
					echo '</tr>';
					break;
				}else{
					$row = mysql_fetch_array($sql);
					}
	
				}
				*/
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