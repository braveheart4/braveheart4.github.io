<?php

try{
$bdd = new PDO("mysql:host=db4free.net;dbname:chata1", "mychat1" , "drakona10");
}
catch (Exception $e){
     die("Error: " . $e->getMessage());
}
 
?>