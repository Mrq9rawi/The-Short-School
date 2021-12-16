//Name: Christian Shingiro Student No.: 7537202
//Name: Mohammad Abdullah Student No.8773900:
//Name: Alexander Mykitschak Student No.: 6245344
"use strict";

$(()=>{
    const $pattern_check = /[0-9]/;
    var $first_name = $("#student_fname").val().trim();
    var $last_name = $("#student_lname").val().trim();
    $("#submit").click(e => {
        let isValid = true;
        if ($pattern_check.test($first_name)) {
            isValid = false;
            alert("First Name must have no numbers");
        }
        else if ($pattern_check.test($last_name)) {
            isValid = false;
            alert("Last Name must have no numbers");
        }
        else {
            isValid = true;
            return true;
        }
        if (isValid == false) {
            e.preventDefault();
        }
    })
});