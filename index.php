<?php 
include_once 'crud.php'
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- Enlazar colores CSS -->
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    
    <title>Biblioteca Virtual</title>
</head>
<body>
    <!-- Menú principal-->
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
              <!-- Realizar el logo con tamaño-->
              <img src="img/tecsup.png" alt="" style="width: 15%;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link"  href="index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php">Team</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.google.com/maps/place/El+Campo+de+Marte/@-12.0683312,-77.0435737,17z/data=!3m1!4b1!4m5!3m4!1s0x9105c8e921adc161:0x91a518942d5e9270!8m2!3d-12.0683312!4d-77.041385">Ubicación</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<!--Definir el header-->
      <header class="main-header">
          <div class="backgroup-overlay text-white py-5">
            <div class="container">
                <div class="row">
                    <center>
                        <div class="col-sm-6 text-center justify-content-center align-self-center">
                        <h1>Biblioteca Virtual</h1>
                        <p>"Por el grosor del polvo en los libros de una biblioteca pública puede medirse la cultura de un pueblo." John Steinbeck<br>

                          "La biblioteca destinada a la educación universal, es más poderosa que nuestros ejércitos." José de San Martín<br>

                          "El destino de muchos hombres dependió de tener o no una biblioteca en su hogar paterno". Edmundo de Amicis</p>
                        <a href="https://app.tecsup.edu.pe/SGA/biblioteca/index.html" target = "_blank" class="btn btn-outline-secondary btn-lg text-white">Leer más</a>
                    </div>
                    </center>
                </div>
            </div>
          </div>
      </header>
      <center>
  <br>
  <br>
  <div id="form">
    <form method="post">
      <table width="100%" border="1" cellpadding="15
      ">
        <tr>
          <td>
            <input type="text" name="fn" placeholder="Título del libro" value="<?php if(isset($_GET['edit'])) echo $getROW['fn'];?>">
          </td>
        </tr>
        <tr>
          <td>
            <input type="text" name="ln" placeholder="Autor"value="<?php if(isset($_GET['edit'])) echo $getROW['ln'];?>">
          </td>
        </tr>
        <tr>
          <td>
            <input type="text" name="an" placeholder="Año" value="<?php if(isset($_GET['edit'])) echo $getROW['an'];?>">
          </td>
        </tr>
        <tr>
          <td>
            <input type="text" name="ur" placeholder="URL" value="<?php if(isset($_GET['edit'])) echo $getROW['ur'];?>">
          </td>
        </tr>
        <tr>
          <td>
            <?php
            if(isset($_GET['edit'])){
              ?>
              <button type="submit" name="update" class="btn btn-outline-primary">Editar</button>
              <?php
            }else{
              ?>
              
              <button type="submit" name="save" class="btn btn-outline-primary">Registrar</button>
              <?php

            }
            ?>
          </td>
        </tr>
      </table>
      
    </form>
    <br><br>
    </center>
    <center>
      <table width="100%" border="1" cellpadding="15" align="center">
          <?php
          $res = $MySQLiconn->query("SELECT * FROM data");

          while($row=$res->fetch_array()){
          ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['fn']; ?></td>
            <td><?php echo $row['ln']; ?></td>
            <td><?php echo $row['an']; ?></td>
            <td><a href="<?php echo $row['ur'];?>" target="_blank">Ver</a></td>
            <td><a href="?edit=<?php echo $row['id'];?>"onclick="retun confirm('Confirmar edicion')">Editar</a></td>
            <td><a href="?del=<?php echo $row['id'];?>"onclick="retun confirm('Confirmar eliminacion')">Eliminar</a></td>
          </tr>
          <?php 

          }
          ?>
          
        </table>
    </center>
  </div>
      <br>
      <br>
      <!--Pie de página-->
      <div class="row"> <p class="text-muted small text-right">Melany Arbieto @2021.<br> Todos los derechos reservados.</p></div>


    <!-- Enlazar a Js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
  </body>
</html>

