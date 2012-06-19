<?php  //Special functions for product
function displayLedger(){
	//house keeping..
	require_once('../includes/connect.php');
	if(empty($_GET['formDisplay'])){
		//if(empty($_GET['searchBox'])){
	//$sql= mysql_query("SELECT * FROM product ORDER BY product_id DESC LIMIT 20 ");
	//$sql2= mysql_query("SELECT * FROM product_detail ORDER BY product_id DESC LIMIT 20 ");
	
	$tempsql = mysql_query("SELECT *
							FROM product_ledger
							ORDER BY ledger_id DESC
							LIMIT 10
							");
		
		//}
		}else{
			 $varDisplay = $_GET['formDisplay'];
			 $formSearchBy = $_GET['formSearchBy'];
			 $formOrder = $_GET['formOrder'];
			 
			 
/* 				$sql= mysql_query("SELECT * FROM product ORDER BY product_id DESC LIMIT ".$varDisplay." ");
				$sql2= mysql_query("SELECT * FROM product_detail WHERE ".$formSearchBy." LIKE '%$searchBox%' ORDER BY product_id DESC LIMIT ".$varDisplay." ");
	
			 */
$tempsql = mysql_query("SELECT *
						FROM product_ledger 
						ORDER BY  ".$formSearchBy." ".$formOrder."
						LIMIT ".$varDisplay."
						");
			 
			 
			}
		
	
	
	echo '<h3>Ledger Records</h3>';
	
	if(empty($varDisplay)){
		echo 'Displaying ledger information.';
	
	}else{
		
		echo "<p>Displaying ".$varDisplay." ledger informations.";
		echo "<p>Order by ".$formSearchBy.".";
		
	
		
		}
	
	displayLedgerMenu();
	
	
	echo'
	 <table border="1">
	<tr>
    <th scope="col">Ledger ID</th>
	<th scope="col">Product ID</th>
    <th scope="col">Trans Type</th>
	<th scope="col">Trans ID</th>
    <th scope="col">Debit</th>
	 <th scope="col">Credit</th>
	  <th scope="col">Balance Qty</th>
    ';
	$count = 0;
	//$num_rows = mysql_num_rows($tempsql);
	//$row = mysql_fetch_array($tempsql);
	
	//while($row2 = mysql_fetch_array($sql2)){
		
		while($row2 = mysql_fetch_array($tempsql)){
			
		echo "<tr bgcolor='#006699' id='row".$count."' onmouseover='over(".$count.")' onmouseout='out(".$count.")' '>";
		echo "<td>".$row2['ledger_id']."</td>";
		echo "<td>".$row2['product_id']."</td>";
		echo "<td>".$row2['trans_type']."</td>";
		echo "<td>".$row2['trans_id']."</td>";
		echo "<td>".$row2['inventory_debit']."</td>";
		echo "<td>".$row2['inventory_credit']."</td>";
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
function displayLedgerMenu(){
		
		echo '<form class="forms" action="ledger.php" method="get" name="productDisplayForm">
<select class="input" name="formSearchBy">
	<option value="product_id">Order By</option>
	<option value="product_id">Product ID</option>  
  <option value="trans_id">Transaction ID</option>
  <option value="ledger_id">Ledger ID</option>
	</select>
	
	<select class="input" name="formDisplay">
	<option value="10">Display by</option> 
  <option value="10">10</option>
  <option value="20">20</option>
  <option value="50">50</option>
  <option value="100">100</option>
	</select>
	
	<select class="input" name="formOrder">
	<option value="DESC">Order by</option> 
  <option value="DESC">Descending</option>
  <option value="ASC">Ascending</option>
	</select>
	
	

	<input class="minibutton"  type="submit" value="Search" />

	
	
	</form> ';

	
	}
	
 ?>