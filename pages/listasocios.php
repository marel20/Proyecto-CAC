<?php
session_start();
            
if($_SESSION['acceso']==1){

  include "../php/conectar.php";
  $sql = 'SELECT * FROM socios';
  $resultado = mysqli_query($conectar, $sql);
  $resultadocantidad = mysqli_query($conectar, $sql);
  $cantidadsocios=0;
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
    <title>Listado de socios</title>
    <script type="text/javascript">
      function confirmar(){
        return confirm('¿Esta Seguro que desea generar la cuota societaria del mes?');

      }
    </script>
  </head>
  <body>
      <header>
        <div class="container-navbar" style="margin: 1% auto;">
          <div>
            <a class="nav-button2 backButton" href="administracion.php"
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
      <div class="form btn-asists text-center" style="width: 50%; gap:20px;">
        
        <a class="nav-button2" href="../php/pdf.php">LISTA SOCIOS PDF</a>
        <a class="nav-button2" href="../php/excel.php">LISTA SOCIOS EXCEL</a>
        <a class="nav-button2" href="../php/pdfdeuda.php">LISTA SOCIOS CON DEUDA</a>
        
      </div>
      
      <div class="search">
      <?php
         while($filas=mysqli_fetch_assoc($resultadocantidad)){
          $cantidadsocios=$cantidadsocios+1;
         }

        ?>
        <h2>La Cantidad De Socios Es: <?php echo $cantidadsocios ?></h2>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
          <div class="">
            <?php echo ' <a href="generarcuota.php" type="submit" class="nav-button" value="GENERAR CUOTAS SOCIETARIAS" onclick= "return confirmar()">GENERAR CUOTAS SOCIETARIAS</a>'; ?>
        
          </div>

          <div class="searchPartner">
            <div>
              <label>Numero:</label>
              <input type="number" name="numero">
            </div>
            <div>
              <label>Nombre:</label>
              <input type="text" name="nombre">
            </div>
            <div>
              <input type="submit" class="nav-button2" name="enviar" value="BUSCAR">
            </div>
            <div>
              <input href="listasocios.php" type="submit" class="nav-button2" value="MOSTRAR TODOS">
            </div>
          </div>
        </form>
      </div>

    <form method="POST" class="form-socio row">
        
      <div class="tabla text-center">
          <table class="table">
              <thead class="table-items">
                  <th>Número</th>
                  <th>Nombre</th>
                  <th>Domicilio</th>
                  <th>Localidad</th>
                  <th>Sexo</th>
                  <th>Sangre</th>
                  <th>Dni</th>
                  <th>Nacimiento</th>
                  <th>Ingreso</th>
                  <th>Estado Civil</th>
                  <th>Teléfono</th>
                  <th>Código Cobrador</th>
                  <th>Saldo</th>
                  <th>Categoría</th>
              </thead>

          <!--incluir lista desde archivo php-->
          <tbody>
              <?php
                if(isset($_POST['enviar'])){
                  $num=$_POST['numero'];
                  $nom=$_POST['nombre'];
                  if(empty($_POST['numero']) && empty($_POST['nombre'])){
                    echo '<script language="javascript"> alert ("Debe ingersar el nombre o numero de socio para poder buscarlo!!!"); window.location.href="listasocios.php" </script>';
                  }else{
                    if(empty($_POST['nombre'])){
                      $sql="SELECT * FROM socios where numero=".$num;
                    }
                    if(empty($_POST['numero'])){
                      $sql="SELECT * FROM socios where nombre like '%".$nom."%'";
                    }
                    if(!empty($_POST['numero']) && !empty($_POST['nombre'])){
                      $sql="SELECT * FROM socios where numero=".$num;
                    }
                  }
                  $resultado = mysqli_query($conectar, $sql);
                  while($filas=mysqli_fetch_assoc($resultado)){
              
                    ?>
                    <tr>
                    <td data-label="Número" class="text-center"><?php echo $filas['numero'] ?></td>
                    <td data-label="Nombre" class="text-center"><?php echo $filas['nombre'] ?></td>
                    <td data-label="Domicilio" class="text-center"><?php echo $filas['domicilio'] ?></td>
                    <td data-label="Localidad" class="text-center"><?php echo $filas['localidad'] ?></td>
                    <td data-label="Sexo" class="text-center"><?php echo $filas['sexo'] ?></td>
                    <td data-label="Sangre" class="text-center"><?php echo $filas['sangre'] ?></td>
                    <td data-label="DNI" class="text-center"><?php echo $filas['dni'] ?></td>
                    <td data-label="Nacimiento" class="text-center"><?php echo $filas['nacimiento'] ?></td>
                    <td data-label="Ingreso" class="text-center"><?php echo $filas['ingreso'] ?></td>
                    <td data-label="Estado Civil" class="text-center"><?php echo $filas['estado'] ?></td>
                    <td data-label="Teléfono" class="text-center"><?php echo $filas['telefono'] ?></td>
                    <td data-label="Código Cobrador" class="text-center"><?php echo $filas['cobrador'] ?></td>
                    <td data-label="Saldo" class="text-center">$<?php echo $filas['cuenta'] ?></td>
                    <td data-label="Categoría" class="text-center"><?php echo $filas["categoria"]?></td>
                  </tr>
              <?php
                  }

                }else{
                    while($filas=mysqli_fetch_assoc($resultado)){
              
              ?>
                  <tr>
                    <td data-label="Número" class="text-center"><?php echo $filas['numero'] ?></td>
                    <td data-label="Nombre" class="text-center"><?php echo $filas['nombre'] ?></td>
                    <td data-label="Domicilio" class="text-center"><?php echo $filas['domicilio'] ?></td>
                    <td data-label="Localidad" class="text-center"><?php echo $filas['localidad'] ?></td>
                    <td data-label="Sexo" class="text-center"><?php echo $filas['sexo'] ?></td>
                    <td data-label="Sangre" class="text-center"><?php echo $filas['sangre'] ?></td>
                    <td data-label="DNI" class="text-center"><?php echo $filas['dni'] ?></td>
                    <td data-label="Nacimiento" class="text-center"><?php echo $filas['nacimiento'] ?></td>
                    <td data-label="Ingreso" class="text-center"><?php echo $filas['ingreso'] ?></td>
                    <td data-label="Estado Civil" class="text-center"><?php echo $filas['estado'] ?></td>
                    <td data-label="Teléfono" class="text-center"><?php echo $filas['telefono'] ?></td>
                    <td data-label="Código Cobrador" class="text-center"><?php echo $filas['cobrador'] ?></td>
                    <td data-label="Saldo" class="text-center">$<?php echo $filas['cuenta'] ?></td>
                    <td data-label="Categoría" class="text-center"><?php echo $filas["categoria"]?></td>
                  </tr>
              <?php
                  }
                }
              ?>
                  
                </tbody>
          </table>
      </div>
    </form>
    
    
       
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