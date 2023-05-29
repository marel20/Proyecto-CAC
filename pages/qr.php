<?php
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
    <title>INGRESO QR</title>
  </head>
  <body>
  <header>
      <div class="container-navbar">
        <div>
          <img class="nav-logo" src="../assets/logo/logo.png" alt="logo-CAC" />
        </div>
  
        <nav id="nav">
         <h1 class="text-white visible">INGRESE SU NUMERO DE DNI</h1>
        </nav>

      </div>
    </header>
      <br /><br /><br /> <br />
      <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
      
        <div class="searchPartner">
          <h2 class="hidden">INGRESE SU DNI</h2>
          <div>
            <label>DNI:</label>
            <input type="number" name="dni">
          </div>
          <div>
            <input type="submit" class="nav-button2" name="enviar" value="BUSCAR">
          </div>
        </div>
      </form>

    <form method="POST" class="contact-form row">
        <!--incluir lista desde archivo php-->
        <tbody>
            <?php
            
              if(isset($_POST['enviar'])){
                $dni=$_POST['dni'];
               
                
                if(empty($_POST['dni'])){
                  echo '<script language="javascript"> alert ("Debe ingersar el DNI de un socio para poder buscarlo!!!"); window.location.href="qr.php" </script>';
                }else{
                    $sql="SELECT * FROM socios where dni=".$dni;
                    $resultado = mysqli_query($conectar, $sql);
                    $filas=mysqli_fetch_assoc($resultado);
                    $dni=$_POST['dni'];
                    
                    $saldo=$filas['cuenta'];
                    
                    if($saldo<=0){
                        ?>
                        <div class="searchPartner">
                            <h2 class="text-green">PUEDE INGRESAR</H2>
                        </div>
                        <?php
                    }else{
                        ?>
                        <div class="searchPartner">
                            <h2 class="text-red">NO PUEDE INGRESAR</H2>
                        </div>
                        <?php
                    }
                  }
                  
                }
                $resultado = mysqli_query($conectar, $sql);
                
            
                  ?>
                  
            </tbody>
    </form>

      <!-- Footer -->
    <footer class="text-center text-lg-start bg-white text-muted" style="position: fixed; bottom: 0; left: 0; width: 100%;">
      <!-- Section: Social media -->
      <section
        class="d-flex justify-content-center justify-content-lg-around p-3 border-bottom"
      >
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
          <h3 class="text-white">Club Atlético Correa</h3>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div class="social-media text-center">
          <a
            href="https://www.facebook.com/ClubAtleticoCorrea/"
            target="_blank"
            class="me-4 link-secondary"
          >
            <i class="fab fa-facebook-f"></i>
          </a>
          <a
            href="https://twitter.com/Club_A_Correa"
            target="_blank"
            class="me-4 link-secondary"
          >
            <i class="fab fa-twitter"></i>
          </a>
          <a
            href="https://www.instagram.com/clubatleticocorrea/?hl=es"
            target="_blank"
            class="me-4 link-secondary"
          >
            <i class="fab fa-instagram"></i>
          </a>
          <a href="mailto:.." target="_blank" class="me-4 link-secondary">
            <i class="fas fa-envelope"></i>
          </a>
          <a href="tel:03471" target="_blank" class="me-4 link-secondary">
            <i class="fas fa-phone"></i>
          </a>
        </div>
        <!-- Right -->
      </section>
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
