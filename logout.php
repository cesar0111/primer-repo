<?php
    session_start();
    
    //destruyo la sesion
    session_destroy;
    
    //inicializo el array de $_SESSION
    $_SESSION = array();

    //redirecciono para terminar a la pag ppal
    header("Location: index.php");

?>