<?php


if(isset($_REQUEST['act']) && $_REQUEST['act'] =='autoSuggestUser' && isset($_REQUEST['queryString'])) {
   $db_host = 'localhost';
   $db_user = 'root';
   $db_password = 'abhishek';
   $db_name = 'ctmailsV1';
   //$src='download.jpg';
   $connect = mysql_connect($db_host, $db_user ,$db_password);
   $db = mysql_select_db($db_name,$connect);
   if($db){ 
  	$string = '';
		$queryString = $_REQUEST['queryString'];
		$query = "SELECT * FROM details WHERE Code like'" .$queryString . "%' OR Prof like '" .$queryString. "%' OR Subject like '" .$queryString. "%' ";
		$resource = mysql_query($query);
		
		if($resource && mysql_num_rows($resource) > 0) {
		$string.= '<ul>';
			while($result = mysql_fetch_object($resource)){
				$string.= '<div class="mid" >'.$result->Code.'<br>'.$result->Prof.'<br>'.$result->Subject.'<br><br>'.'<input type="checkbox"   value='.$result->Code.'|'.$result->Subject.' style="background:yellow;height:30px;width:30px;margin-left:25%;"></input></div>';		}
		$string.= '</ul>';
		} else {
			$string.= '<div class="mid" style="margin-left:40px;text-align:center;height:30px;font-size:15px">No Record found</div>';
		}
		echo '<div class="scroll" style="height:600px;overflow:auto;margin-left:-30px;">'   .$string. '<div>';		
		exit;

   }
   exit;
}
	
?>


<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="script.js"></script>
<script>
function suggest(inputString){
	if(inputString.length == 0) {
		$('#suggestions').fadeOut();
	} else {
	$.ajax({
	  url: "autosuggest.php",
	  data: 'act=autoSuggestUser&queryString='+inputString,
	  success: function(msg){
		  	if(msg.length >0) {
				$('#suggestions').fadeIn();
				$('#suggestionsList').html(msg);
				$('#country').removeClass('load');
			}
	  }
	});
	}
}





/*
	function fill(thisValue) {
	$('#country').val(thisValue);
	setTimeout("$('#suggestions').fadeOut();", 600);
}
function fillId(thisValue) {
	$('#country_id').val(thisValue);
	setTimeout("$('#suggestions').fadeOut();", 600);
}
*/



</script>

<style>
.scroll::-webkit-scrollbar {
    width: 12px;
}

.scroll::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.8); 
    border-radius: 10px; 
}

.scroll::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.9); 
}
​
</style>
