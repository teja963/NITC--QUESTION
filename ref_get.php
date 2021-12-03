<?php
    // Make sure an ID was passed
    if(isset($_GET['R_id'])) {
    // Get the ID
        $id = intval($_GET['R_id']);
     
        // Make sure the ID is in fact a valid ID
        if($id <= 0) {
            die('The ID is invalid!');
        }
        else {
            // Connect to the database
            $dbLink = new mysqli('localhost', 'root', '', 'Nitcq');
            if(mysqli_connect_errno()) {
                die("MySQL connection failed: ". mysqli_connect_error());
            }
     
            // Fetch the file information
            $query = "
                SELECT  `ref_name`,`Type`,`size`,`Subject`,`Notes`
                FROM `Reference_Notes`
                WHERE `R_id` = {$id}";
            $result = $dbLink->query($query);
     
            if($result) {
                // Make sure the result is valid
                if($result->num_rows == 1) {
                // Get the row
                    $row = mysqli_fetch_assoc($result);
     
                    // Print headers
                    header("Content-Type: ". $row['Type']);
                    header("Content-Length: ". $row['size']);
                    header("Content-Disposition: attachment; filename=". $row['ref_name']);
     
                    // Print data
                    echo $row['Notes'];
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
