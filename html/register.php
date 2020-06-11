<?php  
  session_start();
  include 'databaseConnection.php';
  error_reporting(E_ERROR | E_WARNING | E_PARSE);

    $message = '';
    if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['passwordConf']))
    {
        $message = "Complete all the fields!";
    }

    if($_POST['password'] != $_POST['passwordConf'])
    {
      $message = "Passwords do not match!";
    }

    if(empty($message))
    {
      $dataBD = $conn->prepare("SELECT username from user WHERE username=:username");
      $dataBD -> bindParam(':username',  $_POST['username']);
      $dataBD -> execute();

      if ($dataBD->rowCount() > 0)
      {
        $message = "Username already exists , please choose another one!";
      }
      else
      {
        $sql = "INSERT INTO user (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $passwordConf = password_hash($_POST['passwordConf'], PASSWORD_BCRYPT);
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $_SESSION['username']= $_POST['username'];

        if(isset($_SESSION['username']))
        {
          header("Location: profile.php");
        }
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
        <div class="boxcontent">
           <form name="form" action="./register.php" method="POST">
					<label><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" required>
                    
                    <label><b>Email</b></label>
					<input type="text" placeholder="Enter Email" name="email" required> 

					<label><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="password" required> 
                        
          <label><b>Password</b></label>
					<input type="password" placeholder="Confirm Password" name="passwordConf" required> 
          <?php if (!empty($message)) : ?>
                  <p><?= $message ?></p>
               <?php endif; ?>
            <p style="text-align:center;">
                 <input class="button" type="submit" onclick="window.location.href = 'profile.php';" value="Create Account"/> 
            </p>
            </form>			
	   </div>
  </div>
</body>

</html>