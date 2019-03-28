<?php

    session_start();

    if(isset($_SESSION["login"]) && $_SESSION["login"] === true)
    {
        //accedo al contenido privado
        echo "contenido privado!<br>";
        echo "<a href='logout.php'>Logout</a>";
    }
    else
    {
        header("Location: index.php");
    }


?>