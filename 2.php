<?php

            mysql_connect("localhost", "root", "") or die(mysql_error()); // Connect to database server(localhost) with UserID and PIN.
            mysql_select_db("nitcq") or die(mysql_error()); // Select registration database.

            if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['PIN']) && !empty($_POST['PIN'])){
                $UserID = mysql_escape_string($_POST['name']);
                $PIN = mysql_escape_string(md5($_POST['PIN']));

                $search = mysql_query("SELECT Roll_no, PIN, active FROM users WHERE UserID='".$UserID."' AND PIN='".$PIN."' AND active='1'") or die(mysql_error()); 
                $match  = mysql_num_rows($search);

                if($match > 0){
                    $msg = 'Login Complete! Thanks';
                }else{
                    $msg = 'Login Failed!<br /> Please make sure that you enter the correct details and that you have activated your account.';
                }
            }


?>