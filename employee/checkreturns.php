<?php 
session_start();
include("../includes/connect.php");
include("../includes/employee_html.php");
include("../includes/checkreturns_codes.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Check your order</title>
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/forms.css">
<link rel="stylesheet" href="../css/minibutton.css">
<link rel="stylesheet" href="../css/checkorder.css">

<script type="text/javascript" src="../scripts/date_time.js"></script>
<script type="text/javascript" src="../scripts/mainjs.js"></script>
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
<h3><a href="returns.php" class="minibutton">Back</a></h3>



  <?php checkYourReturns(); ?>
  <br/>
  
</div>
<div id="main_footer" class="links">
	<?php mainFooter(); ?>
  </div> 
</div>
</body>
</html>