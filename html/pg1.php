<?php
// if(isset($_POST['submit']))
    // { 
        if(isset($_POST['firstname']))
        {
            $first=$_POST['firstname'];
            $last=$_POST['lastname'];
            $day=$_POST['birtday'];
            $gender=$_POST['gender'];
        
            addPersonalData($first,$last,$day,$gender);
            echo $result->rowCount() . " records UPDATED successfully for " . $username;
        }


function addPersonalData($first,$last,$day,$gender){
       
       $sql = "UPDATE 'user' SET 
            ' firstname' =$first,
            ' lastname'=$last,
            ' birthday'=$day, 
            ' gender'=$gender,
        WHERE username=$username";
                                
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // echo $stmt->rowCount() . " records UPDATED successfully";
     }
   
?>