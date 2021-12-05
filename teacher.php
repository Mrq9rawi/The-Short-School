<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" href="master.css" type="text/css">
	    <link rel="preconnect" href="https://fonts.googleapis.com">
	    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	    <link href="https://fonts.googleapis.com/css2?family=STIX+Two+Text:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" type="text/css">
	    <title>Teacher Results</title>
    </head>
    <body>
        <?php
            require "database.php";
            $teacher_id = $_POST['teacher_id'];
            $teacher_name = $_POST['teacher_name'];
            $program_id = $_POST['program_id'];
            $program_name = $_POST['program_name'];
            $program_average = $_POST['program_average'];
            if ($gpa < 3.0) {
                $result_level = "bad. You need to attend a corrective performace clinic";
            }
            else {
                $result_level = "good. Keep up the good work";
            }
            echo "<details>
                    <summary>$teacher_name Performance</summary>
                    <p> Your program_average is: $program_average. This result is $result_level.</p>
                </details>
                <details>
                    <summary>Cumulative Teacher average</summary>
                    <table>
                        <thead>$teacher_table</thead>
                        <tbody></tbody>
                    </table>
                </details>";
        ?>
    </body>
</html>