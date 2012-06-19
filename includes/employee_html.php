<?php 

function mainHeader(){
	//make the header easy to change
	echo '
		<header id="main_header">
			<div id="rightAlign">';
		topRightLinks();	
	echo '
		</div>
	<a href="../index.php"><img src="../images/mainLogo2.png"></a>
		</header>
	';
	}
function mainAnouncements(){
	echo '
	
	<h3>News &amp; Anouncements</h3>
	
            <h4>Tommorow is holiday!</h4>
			<p>*Monday May 28 2012 08:20:15</p> 
			<hr>
<p class="dates">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software.<hr/><br/></p>
<p class="dates"><a href="anouncement.php">More Anouncements...</a></p>';

	}


function topRightLinks(){
	echo '<span class="dates"> ';
	accountDisplay(); 
	echo '</span>';  
	
	echo '
	<span id="date_time" class="dates">  <script type="text/javascript">window.onload = date_time("date_time");</script>';
	echo '</span>';
     
	 
	
	
	
}



function employeeMenu(){
	
	echo '
	
	  <h3>Inventory Tools</h3>
	  <hr/></br>
  <table cellspacing="0" class="tablewidget">
    <tr>
      <th width="44%" scope="row"><h3><a href="productlist.php" class="bigbutton">Products</a></h3></th>
      <td width="56%"><h3><a href="sales.php" class="bigbutton">Sales</a></h3></td>
    </tr>
    <tr>
      <th scope="row"><h3><a href="delivery.php" class="bigbutton">Delivery</a></h3></th>
      <td><h3><a href="returns.php" class="bigbutton">Returns</a></h3></td>
    </tr>
    <tr>
      <th scope="row"><h3><a href="ledger.php" class="bigbutton">Ledger</a></h3></th>
      <td><h3><a href="reports.php" class="bigbutton">Reports</a></h3></td>
    </tr>
  </table>
	<hr/>
	';
	
	}
function accountDisplay(){
	require_once('../includes/connect.php');
	$x = $_SESSION['username'];

	if( isset($_SESSION['username']) ){
	
	$sql = mysql_query("SELECT * FROM employee WHERE username='$x'") or die(mysql_error());
	
	
	$count = mysql_num_rows($sql);
	
		if($count == 1){
		
			while($row = mysql_fetch_array($sql)){
			
				$accountName = $row['emp_name'];
				$accountId = $row['emp_id'];

			echo "<br/><br/><br/><br/><a href=\"profile.php?aid=$accountId\">$accountName </a>";
			echo "| <a href=\"../messages.php\">Messages(<span style=\"color:red;font-weight:bold\">238</span>)</a>";
			echo "| <a href=\"../logout.php\">Logout</a>
			<hr/>
			";
			
			}
	
		}	
		
	}
	

}

function recentlyAddedItems(){
	require_once('../includes/connect.php');
	echo '<h3>Recently Added Products</h3> <hr/>';
	echo '<div id="main_section_widget">';
	
	
	
	$sql = mysql_query("SELECT * FROM product_detail ORDER BY product_id DESC LIMIT 20") or die(mysql_error());
	
	if($sql){
	 while($row = mysql_fetch_array($sql)){
			$product_name = $row['product_name'];
			$product_id = $row['product_id'];
			$product_gen_name = $row['product_generic_name'];
					
					echo "<a href=\"product.php?pid=$product_id\">$product_name | $product_gen_name<br/></a>
					<hr/>
					";
							
		}
		echo '</div>';
		echo '
			<p><br/><a href="recentItems.php">More items...</a></p>
		
		';			
	}
	

}	
	
	

function personalSpace(){
	
	echo '
	<h3>Personal Space</h3>
<hr/><br/>
<table cellspacing="0">
  <tr>
    <th width="28%" scope="col"><h3><a href="profile.php" class="bigbutton">Profile</a></h3></th>
    <th width="28%" scope="col"><h3><a href="myschedule.php" class="bigbutton">Schedule</a></h3></th>
    <th width="28%" scope="col"><h3><a href="myschedule.php" class="bigbutton">Sales Logs</a></h3></th>
  </tr>
  <tr>
    <td><h3><a href="tasksystem.php" class="bigbutton">Tasks</a></h3></td>
    <td><h3><a href="tasksystem.php" class="bigbutton">Reports</a></h3></td>
    <td><h3><a href="assignments.php" class="bigbutton">Login Logs</a></h3></td>
  </tr>
  <tr>
    <td><h3><a href="messages.php" class="bigbutton">Messages </a></h3></td>
    <td><a href="assignments.php" class="bigbutton">Routines</a></td>
    <td><h3><a href="myschedule.php" class="bigbutton">Violations</a></h3></td>
  </tr>
</table>
<hr/>

	
	';
	
	}
	
