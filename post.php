<?
$db = mysql_connect("db4free.net","mychat1","drakona10");
$dbb = mysql_select_db("chata1",$db);
$select = mysql_query("SELECT * FROM `users`");
$fetch = mysql_fetch_array($select);

$message = mysql_escape_string($_POST['mess']);
$userId = $_POST['user'];
$ch_user = $fetch["name"];


$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/|www\.[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
$parse = parse_url($message);
if(!empty($parse['scheme'])){
if($parse['scheme'] == 'http'){
$message = "used http link";
}
if($parse['scheme'] == 'https'){
$message = "used https link";
}
}

/*
if(preg_match($reg_exUrl,$message,$url)){
$handle = $url[0];
$newMessage = str_replace($handle,"******",$message);
mysql_query("INSERT INTO `chat` (`userid`,`message`)VALUES('$userId','$newMessage')");
exit();
}*/
if(strpos($message , '/send') > -1){
if(strpos($message, ''.$ch_user.'') > -1){
$coins = substr($message , strpos($message, $ch_user) + strlen($ch_user));
$message = "has send " . $coins . " coins to ".$ch_user;
mysql_query("INSERT INTO `chat` (`userid`,`message`)VALUES('$userId','$message')");
mysql_query("UPDATE `users` SET `coins`='$coins' WHERE `name`='$ch_user'");
exit();

}
}
else{

mysql_query("INSERT INTO `chat` (`userid`,`message`)VALUES('$userId','$message')");
}
$message2 = "awe ti nared li si www.w3schools.com";
$checke = preg_match($reg_exUrl,$message2,$url);
$newMessage = str_replace($theUrl,"******",$message2);
echo "<div>".$newMessage."</div>"

?>