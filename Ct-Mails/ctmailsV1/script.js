 //function is_checked(id) {
    
    //alert(id);
/* var div= document.createElement('div');   
      div.height=50;
      div.width=50;
      div.style.background="white";
      document.getElementById('mail_container').appendChild(div);                                      
*/
/*
if(document.getElementById(id).checked==true)
document.getElementById('div1').style.display='block';
else if(document.getElementById(id).checked==false)
document.getElementById('div1').style.display='none';
*/
//$('#id).attr('checked', true); 
//$('#myCheckbox').attr('checked', false);
//$("#mail_container").append($.create("div").addClass("mail").html("Hello, world!"));


// }
var v;

$(document).on("click", ":checkbox", function () {
     v = $(this).val(); // cache the value
     var code=v.split('|')[0];
    if ($(this).is(':checked')) {
        // create a span with the same id as value and append it
        if(document.getElementById(code) == null)
{

        $("#mail_container").append( $("<div>").attr({"id":code,"class":"mbox","onclick":"document.getElementById('dis').style.display='block';document.getElementById('pr').style.display='block';document.getElementById('des').style.display='block';"}).text(v));
        document.getElementById('mailt').value+=code+" ";
        }
        return;
    } else {
        // target the span with the same id as value and remove it
        $("#mail_container").find("div#" + code).remove();
        document.getElementById('mailt').value=document.getElementById('mailt').value.replace(code+" ","");
    }

});



