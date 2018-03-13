<?php
require "php/core.inc.php";
require "php/connect.inc.php";
error_reporting(E_ALL);
ini_set('display_errors', TRUE);

if(loggedin()&&verified())
   { 

if(isset($_GET['u'])){

if(!empty($_GET['u'])) 
{ 
$user_id= $_GET['u'];
$query= " SELECT `id` ,`firstname`,`lastname` ,`email`,`srno`,`year`,`branch`,`fromcity`,`rstatus`,`cnum` ,`srsd`,`srfm`,`bio` FROM `user_details` WHERE `id` = '$user_id'  ";
$query_run = mysqli_query($connect , $query);
if(mysqli_num_rows($query_run)==1)
{
while($row = mysqli_fetch_assoc($query_run))
{
$firstname =$row['firstname'];
$lastname = $row['lastname'];
$email=$row['email'];
$srno=$row['srno'];
$branch=$row['branch'];
$year = $row['year'];
$fromcity = $row['fromcity'];
$rstatus = $row['rstatus'];
$cnum = $row['cnum'];
$srsd = $row['srsd'];
$srfm = $row['srfm'];

if($row['bio']=='')
{
$bio='Your bio here...';
}
else $bio =$row['bio'];
}
}
else echo "<script>alert('User does not exist');</script>";
}
	}



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
$addfriend = 'addfriend'.$firstname;
if (isset($_POST[$addfriend]))
{    $req_to = $user_id;
     $req_from = getdata('id');
     $friend_query=" INSERT INTO `friendreqs` (`id`, `req_from`, `req_to`) VALUES (NULL, '$req_from', '$req_to'); ";
	 $friend_check = " SELECT `id` FROM `friendreqs` WHERE `req_from`= '$req_from' AND `req_to` = '$req_to' ";
	 $friend_query_run= mysqli_query($connect , $friend_check);
	 $query_rows = mysqli_num_rows($friend_query_run);
	 if($query_rows==0){
	 mysqli_query($connect , $friend_query);
         echo'<script>alert("Friend Request sent bruh!");</script>';
	 }
	 else echo'<script>alert("Friend Request already sent bruh!");</script>';
	
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
<title> <?php echo $firstname ?> on HBTU Chat</title>
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
<h2> <?php echo $firstname; ?><a href="#">  <i class="fa fa-bars" aria-hidden="true"></i></a></h2>
</div>

<div id="profilesection"> 


</div>


</div>
</div>

<div class = "utilities">

<div class="toputi">
<div id= "mainpicture"  >

<center><img src = "<?php echo '/pro_pics/'.$user_id.'.jpg'; ?>" onerror="this.src='pro_pics/default.png'" ></center>
<?php if($user_id==getdata('id')){echo '<h4><button id="boxbtn" onClick="btnclick();">CHANGE DP</button></h4>';}?>
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
<center><h2><?php echo $year.' '.$branch; ?></h2></center>
<center><h3><?php echo $srno;  ?></h3></center>
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
<div id="coverpic" style="background-image: url(<?php echo'cover_pics/'.$user_id.'.jpg'; ?>) , url(/cover_pics/defaultcover.png); width:100%; height:49%; float:left; min-height:45%; background-size:cover; background-repeat: no-repeat; "></div>

<div class="infobar" id="infotop">
	<ul>
		<li><a href="mainprofile.php">Home</a></li>
		<li><a href="profile.php?u=<?php echo getdata('id');?>" target= "_BLANK"><?php echo 'User Profile'; ?></a></li>
		<li><a href="accountsettings.php">Account settings</a></li>
		<li><a href="#">Feedback</a></li>
		<li><a href="#">Devs</a></li>
		<div class="line">
		<span class="sexy_line" ></span>
		</div>
						


	</ul>
</div>
<div id="feedtitle">
<?php echo $firstname; ?>'s Profile</div>
<div id="Profilecontainer">
<div id = "profileinfo">
<b>Name : </b><?php echo $firstname; ?><?php if($user_id==getdata('id')){echo '<a href="accountsettings.php" title = "Edit name"><i class="fa fa-pencil" aria-hidden="true"></i></a>';} ?><br>
<b>Branch : </b><?php echo $branch; ?><?php if($user_id==getdata('id')){echo ' <a href="accountsettings.php" title="Edit branch"><i class="fa fa-pencil" aria-hidden="true"></i> </a>';} ?><br>
<b>Year : </b><?php echo $year; ?><?php if($user_id==getdata('id')){echo '<a href="accountsettings.php" title="Edit year"><i class="fa fa-pencil" aria-hidden="true"></i> </a>';} ?><br>
<b>Sr no : </b><?php echo $srno; ?><?php if($user_id==getdata('id')){echo '<a href="accountsettings.php" title="Edit Sr no"><i class="fa fa-pencil" aria-hidden="true"></i></a>';} ?><br>
<b>From : </b><?php echo $fromcity; ?><?php if($user_id==getdata('id')){echo ' <a href="accountsettings.php" title="Edit City"><i class="fa fa-pencil" aria-hidden="true"></i> </a>';} ?><br>
<b>Relationship Status : </b><?php echo $rstatus; ?> <?php if($user_id==getdata('id')){echo '<a href="accountsettings.php" title ="Edit Relationship status"><i class="fa fa-pencil" aria-hidden="true"></i> </a>';} ?><br>
<b>Contact no : </b><?php echo $cnum ?> <?php if($user_id==getdata('id')){echo '<a href="accountsettings.php" title = "Edit Contact no"><i class="fa fa-pencil" aria-hidden="true"></i> </a>';} ?><br>
<b>Sr Son/Daughter : </b><?php echo $srsd; ?> <?php if($user_id==getdata('id')){echo '<a href="accountsettings.php" title = "Edit Sr Son/Daughter"><i class="fa fa-pencil" aria-hidden="true"></i> </a>';}?><br>
<b>Sr Father/Mother : </b><?php echo $srfm ?> <?php if($user_id==getdata('id')){echo '<a href="accountsettings.php" title ="Edit Father/Mother"><i class="fa fa-pencil" aria-hidden="true"></i> </a>';} ?><br>
</div>
<div id ="intro">
<b>About <?php  echo $firstname.' '.$lastname  ?> : </b> <br/><br/>
<?php echo $bio ;?>
<br><br>


<?php
$address='"profile.php?u='.$user_id.'"';

if ($user_id!=getdata('id'))
{

echo '<div id="addfrnd">
<form method = "POST" action ='?><?php echo $address; ?> <?php echo '>
<center><input type = "submit" name= "addfriend'.$firstname.'"'. 'value ="ADD AS FRIEND" ></center>
</form>
</div>
<div id="msg">
<form method = "POST" action ='?><?php echo $address; ?> <?php echo '>
<center><input type = "submit" name ="msg" value = "SEND MESSAGE"></center>
</form>
</div>'; } ?>
</div>


</div>









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
