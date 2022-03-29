<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Update in Clienti</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<form class="form"  method="POST">
        <h1 class="update-clienti-title">Update in Clienti</h1>
        <input type="number" class="update-clienti-input" name="id_client" placeholder="ID_Client" required />
        <input type="text" class="update-clienti" name="Nume" placeholder="Nume">
        <input type="text" class="update-clienti" name="Prenume" placeholder="Prenume">
        <br><br><input type="submit" name="submit" class="update-clienti-button">
        <p class='link'>Click <a href='dashboard.php'>aici</a> pentru a va intoarce la pagina de home</p>
</form>

<?php
include "config.php";

if(isset($_POST['submit'])){
    $nume=$_POST['Nume'];
    $prenume=$_POST['Prenume'];
    $id_client=$_POST['id_client'];
  

    $sql =" UPDATE clienti SET Nume='$nume', Prenume='$prenume' WHERE ID_Client= '$id_client'";
    $result = mysqli_query($con, $sql);
    echo "<p align='center'> Updatare realizata cu succes! </p>";
}

?>
<?php
   include 'config.php';
    $query = "SELECT * FROM clienti";
    if($result = mysqli_query($con, $query)){
        if(mysqli_num_rows($result) > 0){
                echo "<center><table class='form'>";
                    echo "<tr>";
                        echo "<th>ID_Client</th>";
                        echo "<th>Nume</th>";
                        echo "<th>Prenume</th>";
                    echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['ID_Client'] . "</td>";
                        echo "<td>" . $row['Nume'] . "</td>";
                        echo "<td>" . $row['Prenume'] . "</td>";
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