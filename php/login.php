<?php
require 'connect.inc.php';
include 'core.inc.php';
$password_hash= md5($_POST['pass']);

 error_reporting(E_ALL);
ini_set('display_errors', TRUE);

if (isset($_POST['email'])  && isset($_POST['pass']))
{
$password = $_POST['pass'];
$email = $_POST['email'];
    if(!empty($email) && !empty($password))
   { 
$query = " SELECT  `id` FROM `user_details` WHERE `email`='$email' AND `password`='$password_hash' ";
if($query_result = mysqli_query($connect , $query))
     { 
    $query_num_row = mysqli_num_rows($query_result);
    if($query_num_row==0)
       {
           echo '<br>No user with this email/password found!!' ;
               }
else if($query_num_row==1)
       { 
while($row=mysqli_fetch_assoc($query_result))
     {
$user_id=$row['id'];
               }
       echo 'Your User ID is:'.$user_id;
       $_SESSION['user_id'] = $user_id;
header('Location:/mainprofile.php');

       }
}

 }


else echo 'NO INPUT VALUES';
}
?>

<html>
<head>
<title>HBTU Chat | Login</title>

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

  Email:<br><input type="text" name="email" ><br>
    Password:<br><input type="password" name="pass" ><br>
	   
  <input type="submit" value ="LOGIN>">
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
