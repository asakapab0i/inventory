<?php 
include("../includes/connect.php");






function productoReturn(){
	
	echo '<h3>Select Supplier</h3>';	

	$deliver_sql = mysql_query("SELECT supplier_name,supplier_id FROM supplier") or die(mysql_error());

	

	echo '<form class="forms" action="returns.php" method="post" name="companyNames">';
    echo "<select class=\"inputstat\" name=\"companyNames\" id=\"companyNameId\" onChange=\"this.form.submit()\">"; 
   	echo '<option>Select Supplier</option>';
			while($row = mysql_fetch_array($deliver_sql)) 
			{ 
			echo '<option value="'.$row['supplier_id'].'">'.$row['supplier_name'].'</option>'; 
			} 
			echo '</select>'; 
			
			
   
	echo '</form>';
	
	
	if(isset($_POST['companyNames'])){
			
			$cf = $_POST['companyNames'];
				
				if(!empty($cf)){
						//convert supplier id to supplier name
						$getsupname = mysql_query("SELECT supplier_name FROM supplier WHERE supplier_id = '$cf' ") or die(mysql_error());
							if(mysql_num_rows($getsupname) == 1){
									while($row = mysql_fetch_array($getsupname)){
											$sup_name = $row['supplier_name'];
										}
								}
								
								
						
						
						echo '<input type="text" id="supplierId" value="'.$sup_name.'" style="visibility:hidden;position:absolute">';
						
						
						$deliver = mysql_query("SELECT d.product_id,
						d.delivery_id,
						delivered_qty,
						d_unit_price,
						d_total_price,
						product_name,
						delivery_date,
						supplier_id
						FROM delivery_detail AS d
						INNER JOIN product_detail AS p ON d.product_id = p.product_id
						INNER JOIN delivery AS dd ON d.delivery_id = dd.delivery_id
						WHERE supplier_id = '$cf' ") 
						
						or die(mysql_error());
						
						echo '<div align="center">';
						echo '<h3>Deliveries from: '.$sup_name.'</h3>';
						echo '</div>';
						echo'
	 <table border="1">
	<tr>
    <th class="theth" scope="col">Delivery ID</th>
    <th class="theth" scope="col">Product ID</th>
    <th class="theth" scope="col">Product Name</th>
	<th class="theth" scope="col">Quantity</th>
	<th class="theth" scope="col">Product Price</th>
	<th class="theth" scope="col">Total Amount</th>
	<th class="theth" scope="col">Date Delivered</th>
	
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
		//echo "<td id='supplier".$count."'>".$row2['supplier_id']."</td>";
		//echo "<td name='balance[]'>".$row2['balance_qty']."</td>";
		echo '</tr>';
		
		$count++;
		}
	
	echo '</table>';
	

						
						
						
						

						
					}else{
							echo 'ALL IS WELL';
						}
		
		}else{
			noData();
		}
	
	
	

	
	

echo '</div>';
	
//echo '</div>';




	
}

function noData(){
echo '<div align="center"> <br/><br/><br/><br/><br/>';

	echo '<h3>No Data Available</h3>';
echo '</div>';

}

function returnNumber(){
	include("../includes/connect.php");
		$getret = mysql_query("SELECT * FROM returns");

		$idnum = mysql_num_rows($getret);
		$idnum += 1;
		
	
	echo '<h3>Returns Number <input class="input" readonly="readonly" type="text" value="RN000'.$idnum.'"></h3>';
	
	}




?>