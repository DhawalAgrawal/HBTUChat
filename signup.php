<?php
include "php/core.inc.php";
include "php/connect.inc.php";

error_reporting(E_ALL);
ini_set('display_errors', TRUE);

if (!loggedin())
{ 

if (
	isset($_POST['firstname'])&&isset($_POST['secondname'])&&isset($_POST['srno'])&&isset($_POST['email'])&&
	isset($_POST['year'])&&
	isset($_POST['pass1'])&&
	isset($_POST['pass2']))
          
		  
		  {
			  $firstname = $_POST['firstname'] ;
	$secondname =   $_POST['secondname'];
	$srno = $_POST['srno'] ;
	$email = $_POST['email'];
	$year = $_POST['year'];
if( !empty($_POST['firstname']) && !empty($_POST['secondname']) && !empty($_POST['srno']) && 
!empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['year']) &&!empty($_POST['pass1']) && !empty($_POST['pass2']))
{
    if ($_POST['pass1']!= $_POST['pass2'])
{  
     echo '<script>alert("Sorry! Passwords do not match");</script>';

	 }
$password_hash = md5($_POST['pass2']);
$query = " SELECT `id` FROM `user_details` WHERE `email` = '$email' ";
if($mysql_result = mysqli_query($connect , $query))
{     
  $query_num_rows = mysqli_num_rows($mysql_result);
       if ( $query_num_rows==1)
{echo '<script>alert("This Email ID is associated with a pre-existing account")</script>';}
 else 
{  $random_no = rand(599,5000);
   $rand_hash = md5($random_no);
   $query_insert= " INSERT INTO `user_details` (`id`, `firstname`, `lastname`, `email`, `srno`, `year`, `password`, `verify`, `vcode`) VALUES (NULL, '$firstname', '$secondname', '$email', '$srno', '$year', '$password_hash', '', '$rand_hash') ";
  if( $query_insert_result = mysqli_query($connect , $query_insert) )
{  
 $body= 'Your verification code = *******'.$rand_hash.'*******  Thanks for registering , Copy the code and paste where asked'; 
mail($email,'CHATTY WEBSITE VERIFICATION',$body,'registrations@chatty.website');
header ('Location:php/verification.php');
}

}
   }

		}
			  
		else echo '<script>alert("Please enter all feilds");</script>';


			  
		  }




?>


<html>
<head>
<title> Chatty.Website | Signup</title>
<link rel = "stylesheet" href = "css/signupcss.css"/>
<link href="https://fonts.googleapis.com/css?family=Hammersmith+One" rel="stylesheet">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">

</head>

<body>
<div class="wrap">
	<header id="header">
		<h1><a href="index.html" target="_BLANK">Chatty.Website</a></h1>
		<navbar>
			<ul>
				<li><a href="#">About</a></li>
				<li><a href="#">Features</a></li>
				<li><a href="#">Feedback</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</navbar>
	</header>
</div>
<div class="belowwrap">
<div class ="loginform" >
<form method="POST" action="signup.php">
First name:<br> <input type = "text" name ="firstname" maxlength = "30" value = "<?php if (isset($firstname)){echo $firstname;}  ?>"><br>
Second name:<br> <input type = "text" name ="secondname" maxlength = "30" value = "<?php if (isset($secondname)){echo $secondname;}  ?>"><br>
Sr No(XXX/YY):<br> <input type = "text" name ="srno" maxlength = "7" value = "<?php if (isset($srno)){ echo $srno;}  ?>"><br>
  Email:<br><input type="text" name="email" value = "<?php  if (isset($email)){echo $email;} ?>" ><br>
    Password:<br><input type="password" name="pass1" ><br>
	   Confirm Password:<br><input type="password" name="pass2" ><br>

  Year: <input type="checkbox" name="year" value="1"> First <br>
  <input type="checkbox" name="year" value="2" checked> Second<br>
    <input type="checkbox" name="year" value="3" checked> Third<br>
  <input type="checkbox" name="year" value="4" checked> Final<br>  
  
  <input type="submit" value ="REGISTER">
  </form>
  </div>
  </div>
  <footer>
<footer >
<div class="copyrightsu" >
All rights reserved © 2017 <a href = "http://fb.com/proanurag/" target="_blank">Anurag Technologies</a>
</div>
</footer>


  
  </body>
  </html>


<?php }
else if (loggedin())
{ $path = 'mainprofile.php';
header ('Location:'.$path);

}


?>