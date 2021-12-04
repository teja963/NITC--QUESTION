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
        
        <link rel="stylesheet" href="css/ReferenceNotes.css" >

        <title>Reference Notes</title>
        
      <!--js for dropdowns-->
      <script>
        var subjectObject = {
          "1": {
            "CSE": ["Maths", "Physics", "Chemistry", "Mechanics", "BES", "Computer programming"],
            "ECE": ["Maths", "Physics", "Chemistry", "Mechanics", "BES", "Computer programming"],
            "CE": ["Maths", "Physics", "Chemistry", "Mechanics", "BES", "Computer programming"],
            "CH": ["Maths", "Physics", "Chemistry", "Mechanics", "BES", "Computer programming"]
          },
          "2": {
            "CSE": ["Maths", "Logic Design", "Program Design", "Discrete Structures", "Computer Organization", "DSA"],
            "CE": ["Mechanics of solids", "Surveying", "Mechanics of fluids", "Building Technology", "Structural analysis"],
            "MSE": ["Structure of materials", "Thermodynamics", "Fluid mechanics", "Heat transfer"],
            "CH": ["Mechanical Operations", "Material Science", "Heat Transfer", "Fluid Mechanics", "Chemical Technology", "Process Calculations", "Thermodynamics"]
          },
          "3": {
            "CSE": ["PPL", "Theory of Computation", "Database Management Systems", "Operating Systems"],
            "CE": ["Structural design", "Numericsl methods", "Transportation engineering", "Structural analysis"],
            "MSE": ["Thermal engineering", "Semiconductors nanostructures", "Bio-materials"],
            "CH": ["Mass Transfer", "Process Dynamics and Control", "Chemical Reaction Engineering","Thermodynamics","Petroleum Refining Operations AND Processes"]
          },
          "4": {
            "CSE": ["Artificial Intelligence", "ML"],
            "CE": ["Environmental engineering", "Construction management", "Water resource engineering"],
            "MSE": ["Energy materials and technology", "Corrosion science and engineering", "Industrial Economics"],
            "CH": ["Transport Phenomena", "Chemical Process Optimization" ,"Computer Aided Design"]
          }
        }
        window.onload = function() {
          var YearSel = document.getElementById("Year");
          var BranchSel = document.getElementById("Branch");
          var SubjectSel = document.getElementById("Subject");
          for (var x in subjectObject) {
            YearSel.options[YearSel.options.length] = new Option(x, x);
          }
          YearSel.onchange = function() {
            //empty Subjects- and Branch- dropdowns
            SubjectSel.length = 1;
            BranchSel.length = 1;
            //display correct values
            for (var y in subjectObject[this.value]) {
              BranchSel.options[BranchSel.options.length] = new Option(y, y);
            }
          }
          BranchSel.onchange = function() {
            
            SubjectSel.length = 1;
            //display correct values
            var z = subjectObject[YearSel.value][this.value];
            for (var i = 0; i < z.length; i++) {
              SubjectSel.options[SubjectSel.options.length] = new Option(z[i], z[i]);
            }
          }
        }
      </script>
      
      <style>
        table{
          color: #588c7e;
          font-family: monospace;
          font-size: 25px;
          text-align: left;
          }
        th{
          color: 	 	#003434;
        }
        
      </style>

    </head>
    <body class="ref-bg">
        <!-- Navbar -->
        <div class="w3-top">
            <div class="w3-bar w3-theme-d2 w3-left-align">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
            <a href="HomePage.php" class="w3-bar-item w3-button"><i class="fa fa-home w3-margin-right"></i>NITC Question Bank</a>
            <a href="HomePage.php#QnPaper" class="w3-bar-item w3-button w3-hide-small w3-hover-white">QPaper</a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white w3-teal">Reference Notes</a>
            <a href="HomePage.php#ElectiveInfo" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Elective Info</a>
            <a href="HomePage.php#PlacementInfo" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Placement Info</a>
            <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-theme w3-hover-teal">Notifications</button>
            </div>
        
            <!-- Navbar on small screens -->
            <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
            <a href="#QnPaper" class="w3-bar-item w3-button">QPaper</a>
            <a href="#ElectiveInfo" class="w3-bar-item w3-button">Elective Info</a>
            <a href="#PlacementInfo" class="w3-bar-item w3-button">Placement Info</a>
            </div>
        </div>    

      <div class = "w3-padding-64">
        <h1 class = "text-center text-white">Download Reference notes</h1>
        <!--choosing year, branch and subjects-->
        <div class="w3-card-4 download-card">
          <form method="post" enctype="multipart/form-data">
            <div>
              <h1 class = "qpHeading">Enter the details</h1>
                <h4 class="qpDetails">Year </h4>
                  <select class = "dropdowns" name="Year" id="Year">
                    <option value="" selected="selected">Select Year</option>
                  </select>
                <h4 class="qpDetails">Branch </h4>
                  <select class = "dropdowns" name="Branch" id="Branch">
                    <option value="" selected="selected">Select Branch</option>
                  </select>
                <h4 class="qpDetails">Subject </h4>
                  <select class = "dropdowns" name="Subject" id="Subject">
                    <option value="" selected="selected">Please select Branch first</option>
                  </select>
            </div>
            <div class="col-12 d-flex flex-row justify-content-center">
              <button type="submit" class="download-button" name= "Submit3"> Download Reference notes </button> 
            </div>
          </form>
          <?php

            // Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'Nitcq');
        if(mysqli_connect_errno()) {
                die("MySQL connection failed: ". mysqli_connect_error());
            }
        if (isset($_POST['Submit3'])) {
        $Branch=$_POST['Branch'];
        $Year=$_POST['Year'];
        $Subject=$_POST['Subject'];
        //  Query for all files that satisfy the given condition
        $sql = "SELECT `R_id`, `ref_name`, `Branch`, `Year`, `Subject` FROM `Reference_Notes` WHERE `Branch`='$Branch' AND `Year`= '$Year' AND `Subject`='$Subject'";
        $result = $dbLink->query($sql);
        
        // Check if it was successfull
        if($result) {
            // Make sure there are some files in there
            if($result->num_rows == 0) {
                echo '<p>There are no files in the database</p>';
            }
            else {
                // Print the column heading of the table
                echo '<table width="100%">
                        <tr>
                            <td><u><b>Name</b></u></td>
                            <td><u><b>Branch</b></u></td>
                            <td><u><b>Year</b></u></td>
                            <td><u><b>Subject</b></u></td>
                            <td><u><b>&nbsp;</b></u></td>
                        </tr>';
                echo nl2br("\n");
                echo nl2br("\n");                
             
                    
                // Print each file
                while($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            <td>{$row['ref_name']}</td>
                            <td>{$row['Branch']}</td>
                            <td>{$row['Year']}</td>
                            <td>{$row['Subject']}</td>
                            <td><a href='ref_get.php?R_id={$row['R_id']}'><button>Download</button></a></td>
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

    }
    // Close the mysql connection
    $dbLink->close();
    ?>

        </div>
      </div>
  </body>
</html>
