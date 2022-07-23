function ShowHideDiv(patientCheck) {
    var x = patientCheck.checked;
    var div = document.getElementById("new-patient");
    var btn = document.getElementById("search-patient");
    var searchPatient = document.getElementById("nameSearch");
    var newPatient = document.getElementById("name");

    if (x) {
        div.style.visibility = "visible";
        btn.style.visibility = "hidden";
        searchPatient.style.visibility = "hidden";
        newPatient.style.visibility = "visible";
    }

    else {
        div.style.visibility = "hidden";
        btn.style.visibility = "visible";
        searchPatient.style.visibility = "visible";
        newPatient.style.visibility = "hidden";
    }
}