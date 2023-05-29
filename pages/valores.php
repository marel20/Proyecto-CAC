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
                    $cat1=$_POST['cat1'];
                    $cat4=$_POST['cat4'];
                    $cat5=$_POST['cat5'];
                    $cat6=$_POST['cat6'];
                    $infantil=$_POST['infantil'];
                    $senior=$_POST['senior'];
                    $femenino=$_POST['femenino'];
                    $telas=$_POST['telas'];
                    $hockey=$_POST['hockey'];
                    $tenis=$_POST['tenis'];
                    $bochas=$_POST['bochas'];
                    $colonia=$_POST['colonia'];

                $sql="UPDATE valores SET cat1='".$cat1."', cat4='".$cat4."', cat5='".$cat5."', cat6='".$cat6."', infantil='".$infantil."', senior='".$senior."', femenino='".$femenino."', telas='".$telas."', hockey='".$hockey."', tenis='".$tenis."', bochas='".$bochas."', colonia='".$colonia."'";
                $resultado = mysqli_query($conectar, $sql);

                if($resultado){
                    echo '<script language="javascript"> alert ("Cambios Realizados Correctamente"); window.location.href="valores.php" </script>';
                }else{
                    echo '<script language="javascript"> alert ("Cambios NO Realizados"); window.location.href="valores.php" </script>';
                }

            }else{
                $sql = 'SELECT * FROM valores';
                $resultado = mysqli_query($conectar, $sql);
                $fila=mysqli_fetch_assoc($resultado);

                    $cat1=$fila['cat1'];
                    $cat4=$fila['cat4'];
                    $cat5=$fila['cat5'];
                    $cat6=$fila['cat6'];
                    $infantil=$fila['infantil'];
                    $senior=$fila['senior'];
                    $femenino=$fila['femenino'];
                    $telas=$fila['telas'];
                    $hockey=$fila['hockey'];
                    $tenis=$fila['tenis'];
                    $bochas=$fila['bochas'];
                    $colonia=$fila['colonia'];

            }

        ?>
        <div class="form form-edit">
          <form action="<?=$_SERVER['PHP_SELF']?>" method='post'>
            <h3 class="text-center">CATEGORIAS</H3>
            <div class="items-form text-center">
              <div>
                <label>Categoria 1:</label>
                <input type="text" name="cat1" value="<?php echo $cat1;?>"><br>
                <label>Categoria 4:</label>
                <input type="text" name="cat4" value="<?php echo $cat4;?>"><br>  
              </div>
              <div>
              <label>Categoria 5:</label>
                <input type="text" name="cat5" value="<?php echo $cat5;?>"><br>
                <label>Categoria 6:</label>
                <input type="text" name="cat6" value="<?php echo $cat6;?>"><br>
              </div>
              </div> 
              <h3 class="text-center">DEPORTES</H3> <br>
            
            <div><h5 class="text-center">FUTBOL</H5>
              <div class="items-form text-center" style="margin-top: -1%">
                <div>
                  <label>INFANTIL:</label>
                  <input type="text" name="infantil" value="<?php echo $infantil;?>"><br>
                  <label>SENIOR:</label>
                  <input type="text" name="senior" value="<?php echo $senior;?>"><br>
                  <label>FEMENINO:</label>
                  <input type="text" name="femenino" value="<?php echo $femenino;?>"><br>              
                  </div>                        
              </div>
            </div>
            
            <div><h5 class="text-center">TELAS</H5>
              <div class="items-form text-center" style="margin-top: -1%">
                <div>
                    <label>ACROTELAS:</label>
                    <input type="text" name="telas" value="<?php echo $telas;?>"><br>            
                  </div>                        
              </div>
            </div>
            
            <div><h5 class="text-center">HOCKEY</H5>
              <div class="items-form text-center" style="margin-top: -1%">
                <div>
                  <label>HOCKEY:</label>
                  <input type="text" name="hockey" value="<?php echo $hockey;?>"><br>              
                </div>                        
              </div>
            </div>
            
            <div><h5 class="text-center">TENIS</H5>
              <div class="items-form text-center" style="margin-top: -1%">
                <div>
                  <label>TENIS:</label>
                  <input type="text" name="tenis" value="<?php echo $tenis;?>"><br>              
                </div>                        
              </div>
            </div>
            
            <div><h5 class="text-center">BOCHAS</H5>
              <div class="items-form text-center" style="margin-top: -1%">
                <div>
                  <label>BOCHAS:</label>
                  <input type="text" name="bochas" value="<?php echo $bochas;?>"><br>              
                </div>                        
              </div>
            </div>
            
            <div><h5 class="text-center">COLONIA</H5>
              <div class="items-form text-center" style="margin-top: -1%">
                <div>
                  <label>COLONIA:</label>
                  <input type="text" name="colonia" value="<?php echo $colonia;?>"><br>              
                </div>                        
              </div>
            </div>
           
            <div class="btn-actualizar text-center">
              

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