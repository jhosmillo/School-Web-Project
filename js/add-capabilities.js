
document.getElementById("addBtn").addEventListener("click", function(){
	var capText = document.getElementById("capabilities").value;

	if(capText!==""){
		var capRows = document.getElementById("capTable").rows.length; 
		var i = capRows;
		var capArray = [];
		var table = document.getElementById("capTable");
		
		var row = table.insertRow(i);
		var cell = row.insertCell();
		cell.innerHTML = document.getElementById("capabilities").value;
		
		for(var x=0;x<i+1;x++){
			capArray.push(table.rows[x].cells[0].innerHTML);
		}
		var json_capArr = JSON.stringify(capArray);
		document.cookie = 'capArr='+json_capArr;
	}else{
		var json_capArr = "";
		document.cookie = 'capArr='+json_capArr;
	}
	document.getElementById("capabilities").value="";
});
