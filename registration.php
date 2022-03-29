<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Inregistare</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('config.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `admin` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Inregistrare salvata cu succes!</h3><br/>
                  <p class='link'>Click aici pentru a va <a href='login.php'>loga!</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Completati toate campurile!</h3><br/>
                  <p class='link'>Click <a href='registration.php'> aici </a> pentru a va inregistra din nou.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Inregistare</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress" required />
        <input type="password" class="login-input" name="password" placeholder="Password" required />
        <input type="submit" name="submit" value="Inregistrare" class="login-button">
        <p class="link">Aveti deja un cont? <a href="login.php">Login!</a></p>
    </form>
<?php
    }
?>
</body>
</html>