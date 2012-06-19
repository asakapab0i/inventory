<?php 

function productoReturn(){
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

	$deliver = mysql_query("SELECT d.product_id,
						d.delivery_id,
						delivered_qty,
						d_unit_price,
						d_total_price,
						product_name,
						delivery_date,
						supplier_name
						FROM delivery_detail AS d
						INNER JOIN product_detail AS p ON d.product_id = p.product_id
						INNER JOIN delivery AS dd ON d.delivery_id = dd.delivery_id") 
						or die(mysql_error());




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
$deliver = mysql_query("SELECT d.product_id,
						d.delivery_id,
						delivered_qty,
						d_unit_price,
						d_total_price,
						delivery_date,
						supplier_name
						FROM delivery_detail AS d
						INNER JOIN product AS p ON d.product_id = p.product_id
						INNER JOIN delivery AS dd ON d.delivery_id = dd.delivery_id
						WHERE ".$formSearchBy."
						ORDER BY d.product_id DESC
						LIMIT ".$varDisplay."
						") 
						
						or die(mysql_error());
	
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
		
	
	
	echo '<h3>Delivery Search</h3>';
	
	if(empty($varDisplay) && empty($searchBox)){
		echo 'Displaying deliveries.';
	
	}else{
		
		echo "<p>Displaying ".$varDisplay." deliveries.";
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
	<th class="theth" scope="col">Date Delivered</th>
	<th class="theth" scope="col">Supplier</th>
    </tr></br>';
	$count = 0;

	//$num_rows = mysql_num_rows($sql);
	//$row = mysql_fetch_array($sql);
	//$num_rows = mysql_num_rows($sql);
	//$row = mysql_fetch_array($sql);
	
	//while($row2 = mysql_fetch_array($sql)){
	while($row2 = mysql_fetch_array($deliver)){	
		echo "<tr bgcolor='#006699' id='row".$count."' onmouseover='over(".$count.")' onmouseout='out(".$count.")' onClick='addtoreturns(".$count.")'>";
		echo "<td id='did".$count."'>".$row2['delivery_id']."</td>";
		echo "<td id='pid".$count."'>".$row2['product_id']."</td>";
		echo "<td id='pname".$count."'>".$row2['product_name']."</td>";
		echo "<td id='dqty".$count."'>".$row2['delivered_qty']."</td>";
		echo "<td id='unitprice".$count."'>".$row2['d_unit_price']."</td>";
		echo "<td id='dtotalprice".$count."'>".$row2['d_total_price']."</td>";
		echo "<td id='ddate".$count."'>".$row2['delivery_date']."</td>";
		echo "<td id='supplier".$count."'>".$row2['supplier_name']."</td>";
		//echo "<td name='balance[]'>".$row2['balance_qty']."</td>";
		echo '</tr>';
		
		$count++;
		}
	
	echo '</table>';
	}

	
function productDisplayMenu2(){

include("../includes/connect.php");





 
echo '<div align="center">';
echo '<form class="forms" action="sales.php" method="get" name="productDisplayForm">';


	
	
	echo '<form class=\"forms\" action=\"sales.php\" method=\"get\" name=\"productDisplayForm\">';

$deliver_sql = mysql_query("SELECT supplier_name FROM delivery") or die(mysql_error());
    echo "<select class=\"input\" name=\"companyNames\">"; 
    echo "<option value=\"\"></option>";
    
	if(mysql_num_rows($deliver_sql)) 
    { 
    while($row = mysql_fetch_array($deliver_sql) or die(mysql_error())) 
    { 
    echo '<option value="'.$row['supplier_name'].'">'.$row['supplier_name'].'</option>'; 
    } 
	
	echo '</select>'; 
    } 
    
	
echo '<input class="input" name="searchBox" type="text" value="" size="15" maxlength="20" />';
	
echo "</form>";
echo '</div>';
	 
	 
	 
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
	</select>
		<input class="input" name="searchBox" type="text" value="" size="15" maxlength="20" />
	<a href="#" class="minibutton">Type Term</a>
	 */

}



?>