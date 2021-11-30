<?php
// Check if a file has been uploaded
if(isset($_FILES['uploaded_file']) and isset ($_POST['Submit'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'nitcq');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        // Gather all required data
        $name = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
        $Q_paper = $dbLink->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $Branch = $_POST['Branch'];
        $Year = $_POST['Year'];
        $Subject = $_POST['Subject'];
        $Roll_no = $_POST['Roll_no'];
        $mime = $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
        $size = intval($_FILES['uploaded_file']['size']);
 
        // Create the SQL query
        $query = "
           INSERT INTO `Question_paper`(`Branch`, `Year`, `Subject`, `Q_paper`, `Roll_no`, `Id`, `Qp_name`, `type`, `size`) 
            VALUES ('$Branch',$Year,'$Subject','{$Q_paper}','$Roll_no',12345,'{$name}','{$mime}','{$size}')";
 
        // Execute the query
        $result = $dbLink->query($query);
 
        // Check if it was successfull
        if($result) {
            echo 'Success! Your file was successfully added!';
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre>{$dbLink->error}</pre>";
        }
    }
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }
 
    // Close the mysql connection
    $dbLink->close();
}
else {
    echo 'Error! A file was not sent!';
}
 
// Echo a link back to the main page
echo '<p>Click <a href="qnpaper-upload.php">here</a> to go back</p>';
?>
