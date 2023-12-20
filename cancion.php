<?php
    include 'conexion.php';
    
    $user = 'aportillo';
    
    $sql = "select cancion.nombre 'NOMBRE',
    cancion.autor 'AUTOR',
    genero.descripcion 'GENERO', genero.id 'ID'
    from cancion join genero on
    cancion.GENERO_ID = genero.id
    where nickname like '$user';";

    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        while ($f = $resultado->fetch_assoc()) {
            echo $f['NOMBRE'] . " | ";
            echo $f['AUTOR'] . " | ";
            echo $f['GENERO'] . " ► ";
            echo "<hr>";
        }
        }else{
            echo "Esto está muy vacío... ¡Carga tu primera canción! <hr>";
    }

    ?>

<form action="controladorcancion.php" method="post">
        
    <input type="text" name="autor" placeholder="Autor">
        <input type="text" name="nombre" placeholder="Nombre de la canción">
        <select name="genero_id">
            
            <?php
                $sql_genero="select * from genero;";
                $res = $conexion->query($sql_genero);
                while ($f = $res->fetch_assoc()) {
                    echo "<option value='" .$f['ID'] ."'>".$f['DESCRIPCION']."</option>";
                }
            ?>
        </select>
        <button type = "submit" >Guardar</button> 
</form>
