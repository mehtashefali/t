<?php
session_start();
//error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
date_default_timezone_set("Asia/Kolkata");
$Rdate=date('Y-m-d h:i:s');

//echo extension_loaded("mongodb") ? "loaded\n" : "not loaded\n"; 
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

?>