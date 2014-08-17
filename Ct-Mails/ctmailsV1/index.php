<?php

 require('autosuggest.php');
 require('class.phpmailer.php');
 date_default_timezone_set('Etc/UTC');

require 'PHPMailerAutoload.php';
$con= mysql_connect("localhost","root","abhishek");
$db='ctmailsV1';
$db_con=mysql_select_db($db,$con);
$query="SELECT * FROM  details ";
$results=mysql_query($query,$con);
$new_entries= mysql_num_rows($results);
$eval=0;



   if($_SERVER['REQUEST_METHOD']=="POST")
{



   	$str=explode(' ',$_POST['mailt']);
   	$query = "SELECT * FROM details ";
		$resource = mysql_query($query);
		
		if($resource && mysql_num_rows($resource) > 0) 
		{
			while($result = mysql_fetch_object($resource))
			
			   {
			   	if(in_array($result->Code,$str))
			   	{
			   		$content=' <div id="des"><center><h5>NATIONAL INSTITUTE OF TECHNOLOGY,TRICHIRAPALLI-620015</h5><h5>OFFICE OF THE DEAN (ACADEMIC)</h5></center> <FONT SIZE="2PX"> REF:NITT/DA/Cycle Test-I/2014/69 <span style="float:right">Date</span><br><br> To<br><br> <b>'.$result->Prof.'</b> <br>Department of <b>Faculty Department</b><br><br>Sir/Madam,<br><br> Sub:B.Tech-ODD Semester-(2014)-First Cycle Test Question Paper Setting-Reg.<br><br> The schedule of the Second Cycle Test of ODD Semester(2014) for the subject handled by you is given below:<br><br> <table style="width:80%;font-size:15px;" cellspacing="10px"cellpadding="5px"> <tr><td>Branch<span style="float:right">:</span></td><td>'.$result->Subject.'</td></tr> <tr><td>Semester<span style="float:right">:</span></td><td>sem</td></tr> <tr><td>Coarse Code No<span style="float:right">:</span></td><td>'.$result->Code.'</td></tr> <tr><td>Course<span style="float:right">:</span></td><td>'.$result->Subject.'</td></tr> <tr><td>Date<span style="float:right">:</span></td><td>date</td></tr> <tr><td>Time<span style="float:right">:</span></td><td>time</td></tr> <tr><td>Venue<span style="float:right">:</span></td><td>venue</td></tr> </table><br><br> The question paper may be set for 20 marks keeping in view of the model of the assignment given prior to the test. Arrangements for the multiple copies of the question paper for the test may kindly be made well ahead of the scheduled time of the test.The evaluated answer papers may be returned to the students within a week from the date of completion of the test. Cycle test marks should be entered simultaneously in the MIS.<br> <b>You are requested to be invigilator for the test. Kindly do not send M.Tech Students/Ph.D. Scholars to invigilate. Invigilators are requested to be present in the Examination hall atleast 10 minutes before the commencement of examination.</b><br> Thanking You.<br><br><br><br> Deputy Registrar (Student Activities) </div>';
			   		include_once('../dompdf/dompdf_config.inc.php');
			   		$dompdf= new DOMPDF();
			   		$dompdf->load_html($content);
			   		$dompdf->render();
			   		$pdf=$dompdf->output();
			   		file_put_contents($result->Code.".pdf", $pdf);
			   		
	$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;

$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
$mail->Port = 587;
$mail->SMTPSecure = "tls/ssl";
// or try these settings (worked on XAMPP and WAMP):
// $mail->Port = 587;
// $mail->SMTPSecure = 'tls';

$mail->Username = "cprganesh@gmail.com";
$mail->Password = "13-04-1996g";

$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.
$mail->SMTPSecure = 'tls';


$mail->From = "cprganesh@gmail.com";
$mail->FromName = "Admin-Nit Trichy";

$mail->addAddress("stndlkr200@gmail.com","User 1");


$mail->Subject = "Book-kart verification link";

$mail->Body = $content;
$mail->AddAttachment($result->Code.".pdf");
if(!$mail->Send())
    echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
else
    echo "Message has been sent";

			   	}
				}
		}
 

}
if($eval==1)
{

}





