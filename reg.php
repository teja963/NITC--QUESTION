
<?php
$servername="localhost";
$username="root";
$password="";
$database="nitcq";
$connection=mysqli_connect($servername,$username,$password,$database);
if(!$connection){
    die('connection failed:'.mysqli_connect_error());
}
else{
    if(isset($_POST['login']))
    {
	     $Roll_no=$_POST['Roll_no'];
	     $password=$_POST['Password'];
	     $sql="SELECT Password from Login where Roll_no='$Roll_no'";
	     $result=$connection->query($sql);
	        
		     while($row=$result->fetch_assoc())
		      {
		     
		             if(strcmp($password,$row["Password"])==0)
		             {
		                header("Location: http://localhost/DBMS-PROJECT/index.php");
		                exit();
		             }
			     else {
				 echo "Enter the correct password";
			     }
			    
		     }
	     
     
    }
    else if(isset($_POST['submit'])){
        $Roll_no=$_POST['Roll_no'];
        $First_name=$_POST['First_name'];
        $Last_name=$_POST['Last_name'];
        $Email_id=$_POST['Email_id'];
        $Branch=$_POST['Branch'];
        $Mobile=$_POST['Mobile'];
        $Password=$_POST['Password'];
        $sql="INSERT INTO `Student` (`Roll_no`, `Email_id`, `Branch`, `First_name`, `Last_name`, `Mobile`,`Id`) VALUES ('$Roll_no', '$Email_id', '$Branch', '$First_name', '$Last_name', '$Mobile', '12345')";
        $sql2="INSERT INTO `Login` (`Roll_no`, `Password`) VALUES ('$Roll_no', '$Password')";
            if ($connection->query($sql) === TRUE and $connection->query($sql2) === TRUE) {
                echo "New record created successfully! for the student '$First_name' ";
              } 
              elseif ($connection->error == "Duplicate entry '$Roll_no' for key 'PRIMARY'") {
                echo "INSERTION FAILED!"."<br>";
                echo "Student with roll number '$Roll_no' already exists!";
            
            }
            else{
                echo "Error:"."<br>" . $connection->error;
              }
              $connection->close();
        }
     
        }


?>




<!DOCTYPE HTML>
<head>
<link rel="stylesheet" href="css/reg.css">
</head>
<body>
  <br>
  <br>
      <div class="cont">
          <div class="form sign-in">
              <h2>Welcome</h2>
                   <div class="login">
                      <form action="reg.php" method="POST">
		            <label>
		                <span>Roll Number</span>
		                <input type="text" name="Roll_no" required>
		            </label>
		            <label>
		                <span>Password</span>
		                <input type="password" name="Password" required>
		            </label>
		            <input type="submit" name="login" class="submit2"> 
		        </form>
                    </div>    
                </div>
                <div class="sub-cont">
                    <div class="img">
                        <div class="img__text m--up">
                        
                            <h3>Don't have an account? Please Sign up!<h3>
                        </div>
                        <div class="img__text m--in">
                        
                            <h3>If you already has an account, just sign in.<h3>
                        </div>
                        <div class="img__btn">
                            <span class="m--up">Sign Up</span>
                            <span class="m--in">Sign In</span>
                        </div>
                    </div>
                    <div class="form sign-up">
                        <h2>Create your Account</h2>
                        <div class="form2" >
                            <form action ="reg.php" method="POST">
                                <label>
                                    <span>Roll Number</span>
                                    <input type="text" name="Roll_no" required/>
                                </label>
                                <label>
                                    <span>First Name</span>
                                    <input type="text" name="First_name" required/>
                                </label>
                                <label>
                                    <span>Last Name</span>
                                    <input type="text" name="Last_name" required />
                                </label>  
                                <label>
                                    <span>Email</span>
                                    <input type="text" name="Email_id" required/>
                                </label>
                                <label>
                                    <span>Branch</span>
                                    <input type="text" name="Branch" required/>
                                </label>
                                <label>
                                    <span>Mobile</span>
                                    <input type="text" name="Mobile" required/>
                                </label>
                                <label>
                                    <span>Password</span>
                                    <input type="password" name = "Password" required/>
                                </label>
                                <input type="submit" name="submit" class="submit">
                            </form>    
                        </div>    
              </div>
          </div>
      </div>
  
      <script>
          document.querySelector('.img__btn').addEventListener('click', function() {
              document.querySelector('.cont').classList.toggle('s--signup');
          });
      </script>
</body>
</html>


