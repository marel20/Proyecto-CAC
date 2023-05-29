<?php
session_start();
            
if($_SESSION['acceso']==1){
  include "../php/conectar.php";
  $sql = 'SELECT * FROM facturacion';
  $resultado = mysqli_query($conectar, $sql);
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
    <title>Facturacion</title>
    <script type="text/javascript">
      function confirmar(){
        return confirm('¿Esta Seguro que desea eliminar este Socio?');

      }
    </script>
  </head>
  <body>
    <header>
      <div class="container-navbar" style="margin: 1% auto;">
        <div>
          <a class="nav-button2 backButton" href="balance.php"
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

    <div class="form">
      <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <div class="searchPartner">
          <div>
            <label>Fecha:</label>
            <input type="date" max="9999-12-31" name="fecha">
          </div>
          <div>
            <input type="submit" class="nav-button2" name="enviar" value="BUSCAR">
          </div>
          <div>
            <input href="movimientos.php" type="submit" class="nav-button2" value="MOSTRAR TODOS">
          </div>
        </div>
      </form>
      <div class="tabla text-center">
        <table class="table">
                <thead class="table-items">
                    <th>FECHA</th>
                    <th>CUOTA SOCIETARIA</th>
                    <th>DEPORTES</th>
                    <th>TOTAL</th>
                </thead>
            
                <tbody>
              <?php
                if(isset($_POST['enviar'])){
                  $fecha=$_POST['fecha'];
                  
                  if(empty($_POST['fecha'])){
                    echo '<script language="javascript"> alert ("Debe ingersar una fecha para poder buscarlo!!!"); window.location.href="facturacion.php" </script>';
                  }else{
                    if(isset($_POST['fecha'])){
                        $fecha = $_POST['fecha'];
                        // Convertir la fecha al formato aaaa/mm/dd
                       
                      $sql="SELECT * FROM facturacion where fecha = STR_TO_DATE('".$fecha."', '%d-%m-%Y')";
                    }
                  }
                  $resultado = mysqli_query($conectar, $sql);
                  while($filas=mysqli_fetch_assoc($resultado)){
              ?>
                  <tr>
                  <td data-label="Numero de Socio"><?php echo $filas['fecha'] ?></td>
                    <td data-label="Nombre y Apellido"><?php echo $filas['cuota'] ?></td>
                    <td data-label="DNI"><?php echo $filas['deportes'] ?></td>
                    <td data-label="Saldo">$<?php echo $filas['total'] ?></td> 
                  </tr>
              <?php
                }

              }else{
                  while($filas=mysqli_fetch_assoc($resultado)){
              ?>
              <tr>
                    <td data-label="Numero de Socio"><?php echo $filas['fecha'] ?></td>
                    <td data-label="Nombre y Apellido"><?php echo $filas['cuota'] ?></td>
                    <td data-label="DNI"><?php echo $filas['deportes'] ?></td>
                    <td data-label="Saldo">$<?php echo $filas['total'] ?></td> 
                  </tr>
            <?php
                }
              }
            ?>
                  
                </tbody>

            <!--incluir lista desde archivo php-->
          
        </table>
      </div>
    </div>

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