<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Baza de date a Flanco</title>
    <link rel="stylesheet" href="style.css" />
    <style> p 
    {
        text-align: center;
        font-size: 25px;
        font-weight: 300;
    }
    </style>
</head>
<body>
    <div class="form">
        <p><a href="insert-magazin.php">INSERT Magazin</a></p>
        <p><a href="insert-clienti.php">INSERT Clienti</a></p>
        <p><a href="delete-angajati.php">DELETE Angajati</a></p>
        <p><a href="delete-comenzi.php">DELETE Comenzi</a></p>
        <p><a href="update-clienti.php">UPDATE Clienti</a></p>
        <p><a href="update-comenzi.php">UPDATE Comenzi</a></p>
        <p><a href="interogari-simple.php">Interogari simple</a></p>
        <p><a href="interogari-complexe.php">Interogari complexe</a></p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>  
