<?php function productListDisplay2(){
	include("../includes/connect.php");
	$varDisplay = "0";
	$searchBox = "";



if(empty($_GET['formDisplay'])){
		if(empty($_GET['searchBox'])){
	//$sql= mysql_query("SELECT * FROM product ORDER BY product_id DESC LIMIT 20 ");
	//$sql2= mysql_query("SELECT * FROM product_detail ORDER BY product_id DESC LIMIT 20 ");
	
	$tempsql = mysql_query("
SELECT p.product_id,
unit_price,
balance_qty,
product_name,
product_generic_name
FROM product AS p
INNER JOIN product_detail AS pd on p.product_id = pd.product_id
ORDER BY p.product_id DESC
LIMIT 10");
		
		}
		}else{
			 $varDisplay = $_GET['formDisplay'];
			 $searchBox = $_GET['searchBox'];
			 $formSearchBy = $_GET['formSearchBy'];
			 
			 
/* 				$sql= mysql_query("SELECT * FROM product ORDER BY product_id DESC LIMIT ".$varDisplay." ");
				$sql2= mysql_query("SELECT * FROM product_detail WHERE ".$formSearchBy." LIKE '%$searchBox%' ORDER BY product_id DESC LIMIT ".$varDisplay." ");
	
			 */
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
			 
			 
			}
		
	
	
	echo '<h3>Product List</h3>';
	
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
    <th scope="col">ID</th>
    <th scope="col">Product Name</th>
    <th scope="col">Generic Name</th>
	 <th scope="col">Price</th>
	  <th scope="col">Quantity</th>
    ';
	$count = 0;
	//$num_rows = mysql_num_rows($tempsql);
	//$row = mysql_fetch_array($tempsql);
	
	//while($row2 = mysql_fetch_array($sql2)){
		
		while($row2 = mysql_fetch_array($tempsql)){
			
		echo "<tr bgcolor='#006699' id='row".$count."' onmouseover='over(".$count.")' onmouseout='out(".$count.")' onClick='clicked(".$row2['product_id'].")'>";
		echo "<td>".$row2['product_id']."</td>";
		echo "<td>".$row2['product_name']."</td>";
		echo "<td>".$row2['product_generic_name']."</td>";
		echo "<td>".$row2['unit_price']."</td>";
		echo "<td>".$row2['balance_qty']."</td>";
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
	echo '<hr/>';
	}
	
function productDisplayMenu2(){
	


echo '<form class="forms" action="productlist.php" method="get" name="productDisplayForm">
<select class="input" name="formSearchBy">
	<option value="product_name">Search By</option> 
  <option value="product_name">Product Name</option>
  <option value="product_generic_name">Generic Name</option>
	</select>
	
	<select class="input" name="formDisplay">
	<option value="10">Display by</option> 
  <option value="10">10</option>
  <option value="20">20</option>
  <option value="50">50</option>
  <option value="100">100</option>
	</select>
	
	
	<input class="input" name="searchBox" type="text" value="" size="15" maxlength="20" />
	<input class="minibutton"  type="submit" value="Search" />
	<a href="add_product.php" class="minibutton">Add Product</a>

	
	
	</form> ';
	
}


?>