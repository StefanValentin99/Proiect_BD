<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Stergere din comenzi</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    include 'config.php';
    if (isset($_REQUEST['Nr_Comanda'])) {
        $ID = stripslashes($_REQUEST['Nr_Comanda']);
        $ID = mysqli_real_escape_string($con, $ID);
        $query = "DELETE FROM `comenzi` WHERE Nr_Comanda=$ID";
        $result = mysqli_query($con, $query);
        if($result){
            echo "<div class='form'>
                 <h3> Date sterse cu success! </h3>
                 <p class='link'>Click <a href='delete-comenzi.php'>aici</a> pentru a sterge alte date</p>
                 <p class='link'>Click <a href='dashboard.php'>aici</a> pentru a va intoarce la pagina de home</p>
                 </div>";

            } else{
                echo "ERROR: Nu s-a putut executa $query. " . mysqli_error($con);
            }
        } else {
?>
    <form class="form"  method="POST">
        <h1 class="delete-comenzi-title">Stergere din comenzi</h1>
        <input type="number" class="delete-comenzi-input" name="Nr_Comanda" placeholder="Nr_Comanda" required />
        <br><br><input type="submit" name="submit" class="delete-comenzi-button">
        <p class='link'>Click <a href='dashboard.php'>aici</a> pentru a va intoarce la pagina de home</p>
    </form>
<?php
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
                        echo "<th>Modalitate_plata</th>";
                        echo "<th>Stare_comanda</th>";
                        echo "<th>ID_Client</th>";
                    echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['Nr_Comanda'] . "</td>";
                        echo "<td>" . $row['Data'] . "</td>";
                        echo "<td>" . $row['Modalitate_plata'] . "</td>";
                        echo "<td>" . $row['Stare_comanda'] . "</td>";
                        echo "<td>" . $row['ID_Client'] . "</td>";
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