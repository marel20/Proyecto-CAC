<?php
    //conectar al servidor

    $conectar=@mysqli_connect('localhost','root','','cac');
    // $conectar=@mysqli_connect('localhost','u497924916_mgsolutions','MGtenis1','u497924916_tenis');

    //verificamos si conecta
    if(!$conectar){
        echo"No se conecto";
    }

    

?>