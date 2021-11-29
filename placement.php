<?php
 $host='localhost';
 $user='root';
 $pass='';
 $db='my_data';
 
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