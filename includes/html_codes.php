<?php 

function mainHeader(){
	//make the header easy to change
	echo '
		<header id="main_header">
			<div id="rightAlign">';
		topRightLinks();	
	echo '
		</div>
	<a href="index.php"><img src="images/mainLogo2.png"></a>
		</header>
	';
	}
	
function mainAnouncements(){
echo '<h3>News &amp; Anouncements</h3>
	
            <h4>Tommorow is holiday!</h4>
			<p>*Monday May 28 2012 08:20:15</p> 
			<hr>
<p class="dates">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software.<hr/><br/></p>
<p class="dates"><a href="anouncement.php">More Anouncements...</a></p>';
	
}
function firstPageRules(){
		echo '
		<h3>News &amp; Anouncements</h3>
	
            <h4>ATTENTION VISITORS!!</h4>
			<p>*Monday May 28 2012 08:20:15</p> 
			<hr>
<p class="dates">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software.<hr/><br/></p>
<p class="dates"><a href="anouncement.php">More Anouncements...</a></p>
		
		';
	
	}
function mainFooter(){

	echo '
		
            <h3>This is the footer MotherFucker!</h3><br/>
			<a href="http://troubledblogger.wordpress.com">troubledblogger\'s blog</a>
            
	';

}


function topRightLinks(){
	echo '
	<span id="date_time" class="dates"></span>
            <script type="text/javascript">window.onload = date_time("date_time");</script>
			';
}
	
function loginForm() {
	
	echo '<h3><a href="index.php">Back</a></h3>
<form id="generalform" class="container" method="post" action="">
				<h3>Login</h3>
                <?php 
				echo $error_message;
				?>
				<div class="field">
					<label for="username">Username:</label>
					<input type="text" class="input" id="username" name="username" maxlength="20"/>
				</div>
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" class="input" id="password" name="password" maxlength="20"/>
				</div>
				<input type="submit" name="submit" id="submit" class="button" value="Submit"/>
	</form>
    <h3>Click <a href="#">here</a> for Admin Access.<br />
    Click <a href="register.php">here</a> to register employee. </h3>
'; 
	}

function registerForm() {
	$error_message = '';
	echo '
	
	<h3><a href="login.php">Back</a></h3>
   <form id="generalform" class="container" method="post" action="">
				<h3>Register</h3>
				  
				
				'.$error_message.'
				
				
				<div class="field">
					<label for="username">Username:</label>
					<input type="text" class="input" id="username" name="username" maxlength="20"/>
					<p class="hint">20 characters maximum (letters and numbers only)</p>
				</div>
				<div class="field">
					<label for="email">Email:</label>
					<input type="text" class="input" id="email" name="email" maxlength="80"/>
				</div>
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" class="input" id="password" name="password" maxlength="20"/>
					<p class="hint">20 characters maximum</p>
				</div>
                <div class="field">
					<label for="address">Address:</label>
					<input type="text" class="input" id="address" name="address" maxlength="30"/>
					<p class="hint">30 characters maximum</p>
				</div>
                  <div class="field">
					<label for="telephone">Telephone:</label>
					<input type="text" class="input" id="contact_no" name="contact_no" maxlength="10"/>
					<p class="hint">10 numbers maximum</p>
				</div>
                   <div class="field">
					<label for="emp_name">Employee Name:</label>
					<input type="text" class="input" id="emp_name" name="emp_name" maxlength="20"/>
					<p class="hint">20 characters maximum</p>
				</div>

				<input type="submit" name="submit" id="submit" class="button" value="Submit"/>
			</form>
	
	
	';
	}

?>