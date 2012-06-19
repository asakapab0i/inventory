<?php

if(isset($_SESSION['username'])){
	
	$username = $_SESSION['username'];
	
	$sql = mysql_query("SELECT * FROM employee WHERE username ='$username'");
	
	if(mysql_num_rows($sql) == 1){
			while($row = mysql_fetch_array($sql)){
					$employee_name = $row['emp_name'];
					$employee_id = $row['emp_id'];
				
				}
				return $employee_name;
				return $employee_id;
		}else {
			header('Location: prompt.php?x=10');
			}
	if(!empty($employee_name)&& !empty($employee_id)){
	return $employee_name;
	}else{
		$employee_name = 'Hello World';
		return $employee_name;
		}
	
	}
	
?>