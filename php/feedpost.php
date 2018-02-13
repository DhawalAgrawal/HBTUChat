<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);


	include 'connect.inc.php';
	include 'core.inc.php';
			if(isset($_POST['text']))
			{
			   if(!empty($_POST['text']))
				{
			 	$postdata = $_POST['text'];
			 	$date = date("Y-m-d");
			 	$addedby=getdata('id');
			 	$addedto ='ALL';
				$query =  " INSERT INTO `posts` (`id`, `body`, `date_added`, `added_by`, `user_posted_to`) VALUES (NULL, '$postdata', '$date', '$addedby', '$addedto') ";

				if($query_run= mysqli_query($connect ,$query)){
					echo 'Posted successfully';
				}
			     else echo 'POST FAILED';
				}
				else echo 'Drunk bruh ? You cannot post an empty post!';

			}

	?>