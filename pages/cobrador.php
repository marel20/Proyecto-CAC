<?php
session_start();
            
if($_SESSION['acceso']==3){
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
    <title>Saldos</title>
    <script type="text/javascript">
      function confirmar(){
        return confirm('¿Esta Seguro que desea eliminar este Socio?');

      }
    </script>
  </head>
  <body>
    <header>
      <div class="container-navbar">
        <div>
          <img class="nav-logo" src="../assets/logo/logo.png" alt="logo-CAC" />
        </div>
  
        <nav id="nav">
          <h1 class="text-white">ESTADO DE CUENTA SOCIOS</H1>
          <!-- <a class="nav-button" href="pages/ingreso.html">Ingresar</a> -->
          <a class="nav-button" href="../index.php">Salir</a>
        </nav>
  
        <div class="nav-toggle">|||</div>
      </div>
    </header>

    <main>

      <div class="form" style="margin-bottom: 40px !important">
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
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
              <input href="cobrador.php" type="submit" class="nav-button2" value="MOSTRAR TODOS">
            </div>
          </div>
        </form>
      </div>
      <div class="tabla text-center">
          <table class="table">
              <thead class="table-items">
                  <th>NUMERO DE SOCIO</th>
                  <th>NOMBRE Y APELLIDO</th>
                  <th>DNI</th>
                  <th>SALDO</th>
              </thead>
          
              <tbody>
              <?php
                if(isset($_POST['enviar'])){
                  $num=$_POST['numero'];
                  $nom=$_POST['nombre'];
                  if(empty($_POST['numero']) && empty($_POST['nombre'])){
                    echo '<script language="javascript"> alert ("Debe ingersar el nombre o numero de socio para poder buscarlo!!!"); window.location.href="cobrador.php" </script>';
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
                  <td data-label="Número"><?php echo $filas['numero'] ?></td>
                  <td data-label="Nombre"><?php echo $filas['nombre'] ?></td>
                  <td data-label="DNI"><?php echo $filas['dni'] ?></td>
                  <td data-label="SALDO">$<?php echo $filas['cuenta'] ?></td>
                  
                </tr>

                <?php
                  }

                }else{
                    while($filas=mysqli_fetch_assoc($resultado)){
              
            
            ?>
                <tr>
                  <td data-label="Número"><?php echo $filas['numero'] ?></td>
                  <td data-label="Nombre"><?php echo $filas['nombre'] ?></td>
                  <td data-label="DNI"><?php echo $filas['dni'] ?></td>
                  <td data-label="SALDO">$<?php echo $filas['cuenta'] ?></td>
                  
                </tr>
            <?php
              }
            }
            ?>
                
              </tbody>

          <!--incluir lista desde archivo php-->
        
          </table>
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
