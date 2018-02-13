<?php
include 'core.inc.php';
include 'connect.inc.php';

error_reporting(E_ALL);
ini_set('display_errors', TRUE);

if (isset($_POST['email'])&& isset($_POST['code']))
{
	if(!empty($_POST['email'])&& !empty($_POST['code']) )
	{ 
		$code = $_POST['code'];
		$email=$_POST['email'];
		
		$query =  " SELECT `id` FROM `user_details` WHERE `email` = '$email' ";
		$query_run= mysqli_query($connect , $query);
		$query_num_rows = mysqli_num_rows($query_run);
		if ($query_num_rows ==0)
		{
			echo '<script>alert("You are not registered")</script>';
		}
		else if ($query_num_rows ==1)
		{ 
          while($final_result=mysqli_fetch_assoc($query_run))
		  {
			  $user_id = $final_result['id'];
		  }
               $_SESSION['user_id']=$user_id;
             $a_code = getdata('vcode'); 

			 if($a_code = $code)
			 {
				 $query=" UPDATE `user_details` SET `verify` = '1' WHERE `user_details`.`id` ='$user_id'";
				 
				 if(mysqli_query($connect ,$query))
				 {
				 echo'<script>alert("Your account is now active!")</script>';
                                  header ('Location:../mainprofile.php');
			      } 
			 
			     } else echo 'Unable to verify / Wrong verification code';
		}
 
			                                 
          


	}

	else echo 'details not received';


	}








?>









<html>
<head>
<title>CollegePark | Verification</title>

<link rel = "stylesheet" href = "../css/signupcss.css"/>
<link href="https://fonts.googleapis.com/css?family=Hammersmith+One" rel="stylesheet">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>
<div class="wrap">
	<header id="header">
		<h1><a href="../index.html" target="_BLANK">CollegePark</a></h1>
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
</div>
<div class="belowwrap">
<div class ="loginform" >
<form method="POST" action= "<?php echo $path; ?>">
<h3> A verification code has been sent to your Email, enter to complete verification :) </h3>
  Email:<br><input type="text" name="email" ><br>
    Verification Code:<br><input type="password" name="code" ><br>
	   
  <input type="submit" value ="Verify >">
  </form>
  </div>
  </div>
<footer >
<div class="copyrightsu" >
All rights reserved © 2017 <a href = "http://fb.com/proanurag/" target="_blank">Anurag Technologies</a>
</div>
</footer>
</body>
</html>