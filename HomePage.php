

<!DOCTYPE html>
<html>
<title>NITC QUESTION BANK</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="stylesheet" href="css/HomePage.css">
<body id="HomePage">

<!-- Sidebar on click -->
<nav class="w3-sidebar w3-bar-block w3-white w3-card w3-animate-left w3-xxlarge" style="display:none;z-index:2" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-display-topright w3-text-teal">Close
    <i class="fa fa-remove"></i></a>
      <a href="#" class="w3-bar-item w3-button">Link 1</a>
      <a href="#" class="w3-bar-item w3-button">Link 2</a>
      <a href="#" class="w3-bar-item w3-button">Link 3</a>
      <a href="#" class="w3-bar-item w3-button">Link 4</a>
      <a href="#" class="w3-bar-item w3-button">Link 5</a>
</nav>

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


<!-- Modal -->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-teal w3-display-container"> 
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
      <h4>All Notifications</h4>
    </header>
    <div class="w3-container">
      <p>1. New question paper uploaded!</p>
    </div>
  </div>
</div>

<!-- home-page Container -->
<div class="w3-container w3-padding-64 w3-center home-bg" id="home">
    <h2 class="homepage-info">NITC Question Bank</h2>
    <p class="homepage-para">From Normal book to a digitalised question bank, </br> 
      we provide an all-in-one space of information for the NITC students to access all the 
    </br><span style="font-weight:bold">previous year's question papers, placement information,
      reference materials and elective information of their core subjects.</span> </p>
</div>

<!--Qpaper content-->
<div class="w3-container w3-padding-64 w3-theme-l5 qpaper-gap" id="QnPaper">
  <div class="w3-row">
    <div class="w3-col m6">
          <div class="paper">
            <form action="qnpaper-upload.php" method="POST">
              <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Question Papers</span></div>
                <p>Users can upload previous year's question papers as well as download them <br> for their respective courses provided in the dropdown options.</p>
                <button type="submit" class="w3-button w3-center w3-theme-l1" name="upload">Upload Paper</button>
                <button type="submit" class="w3-button w3-center w3-theme-l1" name="download">Download Paper</button>
            </form>
          </div>
      </div>
        <div class="w3-col m6">
          <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Reference notes</span></div>
          <p>Description</p>
          <button type="submit" class="w3-button w3-center w3-theme-l1">Get Info</button>
        </div>
      </div>
  </div>
</div>

<!--Elective info-->
<div class="w3-container w3-padding-64 w3-theme-l1 elective-gap" id="ElectiveInfo">
  <div class="w3-row">
    <div class="w3-col m6">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Elective information</span></div>
      <p>Description</p>
    </div>
    <div class="w3-col m5">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="display.php" target="_blank" method="POST">
            <table>
                <tr>
                  <td>
                      <h1 class="info-details">Course ID:</h1> 
                      <select class = "dropdown-option" name="Course_ID" id="Course_ID" required>
                        <option  value="" selected="selected">Select Course ID</option>
                      </select>
                      <br>
                  </td>  
                </tr>
                <tr>
                  <td>
                    <h1 class="info-details">Course Name:</h1>
                    <select class = "dropdown-option" name="Course_name" id="Course_name" required>
                        <option value="" selected="selected">Please select Course ID first</option>
                      </select>
                      <br>
                  </td>
                </tr>
                <tr>
                    <td>
                      <h1 class="info-details">Faculty Name:</h1>
                      <select class = "dropdown-option" name="Faculty_name" id="Faculty_name" required>
                        <option value="" selected="selected">Please select Course Name first</option>
                      </select>
                      <br><br>
                    </td>
                  </tr>
              </table>
          <button type="submit" class="w3-button w3-right w3-theme-l1" name="Submit">Get Info</button>
      </form>
    </div>
  </div>
</div>

<!--placement info-->
<div class="w3-container w3-padding-64 w3-theme-l5 placement-gap" id="PlacementInfo">
  <div class="w3-row">
    <div class="w3-col m6">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Placement information</span></div>
      <p>Description</p>
    </div>
    <div class="w3-col m5">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="/action_page.php" target="_blank">
        <h1 class="info-details">Company Name:</h1> 
        <select class = "dropdown-option" name="Company_name" id="Company_name" required>
          <option value="" selected="selected">Select Company Name</option>
        </select>
        <br>
        <h1 class="info-details">Role:</h1> 
        <select class = "dropdown-option" name="Role" id="Role" required>
            <option value="" selected="selected">Please select Company Name first</option>
        </select>
        <br> 
        <button type="submit" class="w3-button w3-right w3-theme-l1">Get Info</button>
      </form>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
  <h4>For any help or suggestion, Contact us.</h4>
  <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  NIT Calicut, Kerala.</p>
  <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  +00 1515151515</p>
  <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  test@test.com</p>
</footer>

<script>
// Script for side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "300px";
  x.style.paddingTop = "10%";
  x.style.display = "block";
}

// Close side navigation
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>


<script src="js/placement_info.js"></script>
<script src="js/electiveinfo.js"></script>
</body>
</html>
