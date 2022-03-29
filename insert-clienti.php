<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Inserare in Clienti</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<form class="form" action="" method="post">
    <h1 class="insert-clienti-title">Inserare in Clienti</h1>
    <input type="number" class="insert-clienti-input" name="ID_Client" placeholder="ID_Client">
    <input type="text" class="insert-clienti" name="Nume" placeholder="Nume" required />
    <input type="text" class="insert-clienti" name="Prenume" placeholder="Prenume" required />
    <input type="text" class="insert-clienti" name="Tip_persoana" placeholder="Tip_persoana" required />
    <input type="text" class="insert-clienti" name="Firma" placeholder="Firma">
    <input type="text" class="insert-clienti" name="Telefon" placeholder="Telefon" required />
    <input type="text" class="insert-clienti" name="Card_credit" placeholder="Card_credit">
    <input type="text" class="insert-clienti" name="Strada" placeholder="Strada" required />
    <input type="number" class="insert-clienti" name="Numar" placeholder="Numar" required />
    <br><br><input type="submit" name="submit" value="Inregistrare" class="insert-clienti-button">
    <p class='link'>Click <a href='dashboard.php'>aici</a> pentru a va intoarce la pagina de home</p>
</form>
<?php
    include 'config.php';
    if (isset($_REQUEST['ID_Client'])) {
        $ID_Client = stripslashes($_REQUEST['ID_Client']);
        $ID_Client = mysqli_real_escape_string($con, $ID_Client);
        $Nume    = stripslashes($_REQUEST['Nume']);
        $Nume    = mysqli_real_escape_string($con, $Nume);
        $Prenume = stripslashes($_REQUEST['Prenume']);
        $Prenume = mysqli_real_escape_string($con, $Prenume);
        $Tip_persoana = stripslashes($_REQUEST['Tip_persoana']);
        $Tip_persoana = mysqli_real_escape_string($con, $Tip_persoana);
        $Firma = stripslashes($_REQUEST['Firma']);
        $Firma = mysqli_real_escape_string($con, $Firma);
        $Telefon = stripslashes($_REQUEST['Telefon']);
        $Telefon = mysqli_real_escape_string($con, $Telefon);
        $Card_credit = stripslashes($_REQUEST['Card_credit']);
        $Card_credit = mysqli_real_escape_string($con, $Card_credit);
        $Strada = stripslashes($_REQUEST['Strada']);
        $Strada = mysqli_real_escape_string($con, $Strada);
        $Numar = stripslashes($_REQUEST['Numar']);
        $Numar = mysqli_real_escape_string($con, $Numar);
        $query    = "INSERT into `clienti` (ID_Client, Nume, Prenume, Tip_persoana, Firma, Telefon, Card_credit, Strada, Numar)
                     VALUES ('$ID_Client', '$Nume', '$Prenume', '$Tip_persoana', '$Firma', '$Telefon', '$Card_credit', '$Strada', '$Numar')";
        $result   = mysqli_query($con, $query);
        echo "<p align='center'> Inserare realizata cu succes! </p>";
    }
?>
<?php
    $query = "SELECT * FROM clienti";
    if($result = mysqli_query($con, $query)){
        if(mysqli_num_rows($result) > 0){
                echo "<center><table class='form'>";
                    echo "<tr>";
                        echo "<th>ID_Client</th>";
                        echo "<th>Nume</th>";
                        echo "<th>Prenume</th>";
                        echo "<th>Tip_persoana</th>";
                        echo "<th>Firma</th>";
                        echo "<th>Telefon</th>";
                        echo "<th>Card_credit</th>";
                        echo "<th>Strada</th>";
                        echo "<th>Numar</th>";
                    echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['ID_Client'] . "</td>";
                        echo "<td>" . $row['Nume'] . "</td>";
                        echo "<td>" . $row['Prenume'] . "</td>";
                        echo "<td>" . $row['Tip_persoana'] . "</td>";
                        echo "<td>" . $row['Firma'] . "</td>";
                        echo "<td>" . $row['Telefon'] . "</td>";
                        echo "<td>" . $row['Card_credit'] . "</td>";
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