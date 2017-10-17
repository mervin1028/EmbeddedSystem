<?php
	session_start();
	include 'dbHolder.php';
	
				$sql = 'SELECT * FROM es3 Order By Date_Time DESC';
				$query = mysqli_query($connect, $sql);
				if (!$query) {
					die ('SQL Error: ' . mysqli_error($conn));
				}
				
				
				while($row = mysqli_fetch_array($query)){
					echo '<tr>
						<td>'.$row['Humidity'].'%</td>
						<td>'.$row['Temperature'].'C</td>
						<td>'.$row['Heat_Index'].'C</td>
						<td>'.$row['Date_Time'].'</td>
					</tr>';
				}
				
?>