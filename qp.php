<?php
 $host='localhost';
 $user='root';
 $pass='';
 $db='test_db';
 
 $mysqli= new mysqli($host,$user,$pass,$db);

$query = "SELECT * FROM `Elective_info` WHERE ";
echo "<b> <center>Database Output</center> </b> <br> <br>";

if ($result = $mysqli->query($query)) {

    while ($row = $result->fetch_assoc()) {
        $field1name = $row["id"];
        $field2name = $row["name"];
        $field3name = $row["mime"];
        $field4name = $row["data"];

        echo $field1name.'<br />';
        echo $field2name.'<br />';
        echo $field3name.'<br />';
        echo $field4name.'<br />';
    }

/freeresultset/
$result->free();
}