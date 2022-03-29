<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Stergere din Angajati</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    include 'config.php';
    if (isset($_REQUEST['ID_Angajat'])) {
        $ID = stripslashes($_REQUEST['ID_Angajat']);
        $ID = mysqli_real_escape_string($con, $ID);
        $query = "DELETE FROM `angajati` WHERE ID_Angajat=$ID";
        $result = mysqli_query($con, $query);
        if($result){
            echo "<div class='form'>
                  <h3> Date sterse cu success! </h3>
                  <p class='link'>Click <a href='delete-angajati.php'>aici</a> pentru a sterge alte date</p>
                  <p class='link'>Click <a href='dashboard.php'>aici</a> pentru a va intoarce la pagina de home</p>
                  </div>";

        } else{
            echo "ERROR: Nu s-a putut executa $query. " . mysqli_error($con);
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="delete-angajati-title">Stergere din Magazin</h1>
        <input type="number" class="delete-angajati-input" name="ID_Angajat" placeholder="ID_Angajat" required />
        <br><br><input type="submit" name="submit" value="Sterge" class="delete-angajati-button">
        <p class='link'>Click <a href='dashboard.php'>aici</a> pentru a va intoarce la pagina de home</p>
    </form>
<?php
    }
?>
<?php
$query = "SELECT * FROM Angajati";
    if($result = mysqli_query($con, $query)){
        if(mysqli_num_rows($result) > 0){
                echo "<center><table class='form'>";
                    echo "<tr>";
                        echo "<th>ID_Angajat</th>";
                        echo "<th>ID_Magazin</th>";
                        echo "<th>Nume</th>";
                        echo "<th>Prenume</th>";
                        echo "<th>CNP</th>";
                        echo "<th>Strada</th>";
                        echo "<th>Numar</th>";
                    echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['ID_Angajat'] . "</td>";
                        echo "<td>" . $row['ID_Magazin'] . "</td>";
                        echo "<td>" . $row['Nume'] . "</td>";
                        echo "<td>" . $row['Prenume'] . "</td>";
                        echo "<td>" . $row['CNP'] . "</td>";
                        echo "<td>" . $row['Strada'] . "</td>";
                        echo "<td>" . $row['Numar'] . "</td>";
                    echo "</tr>";
                }
                echo "</table></center>";
                mysqli_free_result($result);
            } else {
                echo "Nu exista date in tabel!";
            }
        } else {
            echo "ERROR: Nu s-a putut executa $query. " . mysqli_error($con);
        }
?>
</body>
</html>