<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" href="master.css" type="text/css">
	    <link rel="preconnect" href="https://fonts.googleapis.com">
	    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	    <link href="https://fonts.googleapis.com/css2?family=STIX+Two+Text:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" type="text/css">
	    <title>Student Results</title>
    </head>
    <body>
        <?php
            require "database.php";
            require "formtodatabase.php";
            $student_id = $_POST['student_id'];
            $student_fname = $_POST['student_fname'];
            $student_lname = $_POST['student_lname'];
            $program_id = $_POST['program_id'];            
            $gpa = $_POST['student_gpa'];
           
            //Should also make an "is student id unique?" check here

            //User input goes into DB
            $q = "INSERT INTO students (student_id, first_name, last_name, program_id, gpa) VALUES ('$student_id', '$student_fname', '$student_lname', '$program_id', '$gpa')";
            $r = @mysqli_query($dbc, $q);
            if ($r) {
                echo 'Good stuff. you are registered.';
            } else {
                echo 'You fail.' . mysqli_error($dbc) . 'Try again';
                die();
            }

            //Query for current GPA average for the program
            $q = "SELECT AVG(gpa) FROM students AS avg WHERE program_id = 'PROG5000'";
                $r = @mysqli_query($dbc, $q);
                $row = mysqli_fetch_assoc($r);
                $program_gpa = $row['AVG(gpa)'];
                echo "<br><br>$program_gpa<br><br>";
            
                
            //Check gpa input against program GPA average
            if ($gpa > $program_gpa) {
                $result = "higher than the program average of $program_gpa. You're leading the pack! Keep it up.";
            }
            else if ($gpa == $program_gpa) {
                $result = "equal to the program average of $program_gpa. Keep going!";
            } else {
                $result = "lower than the program average of $program_gpa. Please do your best to correct before the end of the semester!";
            }
            mysqli_free_result($r);

            echo "<h2>$student_fname $student_lname's Performance</h2>
                    <p>Your gpa for $program_id is $gpa: This result is $result.</p>
                </details>";

            $q = "SELECT CONCAT(faculty.last_name, ', ', LEFT(faculty.first_name, 1), '.') AS 'Instructor Name', course_id AS 'Course ID', 
            course_name AS 'Course Name', campus.campus_name AS 'Campus', courses.program_id AS 'Program ID', programs.program_name AS 'Program Name', session_time AS 'Time Slot'
            FROM (((courses
            INNER JOIN campus ON courses.campus_id = campus.campus_id)
            INNER JOIN programs ON courses.program_id = programs.program_id)
            INNER JOIN faculty ON courses.faculty_id = faculty.faculty_id)
            WHERE courses.program_id = 'PROG5000';";
            $r = @mysqli_query($dbc, $q);
            // print_r($r);

            if ($r) {
                echo '<table width="80%">
	                    <thead>
                    	<tr>
	                    	<th align="left">Instructor Name</th>
                    		<th align="left">Course ID</th>
                            <th align="left">Course Name</th>
                            <th align="left">Campus</th>
                            <th align="left">Program ID</th>
                            <th align="left">Program Name</th>
                            <th align="left">Time Slot</th>
                    	</tr>
                    	</thead>
                    	<tbody>
                    ';
                while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                    echo '<tr><td align="left">' . $row['Instructor Name'] . '</td><td align="left">' . $row['Course ID'] . 
                    '</td><td align="left">' . $row['Course Name'] . '</td><td align="left">' . $row['Campus'] . 
                    '</td><td align="left">' . $row['Program ID'] . '</td><td align="left">' . $row['Program Name'] . 
                    '</td><td align="left">' . $row['Time Slot'] . '</td></tr>
                    ';
                }

                echo '</tbody></table>';
                mysqli_free_result ($r);




            } else {
                echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
            }


            

        ?>
    </body>
</html>