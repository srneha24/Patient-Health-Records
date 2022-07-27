function ShowHideDiv(patientCheck) {
    var x = patientCheck.checked;
    var div = document.getElementById("new-patient");
    var btn = document.getElementById("search-patient");
    var searchPatient = document.getElementById("nameSearch");
    var newPatient = document.getElementById("name");

    var dob = document.getElementById("dob");
    var gender1 = document.getElementById("gender1");
    var gender2 = document.getElementById("gender2");
    var phone = document.getElementById("phone");

    var height = document.getElementById("height");
    var weight = document.getElementById("weight");
    var heart_rate = document.getElementById("heart_rate");
    var pulse_rate = document.getElementById("pulse_rate");
    var temparature = document.getElementById("temparature");
    var blood_group = document.getElementById("blood_group");
    var sugar_level = document.getElementById("sugar_level");
    var blood_pressure_top = document.getElementById("blood_pressure_top");
    var blood_pressure_bottom = document.getElementById("blood_pressure_bottom");
    var new_submit = document.getElementById("new-submit");

    if (x) {
        div.style.visibility = "visible";
        btn.style.visibility = "hidden";
        searchPatient.style.visibility = "hidden";
        newPatient.style.visibility = "visible";

        newPatient.setAttribute("required", "required");
        dob.setAttribute("required", "required");
        gender1.setAttribute("required", "required");
        gender2.setAttribute("required", "required");
        phone.setAttribute("required", "required");

        height.removeAttribute("disabled");
        weight.removeAttribute("disabled");
        heart_rate.removeAttribute("disabled");
        pulse_rate.removeAttribute("disabled");
        temparature.removeAttribute("disabled");
        blood_group.removeAttribute("disabled");
        sugar_level.removeAttribute("disabled");
        blood_pressure_top.removeAttribute("disabled");
        blood_pressure_bottom.removeAttribute("disabled");
        new_submit.removeAttribute("disabled");

    }

    else {
        document.location.href = "http://localhost/Patient%20Health%20Records/?page=new";
        
        div.style.visibility = "hidden";
        btn.style.visibility = "visible";
        searchPatient.style.visibility = "visible";
        newPatient.style.visibility = "hidden";

        newPatient.removeAttribute("required");
        dob.removeAttribute("required");
        gender1.removeAttribute("required");
        gender2.removeAttribute("required");
        phone.removeAttribute("required");
    }
}