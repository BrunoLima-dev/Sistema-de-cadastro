<?php
    SESSION_START();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
        exit;
    }


?>

SEJA BEM VINDOOOOOO!!!!!!
<a href="sair.php">Sair</a>