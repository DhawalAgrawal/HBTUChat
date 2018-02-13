<?php
ob_start();
session_start();
$path = $_SERVER['SCRIPT_NAME'];
if (isset($_SERVER['HTTP_REFERER']))
{
$referer=$_SERVER['HTTP_REFERER'];
}
include 'connect.inc.php';





function loggedin()
    {  
       if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
	   { 
          return true;
         }    
              else {
                      return false;          }
	}
 
function verified()
  {
 if (getdata('verify') == 1)
{return true; echo 'true';}
else return false;
   }

    function getdata($field)
    {   GLOBAL $connect;
$user_id = $_SESSION['user_id'];
$query_core= " SELECT  `$field` FROM `user_details` WHERE `id`='$user_id' ";

if ($query_run1= mysqli_query($connect , $query_core) )
{
while($row_result=mysqli_fetch_assoc($query_run1))
    {
     $data = $row_result[$field];
return $data;
        }
   }




}




            

?>