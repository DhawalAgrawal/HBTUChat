<?php
$mysql_host='localhost';
$mysql_username='id2261533_chatty_users';
$mysql_pass='Anurag@hbti/k';
$mysql_db='id2261533_chatty_users';
$connect = mysqli_connect($mysql_host,$mysql_username,$mysql_pass,$mysql_db);
if(!mysqli_connect($mysql_host,$mysql_username,$mysql_pass,$mysql_db) || !mysqli_select_db($connect , $mysql_db))
{
die('Error in website , contact Admin');
}	 
?>