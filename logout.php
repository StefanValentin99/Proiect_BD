<?php
    session_start();
    // Distrugerea sesiunii
    if(session_destroy()) {
        // Intoarcerea la pagina de login
        header("Location: login.php");
    }
?>