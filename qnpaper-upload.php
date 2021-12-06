<?php
// Check if a file has been uploaded
if(isset($_FILES['uploaded_file']) and isset ($_POST['Submit']))
{
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) 
    {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'Nitcq');
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
				    echo '<script>alert("Success! Your file was successfully added!")</script>';
				}
				else {
				    echo '<script>alert("Error! Failed to insert the file, size is too large")</script>';
				}
        // Close the mysql connection
        $dbLink->close();
    }
    //print error message
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }
 
    
    
}

?>

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
        
        <link rel="stylesheet" href="css/qnpaper-upload.css" type = "text/css">

        <title>Insert PDF</title>
        
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
            //empty Chapters- and Topics- dropdowns
            SubjectSel.length = 1;
            BranchSel.length = 1;
            //display correct values
            for (var y in subjectObject[this.value]) {
              BranchSel.options[BranchSel.options.length] = new Option(y, y);
            }
          }
          BranchSel.onchange = function() {
            //empty Chapters dropdown
            SubjectSel.length = 1;
            //display correct values
            var z = subjectObject[YearSel.value][this.value];
            for (var i = 0; i < z.length; i++) {
              SubjectSel.options[SubjectSel.options.length] = new Option(z[i], z[i]);
            }
          }
        }
      </script>

    </head>
    <body>
        <!-- Navbar -->
        <div class="w3-top">
            <div class="w3-bar w3-theme-d2 w3-left-align">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
            <a href="HomePage.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white"><i class="fa fa-home w3-margin-right"></i>NITC Question Bank</a>
            <a href="#QnPaper" class="w3-bar-item w3-button w3-teal">QPaper</a>
            <a href="HomePage.php#References" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Reference Notes</a>
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
        <h1 class = "text-center">Upload Question Paper</h1>
        <!--choosing year, branch and subjects-->
        <div class="m-3 mt-5">
          <form method="post" enctype="multipart/form-data" action="">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <h1 class = "qpHeading">Enter the following details</h1>
                  <h4 class="qpDetails">Roll Number </h4>
                  <input class = "rollnumber" type="text" id="Roll_no" name="Roll_no" placeholder="Enter in capital letters"><br>
                  <h4 class="qpDetails">Year </h4>
                    <select class = "dropdowns" name="Year" id="Year">
                      <option value="" selected="selected">Select Year</option>
                    </select>
                  <h4 class="qpDetails">Branch </h4>
                    <select class = "dropdowns" name="Branch" id="Branch">
                      <option value="" selected="selected">Select year first</option>
                    </select>
                  <h4 class="qpDetails">Subject </h4>
                    <select class = "dropdowns" name="Subject" id="Subject">
                      <option value="" selected="selected">Please select Branch first</option>
                    </select>
                </div>
        
                <div class="col-md-6 mt-4">
                    <div class="d-sm-block d-md-none">
                        <hr>
                    </div>
                  <h3 class = "qpHeading">Upload File</h3>
                  <!--Drag and drop box-->
                  <div class="drop-zone d-flex flex-column">
                    <span class="drop-zone__prompt">Drag and Drop file here <br> or <br> <label class = "browse-button">Browse</label></span>
                    <input type="file" name="uploaded_file" class="drop-zone__input">
                  </div>
                </div>
                <div class="col-12 d-flex flex-row justify-content-center">
                  <button class="upload-button" name= "Submit"> Upload </button>
                </form>  
		          <form action="see_files.php" method="POST">
		          <button class="upload-button"  name="Submit">See all files</button>
		          </form> 
                </div>
              </div>
            </div>
            
        </div>
      </div>
      <script src="js/qnpaper-upload.js"></script>
  </body>
</html>
