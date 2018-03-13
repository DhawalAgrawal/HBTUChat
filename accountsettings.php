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

if(isset($_POST['cityfrom']))
{

	if(!empty($_POST['cityfrom']))
	{ $city = $_POST['cityfrom'];
$id = getdata('id');

$cityquery = " UPDATE `user_details` SET `fromcity` = '$city' WHERE `user_details`.`id` = '$id' ";
mysqli_query($connect , $cityquery);
	echo '<script>alert("City updated bruh!");</script>';

	}
	else echo '<script>alert("City cannot be blank bruh!");</script>';
}



if(isset($_POST['rstatus']))
{

	if(!empty($_POST['rstatus']))
	{ $rstatus = $_POST['rstatus'];
$id = getdata('id');

$cityquery = " UPDATE `user_details` SET `rstatus` = '$rstatus' WHERE `user_details`.`id` = '$id' ";
mysqli_query($connect , $cityquery);
echo '<script>alert("Relationship Status updated bruh!");</script>';
	}
	else echo '<script>alert("Status cannot be blank bruh!");</script>';
}

if(isset($_POST['cnum']))
{

	if(!empty($_POST['cnum']))
	{ $cnum = $_POST['cnum'];
$id = getdata('id');

$cityquery = " UPDATE `user_details` SET `cnum` = '$cnum' WHERE `user_details`.`id` = '$id' ";
mysqli_query($connect , $cityquery);
echo '<script>alert("Contact number updated bruh!");</script>';
	}
	else echo '<script>alert("Status cannot be blank bruh!");</script>';
}
if(isset($_POST['srsd']))
{

	if(!empty($_POST['srsd']))
	{ $srsd = $_POST['srsd'];
$id = getdata('id');

$cityquery = " UPDATE `user_details` SET `srsd` = '$srsd' WHERE `user_details`.`id` = '$id' ";
mysqli_query($connect , $cityquery);
echo '<script>alert("Sr Son/Daughter updated bruh!");</script>';
	}
	else echo '<script>alert("Name cannot be blank bruh!");</script>';
}
if(isset($_POST['srfm']))
{

	if(!empty($_POST['srfm']))
	{ $srfm = $_POST['srfm'];
$id = getdata('id');

$cityquery = " UPDATE `user_details` SET `srfm` = '$srfm' WHERE `user_details`.`id` = '$id' ";
mysqli_query($connect , $cityquery);
echo '<script>alert("Sr Father/Mother updated bruh!");</script>';
	}
	else echo '<script>alert("Name cannot be blank bruh!");</script>';
}

if(isset($_POST['bio']))
{

	if(!empty($_POST['bio']))
	{ $bio = $_POST['bio'];
$id = getdata('id');

$cityquery = " UPDATE `user_details` SET `bio` = '$bio' WHERE `user_details`.`id` = '$id' ";
mysqli_query($connect , $cityquery);
echo '<script>alert("Bio updated bruh!");</script>';
	}
	else echo '<script>alert("Bio cannot be blank bruh!");</script>';
}

if(isset($_POST['changepass']))
{ $pass1=$_POST['pass1'];
  $pass2=$_POST['pass2'];
if($pass1==$pass2){
	if(!empty($pass1)&&!empty($pass1))
	{ 
	 $pass = $_POST['pass1'];
	 $passhash = md5($pass);
$id = getdata('id');

$cityquery = " UPDATE `user_details` SET `password` = '$passhash' WHERE `user_details`.`id` = '$id' ";
mysqli_query($connect , $cityquery);
echo '<script>alert("Password updated bruh!");</script>';
	}
	else echo '<script>alert("Password cannot be blank bruh!");</script>';
}
else echo'<script>alert("PASSWORDS do not match");</script>';
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
<title>Settings | <?php echo getdata('firstname'); ?> </title>
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
    <h2>HBTU Chat</h2>
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
		<li><a href="mainprofile.php">Home</a></li>
		<li><a href="profile.php?u=<?php echo getdata('id');?>" target= "_BLANK"><?php echo 'User Profile'; ?></a></li>
		<li><a href="/friend_requests.php">Friend Requests</a></li>
		<li><a href="#">Feedback</a></li>
		<li><a href="#">Devs</a></li>
		<div class="line">
		<span class="sexy_line" ></span>
		</div>
						


	</ul>
</div>
<div id="feedtitle">
Account settings:
Type into the feild you want to edit and click on update.
</div>
<div id="accset">
<form action="accountsettings.php" method="POST">
City : <input type="text" name="cityfrom" placeholder="<?php echo getdata('fromcity');  ?>">
<input type="submit"  value="UPDATE">
</form>
<br/>
<form action="accountsettings.php" method="POST">
Relationship Status: <select name="rstatus" >
    <option value="Single" <?php  if(getdata('rstatus')=='Single'){echo 'selected';}?> >Single</option>
    <option value="Committed" <?php  if(getdata('rstatus')=='Committed'){echo 'selected';}?> >Committed</option>
    <option value="Complicated" <?php  if(getdata('rstatus')=='Complicated'){echo 'selected';}?> >Complicated</option>
    <option value="Married" <?php  if(getdata('rstatus')=='Married'){echo 'selected';}?> >Married</option>
  </select>
<input type="submit" value="UPDATE">
</form>
<br/>
<form action="accountsettings.php" method="POST">
Contact no : <input type="text" name="cnum" placeholder="<?php echo getdata('cnum');  ?>">
<input type="submit" value="UPDATE">
</form>
<br/>
<form action="accountsettings.php" method="POST">
Sr Son/Daughter : <input type="text" name="srsd" placeholder="<?php echo getdata('srsd');  ?>">
<input type="submit" value="UPDATE">
</form>
<br/>
<form action="accountsettings.php" method="POST">
Sr Mother/Father : <input type="text" name="srfm" placeholder="<?php echo getdata('srfm');  ?>">
<input type="submit" value="UPDATE">
</form>
<br/>
<form action="accountsettings.php" method="POST">
Bio :<br/> <textarea rows="4" cols="40" name = "bio" placeholder="<?php echo getdata('bio');  ?>"></textarea>
<input type="submit" value="UPDATE">
</form>
<form action="accountsettings.php" method="POST">
Password:<br/> <input type ="text" name = "pass1" placeholder="Password here"><br/>
Retype Password :<br/> <input type ="text" name = "pass2" placeholder="Retype Password here">
<input type="submit" name = "changepass" value="UPDATE">
</form>
<br/>
<div id ="authornote" style = "color:blue;">
<center><h3>Sr no / Branch / Year Can be changed only after verification by Admin Whatsapp : 8800299509 </h3></center>
</div>
</div>


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
