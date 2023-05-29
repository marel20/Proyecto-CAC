<?php
    include '../php/conectar.php';

        $user=$_POST['user'];
        $pass=$_POST['pass'];

        
        $ingreso=mysqli_query($conectar, "SELECT * FROM usuarios WHERE usuario = '".$user."' and password = '".$pass."'");
        $nr=mysqli_num_rows($ingreso);
        $filas=mysqli_fetch_assoc($ingreso);
        session_start();
        $_SESSION['acceso']=0;
        
        if($nr == 1){
          if($filas["categoria"] == 1){
            $_SESSION['acceso']=1;
          
           
            header("location: ../pages/administracion.php");
          }
          if($filas["categoria"] == 2){
            $_SESSION['acceso']=2;
            header("location: ../pages/profe.php");
          }
          if($filas["categoria"] == 3){
            $_SESSION['acceso']=3;
            header("location: ../pages/cobrador.php");
          }
        }else {
            if($nr == 0){
                echo "<script language='javascript'>alert('Usuario o Contraseña Incorrecto'); window.location.href='../pages/ingreso.html'</script>";
                
       
            }
        }


      ?>