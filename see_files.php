<?php
    // Connect to the database
    if(isset($_POST['Submit']))
{
                $dbLink = new mysqli('localhost', 'root', '', 'nitcq');
                if(mysqli_connect_errno()) {
                    die("MySQL connection failed: ". mysqli_connect_error());
                }
                
                // Query for a list of all existing files
                $sql = 'SELECT  `Qp_name`, `Branch`, `Year`, `Subject` FROM `Question_paper`';
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
                                    <td><b>Qp_name</b></td>
                                    <td><b>Branch</b></td>
                                    <td><b>Year</b></td>
                                    <td><b>Subject</b></td>
                                </tr>';
                
                        // Print each file
                        while($row = $result->fetch_assoc()) {
                            echo "
                                <tr>
                                    <td>{$row['Qp_name']}</td>
                                    <td>{$row['Branch']}</td>
                                    <td>{$row['Year']}</td>
                                    <td>{$row['Subject']}</td>
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
}
    ?>
