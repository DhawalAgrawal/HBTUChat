function sendpost(){
	if(window.XMLHttpRequest){
xmlhttp= new XMLHttpRequest();
}
else {
xmlhttp= new ActiveXObject('Microsoft.XMLHTTP');
}
xmlhttp.onreadystatechange = function(){
if(xmlhttp.readyState==4 && xmlhttp.status ==200)


{
document.getElementById("confirm").innerHTML = xmlhttp.responseText;

     }
}
parameters = 'text='+document.getElementById('posted').value;
xmlhttp.open('POST','../php/feedpost.php','true');
xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
xmlhttp.send(parameters);
}