   <?php
	 $host='localhost';
	 $user='root';
	 $pass='';
	 $db='Nitcq';
	 
	 $mysqli= new mysqli($host,$user,$pass,$db);
	 if(isset($_POST['Submit'])){
	     $Company_name = $_POST['Company_name'];
	     $Role = $_POST['Role'];
		$query = "SELECT * FROM `Placement_info` WHERE `Company_name` ='$Company_name' AND `Role` ='$Role'";
		echo "<b> <center>Database Output</center> </b> <br> <br>";
		if($result = $mysqli->query($query)){
		if ($row = $result->fetch_assoc()) {

			$Company_name = $row["Company_name"];
			$Role = $row["Role"];
			$CTC = $row["CTC"];
			$References = $row["References"];
			$Interview_exp = $row["Interview_exp"];

			echo $Company_name.'<br />';
			echo $Role.'<br />';
			echo $CTC.'<br />';
			echo $References.'<br />';
			echo $Interview_exp.'<br />';
	        }
	}
	}
	?>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        var Company_nameObject = {
          "Oracle": {
            "Intern" :[],
            "Full Time" :[]
          },
          "Cisco": {
            "Intern" : [],
            "Full Time" : []
          }
        }
        window.onload = function() {
          var Company_nameSel = document.getElementById("Company_name");
          var RoleSel = document.getElementById("Role");
          
          for (var x in Company_nameObject) {
            Company_nameSel.options[Company_nameSel.options.length] = new Option(x, x);
          }
          Company_nameSel.onchange = function() {
            
            RoleSel.length = 1;
            for (var y in Company_nameObject[this.value]) {
              RoleSel.options[RoleSel.options.length] = new Option(y, y);
            }
          }          
        }
        </script>

</head>
	<body>
	    <h1>Placement Information</h1>




	    <form name="form1" id="form1" method="post">
	    Company Name: <select name="Company_name" id="Company_name">
		<option value="" selected="selected">Select Company Name</option>
	    </select>
	    <br><br>
	    Role: <select name="Role" id="Role">
		<option value="" selected="selected">Please select Company Name first</option>
	    </select>
	    <br><br>    
	    <input type="submit" value="Submit" name = "Submit">  
	    </form>

	 

	</body>
</html>
