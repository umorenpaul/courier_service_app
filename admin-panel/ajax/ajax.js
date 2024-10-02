
// FILTRING OUT PRODUCT TYPE ///
function productType(category_id){
	if(category_id == "none"){
		document.getElementById("category_id").innerHTML="<select name='category_id' class='pointers' id='category_id' required='required'><option value=''>Choose Product Category first</option></select>";
	}
	else{
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
			else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
			xmlhttp.onreadystatechange=function()
		  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("product_type_area").innerHTML=xmlhttp.responseText;
				}
				 else{
				  document.getElementById("product_type_area").innerHTML="<span> Please wait...</span>";
				 }
		  }
	xmlhttp.open("GET","includes/filterProductType.php?product_category_id="+category_id,true);
	xmlhttp.send();
	}
}

// FILTRING OUT STATES ///
function  state(country){

		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
			else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
			xmlhttp.onreadystatechange=function()
		  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("state_area").innerHTML=xmlhttp.responseText;
				}
				 else{
				  document.getElementById("state_area").innerHTML="<span> Please wait...</span>";
				 }
		  }
	xmlhttp.open("GET","../admin-panel/filterState.php?id="+country,true);
	xmlhttp.send();

}

function  receiver_state(country){

		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
			else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
			xmlhttp.onreadystatechange=function()
		  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("receiver_state_area").innerHTML=xmlhttp.responseText;
				}
				 else{
				  document.getElementById("receiver_state_area").innerHTML="<span> Please wait...</span>";
				 }
		  }
	xmlhttp.open("GET","../admin-panel/filterDeliverState.php?id="+country,true);
	xmlhttp.send();

}
