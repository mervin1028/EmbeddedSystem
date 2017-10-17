<?php

include 'dbHolder.php';
// Check connection
if (mysqli_connect_errno($connect))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else
{
    $data_points = array();
    $data_points2 = array();
	$data_points3 = array();
	
    $result = mysqli_query($connect, "SELECT * FROM es3");
    
    while($row = mysqli_fetch_array($result))
    {        
        $point = array("label" => $row['Date_Time'] , "y" => $row['Humidity']);
        
        array_push($data_points, $point);
    }
	
	$result = mysqli_query($connect, "SELECT * FROM es3");
    
    while($row = mysqli_fetch_array($result))
    {        
        $point2 = array("label" => $row['Date_Time'] , "y" => $row['Temperature']);
        
        array_push($data_points2, $point2);
    }
	array_push($data_points3, $data_points);
	array_push($data_points3, $data_points2);
	
    
    echo json_encode($data_points3, JSON_NUMERIC_CHECK);
	
//	echo json_encode($data_points2, JSON_NUMERIC_CHECK);
	
}
mysqli_close($connect);

?>