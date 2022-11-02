<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de ropa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
                <a href="index.html">Cerrar sesion</a>
                <a href="agregar.html">Agregar producto</a>
            </div>
          </div>
        </div>
  </nav>
    <table border="1">
    <tr>
        <th>ID</th>
        <th>Tipo de Arte</th>
        <th>Medida</th>
        <th>Tecnica</th>
        <th>Material</th>
        <th>Acabado</th>
        <th>Precio</th>
        <th>Imagen</th>
        <th>EDITAR</th>
        <th>BORRAR</th>
    </tr>
    <?php
    // 1) Conexion
    $conexion = mysqli_connect("127.0.0.1", "root", "");
    mysqli_select_db($conexion, "proyectofinal");

    // 2) Preparar la orden SQL
    // Sintaxis SQL SELECT
    // SELECT * FROM nombre_tabla
    // => Selecciona todos los campos de la siguiente tabla
    // SELECT campos_tabla FROM nombre_tabla
    // => Selecciona los siguientes campos de la siguiente tabla
    $consulta= 'SELECT * FROM  obra_de_arte ';

    // 3) Ejecutar la orden y obtenemos los registros
    $datos= mysqli_query($conexion, $consulta);

    // 4) Mostrar los datos del registro
    while ($reg=mysqli_fetch_array($datos)) { ?>
        <tr>
          <td><?php echo $reg['id']; ?></td>
          <td><?php echo $reg['tipo_de_arte']; ?></td>
          <td><?php echo $reg['medida']; ?></td>
          <td><?php echo $reg['tecnica']; ?></td>
          <td><?php echo $reg['material']; ?></td>
          <td><?php echo $reg['acabado']; ?></td>
          <td><?php echo $reg['precio']; ?></td>
          <td><img src="data:image/png;base64, <?php echo base64_encode($reg['imagen'])?>" alt="" width="100px" height="100px"></td>
          <td><button class="edit"><a href="modificar.php?id=<?php echo $reg['id'];?>">Editar</a></button></td>
          <td><button class="borrar"><a href="borrar.php?id=<?php echo $reg['id'];?>">Borrar</a></button></td>
        </tr>
    <?php } ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>