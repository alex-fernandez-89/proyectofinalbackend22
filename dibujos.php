<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS del bootstrap  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="./estilos/style.css">

  <title>Dibujos</title>

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
                <a href="index.html">Inicio</a>
                <a href="listarencards.php">Todos los productos</a>
                <a href="escultura.php">Esculturas</a>
                <a href="cuadros.php">Cuadros</a>
                <a href="grabados.php">Grabados</a>
            </div>
            <div class="admin">
                <a href="login.html">Administrador</a>
            </div>
          </div>
        </div>
  </nav>
      
  <section>
  <h4>Dibujos</h4>
    <div class="container">
      <div class="row">


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
        $consulta= " SELECT*FROM obra_de_arte WHERE tipo_de_arte = 'dibujo'";

        // 3) Ejecutar la orden y obtenemos los registros
        $datos= mysqli_query($conexion, $consulta);

        // 4) el while recorre todos los registros y genera una CARD PARA CADA UNA
        while ($reg = mysqli_fetch_array($datos)) {?>
          <div class="card col-sm-12 col-md-6 col-lg-3">
            <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen'])?>" alt="" width="100px" height="100px")>
            <a href="ver.php?id=<?php echo $reg['id'];?>" class="card-body">
              <h3 class="card-title" style="width: 100%; font-size:25px;"><?php echo ucwords($reg['tipo_de_arte']) ?></h3>
              <h3 class="card-title" style="width: 100%; font-size:25px;"><?php echo ucwords($reg['medida']) ?></h3>
              <h3 class="card-title" style="width: 100%; font-size:25px;"><?php echo ucwords($reg['tecnica']) ?></h3>
              <h3 class="card-title" style="width: 100%; font-size:25px;"><?php echo ucwords($reg['material']) ?></h3>
              <h3 class="card-title" style="width: 100%; font-size:25px;"><?php echo ucwords($reg['acabado']) ?></h3>
              <span>$ <?php echo $reg['precio']; ?></span>
            </a>
          </div>

        <?php } ?>

      </div>
    </div>
  </section>
  <!-- JavaScript del bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>