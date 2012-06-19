<?php 
session_start();
include("../includes/connect.php");
include("../includes/employee_html.php");

if(isset($_POST['submit']) )
{
  $varDisplay = $_POST['formDisplayData'];
  echo $varDisplay;
  $errorMessage = "";

}




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/bigbutton.css">
<link rel="stylesheet" href="../css/sample.css">

<script type="text/javascript" src="../scripts/date_time.js"></script>
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


<form action="sample.php" method="get" name="productDisplayForm">


	<select name="formDisplay"> 
  <option value="10">10</option>
  <option value="20">20</option>
  <option value="50">50</option>
  <option value="">All</option>
	</select>
	
	
<input type="submit" value="Display" />
</form> 


<?php
$varDisplay = "";
if(!isset($_GET['productDisplayForm']) )
{
echo 'ghello world';
  $varDisplay = $_GET['formDisplay'];
  if(empty($varDisplay)){
  $errorMessage = "waaa";
  }
echo $varDisplay;

}
?>


</div>
    
            <div id="main_footer" class="links">
   			<?php mainFooter(); ?>
            </div> 
</div>
</body>
</html>