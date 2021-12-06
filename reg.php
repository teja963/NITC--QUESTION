
<?php

//connect to the database
$servername="localhost";
$username="root";
$password="";
$database="Nitcq";
$connection=mysqli_connect($servername,$username,$password,$database);

//check if the connection is successful
if(!$connection){
    die('connection failed:'.mysqli_connect_error());
}
//if 'login' button is clicked
else{
    if(isset($_POST['login']))
    {
	     $Roll_no=$_POST['Roll_no'];
	     $password=$_POST['Password'];
	     $sql="SELECT Password from Login where Roll_no='$Roll_no'";
	     $result=$connection->query($sql);

          // Make sure the result is valid
         if($result->num_rows!=0){
             //  Get the row
		     while($row=$result->fetch_assoc())
		      {
		           //successful login
		             if(strcmp($password,$row["Password"])==0)
		             {
		                header("Location: http://localhost/DBMS-PROJECT/HomePage.php");
		                exit();
		             }
                //if the password is wrong
			     else {
				 echo '<script>alert("Incorrect password")</script>';
			     }
			    
		     }
            }
            //incorrect information
            else{
                echo '<script>alert("Please SignUp into the Page!!")</script>';
            }
     
    }
    // sign up
    else if(isset($_POST['submit'])){
        $Roll_no=$_POST['Roll_no'];
        $First_name=$_POST['First_name'];
        $Last_name=$_POST['Last_name'];
        $Email_id=$_POST['Email_id'];
        $Branch=$_POST['Branch'];
        $Mobile=$_POST['Mobile'];
        $Password=$_POST['Password'];
        
        //insert information into 'student' and 'login' tables
        $sql="INSERT INTO `Student` (`Roll_no`, `Email_id`, `Branch`, `First_name`, `Last_name`, `Mobile`,`Id`) VALUES ('$Roll_no', '$Email_id', '$Branch', '$First_name', '$Last_name', '$Mobile', '12345')";
        $sql2="INSERT INTO `Login` (`Roll_no`, `Password`) VALUES ('$Roll_no', '$Password')";
           //check if the connection is successful
            if ($connection->query($sql) === TRUE and $connection->query($sql2) === TRUE) {
                echo '<script>alert("New record created successfully!")</script>';
              } 
              //error message displayed if the inserted values are duplicate
              elseif ($connection->error == "Duplicate entry '$Roll_no' for key 'PRIMARY'") {
                echo '<script>alert("INSERTION FAILED!Student with this roll number already exists!")</script>';
            
            }
            //connection error
            else{
                echo "Error:"."<br>" . $connection->error;
              }
            // close the connection
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
                      <form action="reg.php" method="POST" >
                        <label>
                            <span style="color: rgb(71, 71, 71);">Roll Number</span>
                            <input type="text" name="Roll_no" required>
                        </label>
                        <label>
                            <span style="color: rgb(71, 71, 71);">Password</span>
                            <input type="password" name="Password" required>
                        </label>
                        <div class="d-flex flex-row justify-content-center">
                            <button type="submit" name="login" class="submit2"> SUBMIT </button>
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
                        
                            <h3>If you already has an account, just Login.<h3>
                        </div>
                        <div class="img__btn">
                            <span class="m--up">Sign Up</span>
                            <span class="m--in">Login</span>
                        </div>
                    </div>
                    <div class="form sign-up">
                        <h2 style="font-weight:700;">Create your Account</h2>
                        <div class="form2" >
                            <form action ="reg.php" method="POST" id="form">
                                <label>
                                    <span style="color: rgb(71, 71, 71);">Roll Number</span>
                                    <input type="text" name="Roll_no" id="roll_number" onkeydown="roll_validation()"required/>
                                    <span id="roll_text"></span>
                                </label>
                                <label>
                                    <span style="color: rgb(71, 71, 71);">First Name</span>
                                    <input type="text" name="First_name" id="first_name" onkeydown="first_name_validation()"required/>
                                    <span id="first_name_text"></span>
                                </label>
                                <label>
                                        <span style="color: rgb(71, 71, 71);">Last Name</span>
                                        <input type="text" name="Last_name" id="last_name" onkeydown="last_name_validation()"required />
                                        <span id="last_name_text"></span>
                                </label>  
                                <label>
                                

                                        <span style="color: rgb(71, 71, 71);">Email</span>
                                        <input type="text" name="Email_id" id="email" onkeydown="email_validation()"required>            
                                        <span id="email_text"></span>
          
                                    
                                </label>
                                <label>
                                    <span style="color: rgb(71, 71, 71);">Branch</span>
                                    <input type="text" name="Branch" required/>
                                </label>
                                <label>
                                    <span style="color: rgb(71, 71, 71);">Mobile</span>
                                    <input type="text" name="Mobile" id="mobile" onkeydown="mobile_validation()"required/>
                                    <span id="mobile_text"></span>
                                </label>
                                <label>
                                    <span style="color: rgb(71, 71, 71);">Password</span>
                                    <input type="password" name = "Password" required/>
                                </label>
                                <div class="d-flex flex-row justify-content-center">
                                    <button type="submit" name="submit" class="submit"> SUBMIT </button>
                                </div>
                            </form>    
                        </div>    
              </div>
          </div>
      </div>
  
      <script type="text/javascript">
          function roll_validation()
         {
            var form=document.getElementById("form");
            var roll=document.getElementById("roll_number").value;
            var roll_text=document.getElementById("roll_text");
            var pattern = /^[a-zA-Z0-9]*$/;
            if(roll.length==9&&roll.match(pattern)) 
            {
               form.classList.add("valid");
               form.classList.remove("invalid");
               roll_text.innerHTML="Your Roll Number is Valid";
               roll_text.style.color="#00ff00";
               
            }
            else
            {
               form.classList.remove("valid");
               form.classList.add("invalid"); 
               roll_text.innerHTML="Please Enter Valid Roll Number!!";
               roll_text.style.color="#ff0000"; 
            }
         }
         function first_name_validation()
         {
            var form=document.getElementById("form");
            var first_name=document.getElementById("first_name").value;
            var first_name_text=document.getElementById("first_name_text");
            var pattern = /^[a-zA-Z]*$/;
            if(first_name.match(pattern)&&first_name.length!=0) 
            {
               form.classList.add("valid");
               form.classList.remove("invalid");
               first_name_text.innerHTML="Your Name contains only letters";
               first_name_text.style.color="#00ff00";
               
            }
            else
            {
               form.classList.remove("valid");
               form.classList.add("invalid"); 
               first_name_text.innerHTML="Please Enter only letters";
               first_name_text.style.color="#ff0000"; 
            }
         }
         function last_name_validation()
         {
            var form=document.getElementById("form");
            var last_name=document.getElementById("last_name").value;
            var last_name_text=document.getElementById("last_name_text");
            var pattern = /^[a-zA-Z]*$/;
            if(last_name.match(pattern)&&last_name.length!=0) 
            {
               form.classList.add("valid");
               form.classList.remove("invalid");
               last_name_text.innerHTML="Your Name contains only letters";
               last_name_text.style.color="#00ff00";
               
            }
            else
            {
               form.classList.remove("valid");
               form.classList.add("invalid"); 
               last_name_text.innerHTML="Please Enter only letters";
               last_name_text.style.color="#ff0000"; 
            }
         }
         function email_validation()
         {
            var form=document.getElementById("form");
            var email=document.getElementById("email").value;
            var email_text=document.getElementById("email_text");
            var pattern = /^[a-zA-Z0-9]+_[a-zA-Z0-9]+@[a-z]+.[a-z]+.[a-z]+(?:\.[a-z]+)*$/;
            
            if(email.match(pattern)) 
            {
               form.classList.add("valid");
               form.classList.remove("invalid");
               email_text.innerHTML="Your Email is Valid";
               email_text.style.color="#00ff00";
               
            }
            else
            {
               form.classList.remove("valid");
               form.classList.add("invalid"); 
               email_text.innerHTML="Please Enter Valid NITC-Email";
               email_text.style.color="#ff0000"; 
            }
         }
         function mobile_validation()
         {
            var form=document.getElementById("form");
            var mobile=document.getElementById("mobile").value;
            var mobile_text=document.getElementById("mobile_text");
            var pattern = /^[0-9]+$/;
            
            if(mobile.match(pattern)&&mobile.length==10) 
            {
               form.classList.add("valid");
               form.classList.remove("invalid");
               mobile_text.innerHTML="Your Mobile Number is Valid";
               mobile_text.style.color="#00ff00";
               
            }
            else
            {
               form.classList.remove("valid");
               form.classList.add("invalid"); 
               mobile_text.innerHTML="Please Enter Valid mobile Number";
               mobile_text.style.color="#ff0000"; 
            }
         }
          document.querySelector('.img__btn').addEventListener('click', function() {
              document.querySelector('.cont').classList.toggle('s--signup');
          });
      </script>
</body>
</html>
