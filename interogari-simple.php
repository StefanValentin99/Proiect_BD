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
    <p>1. Sa se afiseze magazinele dupa ID care au angajati impreuna cu numarul acestora</p>
    <table>
        <tbody>
                <tr>
                    <td>Numar Angajati</td>
                    <td>Id_magazin</td>
                </tr> 
            <?php
            require('config.php'); 
            $query1 =   "SELECT count(A.ID_Angajat) as NrAngajati, M.ID_Magazin
                        FROM angajati A INNER JOIN magazin M ON A.ID_Magazin = M.ID_Magazin
                        GROUP BY M.ID_Magazin
                        ORDER BY count(A.ID_Angajat) DESC";   
            $result1 = $con->query($query1);

            while ($row = $result1->fetch_assoc()) {
            ?>    
                <tr>
                    <td><?php echo $row['NrAngajati']?></td>
                    <td><?php echo $row['ID_Magazin']?></td>
                </tr>
            <?php   
            }
            ?>
        </tbody>
    </table > 
    <br>

    <p>2. Sa se afiseze datile cand au fost facute comenzi de catre persoane juridice impreuna cu numele si prenumele acestora</p>
    <table>
        <tbody>
                <tr>
                    <td>Data</td>
                    <td>Nume</td>
                    <td>Prenume</td>
                </tr> 
            <?php
            require('config.php'); 
            $query2 =   "SELECT comenzi.Data,clienti.Nume,clienti.Prenume FROM clienti
                         INNER JOIN comenzi ON clienti.ID_Client=comenzi.ID_Client
                         WHERE clienti.Tip_persoana='Juridica'";   
            $result2 = $con->query($query2);

            while ($row = $result2->fetch_assoc()) {
            ?>    
                <tr>
                    <td><?php echo $row['Data']?></td>
                    <td><?php echo $row['Nume']?></td>
                    <td><?php echo $row['Prenume']?></td>
                </tr>
            <?php   
            }
            ?>
        </tbody>
    </table > 
    <br>
    
    <p>3. Sa se afiseze toti furnizorii dupa id si numarul facturii care au livrat comenzi si ai caror nume au in componenta "app". Se va afisa si numele acestora </p>
    <table>
        <tbody>
                <tr>
                    <td>ID_Furnizor</td>
                    <td>Nr_Factura</td>
                    <td>Nume</td>
                </tr> 
            <?php
            require('config.php'); 
            $query3 =   "SELECT factura.ID_Furnizor,factura.Nr_Factura,furnizor.Nume
                        FROM factura INNER JOIN furnizor ON furnizor.ID_Furnizor=factura.ID_Furnizor 
                        WHERE furnizor.Nume LIKE '%app%'";   
            $result3 = $con->query($query3);

            while ($row = $result3->fetch_assoc()) {
            ?>    
                <tr>
                    <td><?php echo $row['ID_Furnizor']?></td>
                    <td><?php echo $row['Nr_Factura']?></td>
                    <td><?php echo $row['Nume']?></td>
                </tr>
            <?php   
            }
            ?>
        </tbody>
    </table > 
    <br>
    
    <p>4. Sa se afiseze produsele care provin de la furnizorii din Bucuresti</p>
    <table>
        <tbody>
                <tr>
                    <td>Denumire_produs</td>
                </tr> 
            <?php
            require('config.php'); 
            $query4 =   "SELECT p.Denumire FROM produs p 
                        INNER JOIN factura f ON f.Nr_Factura=p.Nr_Factura 
                        INNER JOIN furnizor F1 ON f.ID_Furnizor=F1.ID_Furnizor 
                        WHERE F1.judet='Bucuresti'";   
            $result4 = $con->query($query4);

            while ($row = $result4->fetch_assoc()) {
            ?>    
                <tr>
                    <td><?php echo $row['Denumire']?></td>
                </tr>
            <?php   
            }
            ?>
        </tbody>
    </table > 
    <br> 

    <p>5. Sa se afiseze denumirea si tipul pentru toate produsele care apar pe comenzi ce au statusul "finalizata"</p>
    <table>
        <tbody>
                <tr>
                    <td>Denumire</td>
                    <td>Tip_produs</td>
                </tr> 
            <?php
            require('config.php'); 
            $query5 =   "SELECT p.Denumire, p.Tip_produs 
                        FROM produs p INNER JOIN comenzi c ON p.Nr_comanda=c.Nr_Comanda 
                        WHERE stare_comanda='finalizata'";   
            $result5 = $con->query($query5);

            while ($row = $result5->fetch_assoc()) {
            ?>    
                <tr>
                    <td><?php echo $row['Denumire']?></td>
                    <td><?php echo $row['Tip_produs']?></td>
                </tr>
            <?php   
            }
            ?>
        </tbody>
    </table > 
    <br>
    
    <p>6. Sa se afiseze numele si prenumele angajatilor care au salariul mai mare sau egal de 1000 ron si care lucreaza la magazinul cu ID-ul 
15</p>
    <table>
        <tbody>
                <tr>
                    <td>Nume</td>
                    <td>Prenume</td>
                </tr> 
            <?php
            require('config.php'); 
            $query6 =   "SELECT A.Nume, A.Prenume 
                        FROM angajati A, Magazin M
                        WHERE A.ID_Magazin = M.ID_Magazin and A.Salariu > 1000 and M.ID_Magazin = 15
                        GROUP BY A.Nume, A.Prenume";   
            $result6 = $con->query($query6);

            while ($row = $result6->fetch_assoc()) {
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
    <p class='link'>Click <a href='dashboard.php'>aici</a> pentru a va intoarce la pagina de home</p>  
</body>
</html>