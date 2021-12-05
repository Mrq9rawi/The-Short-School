document.getElementById("studentButton").onclick = function () {
	document.getElementById("teacherForm").style.display = "none";
	document.getElementById("studentForm").style.display = "flex";
};

document.getElementById("teacherButton").onclick = function () {
	document.getElementById("studentForm").style.display = "none";
	document.getElementById("teacherForm").style.display = "flex";
};
