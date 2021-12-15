"use strict";

$(()=>{
    $pattern_check = /[0-9]/;
    $first_name = $("#student_fname").val();
    $last_name = $("#student_lname").val();
    $("#submit").click(e => {
        let isValid = true;
        if ($first_name.match($pattern_check)) {
            isValid = false;
            alert("First Name must have no numbers");
        }
        else if ($last_name.match($pattern_check)) {
            isValid = false;
            alert("Last Name must have no numbers");
        }
        else {
            return true;
        }
        if (isValid == false) {
            e.preventDefault();
        }
    })
});