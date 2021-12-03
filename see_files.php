



<!DOCTYPE html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!--bootstrapCDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="css/See_File.css" type = "text/css">

       
      
    </head>
    <body style="background-color: rgb(48, 48, 48);">
        <!-- Navbar -->
        <div class="w3-top">
            <div class="w3-bar w3-theme-d2 w3-left-align">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
            <a href="HomePage.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white"><i class="fa fa-home w3-margin-right"></i>NITC Question Bank</a>
            <a href="#QnPaper" class="w3-bar-item w3-button w3-teal">QPaper</a>
            <a href="HomePage.php#References" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Reference Notes</a>
            <a href="HomePage.php#ElectiveInfo" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Elective Info</a>
            <a href="HomePage.php#PlacementInfo" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Placement Info</a>
            <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-hide-small w3-theme w3-hover-white">Notifications</button>
            </div>
        
            <!-- Navbar on small screens -->
            <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
                <a href="#QnPaper" class="w3-bar-item w3-button">QPaper</a>
                <a href="HomePage#References" class="w3-bar-item w3-button">Reference Notes</a>
                <a href="HomePage#ElectiveInfo" class="w3-bar-item w3-button">Elective Info</a>
                <a href="HomePage#PlacementInfo" class="w3-bar-item w3-button">Placement Info</a>
                <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-bar-item w3-theme w3-hover-white">Notifications</button>
            </div>
            <br>
        </div>  
        
        <div class="w3-padding-64 d-flex flex-column justify-content-center">
            <div class="w3-card-4 ml-4 mr-4 text-center files-card">
                <h1 class="seefiles-heading">All Files</h1>

                <?php
    // Connect to the database
    if(isset($_POST['Submit']))
{
                $dbLink = new mysqli('localhost', 'root', '', 'Nitcq');
                if(mysqli_connect_errno()) {
                    die("MySQL connection failed: ". mysqli_connect_error());
                }
                
                //  Query for all files that satisfy the given condition
                $sql = 'SELECT  `Qp_name`, `Branch`, `Year`, `Subject` FROM `Question_paper`';
                $result = $dbLink->query($sql);
                
                // Check if it was successfull
                if($result) {
                    // Make sure there are some files in there
                    if($result->num_rows == 0) {
                        echo '<p>There are no files in the database</p>';
                    }
                    else {
                        echo '<table width="100%"  
                               <tr>
                                    <td>&nbsp</td>
                                </tr>';
                        echo '<table width="100%"  
                                <tr>
                                     <td>&nbsp</td>
                                 </tr>';
                        // Print the top of a table
                        echo '<table width="100%">
                                <tr>
                                    <td><u><b>Qp_name</b></u></td>
                                    <td><u><b>Branch</b></u></td>
                                    <td><u><b>Year</b></u></td>
                                    <td><u><b>Subject</b></u></td>

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
         <br>
         <br>
            </div>


        </div>
        <a href="qnpaper-upload.php"><button class="back-button" href="">Back</button></a>
  </body>
</html>
