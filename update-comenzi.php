<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Update in Comenzi</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<form class="form"  method="POST">
        <h1 class="update-comenzi-title">Update in Comenzi</h1>
        <input type="number" class="update-comenzi-input" name="Nr_Comanda" placeholder="Nr_Comanda" required />
        <input type="text" class="update-comenzi" name="Stare_comanda" placeholder="Stare_comanda">
        <br><br><input type="submit" name="submit" class="update-comenzi-button">
        <p class='link'>Click <a href='dashboard.php'>aici</a> pentru a va intoarce la pagina de home</p>
</form>

<?php
include "config.php";

if(isset($_POST['submit'])){
    $Stare_comanda=$_POST['Stare_comanda'];
    $Nr_Comanda=$_POST['Nr_Comanda'];
  
    $sql =" UPDATE `comenzi` SET Stare_comanda='$Stare_comanda' WHERE Nr_Comanda= '$Nr_Comanda'";
    $result = mysqli_query($con, $sql);
    echo "<p align='center'> Updatare realizata cu succes! </p>";
}

?>
<?php
    include 'config.php';
    $query = "SELECT * FROM comenzi";
    if($result = mysqli_query($con, $query)){
        if(mysqli_num_rows($result) > 0){
                echo "<center><table class='form'>";
                    echo "<tr>";
                        echo "<th>Nr_Comanda</th>";
                        echo "<th>Data</th>";
                        echo "<th>Stare_comanda</th>";
                    echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['Nr_Comanda'] . "</td>";
                        echo "<td>" . $row['Data'] . "</td>";
                        echo "<td>" . $row['Stare_comanda'] . "</td>";
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