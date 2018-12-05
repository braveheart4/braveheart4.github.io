<?

$db = mysql_connect("db4free.net","mychat1","drakona10");
$dbb = mysql_select_db("chata1",$db);

$result = mysql_query("SELECT * FROM `chat`");

if(mysql_num_rows($result)>0){
while($row = mysql_fetch_assoc($result)){
echo $row['userid'] . ": " . $row['message']."<br>";

}
}
?>