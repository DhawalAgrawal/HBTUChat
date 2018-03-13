<?php
require "php/core.inc.php";
require "php/connect.inc.php";
error_reporting(E_ALL);
ini_set('display_errors', TRUE);

if(loggedin()&&verified())
   { 

}
else if (loggedin() && !verified())
     {
        header('Location:php/verification.php');
          }
else if(!loggedin())
{ header('Location:php/login.php');
}




?>



<html>
<head>
<title> <?php echo getdata('firstname'); ?> | Requests</title>
<link rel = "stylesheet" href = "css/mainstyle.css"/>
<link href="https://fonts.googleapis.com/css?family=Hammersmith+One" rel="stylesheet">
<link rel="stylesheet" href="awesomefont/css/font-awesome.min.css">
<script type="text/javascript" src="/scripts/feedpost.js"></script>
<script type="text/javascript" src="/scripts/modalboxdp.js"></script>


</head>
<body>

<div class = "header" >
   <div id = "header1">
    <div id = "logo">
    <h2><a href = "mainprofile.php"> HBTU Chat</a></h2>
	</div>
<div id = "notifications">	
<ul>
	<li><a href="#" title ="Notifications"  ><i class="fa fa-bell-o" aria-hidden="true"></i></a></li>
	<li><a href="#" title ="Messages" ><i class="fa fa-comments" aria-hidden="true"></i></a></li>
	<li><a href="#" title ="Friend Requests" ><i class="fa fa-users" aria-hidden="true"></i></a></li>
	<li><a href="#" title ="Settings" ><i class="fa fa-cogs" aria-hidden="true"></i></a></li>
</ul>
	</div>
	</div>

<div id ="header2">
<div class="usersection">
<h2> <?php echo getdata('firstname'); ?>     <a href="#">  <i class="fa fa-bars" aria-hidden="true"></i></a></h2>
</div>

<div id="profilesection"> 


</div>


</div>
</div>

<div class = "utilities">

<div class="toputi">
<div id= "mainpicture"  >

<center><img src = "<?php echo'pro_pics/'.getdata('id').'.jpg'; ?>" onerror="this.src='pro_pics/default.png'" ></center>
<h4><button id="boxbtn" onClick="btnclick();">CHANGE DP</button></h4>
</div>
<div id="modaldp" class="modal">
<div class="modaldp-content">
    <span class="close">&times;</span>
    <p>Choose the display picture you want to upload : </p>
<form action = "mainprofile.php" method="POST" enctype="multipart/form-data">
<input type = "file" name = "file"><input type ="submit" value ="UPLOAD">
</form>
  </div></div>
<div id="info">
<center><h2><?php echo getdata('year').' '.getdata('branch'); ?></h2></center>
<center><h3><?php echo getdata('srno');  ?></h3></center>
<center><h4>   <br>   </h4></center>
</div>
</div>

<div id="utimain">

<ul>
	<li><a href="#"> <i class="fa fa-graduation-cap" aria-hidden="true"></i> Class group</a></li>
	<li><a href="#"><i class="fa fa-sitemap" aria-hidden="true"></i> Teachers group</a></li>
	<li><a href="#"><i class="fa fa-globe" aria-hidden="true"></i> OPEN DISCUSSION</a></li>
	<li><a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> CR Group</a></li>
	<li><a href="#"><i class="fa fa-paperclip" aria-hidden="true"></i> NOTES</a></li>
	<li><a href="#"> <i class="fa fa-calendar" aria-hidden="true"></i>Time table</a></li>
	<li><a href="#"><i class="fa fa-building" aria-hidden="true"></i> Deans</a></li>
</ul>
</div>



</div>

<div class="feed">
<div id="coverpic" style="background-image: url(<?php echo'cover_pics/'.getdata('id').'.jpg'; ?>); width:100%; height:49%; float:left; min-height:45%; background-size:cover; background-repeat: no-repeat; "></div>

<div class="infobar" id="infotop">
	<ul>
		<li><a href="mainprofile.php">Home</a></li>
		<li><a href="profile.php?u=<?php echo getdata('id');?>" target= "_BLANK"><?php echo 'User Profile'; ?></a></li>
		<li><a href="#">College updates</a></li>
		<li><a href="#">Feedback</a></li>
		<li><a href="#">Devs</a></li>
		<div class="line">
		<span class="sexy_line" ></span>
		</div>
						


	</ul>
</div>
<div id="feedtitle">
Friend Requests:<br/><br/>
<div class="viewreqs">
<?php
$u_to = getdata('id');
$find_friends = " SELECT `req_from` FROM `friendreqs` WHERE `req_to` = '$u_to'
 ";
$find_friends_run = mysqli_query($connect , $find_friends);
while($ffrows=mysqli_fetch_assoc($find_friends_run))
{
	$requestfrom = $ffrows['req_from'];
$findname = "SELECT `firstname` FROM `user_details` WHERE `id` = '$requestfrom'";
       $findname_run = mysqli_query($connect , $findname);
      while($namerow=mysqli_fetch_assoc($findname_run))
	  {
      $name = $namerow['firstname'];
	  }$addr = '\'pro_pics/default.png\'';
	echo '
	
	<div class="showreq">
	<div class = "frdp">
    <img src = "pro_pics/'.$requestfrom.'.jpg" onerror="this.src='.$addr.'"/>
	</div>
	<div id = "frtxt">
	You have a friend request from '.$name.'<br/>
	<form acion="friendrequests.php" method = "POST">
	<input type = "submit" name = "acceptrequest'.$requestfrom.'" value = "Accept Request" />
	<form acion="friendrequests.php" method = "POST">
	<input type = "submit" name = "deletetrequest'.$requestfrom.'" value = "Delete request" />
	</form>
	</div>
	
	</div>
	
	
	
	';
	if(isset($_POST['acceptrequest'.$requestfrom]))
	{		$id = getdata('id');
          $addrequest_query = "  SELECT `friendarray` FROM `user_details` WHERE `id` ='$id' ";
          $run_friend_query = mysqli_query($connect , $addrequest_query);
          $friendrows = mysqli_num_rows($run_friend_query);
          if($friendrows!=0){

          while($row = mysqli_fetch_assoc($run_friend_query))
          {

               echo 'This code will insert requests'; 

          }
      }
      else echo 'No friend request.';
	}	
}
?>
</div>
</div>
</div>



</body>
</html>
