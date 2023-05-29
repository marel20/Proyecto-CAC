<?php
session_start();
            
if($_SESSION['acceso']==1){
  include "../php/conectar.php";
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0"
    />
    <link rel="icon" href="../assets/logo/logo.png" type="logo" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/medias.css" />
    <link rel="stylesheet" type="text/css" href="../css/timeline.css" />
    <link rel="stylesheet" type="text/css" href="../css/aos.css" />
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <title>Pagos</title>
  </head>
  <body>
    <header>
      <div class="container-navbar" style="margin: 1% auto;">
        <div>
          <a class="nav-button2 backButton" href="pago.php"
            ><i class="fas fa-arrow-left"></i><p>Atras</p></a>
        </div>
  
        <nav id="nav">
          <ul class="nav-list">
            <li class="nav-link"><a href="nuevosocio.php">Cargar Socio</a></li>
            <li class="nav-link">
              <a href="listasocios.php">Listado de Socios</a>
            </li>
            <li class="nav-link">
              <a href="profe1.php">Asistencias</a>
            </li>
            <li class="nav-link">
              <a href="baja.php">Editar / Eliminar</a>
            </li>
            <li class="nav-link">
              <a href="pago.php">Pago</a>
            </li>
            <li class="nav-link">
              <a href="valores.php">Valores</a>
            </li>
            <li class="nav-link">
              <a href="movimientos.php">Movimientos</a>
            </li>
            <li class="nav-link">
              <a href="balance.php">Balance</a>
            </li>
          </ul>
          <!-- <a class="nav-button" href="pages/ingreso.html">Ingresar</a> -->
          <a class="nav-button" href="../index.php">Salir</a>
        </nav>
  
        <div class="nav-toggle">|||</div>
      </div>
    </header>

    <main>
      <div>
        <?php $nombre=$_POST['nombre'];?>
         <h1><?php echo $nombre;?></h1>
      </div>


        <?php
            $fecha1=date('Y-m-d');
            $fecha = date('Y-m'); // formato de fecha de MySQL
            $mes_anio = date("Y-m", strtotime($fecha));
            $sql4 = 'SELECT * FROM ingresos';
            $ejecutar4 = mysqli_query($conectar, $sql4);
    
            $dep=0;

            while($filas=mysqli_fetch_assoc($ejecutar4)){
              $mes=$filas['mes'];
              
                if($mes==$mes_anio){
                  $cuo=$filas['cuota'];
                  $depor=$filas['deporte'];
                  $tot=$filas['total'];
    
                }else{
                  $cuo=0;
                  $depor=0;
                  $tot=0;
    
                }
            }
           
            if(isset($_POST['enviar'])){
                $numero=$_POST['numero'];
                $nombre=$_POST['nombre'];
                $domicilio=$_POST['domicilio'];
                $localidad=$_POST['localidad'];
                $sexo=$_POST['sexo'];
                $sangre=$_POST['sangre'];
                $dni=$_POST['dni'];
                $nacimiento=$_POST['nacimiento'];
                $ingreso=$_POST['ingreso'];
                $estado=$_POST['estado'];
                $telefono=$_POST['telefono'];
                $cobrador=$_POST['cobrador'];
                $cuenta=$_POST['cuenta'];
                $pago=$_POST["pago"];
                $tenis= floatval($_POST["tenis"]);
                $futbol=floatval($_POST["futbol"]);
                $hockey=floatval($_POST["hockey"]);
                $telas=floatval($_POST["telas"]);
                $colonia=floatval($_POST["colonia"]);
                $bochas=floatval($_POST["bochas"]);

                $dep=$tenis+$futbol+$hockey+$telas+$colonia+$bochas;


                if(isset($_POST["pago"])){
                    
                    $cuenta=$cuenta-$pago;
                    $monto=$pago;

                    if($dep==0){
                      $cuota=$pago;
                    }
                    else{
                      $cuota=$pago-$dep;
                    }
                    $cuo2=$cuo+$cuota;
                    $depor2=$depor+$dep;
                    $tot2=$tot+$pago;
                }

                

            

                $sql="UPDATE socios SET nombre='".$nombre."', domicilio='".$domicilio."', localidad='".$localidad."', sexo='".$sexo."', sangre='".$sangre."', dni='".$dni."', nacimiento='".$nacimiento."', ingreso='".$ingreso."', estado='".$estado."', telefono='".$telefono."', cobrador='".$cobrador."', cuenta='".$cuenta."' where numero='".$numero."'";
                $resultado = mysqli_query($conectar, $sql);

                if($resultado){
                  $sql2 = "INSERT INTO movimientos (fecha, numero, nombre, monto, accion) VALUES ('$fecha1','$numero','$nombre','$monto','Pago')";
                  $ejecutar2=mysqli_query($conectar, $sql2);

                  $sql3 = "INSERT INTO ingresos (mes, cuota, deporte, total) VALUES ('$mes_anio', '$cuo2', '$depor2', '$tot2') ON DUPLICATE KEY UPDATE total = '$tot2', cuota='$cuo2', deporte='$depor2'";
                  $ejecutar3 = mysqli_query($conectar, $sql3);
                    echo '<script language="javascript"> alert ("El PAGO se registro Correctamente!"); window.location.href="pago.php" </script>';
                }else{
                    echo '<script language="javascript"> alert ("Pago NO Registrado!!!"); window.location.href="pago.php" </script>';
                }

            }else{
                $numero=$_GET['numero'];
                $sql = 'SELECT * FROM socios where numero="'.$numero.'"';
                $resultado = mysqli_query($conectar, $sql);
                $fila=mysqli_fetch_assoc($resultado);
                $nombre=$fila['nombre'];
                $domicilio=$fila['domicilio'];
                $localidad=$fila['localidad'];
                $sexo=$fila['sexo'];
                $sangre=$fila['sangre'];
                $dni=$fila['dni'];
                $nacimiento=$fila['nacimiento'];
                $ingreso=$fila['ingreso'];
                $estado=$fila['estado'];
                $telefono=$fila['telefono'];
                $cobrador=$fila['cobrador'];
                $cuenta=$fila['cuenta'];

                $sql5 = 'SELECT * FROM asistencia where numero="'.$numero.'"';
                $resultado5 = mysqli_query($conectar, $sql5);
                $filas=mysqli_fetch_assoc($resultado5);
                $tenis= $filas['tenis'];
                $futbol=$filas['futbol'];
                $hockey=$filas['hockey'];
                $telas=$filas['telas'];
                $colonia=$filas['colonia'];
                $bochas=$filas['bochas'];
                

            }

        ?>
      <div class="form">
        <form action="<?=$_SERVER['PHP_SELF']?>" method='post'>
        <div class="searchPartner">
            <h1><?php echo $nombre;?></h1>
        </div>
        <div class="searchPartner">
             <label><H3>PAGO:</H3></label>
             <input type="number" step="0.01" name="pago" value="Monto Pago"><br>
        </div>
        <div class="checks">

            <input class="nav-button" type="submit" name="enviar" value="PAGO"><br>
            <input type="hidden" name="nombre" value="<?php echo $nombre;?>"><br>            
            <input type="hidden" name="domicilio" value="<?php echo $domicilio;?>"><br>            
            <input type="hidden" name="localidad" value="<?php echo $localidad;?>"><br>           
            <input type="hidden" name="sexo" value="<?php echo $sexo;?>"><br>            
            <input type="hidden" name="sangre" value="<?php echo $sangre;?>"><br>           
            <input type="hidden" name="dni" value="<?php echo $dni;?>"><br>           
            <input type="hidden" name="nacimiento" value="<?php echo $nacimiento;?>"><br>           
            <input type="hidden" name="ingreso" value="<?php echo $ingreso;?>"><br>            
            <input type="hidden" name="estado" value="<?php echo $estado;?>"><br>           
            <input type="hidden" name="telefono" value="<?php echo $telefono;?>"><br>          
            <input type="hidden" name="cobrador" value="<?php echo $cobrador;?>"><br>
            <input type="hidden" name="numero" value="<?php echo $numero;?>">
            <input type="hidden" name="cuenta" value="<?php echo $cuenta;?>">
            <input type="hidden" name="tenis" value="<?php echo $tenis;?>">
            <input type="hidden" name="hockey" value="<?php echo $hockey;?>">
            <input type="hidden" name="telas" value="<?php echo $telas;?>">
            <input type="hidden" name="futbol" value="<?php echo $futbol;?>">
            <input type="hidden" name="colonia" value="<?php echo $colonia;?>">
            <input type="hidden" name="bochas" value="<?php echo $bochas;?>">
            


   
          </div>
  
      </div>
    </main>
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-white text-muted">
      <!-- Section: Social media -->
      <section
        class="d-flex justify-content-center justify-content-lg-around p-3 border-bottom"
      ></section>
      <!-- Section: Social media -->

      <!-- Copyright -->
      <div class="text-center text-white p-3">
        © 2022 Copyright:
        <b
          ><a
            class="text-white"
            target="_blank"
            href="https://www.mgsolutions.com.ar"
            >MG Solutions</a
          ></b
        >
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

  <script src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/main.js"></script>
  <!-- MDB -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>
</html>
<?php
}else{
  header("location: ingreso.php");
}

?>