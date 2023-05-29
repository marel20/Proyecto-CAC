<?php
session_start();
            
if($_SESSION['acceso']==1){
  include "../php/conectar.php";
  $sql = 'SELECT * FROM socios';
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
    <title>Movimientos</title>
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
          <a class="nav-button2 backButton" href="movimientos.php"
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

    <?php
       $numero=$_GET['numero'];
       $sql3 = 'SELECT * FROM socios where numero="'.$numero.'"';
       $sql = "SELECT * FROM movimientos WHERE numero = '$numero' ORDER BY fecha";
       $resultado = mysqli_query($conectar, $sql);
       $resultado2 = mysqli_query($conectar, $sql);
       $resultado3 = mysqli_query($conectar, $sql3);
       $fila=mysqli_fetch_assoc($resultado2);
       $fil=mysqli_fetch_assoc($resultado3);
       $nombre=$fila['nombre'];
       $nom=$fil['nombre'];

       
       
      ?>
        
  
      
      <div class="form">
      <div class="searchPartner">
            <h1><?php echo $nom;?></h1></br>
            <h3>Numero De Socio: <?php echo $numero;?></h3>
        </div>
      
        <div class="tabla text-center">
            <table class="table">
                <thead class="table-items">
                    <th>FECHA</th>
                    <th>NUMERO DE SOCIO</th>
                    <th>NOMBRE</th>
                    <th>MONTO</th>
                    <th>ACCION</th>
                </thead>
            
                <tbody>
              <?php
              
                  while($filas=mysqli_fetch_assoc($resultado)){
              ?>
              <tr>
                    <td data-label="Numero de Socio"><?php echo $filas['fecha'] ?></td>
                    <td data-label="Nombre y Apellido"><?php echo $filas['numero'] ?></td>
                    <td data-label="DNI"><?php echo $filas['nombre'] ?></td>
                    <td data-label="Saldo">$<?php echo $filas['monto'] ?></td> 
                    <td data-label="Saldo"><?php echo $filas['accion'] ?></td>
                  </tr>
            <?php
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