<?php

include 'dbHolder.php';
// Check connection
if (mysqli_connect_errno($connect))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else
{
    $data_points = array();
	
    $result = mysqli_query($connect, "SELECT Humidity,COUNT(*) AS `Number` FROM es3 GROUP BY Humidity Order by (`Number`) DESC");
    
    while($row = mysqli_fetch_array($result))
    {        
        $point = array("label" => $row['Humidity'] , "y" => $row['Number']);
        
        array_push($data_points, $point);
    }
    
    echo json_encode($data_points, JSON_NUMERIC_CHECK);
//	echo json_encode($data_points2, JSON_NUMERIC_CHECK);
	
}
mysqli_close($connect);

?>