mysql_close($con);



?>
<html>
<head>

<style>
.mbox
{
	width:20%;
	height:10%;
	background:#ff6600;
	display:inline-block;
	border-style:solid;
	border-width: 2px;
}
.mid {
   
   width: 200px;
   height: 90px;
   margin: 1px;
   padding: 1px;
   border: 1px solid rgba(0,0,0,0.5);
   border-radius: 1px 1px 0px 0px;
   background: rgba(40,40,20,0.6); 
   color:white;font-size:10px;
   box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -o-box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 2px rgba(255,255,255,0.2), inset 0 2px 4px rgba(255,255,255,0.25), inset 0 -10px 10px rgba(0,0,0,0.3);
   -moz-box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
 
}

#suggest {
    width: 170px;
    padding:15px;
    margin: 100px auto 50px auto;
    //background: #444;
    background: rgba(60,0,0,.2);
    border-radius: 10px;
    box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
}
 
/* Form text input */
 
#suggest input {
    width: 160px;
    height: 26px;
    padding: 10px 5px;
    float: left;    
    font: bold 15px 'lucida sans', 'trebuchet MS', 'Tahoma';
    border: 0;
    background: rgba(60,0,0,0.6); margin-left:2px;
    border-radius: 3px 0 0 3px;      
}
 
#suggest input:focus {
    outline: 0;
    background: rgba(87,221,45,0.2);
    box-shadow: 0 0 2px rgba(10,0,0,.8) inset;
}
 
#suggest input::-webkit-input-placeholder {
   color: #999;
   font-weight: normal;
   font-style: italic;
}
 
#suggest input:-moz-placeholder {
    color: #999;
    font-weight: normal;
    font-style: italic;
}
 
#suggest input:-ms-input-placeholder {
    color: #999;
    font-weight: normal;
    font-style: italic;
}    
 

#MainMenu 
{ 
    height:37px; 
    //background: grey; 
    margin:0; 
    border:0; position:absolute;left:5%;top:10%; 
}

