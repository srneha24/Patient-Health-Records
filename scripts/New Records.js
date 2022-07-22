function ShowHideDiv(patientCheck) {
    var x = patientCheck.checked;
    var div = document.getElementById("new-patient");
    var btn = document.getElementById("search-patient");

    if (x) {
        div.style.visibility = "visible";
        btn.style.visibility = "hidden";
    }

    else {
        div.style.visibility = "hidden";
        btn.style.visibility = "visible";
    }
}