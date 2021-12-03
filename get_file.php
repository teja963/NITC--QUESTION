<?php
    // Make sure an Qp_no was passed
    if(isset($_GET['Qp_no'])) {
    // Get the ID
        $id = intval($_GET['Qp_no']);
     
        // Make sure it is a valid id
        if($id <= 0) {
            die('The ID is invalid!');
        }
        else {
            // Connect to the database
            $dbLink = new mysqli('localhost', 'root', '', 'Nitcq');
            if(mysqli_connect_errno()) {
                die("MySQL connection failed: ". mysqli_connect_error());
            }
     
            // Fetch the Question paper information
            $query = "
                SELECT  `Qp_name`,`type`,`size`,`Subject`,`Q_paper`
                FROM `Question_paper`
                WHERE `Qp_no` = {$id}";
            $result = $dbLink->query($query);
     
            if($result) {
                // Make sure the result is valid
                if($result->num_rows == 1) {
                // Get the row
                    $row = mysqli_fetch_assoc($result);
     
                    // Print headers
                    header("Content-Type: ". $row['type']);
                    header("Content-Length: ". $row['size']);
                    header("Content-Disposition: attachment; filename=". $row['Qp_name']);
     
                    // Print data
                    echo $row['Q_paper'];
                }
                else {
                    echo 'Error! No image exists with that ID.';
                }
     
                // Free the mysqli resources
                @mysqli_free_result($result);
            }
            else {
                echo "Error! Query failed: <pre>{$dbLink->error}</pre>";
            }
            @mysqli_close($dbLink);
        }
    }
    else {
        echo 'Error! No ID was passed.';
    }
    ?>
