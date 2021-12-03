<?php

if(isset($_POST['Submit']))
{
// Connect to the database
		$dbLink = new mysqli('localhost', 'root', '', 'Nitcq');
		if(mysqli_connect_errno()) {
		die("MySQL connection failed: ". mysqli_connect_error());
		}
		$Branch=$_POST['Branch'];
		$Year=$_POST['Year'];
		$Subject=$_POST['Subject'];
		// Query for all Question papers that satisfy the given condition
		$sql = "SELECT `Qp_no`, `Qp_name`, `Branch`, `Year`, `Subject` FROM `Question_paper` WHERE '$Branch'=`Branch` AND '$Year'= `Year` AND '$Subject' = `Subject`";
		$result = $dbLink->query($sql);
		 
		
		    if($result) {
			
					if($result->num_rows == 0)
					{
						echo '<p>There are no files in the database</p>';
					}
					else
					 {
						// Print the column heading of the table
						echo '<table width="100%">
							<tr>
								<td><b>Qp_no</b></td>
								<td><b>Qp_name</b></td>
								<td><b>Branch</b></td> 
								<td><b>Year</b></td>
								<td><b>Subject</b></td>
								<td><b>&nbsp;</b></td>
							</tr>';
					
						// Print each file
						while($row = $result->fetch_assoc()) 
						{
							echo "
								<tr>
									<td>{$row['Qp_no']}</td>
									<td>{$row['Qp_name']}</td>
									<td>{$row['Branch']}</td>
									<td>{$row['Year']}</td>
									<td>{$row['Subject']}</td>
									<td><a href='get_file.php?Qp_no={$row['Qp_no']}'>Download</a></td>
								</tr>";
						}
					
						// Close table
						echo '</table>';
					}
					
					// Free the result
					$result->free();
		    }
		    else
		    {
			echo 'Error! SQL query failed:';
			echo "<pre>{$dbLink->error}</pre>";
		    }



		    // Close the mysql connection
		    $dbLink->close();
}
    
    ?>
