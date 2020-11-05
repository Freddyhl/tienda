<?php
include "globales/global.php";
include "globales/conexion.php";




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>


    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="index.php">Logo</a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link activo" href="#">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Carrito</a>
            </li>



            </li>
        </ul>
    </nav>
    <br>
    <div class="container">

        <div class="alert alert alert-success">
            pantalla de mensaje....
            <a class="badge badge  badge-success" href="">Ver Carrito</a>
        </div>


        <div class="row">
            <?php

            $sentecia =$pdo->prepare("SELECT*FROM productos");

            $sentecia->execute();

            $listaProductos = $sentecia->fetchAll(PDO::FETCH_ASSOC);
            
            //print_r($listaProductos);

            ?>

            <?php foreach ($listaProductos as $producto) {?>
            <div class="col">

                <div class="card" style="width:250px">
                    <img class="card-img-top" title="<?php echo $producto['nombre'];  ?>"
                        src="<?php echo $producto['imagen']; ?>" alt="Card image" style="width:100%"
                        data-toggle="popover" data-trigger="hover"
                        data-content="<?php echo $producto['descripcion']; ?>">

                    <div class="card-body">
                        <span><?php echo $producto['nombre'];  ?></span>


                        <h4 class="card-title">$<?php echo $producto['precio'];  ?></h4>
                        <!--<p class="card-text"><?php echo $producto['descripcion']; ?></p>-->
                        <p class="card-text">Descripción</p>

                        <form method="post">
                            <input type="text" name="id" id="id" value="<?php echo $producto['id'];  ?>">
                            <input type="text" name="nombre" id="nombre" value="<?php echo $producto['nombre'];  ?>">
                            <input type="text" name="precio" id="precio" value="<?php echo $producto['precio'];  ?>">
                            <input type="text" name="cantidad" id="cantidad" value="<?php echo 1;  ?>">

                            <button type="submit" class="btn btn-primary" name="btnAccion" value="Agregar">Agregar al
                                Carrito</button>

                        </form>


                    </div>
                </div>
                <br>
            </div>


            <?php  }?>



        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover();
    });
    </script>
</body>

</html>