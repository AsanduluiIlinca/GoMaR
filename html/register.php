<?php  
  session_start();
  include 'databaseConnection.php';

  $message = '';

  if(!empty($_POST['username']) && !empty($_POST['password'])):
    header("Location: profile.html");
    // Enter the new user in the database
    $sql = "INSERT INTO user (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $conn->prepare($sql);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', $password);

    // if( $stmt->execute() ):
    //   $message = 'Successfully created new user';
    // else:
    //   $message = 'Sorry there must have been an issue creating your account';
    // endif;

  endif;
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
        <div class="boxcontent">
        <!-- <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?> -->

           <form name="form" action="./register.php" method="POST">
					<label><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" required>
                    
                    <label><b>Email</b></label>
					<input type="text" placeholder="Enter Email" name="email" required> 

					<label><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="password" required> 
                        
                    <label><b>Password</b></label>
					<input type="password" placeholder="Confirm Password" name="password" required> 
						
            <p style="text-align:center;">
                 <input class="button" type="submit" onclick="window.location.href = 'profile.html';" value="Create Account"/> 
            </p>
            </form>			
	   </div>
  </div>
</body>

</html>