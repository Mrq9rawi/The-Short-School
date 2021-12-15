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
           
            //error check above here
            //Should also make an "is student id unique?" check here
            $q = "INSERT INTO students (student_id, first_name, last_name, program_id, gpa) VALUES ('$student_id', '$student_fname', '$student_lname', '$program_id', '$gpa')";
            $r = @mysqli_query($dbc, $q);
            if ($r) {
                echo 'Good stuff. you are registered.';
            } else {
                echo 'You fail.' . mysqli_error($dbc) . 'Try again';
            }

            if ($r) {
                $q = "SELECT AVG(gpa) FROM students WHERE program_id = 'PROG5000'";
                $r = @mysqli_query($dbc, $q);
                print_r($r);
                $program_gpa = mysqli_fetch_row($r);
                echo "$program_gpa";
            }


            if ($gpa > $program_gpa) {
                $result = "higher than the program average of $program_gpa. You're leading the pack! Keep it up.";
            }
            else if ($gpa == $program_gpa) {
                $result = "equal to the program average of $program_gpa. Keep going!";
            } else {
                $result = "lower than the program average of $program_gpa. Please do your best to correct before the end of the semester!";
            }
            mysqli_free_result($r);

            echo "<details>
                    <summary>$student_fname $student_lname's Performance</summary>
                    <p>Your gpa for $program_id is $gpa: This result is $result.</p>
                </details>";

            $q = 
            $r = @mysqli_query($dbc, $q);

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
                    echo '<tr><td align="left">' . $row['Instructor Name'] . '<tr><td align="left">' . $row['Instructor Name'] . 
                    '<tr><td align="left">' . $row['Instructor Name'] . '<tr><td align="left">' . $row['Instructor Name'] . 
                    '<tr><td align="left">' . $row['Instructor Name'] . '<tr><td align="left">' . $row['Instructor Name'] . 
                    '<tr><td align="left">' . $row['Instructor Name'] . '</td></tr>
                    ';
                }

                echo '</tbody></table>';
                mysqli_free_result ($r);




            } else {
                echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
            }


            echo "<details>
                    <summary>Your Timetable:</summary>
                    <table>
                        <thead>$student_table</thead>
                        <tbody></tbody>
                    </table>
                </details>";

        ?>
    </body>
</html>