function storeInformations(){
	
	echo '
	
		<h3>Store Informations</h3>
<hr/><br/>
<table cellspacing="0">
  <tr>
    <th width="28%" scope="col"><h3><a href="msgboard.php" class="bigbutton">MSG Board</a></h3></th>
    <th width="28%" scope="col"><h3><a href="regulations.php" class="bigbutton">Regulations</a></h3></th>
    <th width="28%" scope="col"><h3><a href="agreements.php" class="bigbutton">Agreements</a></h3></th>
  </tr>
  <tr>
    <td><h3><a href="birthdays.php" class="bigbutton">Birthdays</a></h3></td>
    <td><h3><a href="bugreport.php" class="bigbutton">BugReports</a></h3></td>
    <td><h3><a href="events.php" class="bigbutton">Events</a></h3></td>
  </tr>
  <tr>
    <td><h3><a href="anouncement.php" class="bigbutton">News</a></h3></td>
    <td><a href="documentation.php" class="bigbutton">Help Docs</a></td>
    <td><h3><a href="stats.php" class="bigbutton">Statistics</a></h3></td>	
  </tr>
</table>
<hr/>

	';
	}

function productListDisplay(){
	include("../includes/connect.php");
	$varDisplay = "0";
	$searchBox = "";



if(empty($_GET['formDisplay'])){
		if(empty($_GET['searchBox'])){
	$sql= mysql_query("SELECT * FROM product ORDER BY product_id DESC LIMIT 20 ");
	$sql2= mysql_query("SELECT * FROM product_detail ORDER BY product_id DESC LIMIT 20 ");	
		}
		}else{
			 $varDisplay = $_GET['formDisplay'];
			 $searchBox = $_GET['searchBox'];
			 $formSearchBy = $_GET['formSearchBy'];
			 
			 
				$sql= mysql_query("SELECT * FROM product ORDER BY product_id DESC LIMIT ".$varDisplay." ");
				$sql2= mysql_query("SELECT * FROM product_detail WHERE ".$formSearchBy." LIKE '%$searchBox%' ORDER BY product_id DESC LIMIT ".$varDisplay." ");
	
			
			}
		
	
	
	echo '<h3>Product List</h3>';
	
	if(empty($varDisplay) && empty($searchBox)){
		echo 'Displaying products.';
	
	}else{
		
		echo "<p>Displaying ".$varDisplay." products.";
		echo "<br/><p>Results for: '".$searchBox."' ";
	
		
		}
	
	productDisplayMenu();
	
	
	echo'
	 <table border="1">
	<tr>
    <th scope="col">Product ID</th>
    <th scope="col">Product Name</th>
    <th scope="col">Generic Name</th>
    <tr>';
	$count = 0;
	$num_rows = mysql_num_rows($sql);
	$row = mysql_fetch_array($sql);
	
	while($row2 = mysql_fetch_array($sql2)){
		
		echo "<tr bgcolor='#006699' id='row".$count."' onmouseover='over(".$count.")' onmouseout='out(".$count.")' onClick='clicked(".$row2['product_id'].")'>";
		echo "<td>".$row2['product_id']."</td>";
		echo "<td>".$row2['product_name']."</td>";
		echo "<td>".$row2['product_generic_name']."</td>";
		
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
	
function productDisplayMenu(){
	


echo '<form class="forms" action="productlist.php" method="get" name="productDisplayForm">
<select class="dropdown" name="formSearchBy">
	<option value="product_name">Search By</option> 
  <option value="product_name">Product Name</option>
  <option value="product_generic_name">Generic Name</option>
	</select>
	
	<select class="dropdown" name="formDisplay">
	<option value="10">Display by</option> 
  <option value="10">10</option>
  <option value="20">20</option>
  <option value="50">50</option>
  <option value="100">100</option>
	</select>
	
	
	<input class="dropdown" name="searchBox" type="text" value="" size="15" maxlength="20" />
	<input class="minibutton"  type="submit" value="Search" />
	<p class="minibutton"><a href="add_product.php">Add Product</a></p>

	
	
	</form> ';
	



}

	
function mainFooter(){

	echo '
		
	<h3>This is the footer Motherfucker!</h3>
			<a href="http://troubledblogger.wordpress.com">troubledblogger\'s blog</a><center><p class="dates">Licensed Under GNU GPL</p></center>
           	
	';
mysql_close();
}
		
?>