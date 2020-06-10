<?php

session_start();

require 'databaseConnection.php';
if (!empty($_POST['username']) && !empty($_POST['password'])) :

   $records = $conn->prepare('SELECT * FROM user WHERE username = :username');
   $records->bindParam(':username', $_POST['username']);
   $records->execute();
   $results = $records->fetch(PDO::FETCH_ASSOC);

   $message = '';

   if (count($results) > 0 && password_verify($_POST['password'], $results['password']) && $results['admin'] == '1') {

      $_SESSION['user_id'] = $results['id'];
      header("Location: landingAdmin.html");
   } else if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {

      $_SESSION['user_id'] = $results['id'];
      header("Location: landing.html");
   } else {
      $message = 'Sorry, those credentials do not match!';
   }

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
         <form name="form" action="./login.php" method="post">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <p class="p">
            <input class="button" type="submit" value="Log in"/> or 
               <input class="button" type="submit" onclick="window.location.href = 'register.php';" value="Register" />
               <label>
                  <input type="checkbox" checked="checked" name="remember" style="text-align:center;"> Remember me
               </label>
               <?php if (!empty($message)) : ?>
                  <p><?= $message ?></p>
               <?php endif; ?>
            </p>
         </form>
      </div>
   </div>
</body>

</html>