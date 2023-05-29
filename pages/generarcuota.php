<?php
session_start();
            
if($_SESSION['acceso']==1){
  include "../php/conectar.php";
    $sql2 = 'SELECT * FROM valores';
    $resultado2 = mysqli_query($conectar, $sql2);
    $fila=mysqli_fetch_assoc($resultado2);

    $cat1=$fila['cat1'];
    $cat4=$fila['cat4'];
    $cat5=$fila['cat5'];
    $cat6=$fila['cat6'];

    $cuota=0;
    $deporte=0;
    $fecha=date('Y-m-d');
    $total=0;

  $sql = 'SELECT * FROM socios';
  $resultado = mysqli_query($conectar, $sql);

  
 
  $contador=0;
      while($filas=mysqli_fetch_assoc($resultado)){
          $numero=$filas['numero'];
          $nombre=$filas['nombre'];
          $tenis=$filas['tenis'];
            $futbol=$filas['futbol'];
            $hockey=$filas['hockey'];
            $telas=$filas['telas'];
            $bochas=$filas['bochas'];
            $colonia=$filas['colonia'];
            $movimiento=0;
            $mov=0;
            $dep=0;
          

  
          $saldo=$filas['cuenta'];
          $categoria=$filas['categoria'];
          if($categoria == 1){
              $saldo=$saldo+$cat1;
              $cuota=$cuota+$cat1;
              $mov=$mov+$cat1;
          }
  
          if($categoria == 4){
              $saldo=$saldo+$cat4;
              $cuota=$cuota+$cat4;
              $mov=$mov+$cat4;
          }
  
          if($categoria == 5){
              $saldo=$saldo+$cat5;
              $cuota=$cuota+$cat5;
              $mov=$mov+$cat5;
          }
  
          if($categoria == 6){
              $saldo=$saldo+$cat6;
              $cuota=$cuota+$cat6; 
              $mov=$mov+$cat6;
          }

          $deporte=$deporte+$tenis+$telas+$hockey+$bochas+$colonia+$futbol;
          $dep=$deporte+$tenis+$telas+$hockey+$bochas+$colonia+$futbol;
         
        
    $contador=$contador+1;
    $total=$cuota+$deporte;
    $movimiento=$mov+$dep;

    $sql5 = "INSERT INTO asistencia (numero, futbol, hockey, telas, tenis, bochas, colonia) VALUES ('$numero', '$futbol', '$hockey', '$telas', '$tenis', '$bochas', '$colonia') ON DUPLICATE KEY UPDATE tenis = '$tenis', futbol='$futbol', telas='$telas', hockey='$hockey', colonia='$colonia', bochas='$bochas'";
    $ejecutar5 = mysqli_query($conectar, $sql5);
    
    
    $sql="UPDATE socios SET futbol=0, hockey=0, telas=0, tenis=0, bochas=0, colonia=0, cuenta='".$saldo."' where numero='".$numero."'";
    $cuotagenerada = mysqli_query($conectar, $sql);
    
    $sql4 = "INSERT INTO movimientos (fecha, numero, nombre, monto, accion) VALUES ('$fecha','$numero','$nombre','$movimiento','Cuota')";
    $ejecutar4=mysqli_query($conectar, $sql4);


    }
    $resultado = mysqli_query($conectar, $sql);
    if($resultado){
        $sql3 = "INSERT INTO facturacion (fecha, cuota, deportes, total) VALUES ('$fecha','$cuota','$deporte','$total')";
        $ejecutar3=mysqli_query($conectar, $sql3);
        echo '<script language="javascript"> alert ("Se Gemeraron '.$contador.' Cuotas"); window.location.href="listasocios.php" </script>';
    }else{
        echo '<script language="javascript"> alert ("Cambios NO Realizados"); window.location.href="listasocios.php" </script>';
    }
}else{
    header("location: ingreso.php");
  }

?>
    
    