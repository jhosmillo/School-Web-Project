document.getElementById('primaryFunction').addEventListener('change', function () {
								
	var pf =document.getElementById('primaryFunction').value;
	var c = document.getElementById('primaryFunction');
	var x = c.options.length;
	document.getElementById('secondaryFunction').value="";
	
	for(a=0; a<x;a++){
		document.getElementById('secondaryFunction').options[a].style.display = "block";
	}
	for(i=0; i<x;i++){
		var sf = document.getElementById('secondaryFunction').options[i].value;
		if(sf==pf){
			document.getElementById('secondaryFunction').options[i].style.display = "none";
		}
	}
	

});