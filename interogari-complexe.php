<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Interogari simple</title>
   
    <style>

table {
  border-collapse: collapse;
  width: 25%;
}

th, td {
  text-align: left;
  padding: 1 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}

</style>
</head>
<body>
    <p>1. Afisati id-ul produselor din depozite al caror pret unitar este mai mare decat 5000</p>
    <table>
        <tbody>
                <tr>
                    <td>ID_Produs</td>
                </tr> 
            <?php
            require('config.php'); 
            $query =   "SELECT * FROM produs, depozit
                        WHERE produs.ID_Produs = depozit.ID_Produs 
                        AND produs.Pret_unitar IN (SELECT pret_unitar FROM produs
                                                 WHERE pret_unitar >= '5000')";   
            $result = $con->query($query);

            while ($row = $result->fetch_assoc()) {
            ?>    
                <tr>
                    <td><?php echo $row['ID_Produs']?></td>
                </tr>
            <?php   
            }
            ?>
        </tbody>
    </table > 
    <br>

    <p>2. Afisati date despre persoanele a caror prenume incepe cu 's' si sunt angajati</p>
    <table>
        <tbody>
                <tr>
                    <td>Nume</td>
                    <td>Prenume</td>
                </tr> 
            <?php
            require('config.php'); 
            $query =   "SELECT angajati.Nume, angajati.Prenume FROM magazin, angajati
                        WHERE magazin.ID_Magazin=angajati.ID_Magazin
                        AND angajati.Prenume IN (SELECT Prenume FROM angajati
                                            WHERE Prenume LIKE 's%')";   
            $result = $con->query($query);

            while ($row = $result->fetch_assoc()) {
            ?>    
                <tr>
                    <td><?php echo $row['Nume']?></td>
                    <td><?php echo $row['Prenume']?></td>
                </tr>
            <?php   
            }
            ?>
        </tbody>
    </table > 
    <br>

    <p>3. Afisati numele si prenumele clientilor care au comenzi finalizate</p>
    <table>
        <tbody>
                <tr>
                    <td>Nume</td>
                    <td>Prenume</td>
                </tr> 
            <?php
            require('config.php'); 
            $query =   "SELECT clienti.Nume, clienti.Prenume FROM clienti, comenzi, produs
                        WHERE clienti.ID_Client=comenzi.ID_Client 
                        AND comenzi.Nr_Comanda=produs.Nr_Comanda 
                        AND comenzi.Stare_comanda IN (SELECT stare_comanda FROM comenzi 
                                                    WHERE stare_comanda='finalizata');";   
            $result = $con->query($query);

            while ($row = $result->fetch_assoc()) {
            ?>    
                <tr>
                    <td><?php echo $row['Nume']?></td>
                    <td><?php echo $row['Prenume']?></td>
                </tr>
            <?php   
            }
            ?>
        </tbody>
    </table > 
    <br>

    
    <p>4. Afisati numele angajatilor care au primit marfa de la depozitul de pe strada "Parului"</p>
    <table>
        <tbody>
                <tr>
                    <td>Nume</td>
                </tr> 
            <?php
            require('config.php'); 
            $query =   "SELECT angajati.Nume FROM angajati, magazin, depozit
                        WHERE angajati.ID_Magazin=magazin.ID_Magazin
                        AND magazin.ID_Magazin=depozit.ID_Magazin
                        AND depozit.Strada IN (SELECT depozit.Strada FROM depozit
                                                WHERE Strada='Parului')";   
            $result = $con->query($query);

            while ($row = $result->fetch_assoc()) {
            ?>    
                <tr>
                    <td><?php echo $row['Nume']?></td>
                </tr>
            <?php   
            }
            ?>
        </tbody>
    </table >

    <p class='link'>Click <a href='dashboard.php'>aici</a> pentru a va intoarce la pagina de home</p> 
</body>
</html>

