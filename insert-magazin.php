<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Inserare in Magazin</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<form class="form" action="" method="post">
    <h1 class="insert-magazin-title">Inserare in Magazin</h1>
    <input type="number" class="insert-magazin-input" name="ID_Magazin" placeholder="ID_Magazin">
    <input type="text" class="insert-magazin" name="Oras" placeholder="Oras" required />
    <input type="text" class="insert-magazin" name="Strada" placeholder="Strada" required />
    <input type="number" class="insert-magazin" name="Numar" placeholder="Numar" required />
    <input type="text" class="insert-magazin" name="Tip" placeholder="Tip" required />
    <br><br><input type="submit" name="submit" value="Inregistrare" class="insert-magazin-button">
    <p class='link'>Click <a href='dashboard.php'>aici</a> pentru a va intoarce la pagina de home</p>
</form>
<?php
    include 'config.php';
    if (isset($_REQUEST['ID_Magazin'])) {
        $ID_Magazin = stripslashes($_REQUEST['ID_Magazin']);
        $ID_Magazin = mysqli_real_escape_string($con, $ID_Magazin);
        $Oras    = stripslashes($_REQUEST['Oras']);
        $Oras    = mysqli_real_escape_string($con, $Oras);
        $Strada = stripslashes($_REQUEST['Strada']);
        $Strada = mysqli_real_escape_string($con, $Strada);
        $Numar = stripslashes($_REQUEST['Numar']);
        $Numar = mysqli_real_escape_string($con, $Numar);
        $Tip = stripslashes($_REQUEST['Tip']);
        $Tip = mysqli_real_escape_string($con, $Tip);
        $query    = "INSERT into `magazin` (ID_Magazin, Oras, Strada, Numar, Tip)
                     VALUES ('$ID_Magazin', '$Oras', '$Strada', '$Numar', '$Tip')";
        $result   = mysqli_query($con, $query);
        echo "<p align='center'> Inserare realizata cu succes! </p>";
    }
?>
<?php
    include 'config.php';
    $query = "SELECT * FROM Magazin";
    if($result = mysqli_query($con, $query)){
        if(mysqli_num_rows($result) > 0){
                echo "<center><table class='form'>";
                    echo "<tr>";
                        echo "<th>ID_Magazin</th>";
                        echo "<th>Oras</th>";
                        echo "<th>Strada</th>";
                        echo "<th>Numar</th>";
                        echo "<th>Tip</th>";
                    echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['ID_Magazin'] . "</td>";
                        echo "<td>" . $row['Oras'] . "</td>";
                        echo "<td>" . $row['Strada'] . "</td>";
                        echo "<td>" . $row['Numar'] . "</td>";
                        echo "<td>" . $row['Tip'] . "</td>";
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