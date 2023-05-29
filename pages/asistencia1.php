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
    <title>Asistencias</title>
  </head>
  <body>
    <header>
        <div class="container-navbar" style="margin: 1% auto;">
          <div>
            <a class="nav-button2 backButton" href="profe1.php"
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


        <?php
          $sql2 = 'SELECT * FROM valores';
          $resultado2 = mysqli_query($conectar, $sql2);
          $filas=mysqli_fetch_assoc($resultado2);

           
           $infantil=$filas['infantil'];
           $senior=$filas['senior'];
           $femenino=$filas['femenino'];
           $telas=$filas['telas'];
           $hockey=$filas['hockey'];
           $tenis=$filas['tenis'];
           $bochas=$filas['bochas'];
           $colonia=$filas['colonia'];

           $monto=0;
            $asis=0;
            $fecha = date('Y-m-d');

           
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
                $t=$_POST['tenis'];
                $f=$_POST['futbol'];
                $h=$_POST['hockey'];
                $te=$_POST['telas'];
                $b=$_POST['bochas'];
                $c=$_POST['colonia'];


                
                if(isset($_POST["infantil"]) && $f==0){
                  $cuenta=$cuenta+$infantil;
                  $f=$infantil;
                  $monto=$f;
                  $asis='Futbol';
                }
                if(isset($_POST["senior"]) && $f==0){
                  $cuenta=$cuenta+$senior;
                  $f=$senior;
                  $monto=$f;
                  $asis='Futbol';
                }
                if(isset($_POST["femenino"]) && $f==0){
                  $cuenta=$cuenta+$femenino;
                  $f=$femenino;
                  $monto=$f;
                  $asis='Futbol';
                }

                if(isset($_POST["telas1"]) && $te==0){
                  $cuenta=$cuenta+$telas;
                  $te=$telas;
                  $monto=$te;
                  $asis='Telas';
                }
                if(isset($_POST["hockey1"]) && $h==0){
                  $cuenta=$cuenta+$hockey; 
                  $h=$hockey;
                  $monto=$f;
                  $asis='Futbol';
                }
                if(isset($_POST["tenis1"] )&& $t==0){
                  $cuenta=$cuenta+$tenis;
                  $t=$tenis;
                  $monto=$t;
                  $asis='Tenis';
              }
                if(isset($_POST["bochas1"]) && $b==0){
                  $cuenta=$cuenta+$bochas;
                  $b=$bochas;
                  $monto=$b;
                  $asis='Bochas';
                }

                if(isset($_POST["colonia1"]) && $c==0){
                  $cuenta=$cuenta+$colonia;
                  $c=$colonia;
                  $monto=$c;
                  $asis='Colonia';
                }

                

            

                $sql="UPDATE socios SET nombre='".$nombre."', domicilio='".$domicilio."', localidad='".$localidad."', sexo='".$sexo."', sangre='".$sangre."', dni='".$dni."', nacimiento='".$nacimiento."', ingreso='".$ingreso."', estado='".$estado."', telefono='".$telefono."', cobrador='".$cobrador."', cuenta='".$cuenta."', futbol='".$f."', telas='".$te."', hockey='".$h."', tenis='".$t."', bochas='".$b."', colonia='".$c."' where numero='".$numero."'";
                $resultado = mysqli_query($conectar, $sql);

                if($resultado){
                  $sql2 = "INSERT INTO movimientos (fecha, numero, nombre, monto, accion) VALUES ('$fecha','$numero','$nombre','$monto','Asistencia ".$asis."')";
                  $ejecutar2=mysqli_query($conectar, $sql2);
                    echo '<script language="javascript"> alert ("Cambios Realizados Correctamente"); window.location.href="profe1.php" </script>';
                }else{
                    echo '<script language="javascript"> alert ("Cambios NO Realizados"); window.location.href="profe1.php" </script>';
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
                $t=$fila['tenis'];
                $f=$fila['futbol'];
                $h=$fila['hockey'];
                $te=$fila['telas'];
                $b=$fila['bochas'];
                $c=$fila['colonia'];

            }

        ?>
      <div class="form" >
        <form action="<?=$_SERVER['PHP_SELF']?>" method='post'>
        <div class="searchPartner">
            <h1><?php echo $nombre;?></h1>
        </div>
        <div class="checks-asistencia">
          <h4>Futbol:</h4>
            <div class="form-check">
              <input class="form-check-input" name="infantil" type="checkbox" value="" id="flexCheckChecked"/>
              <label class="form-check-label" for="flexCheckChecked">Infanto Juvenil</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" name="senior" type="checkbox" value="" id="flexCheckChecked"/>
              <label class="form-check-label" for="flexCheckChecked">Señor</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" name="femenino" type="checkbox" value="" id="flexCheckChecked"/>
              <label class="form-check-label" for="flexCheckChecked">Femenino</label>
            </div>
            <br>

            <h4>Telas:</h4>
            <div class="form-check">
              <input class="form-check-input" name="telas1" type="checkbox" value="" id="flexCheckChecked"/>
              <label class="form-check-label" for="flexCheckChecked">Acrotelas</label>
            </div><br>
            

            <h4>Hockey:</h4>
            <div class="form-check">
              <input class="form-check-input" name="hockey1" type="checkbox" value="" id="flexCheckChecked"/>
              <label class="form-check-label" for="flexCheckChecked">Hockey</label>
            </div><br>

            <h4>Tenis:</h4>           
            <div class="form-check">
              <input class="form-check-input" name="tenis1" type="checkbox" value="" id="flexCheckChecked"/>
              <label class="form-check-label" for="flexCheckChecked">Tenis</label>
            </div><br>
            <h4>Bochas:</h4>
            <div class="form-check">
              <input class="form-check-input" name="bochas1" type="checkbox" value="" id="flexCheckChecked"/>
              <label class="form-check-label" for="flexCheckChecked">Bochas</label>
            </div><br>

            <h4>Colonia:</h4>
            <div class="form-check">
              <input class="form-check-input" name="colonia1" type="checkbox" value="" id="flexCheckChecked"/>
              <label class="form-check-label" for="flexCheckChecked">Colonia de Verano</label>
            </div><br>       
        

              <!-- Checked checkbox -->
            


            <input class="nav-button2" type="submit" name="enviar" value="ACTUALIZAR"><br>
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
            <input type="hidden" name="tenis" value="<?php echo $t;?>">
            <input type="hidden" name="futbol" value="<?php echo $f;?>">
            <input type="hidden" name="hockey" value="<?php echo $h;?>">
            <input type="hidden" name="telas" value="<?php echo $te;?>">
            <input type="hidden" name="bochas" value="<?php echo $b;?>">
            <input type="hidden" name="colonia" value="<?php echo $c;?>">
            

   
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