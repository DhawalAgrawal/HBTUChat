<?php
require "php/core.inc.php";
require "php/connect.inc.php";
error_reporting(E_ALL);
ini_set('display_errors', TRUE);

if(loggedin()&&verified())
   { 
if (isset($_FILES['file']['name'])){

$filename = $_FILES['file']['name'];
$filesize = $_FILES['file']['size'];
$tempname = $_FILES['file']['tmp_name'];
	if(!empty($filename))
	{ $location='pro_pics/'.getdata('id').'.jpg';
           if(move_uploaded_file($tempname,$location))
                 { echo '<script>alert("DP Uploaded bruh!");</script>';
}
else echo'<script>alert("Sorry Bruh! Failed");</script>';    
		}

else {echo '<script>alert("No file chosen Bruh!");</script>';}

}

if (isset($_FILES['file1']['name'])){

$filename = $_FILES['file1']['name'];
$filesize = $_FILES['file1']['size'];
$tempname = $_FILES['file1']['tmp_name'];
	if(!empty($filename))
	{ $location='cover_pics/'.getdata('id').'.jpg';
           if(move_uploaded_file($tempname,$location))
                 { echo '<script>alert("Cover Updated bruh!");</script>';
}
else echo'<script>alert("Sorry Bruh! Failed");</script>';    
		}

else {echo '<script>alert("No file chosen Bruh!");</script>';}

}

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
<title>Welcome | <?php echo getdata('firstname'); ?> </title>
<link rel = "stylesheet" href = "css/mainstyle.css"/>
<link href="https://fonts.googleapis.com/css?family=Hammersmith+One" rel="stylesheet">
<link rel="stylesheet" href="awesomefont/css/font-awesome.min.css">
<script type="text/javascript" src="/scripts/feedpost.js"></script>
<script type="text/javascript" src="/scripts/modalboxdp.js"></script>
<script type="text/javascript" src="/scripts/coverbox.js"></script>


</head>
<body>

<div class = "header" >
   <div id = "header1">
    <div id = "logo">
    <h2>CollegePark</h2>
	</div>
<div id = "notifications">	
<ul>
	<li><a href="#" title ="Notifications"  ><i class="fa fa-bell-o" aria-hidden="true"></i></a></li>
	<li><a href="#" title ="Messages" ><i class="fa fa-comments" aria-hidden="true"></i></a></li>
	<li><a href="#" title ="Friend Requests" ><i class="fa fa-users" aria-hidden="true"></i></a></li>
	<li><a href="#" title ="Settings" ><i class="fa fa-cogs" aria-hidden="true"></i></a></li>
</ul>
	</div>

	<div id = "logoutdiv">
	<form action="php/unset.php" method="POST">
		<input type="submit" name="logout" value="LOGOUT" >
	</form>
	</div>
	</div>

<div id ="header2">
<div class="usersection">
<h2><a href="profile.php?u=<?php echo getdata('id');?>" target= "_BLANK"><?php echo getdata('firstname'); ?></a>     <a href="#">  <i class="fa fa-bars" aria-hidden="true"></i></a></h2>
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
<div id="coverpic" onerror="this.src='cover_pics/defaultcover.png'" style="background-image: url(<?php echo'cover_pics/'.getdata('id').'.jpg'; ?>) , url(cover_pics/defaultcover.png); width:100%; height:49%; float:left; min-height:45%; background-size:cover; background-repeat: no-repeat; ">
	<h4><button id="boxbtncover" onClick="btnclick1();">CHANGE COVER</button></h4>

	<div id="modaldpcover" class="modaldpcover">
<div class="modaldp-content-cover">
    <span class="close1">&times;</span>
    <p>Choose the cover picture you want to upload : </p>
<form action = "mainprofile.php" method="POST" enctype="multipart/form-data">
<input type = "file" name = "file1"><input type ="submit" value ="UPLOAD">
</form>
  </div></div>



</div>

<div class="infobar" id="infotop">
	<ul>
		<li><a href="#">Home</a></li>
		<li><a href="profile.php?u=<?php echo getdata('id');?>" target= "_BLANK"><?php echo 'User Profile'; ?></a></li>
		<li><a href="/friend_requests.php">Friend Requests</a></li>
		<li><a href="accountsettings.php">Settings</a></li>
		<li><a href="#">Devs</a></li>
		<div class="line">
		<span class="sexy_line" ></span>
		</div>
						


	</ul>
</div>
<div id="feedtitle">
Activity Feed
</div>

<div class="postupdate">
<div class="topbar"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Create post</div>
<div class="feedpost">
<textarea id="posted" name="post"  placeholder="What's up Bruh?" ></textarea>
</div>
<div class="bottombar">
<center><div id = "confirm" > </div></center>
<center><input type = "submit" name="send" value="post" onClick="sendpost();" ></center>
</div>

</div>
<?php
$fetch_post_query = " SELECT * FROM `posts` WHERE `user_posted_to`= 'ALL' ORDER BY `posts`.`date_added` DESC";
$run_fetch_query= mysqli_query($connect , $fetch_post_query);
if(mysqli_num_rows($run_fetch_query)!=0)
{
while($rows = mysqli_fetch_assoc($run_fetch_query))
{ $body = $rows['body'];
   $posted_by = $rows['added_by'];
   $fetchpostname= " SELECT `firstname` , `lastname` FROM `user_details` WHERE `id` = '$posted_by'";
   $runfetchname= mysqli_query($connect  ,$fetchpostname);
   while($namerows = mysqli_fetch_assoc($runfetchname))
   {
   	$firstname = $namerows['firstname'];
   	$lastname  = $namerows['lastname'];
   }
echo '<div class="post1">
<div id = "piccontainer">
<div id="postpicimg"  style="background-image: url(./pro_pics/'.$posted_by.'.jpg) ,url(pro_pics/default.png) ";>
</div></div>

<div id="posttext">
<a href="profile.php?u='.$posted_by.'" title ='.$firstname.' '.$lastname.'>'.$firstname.' '.$lastname.'</a>
<br/>
<h4>'.$body.'</h4>

</div>
<hr>
</div>';
}
}
else {


	echo '<center> <h2> You have no posts to be shown</h2></center>';
}
?>




</div>

<div class="chat">

<div class="searchfriends">
<div id="searchbox">
<form action="#">
<input type ="text" placeholder="  Search friends  " >

</form>
</div>

</div>

<div id="friendview">
<div class="fphoto" id="fphoto1"style="background-image: url(./pro_pics/image.jpg);" > &#x270B;</div>
<div class="fphoto" id="fphoto2"style="background-image: url(./pro_pics/alok.jpg);">&#x270B;</div>
<div class="fphoto" id="fphoto3"style="background-image: url(./pro_pics/alok2.jpg);">&#x270B;</div>
<div class="fphoto" id="fphoto4"style="background-image: url(./pro_pics/adi1.jpg);">&#x270B;</div>
<div class="fphoto" id="fphoto5"style="background-image: url(./pro_pics/ujjawal.jpg);">&#x270B;</div>
<div class="fphoto" id="fphoto6"style="background-image: url(./pro_pics/himanshu.jpg);">&#x270B;</div>
<div class="fphoto" id="fphoto7"style="background-image: url(./pro_pics/anky.jpg);">&#x270B;</div>
<div class="fphoto" id="fphoto8"style="background-image: url(./pro_pics/sourabh.jpg);">&#x270B;</div>
<div class="fphoto" id="fphoto9"style="background-image: url(./pro_pics/sourabh2.jpg);">&#x270B;</div>
<div class="fphoto" id="fphoto10"style="background-image: url(./pro_pics/anky2.jpg);">&#x270B;</div>
</div>



<div id="chatbox">
<div id="namebar">
&#x270B; <?php echo 'ONLINE FRIEND';?>
</div>
<div id="msgview">
</div>
<div id="typearea">
<form action="#" method="post">
<input type = "text" name="chat" placeholder="Type here..">
<input type ="submit" style="height: 0px; width: 0px; border: none; padding: 0px;" hidefocus="true" />
</form>
</div>
</div>
</div>
</body>
</html>