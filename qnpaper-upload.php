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
          "1st Year": {
            "CSE": ["Moonji1", "Moonji2", "Moonji3", "Moonji4"],
            "ECE": ["Resistors", "conductors", "DSA", "bleh"],
            "EEE": ["bleh1", "bleh2", "bleh3", "bleh4"]    
          },
          "2nd Year": {
            "CSE": ["Variables", "Strings", "Arrays"],
            "ECE": ["SELECT", "UPDATE", "DELETE"]
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
            <a href="#" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>NITC Question Bank</a>
            <a href="#QnPaper" class="w3-bar-item w3-button w3-hide-small w3-hover-white">QPaper</a>
            <a href="#ElectiveInfo" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Elective Info</a>
            <a href="#PlacementInfo" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Placement Info</a>
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
          <form method="post" enctype="multipart/form-data">
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
                    <span class="drop-zone__prompt">Drag and Drop file here <br> or <br> <button class = "browse-button">Browse</button></span>
                    <input type="file" name="myFile" class="drop-zone__input">
                  </div>
                </div>
                <div class="col-12 d-flex flex-row justify-content-center">
                  <button class="upload-button" name= "btn"> Upload </button>
                  <button class="upload-button" href="list_files.php">See all files</button> 
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <script src="js/qnpaper-upload.js"></script>
  </body>
</html>