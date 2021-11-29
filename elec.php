<?php
 $host='localhost';
 $user='root';
 $pass='';
 $db='test_db';
 
 $mysqli= new mysqli($host,$user,$pass,$db);
 if(isset($_POST['Submit']){
     $Course_ID = $_POST['Course_ID'];
     $Course_name = $_POST['Course_name'];
     $Faculty_name = $_POST['Faculty_name'];
 

$query = "SELECT * FROM `Elective_info` WHERE `Course_ID` = $Course_ID";
echo "<b> <center>Database Output</center> </b> <br> <br>";

if ($result = $mysqli->query($query)) {

    while ($row = $result->fetch_assoc()) {
        $Course_ID = $row["Course_ID"];
        $Course_name = $row["Course_name"];
        $Faculty_name = $row["Faculty_name"];
        $elective_info = $row["elective_info"];

        echo $Course_ID.'<br />';
        echo $Course_name.'<br />';
        echo $Faculty_name.'<br />';
        echo $elective_info.'<br />';
    }


$result->free();
}
}