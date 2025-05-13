function validateEmailjs(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 
function confirmMsg()
{
var r = confirm("Are you sure you want to delete this photo?");
if (r == true) {
    return;
} else {
   return false;
}
}

function unabledel(obj)
{
	if(obj.checked==true)
		document.getElementById('delbtn').disabled=false;
	else
		document.getElementById('delbtn').disabled=true;

}
function delacc(id)
{
	document.location="index.php?frmAction=delete_account&id="+id;
}
function gotophotos()
{
	document.location="index.php?page=manage_photos";
}