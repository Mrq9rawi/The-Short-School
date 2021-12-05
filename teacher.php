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


        echo "<details>
                <summary>$teacher_name Performance</summary>
            </details>
            <details>
                <summary>Cumulative Teacher average</summary>
                <table>
                    <thead>$teacher_table</thead>
                    <tbody></tbody>
                </table>
            </details>"
        ?>
    </body>
</html>