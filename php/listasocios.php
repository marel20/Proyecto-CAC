<?php
    //conectar al servidor
    include 'conectar.php';

         $consulta = 'SELECT * FROM socios';
         $ejecutarConsulta = mysqli_query($conectar, $consulta);
         $verFilas = mysqli_num_rows($ejecutarConsulta);
         $fila = mysqli_fetch_array($ejecutarConsulta);
         if(!$ejecutarConsulta){
             echo"error";
         }else{
             if($verFilas<1){
                 echo"<tr><td>Sin Registros</td></tr>";
             }else{
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
                             <td>$'.$fila[12].'</td>
                             <td>'.$fila[13].'</td>
                         </tr> </tbody></br>';
                  $fila = mysqli_fetch_array($ejecutarConsulta);      
                 }
             }
         }

    ?>