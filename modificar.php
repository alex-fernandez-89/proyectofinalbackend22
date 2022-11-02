<?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion=mysqli_connect("127.0.0.1","root","");
 mysqli_select_db($conexion,"proyectofinal");
// 2) Almacenamos los datos del envío GET
// a) generar variables para el id a utilizar
$id = $_GET['id'];
// 3) Preparar la SQL
// => Selecciona todos los campos de la tabla alumno donde el campo id  sea igual a $id
// a) generar la consulta a realizar
$consulta = "SELECT * FROM obra_de_arte WHERE id=$id";
// 4) Ejecutar la orden y almacenamos en una variable el resultado
// a) ejecutar la consulta
$repuesta=mysqli_query ($conexion, $consulta);
// 5) Transformamos el registro obtenido a un array
$datos=mysqli_fetch_array($repuesta);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar</title>
        <link rel="stylesheet" href="./estilos/modificar.css">
        <link rel="stylesheet" href="./estilos/style.css">
    </head>
    <body>

        <header>
            <div class="imagen">
                <img src="./img/img/GABRIELA-LOGO2.png" alt="">
            </div>
        </header>
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a href="listar.php">Volver</a>
                    </div>
                </div>
            </div>
        </nav>

        <?php
        // 6) asignamos a diferentes variables los respectivos valores del array $datos.
        $tipo_de_arte=$datos["tipo_de_arte"];
        $medida=$datos["medida"];
        $tecnica=$datos["tecnica"];
        $material=$datos["material"];
        $acabado=$datos["acabado"];
        $precio=$datos["precio"];
        $imagen=$datos['imagen'];
        ?>

        

        <h2>Modificar producto</h2>
        <p>Ingrese los nuevos datos de la prenda.</p>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Tipo</label>
            <input type="text" name="tipo_de_arte"  value="<?php echo "$tipo_de_arte"; ?>">
            <label>Medida</label>
            <input type="text" name="medida"  value="<?php echo "$medida"; ?>">
            <label>Tecnica</label>
            <input type="text" name="tecnica"  value="<?php echo "$tecnica"; ?>">
            <label>Material</label>
            <input type="text" name="material"  value="<?php echo "$material"; ?>">
            <label>Acabado</label>
            <input type="text" name="acabado"  value="<?php echo "$acabado"; ?>">
            <label>Precio</label>
            <input type="text" name="precio"  value="<?php echo "$precio"; ?>">
            <label>Imagen</label>
            <input type="file" name="imagen" placeholder="imagen">
            <input type="submit" name="guardar_cambios" value="Guardar Cambios">
            <button type="submit" name="Cancelar" formaction="listar.php">Cancelar</button>
        </form>
        <?php
        // Si en la variable constante $_POST existe un indice llamado 'guardar_cambios' ocurre el bloque de instrucciones.
        if(array_key_exists('guardar_cambios',$_POST)){
            // 2') Almacenamos los datos actualizados del envío POST
            // a) generar variables para cada dato a almacenar en la bbdd
            // Si se desea almacenar una imagen en la base de datos usar lo siguiente:
            // addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))
            $tipo_de_arte=$_POST['tipo_de_arte'];
            $medida=$_POST['medida'];
            $tecnica=$_POST['tecnica'];
            $material=$_POST['material'];
            $acabado=$_POST['acabado'];
            $precio=$_POST['precio'];
            $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
            // 3') Preparar la orden SQL
            // "UPDATE tabla SET campo1='valor1', campo2='valor2', campo3='valor3', campo3='valor3', campo3='valor3' WHERE campo_clave=valor_clave"
            // a) generar la consulta a realizar
             $consulta = "UPDATE obra_de_arte SET tipo_de_arte='$tipo_de_arte', medida='$medida', tecnica='$tecnica', material='$material', acabado='$acabado', precio='$precio', imagen='$imagen' WHERE id=$id";
            // 4') Ejecutar la orden y actualizamos los datos
            // a) ejecutar la consulta
            mysqli_query($conexion,$consulta);
            // a) rederigir a index
            header('location: listar.php');
          } ?>

    </body>
</html>
