<?php
	session_start();
	include 'dbHolder.php';
	
				$sql = 'SELECT Humidity,COUNT(*) AS `Number` FROM es3 GROUP BY Humidity Order by (`Number`) DESC';
				$query = mysqli_query($connect, $sql);
				if (!$query) {
					die ('SQL Error: ' . mysqli_error($conn));
				}
				
				
				while($row = mysqli_fetch_array($query)){
					echo '<tr>
						<td>'.$row['Humidity'].'%</td>
						<td>'.$row['Number'].' time/s</td>
					</tr>';
				}
				
?>