<?php
    // Connect to the database
    $dbLink = new mysqli('localhost', 'root', '', 'myTable');
    if(mysqli_connect_errno()) {
        die("MySQL connection failed: ". mysqli_connect_error());
    }
     
    // Query for a list of all existing files
    $sql = 'SELECT `Qp_no`, `name`, `Branch`, `Year`, `Subject` FROM `file`';
    $result = $dbLink->query($sql);
     
    // Check if it was successfull
    if($result) {
        // Make sure there are some files in there
        if($result->num_rows == 0) {
            echo '<p>There are no files in the database</p>';
        }
        else {
            // Print the top of a table
            echo '<table width="100%">
                    <tr>
                        <td><b>Qp_no</b></td>
                        <td><b>name</b></td>
                        <td><b>Branch</b></td>
                        <td><b>Year</b></td>
                        <td><b>Subject</b></td>
                        <td><b>&nbsp;</b></td>
                    </tr>';
     
            // Print each file
            while($row = $result->fetch_assoc()) {
                echo "
                    <tr>
                        <td>{$row['Qp_no']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['Branch']}</td>
                        <td>{$row['Year']}</td>
                        <td>{$row['Subject']}</td>
                        <td><a href='get_file.php?Qp_no={$row['Qp_no']}'>Download</a></td>
                    </tr>";
            }
     
            // Close table
            echo '</table>';
        }
     
        // Free the result
        $result->free();
    }
    else
    {
        echo 'Error! SQL query failed:';
        echo "<pre>{$dbLink->error}</pre>";
    }
     
    // Close the mysql connection
    $dbLink->close();
    ?>