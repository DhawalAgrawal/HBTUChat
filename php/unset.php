<?php
require 'core.inc.php';
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
session_destroy();

header ('Location:'.$referer);



?>