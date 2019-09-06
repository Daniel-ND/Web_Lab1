var R = -1;

function setNewR(newR) {
	document.getElementById("r").value = newR;
	if (R != -1)
		document.getElementById("btn_R" + R).style.backgroundColor = "#aaaaff";
	R = newR;
	document.getElementById("btn_R" + R).style.backgroundColor = "#6666ff";
}

function send() {
	var x = getElementById("x").value;
	var y = getElementById("y").value;
	alert("x = " + x + ", y = " + y + ", R = " + R);
}

