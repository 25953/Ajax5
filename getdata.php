<?php
include "dbVars.php"; 

$resultArray = array(); 
$search = $_GET['q'];
$type = $_GET['type'];
$con = mysqli_connect($servername,$uid,$pwd,$database); 
if (!$con){die('Could not connect:' . mysqli_error($con));}
mysqli_select_db($con,"world");
$sql = "SELECT * FROM country WHERE name LIKE '$search%' ";
if ($type == "list"){
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        $resultArray[]=$row['Name'];
    }
    echo json_encode($resultArray);
}
//Author: Kevin Kranenburg
if ($type == "answer"){
$result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        echo "<table>";

        echo "<td>Code</td>";
        echo "<td>Name</td>";
        echo "<td>Continent</td>";
        echo "<td>Region</td>";
        echo "<td>Surface Area</td>";
        echo "<td>Indep Year</td>";
        echo "<td>Population</td>";
        echo "<td>Life Expectancy</td>";
        echo "<td>GNP</td>";
        echo "<td>GNP Old</td>";
        echo "<td>Local Name</td>";
        echo "<td>Government Form</td>";
        echo "<td>Head Of State</td>";
        echo "<td>Capital</td>";
        echo "<tr>";
        echo "<td>" . $row['Code'] . "</td>";
        echo "<td>". $row['Name'] . "</td>";
        echo "<td>". $row['Continent'] . "</td>";
        echo "<td>". $row['Region'] . "</td>";
        echo "<td>". $row['SurfaceArea'] . "</td>";
        echo "<td>". $row['IndepYear'] . "</td>";
        echo "<td>". $row['Population'] . "</td>";
        echo "<td>". $row['LifeExpectancy'] . "</td>";
        echo "<td>". $row['GNP'] . "</td>";
        echo "<td>". $row['GNPOld'] . "</td>";
        echo "<td>". $row['LocalName'] . "</td>";
        echo "<td>". $row['GovernmentForm'] . "</td>";
        echo "<td>". $row['HeadOfState'] . "</td>";
        echo "<td>". $row['Capital'] . "</td>";

        echo "</tr> </table>";
    }
    }
mysqli_close($con);
?>
