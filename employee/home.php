<?php 
session_start();
include("../includes/connect.php");
include("../includes/employee_html.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home | Bryan L. Bojorque</title>
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/bigbutton.css">
<link rel="stylesheet" href="../css/home.css">

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
<?php employeeMenu(); ?>
</div>
<div id="main_section_widget_cover" class="dates">
<?php recentlyAddedItems(); ?>
</div>
<div id="main_section2" class="dates">
<?php personalSpace(); ?>
</div>
<div id="main_section2" class="dates">
<?php storeInformations(); ?>
</div>
    
            <div id="main_footer" class="links">
   			<?php mainFooter(); ?>
            </div> 
</div>
</body>
</html>