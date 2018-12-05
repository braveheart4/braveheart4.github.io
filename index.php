<?
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
/*
$db = mysql_connect("localhost","root","kiril");
$dbb = mysql_select_db("chatbox",$db);*/
$ip = get_client_ip();

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Chatbox</title>
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
		
		setInterval(function(){
		$("#messages").load("data.php");
		},1000);
		
		$("#sub").click(function(){
		var log = $('#messages');
        log.animate({ scrollTop: log.prop('scrollHeight')}, 900);
		});

		$("#sub").click(function(e){
		e.preventDefault();
		var message = $("#mess").val();
		var id = $("#ip").val(); //Math.floor((Math.random() * 999999999999) + 1);
		var fData = 'user=' + id + '&mess=' + message;
		$.ajax({
		type: 'post',
		url: 'post.php',
		data: fData,
		success: function(confirm){
		//$("#confirm").text(confirm);
		$("#mess").val('');
		}
		
		});
		});

var coin = document.getElementById('coin');
var button = document.getElementById('button');
var result = document.getElementById('result');
var heads = 0;
var tails = 0;

/* On click of button spin coin ainamtion */
function coinToss() {
  /* Random number 0 or 1  */
  var x = Math.floor((Math.random() * 2));
  /* If statement */
  if (x === 0) {
    coin.innerHTML = '<img class="heads animate-coin" src="images/t-side.png"/>';
    
    heads += 1;
    result.innerHTML = 'Terorrist win';
  

  } else {
    coin.innerHTML = '<img class="tails animate-coin" src="images/ct-side.png"/>';
     tails += 1;
    result.innerHTML = 'Contra-Terorrist win';
    

  }

}
button.onclick = function() {
  coinToss();
}

});	

		</script>
		<link rel="stylesheet" type="text/css" href="jquery-ui.css"/>
		<style>
		#messages{
		overflow-y:scroll;
		}
#coin {
   
}
#button {
  background:orange;
  color:#fff;
  padding:10px 15px;
  border-radius:2px;
  display:inline-block;
  transition:3s;
  transform-style: preserve-3d;
  cursor:pointer;
}
#button:hover {
    opacity:0.5;
  }

.animate-coin {
  animation: flip 2s;
}
@keyframes flip {
  0% {
    transform: rotateY(0deg);
    box-shadow: 0 2px 4px rgba(0,0,0,.3);
  }
  50% {
    transform: rotateY(180deg);
    box-shadow: 0 20px 40px rgba(0,0,0,.8);
  }
  100% {
    transform: rotateY(720deg);
    box-shadow: 0 2px 4px rgba(0,0,0,.3);
  }
}

		</style>
    </head>
    <body>
        
<div id="messages" style="margin-right:10px;width: 400px;height: 300px;border: 1px solid #a2b1a3;"></div>
		
  <form method="post" id="userArea">
       <p id="confirm"></p>
  <input type="text" id="mess" placeholder="say something.." style="width: 400px;"/><br/><br/>
  <input type="text" id="ip" hidden value="<? echo $ip; ?>" />
  <input type="submit" id="sub" value="Submit"/>
  
</form>  
<!-- 
<div id='coin'>

</div>
<div id='button'>
  Flip coin
</div>
<div id='result'>

</div>
-->
    </body>
</html>
