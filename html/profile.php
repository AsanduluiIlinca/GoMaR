 <?php  
    session_start();
    include 'databaseConnection.php';
    
    $username = $_SESSION['username'];

    // echo '<pre>'; print_r($username); echo '</pre>';
    // echo '<pre>'; print_r($_POST); echo '</pre>';
    if(isset($_POST['submit_1']))
    {
        try
        {
            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $birthday=$_POST['birthday'];
            $gender=$_POST['gender'];

            $sql = "UPDATE user SET firstname =:firstname, lastname=:lastname, birthday=:birthday, gender=:gender WHERE username=:username";

            $stmt = $conn->prepare($sql);
            $stmt_exec= $stmt->execute(array(":firstname"=>$firstname, ":lastname"=>$lastname, ":birthday"=>$birthday, "gender"=>$gender, ":username"=>$username));
            echo $stmt->rowCount() . " records UPDATED successfully personalData";
            if($stmt_exec)
            {
                echo '<script>("Data updated")</script>';
                header("Location: profile.php#slider-2");
            }
            else 
            {
                echo '<script>("Data not updated")</script>';
            }
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
    }

    if(isset($_POST['submit_2']))
    {
        try
        {
            $social_status=$_POST['social_status'];
            $employed=$_POST['employed'];
            $working_place=$_POST['working_place'];
            $job=$_POST['job'];

            $sql = "UPDATE user SET social_status =:social_status, employed=:employed, working_place=:working_place, job=:job WHERE username=:username";

            $stmt = $conn->prepare($sql);
            $stmt_exec= $stmt->execute(array(":social_status"=>$social_status, ":employed"=>$employed, ":working_place"=>$working_place, "job"=>$job, ":username"=>$username));
            echo $stmt->rowCount() . " records UPDATED successfully social data";
            if($stmt_exec)
            {
                echo '<script>("Data updated")</script>';
                header("Location: profile.php#slider-3");
            }
            else 
            {
                echo '<script>("Data not updated")</script>';
            }
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
        
    }

    if(isset($_POST['submit_3']))
    {
        try
        {
            $country=$_POST['country'];
            $town=$_POST['town'];
            $ethnicity=$_POST['workinethnicityg_place'];
            $languages=$_POST['languages'];

            $sql = "UPDATE user SET country =:country, town=:town, ethnicity=:ethnicity, languages=:languages WHERE username=:username";

            $stmt = $conn->prepare($sql);
            $stmt_exec= $stmt->execute(array(":country"=>$country, ":town"=>$town, ":ethnicity"=>$ethnicity, "languages"=>$languages, ":username"=>$username));
            echo $stmt->rowCount() . " records UPDATED successfully regional data";
            if($stmt_exec)
            {
                echo '<script>("Data updated")</script>';
                header("Location: landing.html");
            }
            else 
            {
                echo '<script>("Data not updated")</script>';
            }
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
        
    }

?> 

<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title>GoMaR</title>
    <link rel="stylesheet" href="../css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
</head>
<body>
    <div class="navbar">
        <div class="container">
            <img alt="GoMar Logo" src="../resources/logo.svg" class="logo">
        </div>
    </div>
    <div class="central-container scrollable">
        
        <div id="slider-1" class="slide">
            <div class="boxcontent">
                <form name="form1" action="" method="POST">

                        <label><b>First Name</b></label>
                        <input type="text" placeholder="Enter first name" name="firstname"  required>
                        
                        <label><b>Last Name</b></label>
                        <input type="text" placeholder="Enter last name" name="lastname"  required> 

                        <label><b>Birthday</b></label>
                        <input type="date" name="birthday" >
                            
                        <label><b>Gender</b></label>
                        <select type="text" name="gender" >
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>

                        <input class="button" id="next" type="submit" name="submit_1" onclick="window.location.href ='#slider-2';" value="Next">

                </form>		
               
            </div>
        </div>
            
        <div id="slider-2" class="slide">
            <div class="boxcontent">
            
                <form name="form2" action="" method="POST">
                        <label><b>Social status</b></label>
                        <input type="text" placeholder=" Enter status" name="social_status" required>
                        
                        <label><b>Employee</b></label>
                        <select name="employed">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>

                        <label><b>Working place</b></label>
                        <input type="text" placeholder=" Enter working place" name="working_place" required> 
                            
                        <label><b>Job</b></label>
                        <input type="text" placeholder="Enter job" name="job" required> 
                    
                        <input class="button" id="prev" type="submit" name="submit_1" onclick="window.location.href ='#slider-1';" value="Back">
                        <input class="button" id="next" type="submit" name="submit_2" onclick="window.location.href ='#slider-3';" value="Next">	
                </form>		
                
            </div>
        </div>
            
        <div id="slider-3" class="slide">
            <div class="boxcontent">
                <form name="form3" action="" method="POST">
                        <label><b>Country</b></label>
                        <input type="text" placeholder="Country name" name="country" required>
                        
                        <label><b>Town</b></label>
                        <input type="text" placeholder="Town" name="town" required> 

                        <label><b>Ethnicity</b></label>
                        <input type="test" placeholder="Ethnicity" name="ethnicity" required> 
                            
                        <label><b>Languages</b></label>
                        <input type="test" placeholder="Language" name="languages" required> 

                        <input class="button" id="prev" type="submit" name="submit_2" onclick="window.location.href ='#slider-2';" value="Back">
                        <input class="button" id="next" type="submit" name="submit_3"onclick="window.location.href ='landing.html';" value="Next">		
            
                </form>	
                </div>
        </div>

    </div>
</body>

</html>