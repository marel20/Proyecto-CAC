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
    <title>Editar Socio</title>
  </head>
  <body>
    <header>
      <div class="container-navbar" style="margin: 1% auto;">
        <div>
          <a class="nav-button2 backButton" href="baja.php"
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
                $categoria=$_POST['categoria'];

                $sql="UPDATE socios SET nombre='".$nombre."', domicilio='".$domicilio."', localidad='".$localidad."', sexo='".$sexo."', sangre='".$sangre."', dni='".$dni."', nacimiento='".$nacimiento."', ingreso='".$ingreso."', estado='".$estado."', telefono='".$telefono."', cobrador='".$cobrador."', categoria='".$categoria."' where numero='".$numero."'";
                $resultado = mysqli_query($conectar, $sql);

                if($resultado){
                    echo '<script language="javascript"> alert ("Cambios Realizados Correctamente"); window.location.href="baja.php" </script>';
                }else{
                    echo '<script language="javascript"> alert ("Cambios NO Realizados"); window.location.href="baja.php" </script>';
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
                $categoria=$fila['categoria'];

            }

        ?>
        <div class="form form-edit">
          <form action="<?=$_SERVER['PHP_SELF']?>" method='post'>
            <div class="items-form">
              <div>
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $nombre;?>"><br>
                <label>Domicilio:</label>
                <input type="text" name="domicilio" value="<?php echo $domicilio;?>"><br>
                <label>Localidad:</label>
                <input type="text" name="localidad" value="<?php echo $localidad;?>"><br>
                <label>Sexo:</label>
                <input type="text" name="sexo" value="<?php echo $sexo;?>"><br>
                <label>Sangre:</label>
                <input type="text" name="sangre" value="<?php echo $sangre;?>"><br>
                <label>Dni:</label>
                <input type="text" name="dni" value="<?php echo $dni;?>"><br>
              </div>
              <div>
                <label>Nacimiento:</label>
                <input type="text" name="nacimiento" value="<?php echo $nacimiento;?>"><br>
                <label>Ingreso:</label>
                <input type="text" name="ingreso" value="<?php echo $ingreso;?>"><br>
                <label>Estado:</label>
                <input type="text" name="estado" value="<?php echo $estado;?>"><br>
                <label>Telefono:</label>
                <input type="text" name="telefono" value="<?php echo $telefono;?>"><br>
                <label>Cobrador:</label>
                <input type="text" name="cobrador" value="<?php echo $cobrador;?>"><br>
                <label>Categoria:</label>
                <input type="text" name="categoria" value="<?php echo $categoria;?>"><br>
              </div>
            </div>
            <div class="btn-actualizar text-center">
              <input type="hidden" name="numero" value="<?php echo $numero;?>">

              <input class="nav-button2" type="submit" name="enviar" value="ACTUALIZAR"><br>
            </div>
          </form>
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