#tab 
{ 
    margin:0; 
    top:0; 
} 
#tab ul 
{ 
    margin:0; 
    padding:0; 
    list-style:none; 
    float:left; 
} 
#tab li 
{ 
display:inline; 
    float:left; 
    margin:0; 
    padding:0; 
} 
#tab a 
{ 
    background: url("back.jpg") no-repeat right top; 
    margin:10; 
    padding:10; 
    text-decoration:none; 
    border:10px; 
    display:block; 
    float:left; 
} 
#tab a span 
{ 
    display:block; 
    background:url("back.jpg") no-repeat left top; 
    padding:0 25px 0 25px; 
    font-family:Arial, Helvetica, sans-serif; 
    font-size:11; 
    color:#FFFFFF; 
    font-weight:bold; 
    line-height:37px; 
} 
#tab a:hover,#tab li.item_active a 
{ 
    background-position:right bottom; 
    border-color:; 
} 
#tab a:hover span,#tab li.item_active a span 
{ 
    background-position:left bottom; 
    color:lightblue; 
    font-weight:bold; font-size:20px; 
    font-style:normal; 
    text-decoration:none; 
}
.prof{
  
   -webkit-box-shadow: 2px 2px 6px white, inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -moz-box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);





}
.dis
{
	position:fixed;
	width:102%;
	height: 102%;
	margin-left: -1%;
	z-index:10;
	display: none;
	top: -1%;
	background:#000;
	opacity: 0.5;
	filter:alpha(opacity=50);
}
.des
{
	position:ABSOLUTE;
	width:40%;
	height:95%;
	top:2%;
	background:#fff;
	left:30%;
	z-index:15;
	display:none;
	
}
</style>
<script src="script.js"></script>
</head>
 <body bgcolor="rgba(24,15,16,0.4)">
 <div class="dis" id='dis' onclick="document.getElementById('pr').style.display='none';this.style.display='none';document.getElementById('des').style.display='none';"> </div>
 <div class="des" id='des'  style="padding-left:10px; padding-right:-10px;overflow:scroll;overflow-x:hidden;">
 <center><h5>NATIONAL INSTITUTE OF TECHNOLOGY,TRICHIRAPALLI-620015</h5>
 <h5>OFFICE OF THE DEAN (ACADEMIC)</h5></center>
 <FONT SIZE="2PX">
 REF:NITT/DA/Cycle Test-I/2014/69 <span style="float:right">Date</span><br><br>
 To<br><br>
 
 <b>Faculty Name</b>
 <br>Department of <b>Faculty Department</b><br><br>
 Sir/Madam,<br><br>
 Sub:B.Tech-ODD Semester-(2014)-First Cycle Test Question Paper Setting-Reg.<br><br>
 The schedule of the Second Cycle Test of ODD Semester(2014) for the subject handled by you is given below:<br><br>
 <table style="width:80%;font-size:15px;" cellspacing="10px"cellpadding="5px">
 <tr><td>Branch<span style="float:right">:</span></td><td>Subject</td></tr>
 <tr><td>Semester<span style="float:right">:</span></td><td>sem</td></tr>
 <tr><td>Coarse Code No<span style="float:right">:</span></td><td>code</td></tr>
 <tr><td>Course<span style="float:right">:</span></td><td>name</td></tr> 
 <tr><td>Date<span style="float:right">:</span></td><td>date</td></tr>
 <tr><td>Time<span style="float:right">:</span></td><td>time</td></tr>
 <tr><td>Venue<span style="float:right">:</span></td><td>venue</td></tr>
 </table><br><br>
 The question paper may be set for 20 marks keeping in view of the model of the assignment given
 prior to the test. Arrangements for the multiple copies of the question paper for the test
 may kindly be made well ahead of the scheduled time of the test.The evaluated answer papers may 
 be returned to the students within a week from the date of completion of the test. Cycle test
 marks should be entered simultaneously in the MIS.<br>
 <b>You are requested to be invigilator for the test. Kindly do not send M.Tech Students/Ph.D. Scholars
 to invigilate. Invigilators are requested to be present in the Examination hall atleast
 10 minutes before the commencement of examination.</b><br>
 Thanking You.<br><br><br><br>
 Deputy Registrar (Student Activities) 
 
 </div>
<center><input onclick="var printContents = document.getElementById('des').innerHTML;var originalContents = document.body.innerHTML;document.body.innerHTML = printContents;window.print();document.body.innerHTML = originalContents;" type="button" id="pr" value="Print" style="display:none;position:absolute;top:95%;opcaity:1;z-index:13;"></center>
 <h2>National Institute of Technology Tiruchirapalli, Ct-Mails Admin Panel </h2> 
 <h4 style="position:absolute;top:3%">Developed and Maintained by:Delta,Nit-Trichy </h4> 
 
 
 <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
<div id="MainMenu"> 
<input type="submit" name='smail' value="Send Mail" style="height:35px;width:80px;background:lightgreen"/>     
</div>
<input type="button" value="Sent History" style="height:35px;width:100px;background:lightgreen;float:right;margin-right:3%;margin-top:1%"/> 

<div id="suggest" style='position:absolute;left:1%;top:1%;'>
  <input type="text" size="20" value="" id="country" onkeyup="suggest(this.value);"  autofocus  placeholder="Search.." />
 <input type="hidden" name="country_id" id="country_id" value="" />
  <div class="suggestionsBox" id="suggestions" style="display: none;"> <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
  </div>
</div>

<div id="mail_container"  style="overflow:scroll;overflow-x:hidden;position:absolute;left:17%;top:16%;height:550px;width:1050px;background:rgba(255,255,255,0.4)">
<div id="div1" style="display:none;background:white">Hello</div>

<input type="hidden" name="mailt" id="mailt" value="">

</div>
</form>
</body>
</html>
