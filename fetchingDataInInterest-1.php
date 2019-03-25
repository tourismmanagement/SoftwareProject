<?php

include 'DBconfig.php';

$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 

 if($con->connect_error) {
    echo "Error";
 } 
 
 $RoomType =  $_POST['Room_Fair'];
 $BedType = $_POST['Bed'];
 
 $District = $_POST['District'];
 $Division = $_POST['Division'];
 $MaximumBudget = $_POST['Maximum_Budget'];
 $MinimumBUdget = $_POST['Minimum_Budget'];
 
 $Sql_Query = "SELECT * FROM `Hotel_Details` WHERE `District` ='$District' AND `Division`= '$Division' AND (`Hotel_ID`)IN(SELECT Hotel_ID FROM `$RoomType` WHERE `$BedType`>'$MinimumBudget' 
               AND `$BedType`<='$MaximumBudget')"; 
 
 $result = mysqli_query($con,$Sql_Query);
 
 if($result->num_rows>0){
     while($row = $result->fetch_assoc()){
         echo "Hotel Name: " . $row['Hotel_Name'] . "<br>Address: ". $row['Local_address'] . "," . 
              $row['District'] . "," . $row['Division'] . "<br><br>";
     }
 }else {
    echo "0 results";
}

  mysqli_close($con);
?>