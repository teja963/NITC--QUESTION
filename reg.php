
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
		                header("Location: http://localhost/DBMS-PROJECT/HomePage.php");
		                exit();
		             }
			     else {
				 echo '<script>alert("Enter the correct password")</script>';
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
                echo '<script>alert("New record created successfully!")</script>';
              } 
              elseif ($connection->error == "Duplicate entry '$Roll_no' for key 'PRIMARY'") {
                echo '<script>alert("INSERTION FAILED!Student with this roll number already exists!")</script>';
            
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/reg.css">
</head>
<body>
  <br>
  <br>
      <div class="cont">
          <div class="form sign-in">
              <div class="d-flex flex-row">
                <img src="https://res.cloudinary.com/bhavana2002/image/upload/v1638264504/NITC_light_k5u9eh.png" class="nitc-logo"/>
                <h2 style="font-weight:700;" class="pt-3">Welcome to NITC Question Bank</h2>
              </div>
                   <div class="login m-5">
                      <form action="reg.php" method="POST">
                        <label>
                            <span style="color: rgb(71, 71, 71);">Roll Number</span>
                            <input type="text" name="Roll_no" required>
                        </label>
                        <label>
                            <span style="color: rgb(71, 71, 71);">Password</span>
                            <input type="password" name="Password" required>
                        </label>
                        <div class="d-flex flex-row justify-content-center">
                            <input type="submit" name="login" class="submit2"> 
                        </div>
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
                        <h2 style="font-weight:700;">Create your Account</h2>
                        <div class="form2" >
                            <form action ="reg.php" method="POST">
                                <label>
                                    <span style="color: rgb(71, 71, 71);">Roll Number</span>
                                    <input type="text" name="Roll_no" required/>
                                </label>
                                <label>
                                    <span style="color: rgb(71, 71, 71);">First Name</span>
                                    <input type="text" name="First_name" required/>
                                </label>
                                <label>
                                    <span style="color: rgb(71, 71, 71);">Last Name</span>
                                    <input type="text" name="Last_name" required />
                                </label>  
                                <label>
                                    <span style="color: rgb(71, 71, 71);">Email</span>
                                    <input type="text" name="Email_id" required/>
                                </label>
                                <label>
                                    <span style="color: rgb(71, 71, 71);">Branch</span>
                                    <input type="text" name="Branch" required/>
                                </label>
                                <label>
                                    <span style="color: rgb(71, 71, 71);">Mobile</span>
                                    <input type="text" name="Mobile" required/>
                                </label>
                                <label>
                                    <span style="color: rgb(71, 71, 71);">Password</span>
                                    <input type="password" name = "Password" required/>
                                </label>
                                <div class="d-flex flex-row justify-content-center">
                                    <input type="submit" name="submit" class="submit">
                                </div>
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