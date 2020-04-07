<?php
    # simple cerrar sesion
    session_start();
    session_unset();
    session_destroy(); // destruir sesion
    header('Location: login.php');
    ?>