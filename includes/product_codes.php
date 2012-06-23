<?php  //Special functions for product
function displayProduct(){
	//house keeping..
	require_once('../includes/connect.php');
	$product_gen_name = "";
	$product_name = "";
	
	if(!empty($_SESSION['username'])){
	if(isset ($_GET['pid'])){
		include("../includes/generateTimestamp.php");
			$product_id = $_GET['pid'];
			
 $sql= mysql_query("SELECT * FROM product_detail WHERE product_id = '$product_id'");
 $sql2= mysql_query("SELECT * FROM product WHERE product_id = '$product_id'");

	
	$numrow = mysql_num_rows($sql); 
	$numrow2 = mysql_num_rows($sql2);
	$row2 = mysql_fetch_array($sql2);
	
	if($numrow == 1 ){
		
		while($row = mysql_fetch_array($sql)){
				$product_name = $row['product_name'];
				$product_gen_name = $row['product_generic_name'];
				$product_description = $row['product_description'];
				for($i = 0; $i<$numrow; $i++){
					if($row2['product_id']==$row['product_id']){
						
							$product_price = $row2['unit_price'];
							$product_balance = $row2['balance_qty'];
						}else{
							
							$row2 = mysql_fetch_array($sql2);
							}
					}
			}
	}		
		

		
echo '
  <h3>Product Information</h3>
 <span class="forms">
   <div align="center">
<p class="minibutton"><a href="productlist.php">Back to Product List</a></p>
<p class="minibutton"><a href="#.php">Delete Product</a></p>
<p class="minibutton"><a href="#.php">Edit Product</a></p>
</div>
 </span>
  	<p class="productTitle"><br/>'.$product_name.'</p>
	

  <table width="95%" border="1" cellspacing="0" class="tableProductInformation">
  <tr>
    <th width="228" rowspan="5" scope="col"><img src="../images/default.png" width="231" height="202" alt="Default Image" /></th>
    <td width="703" height="40" scope="col">Product ID: '.$product_id.'</td>
    </tr>
  <tr>
    <td height="43">Product Name: '.$product_name.'</td>
    </tr>
  <tr>
    <td height="42"> Generic Name: '.$product_gen_name.'</td>
    </tr>
  <tr>
    <td height="37">Price: '.$product_price.' Pesos</td>
    </tr>
  <tr>
    <td height="42">Balance Quantity: '.$product_balance.' Stocks</td>
    </tr>
  </table>
  
  <table cellspacing="0" class="tableProductInformation" border="1px">
  <tr>
    <td><p>Description: '.$product_description.'</p> </td>
  </tr>
  <tr>
    <td>Comments: <br/><br/>
	JOHN DOE <br/>
    '.$timestamp.'<br/>
    
    <p style="margin-left: 100px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software.</td>
  </tr>
</table>
';
}else{
	$error_message = "No Product Selected!";		
	}
 }else{
	 	echo 'You are unauthorized to view this page!';
	 
	 }
}
function displayTitle(){
	require_once('../includes/connect.php');
	
	if(isset($_GET['pid'])){
		$titleID = $_GET['pid'];
		
		$sql = mysql_query("SELECT product_name FROM product_detail WHERE product_id = '$titleID'");
		
		$num_rows = mysql_num_rows($sql);
		
		if($num_rows == 1){
			while($row = mysql_fetch_array($sql)){
				$titleName = $row['product_name'];
				}
			
			}
			
			echo $titleName;
		
		}
	}
 ?>