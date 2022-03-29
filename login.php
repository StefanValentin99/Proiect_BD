<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('config.php');
    session_start();

    // Cand se trimite cererea, verifica si creeaza sesiunea pentru user-ul respectiv
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']); // sterge backslah-urile
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        // Verifica daca user-ul se afla in baza de date
        $query    = "SELECT * FROM `admin` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirectionarea catre site-ul principal (de dashboard)
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Username/parola incorecta.</h3><br/>
                  <p class='link'>Click aici pentru a va <a href='login.php'>loga</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link">Nu aveti cont inca? <a href="registration.php"> Click aici!</a></p>
  </form>
<?php
    }
?>
</body>
</html>