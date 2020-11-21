<?php
    if(isset($_GET['editar'])){
        $editar_id=$_GET['editar'];

        $consulta="SELECT * FROM Pasajero WHERE id ='$editar_id'";
        $ejecutar= mysqli_query($con,$consulta);

        $fila= mysqli_fetch_array($ejecutar);
        $nombre= $fila['nombre'];
        $apellido= $fila['apellido'];
        $correo= $fila['correo'];
        $fechanac= $fila['fechanac'];
    }

?>


<br />

<form method = "POST" action = "">
    <input type = "text" name = "nombre" value="<?php echo $nombre ?>"> <br />
    <input type = "text" name = "apellido" value="<?php echo $apellido ?>"> <br />
    <input type = "text" name = "correo" value="<?php echo $correo ?>"> <br />
    <input type = "text" name = "fechanac" value="<?php echo $fechanac ?>"> <br />
    <input type = "submit" name = "actualizar" value="ACTUALIZAR DATOS"> <br />
</form>

<?php
    if(isset($_POST['actualizar'])){
        $actualizar_nombre= $_POST['nombre'];
        $actualizar_apellido= $_POST['apellido'];
        $actualizar_correo= $_POST['correo'];
        $actualizar_fechanac= $_POST['fechanac'];

        $actualizar = "UPDATE Pasajero SET nombre='$actualizar_nombre',apellido='$actualizar_apellido',correo='$actualizar_correo',fechanac='$actualizar_fechanac' WHERE id='$editar_id'";

        $ejecutar = mysqli_query($con,$actualizar);

        if($ejecutar){
            echo "<script>alert('Datos Actualizados!')</script>";
            echo "<script>window.open('formulario.php')</script>";
        }
    }
?>