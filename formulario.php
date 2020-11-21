<!DOCTYPE html>
<meta charset="UTF-8">

<?php 
    $con = mysqli_connect('localhost','root','','aereo')
?>

<html>
    <head>
        <title>Proyecto</title>
        <meta chartset="UTF-8">
        <link rel="stylesheet" href="css/estilosApp.css">
    </head>
<body>

    
    <form method = "POST" class ="formulario" action="formulario.php">
    
    <label class="btn">Nombre</label>
    <input type="text" name="nombre" placeholder="Escriba su nombre"> 
    <label class="btn">Apellido</label>
    <input type="text" name="apellido" placeholder="Escriba sus apellidos"> <br />
    <label class="btn">Correo</label>
    <input type="text" name="correo" placeholder="Escriba su e-mail">  
    <label class="btn">Fecha Nacimiento</label>
    <input type="text" name="fechanac" placeholder="Fecha de nacimiento">  
    <input type="submit" name="insert" value="Insertar Datos" class="btn__update">
    </form>
    

<?php
    if(isset($_POST['insert'])){
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $correo=$_POST['correo'];
        $fechanac=$_POST['fechanac'];

        $insertar="INSERT INTO Pasajero(nombre,apellido,correo,fechanac) VALUES ('$nombre','$apellido','$correo','$fechanac')";

        $ejecutar= mysqli_query($con, $insertar);

        if($ejecutar){
            echo '<h3>Insertado correctamente</h3>';
        }
    }
?>

<br />

    <table width="500" border="2" style="background-color: #F9F9F9;">
        <tr class="head">
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Fecha Nacimiento</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>

        <?php
            $consulta="SELECT * FROM Pasajero";

            $ejecutar= mysqli_query($con, $consulta);
            $i=0;
            while($fila = mysqli_fetch_array($ejecutar)){
                $id=$fila['id'];
                $nombre=$fila['nombre'];
                $apellido=$fila['apellido'];
                $correo=$fila['correo'];
                $fechanac=$fila['fechanac'];
                $i++;
            
        ?>

        <tr align="center">
            <td><?php echo $id; ?></td>
            <td><?php echo $nombre; ?></td>
            <td><?php echo $apellido; ?></td>
            <td><?php echo $correo; ?></td>
            <td><?php echo $fechanac; ?></td>
            <td><a href="formulario.php?editar=<?php echo $id; ?>" class="btn__update">Editar</a></td>
            <td><a href="formulario.php?borrar=<?php echo $id; ?>" class="btn__delete">Borrar</a></td>
        </tr>

        <?php } ?>
    </table>

    <?php
        if(isset($_GET['editar'])){
            include("editar.php");
        }
    ?>

    <?php
        if(isset($_GET['borrar'])){

            $borrar_id = $_GET['borrar'];

            $borrar = "DELETE FROM Pasajero WHERE id='$borrar_id'";
            $ejecutar = mysqli_query($con, $borrar);

            if($ejecutar){
                echo "<script>alert('Datos Eliminados!')</script>";
                echo "<script>window.open('formulario.php')</script>";
            }
        }

    ?>
</body>

</html>