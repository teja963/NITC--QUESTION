<?php
 $host='localhost';
 $user='root';
 $pass='';
 $db='nitcq';
 
 $mysqli= new mysqli($host,$user,$pass,$db);
        if(isset($_POST['Submit'])){
            $Course_ID = $_POST['Course_ID'];
            $Course_name = $_POST['Course_name'];
            $Faculty_name = $_POST['Faculty_name'];
        
        $query = "SELECT * FROM `Elective_info` WHERE `Course_id` ='$Course_ID'";
            if($result = $mysqli->query($query)){
                    if ($row = $result->fetch_assoc()) {

                            $Course_ID = $row["Course_id"];
                            $Course_name = $row["course_name"];
                            $Faculty_name = $row["faculty"];
                            $elective_info = $row["elective_info"];

                echo $Course_ID.'<br />';
                echo $Course_name.'<br />';
                echo $Faculty_name.'<br />';
                echo $elective_info.'<br />';
                }
            }
        }
?>