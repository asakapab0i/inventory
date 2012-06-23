<?php 
session_start();
include("includes/connect.php");
include("includes/html_codes.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventory Portal</title>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/bigbutton.css">
<link rel="stylesheet" href="css/index.css">
<script type="text/javascript" src="scripts/date_time.js"></script>
</head>

<body>
<div id="wrapper">
<?php mainHeader();  ?>
<div id="top_search">
  <?php 
		 if( isset($_SESSION['username']) ) {
			 mainAnouncements();
			 }else{
				 firstPageRules();
				 }	  
		  
		   ?>
</div>
<div id="main_section">
  <?php if( isset($_SESSION['username']) ) {
		echo '<br/><br/><br/><br/><br/><h3>Inventory Portal</h3>';
		echo '<h3><a href="../inventory/employee/home.php" class="bigbutton">HOME</a></h3>';
		}
	else{
		 echo '<br/><br/><br/><br/><br/><br/><br/><h3><a href="login.php" class="bigbutton">LOGIN</a></h3>';}?>
</div>
<div id="main_footer" class="links">
  <?php mainFooter(); ?>
</div>
</body>
</html>
