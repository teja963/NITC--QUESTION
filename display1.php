<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
          <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>ELECTIVE_INFO</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    </head>
  <style>
      body,h1,h2,h3,h4,h5 {
        font-family: "Raleway", sans-serif
      }
      .w3-container{
          background-color: rgb(9, 168, 168);
      }
      .w3-container1{
        margin-top: 50px;
      }
      .w3-button{
       background-color: black;
      }
  </style>

 <body class="w3-light-grey">
   <div class="w3-top">
      <div class="w3-bar w3-theme-d2 w3-left-align">
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
        <a href="HomePage.php" class="w3-bar-item w3-button "><i class="fa fa-home w3-margin-right"></i>NITC Question Bank</a>
        <a href="#QnPaper" class="w3-bar-item w3-button w3-hide-small w3-hover-white">QPaper</a>
        <a href="HomePage.php#References" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Reference Notes</a>
        <a href="HomePage.php#ElectiveInfo" class="w3-bar-item w3-button w3-teal w3-hide-small w3-hover-white">Elective Info</a>
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
 <div class="w3-content" style="max-width:1200px">
        <!-- Header-->
    <header class="w3-container1 w3-center w3-padding-32"> 
          <h1><b>Elective Information</b></h1>
          <h5>DETAILS </h5>
    </header>
       <!-- Grid -->
  <div class="w3-row">
  <!-- Blog entry -->
     <div class="w3-card-4 w3-margin w3-white">
          <div class="w3-container">
			<?php

		  // Connect to the database
			if(isset($_POST['Submit'])){
        $host='localhost';
        $user='root';
        $pass='';
        $db='Nitcq';
        
          $mysqli= new mysqli($host,$user,$pass,$db);
			    $Course_ID = $_POST['Course_ID'];
			    $Course_name = $_POST['Course_name'];
			    $Faculty_name = $_POST['Faculty_name'];

			// Fetch elective information from the database
			$query = "SELECT * FROM `Elective_info` WHERE `Course_id` ='$Course_ID'";
       // Execute the query
			    if($result = $mysqli->query($query)){
            // Get the row
				    if ($row = $result->fetch_assoc()) {

				            $Course_ID = $row["Course_id"];
				            $Course_name = $row["course_name"];
				            $Faculty_name = $row["faculty"];
				            $elective_info = $row["elective_info"];
         // Print data               
				echo "<h3><b>Name of Elecitve:</b> $Course_ID</h3>".'<br />';
				echo "<h4><b>Course ID:</b></h4><h5> $Course_name</h5>".'<br />';
				echo "<h4><b>Faculty_Name:</b></h4><h5> $Faculty_name</h5>".'<br />';
				echo "<pre><h4><b>Elective_info:</b></h4><h5>$elective_info</h5>".'<br /></pre>';
				}
			    }	
			}
		?>
		 </div>
        
  </div>
  </div><br>
 </div>
      <footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
        <a href="HomePage.php"> <button class="w3-button w3-teal   w3-padding-large w3-margin-bottom w3-theme-l1">Previous</button></a>
      </footer>
  </body>
</html>
