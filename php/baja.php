
<?php
    include "conectar.php";

    if(empty($_POST['nombre'])){
        $sql = "SELECT * FROM socios WHERE numero=".$numero;
      }
      if(empty($_POST['numero'])){
        $sql = "SELECT * FROM socios WHERE nombre like '%".$nombre."%'";
      }

      $resultado=mysqli_query($conectar,$sql);
      for($i=0; $i<=$fila ; $i++){
        echo'<tbody><tr>
                <td>'.$fila[0].'</td>
                <td>'.$fila[1].'</td>
                <td>'.$fila[2].'</td>
                <td>'.$fila[3].'</td>
                <td>'.$fila[4].'</td>
                <td>'.$fila[5].'</td>
                <td>'.$fila[6].'</td>
                <td>'.$fila[7].'</td>
                <td>'.$fila[8].'</td>
                <td>'.$fila[9].'</td>
                <td>'.$fila[10].'</td>
                <td>'.$fila[11].'</td>
            </tr> </tbody></br>';
     $fila = mysqli_fetch_array($ejecutarConsulta);      
        
      }



 /*
    if(isset($_POST['enviar'])){
    $nsocio=$_POST['nsocio'];
    $sql="SELECT * FROM socios WHERE numero=".$nsocio;
    $resultado=mysqli_query($conectar,$sql);
    while($filas=mysqli_fetch_assoc($resultado)){
    "<tbody><tr>
                    <td>'.$filas[0].'</td>
                    <td>'.$filas[1].'</td>
                    <td>'.$filas[2].'</td>
                    <td>'.$filas[3].'</td>
                    <td>'.$filas[4].'</td>
                    <td>'.$filas[5].'</td>
                    <td>'.$filas[6].'</td>
                    <td>'.$filas[7].'</td>
                    <td>'.$filas[8].'</td>
                    <td>'.$filas[9].'</td>
                    <td>'.$filas[10].'</td>
                    <td>'.$filas[11].'</td>
                </tr> </tbody>";
    }
    }else{

    }
    */
?>
