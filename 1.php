
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
    if(isset($_POST['login'])){
     $Roll_no=$_POST['Roll_no'];
     $password=$_POST['Password'];
     echo $password;
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



