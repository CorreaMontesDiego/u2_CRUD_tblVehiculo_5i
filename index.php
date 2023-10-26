<?php include("./conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aprenda los conceptos básicos de CRUD con PHP y MySQL">
    <title>Datos de vehiculos</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- icono de material-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--fuente impresionante -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">Cmd-Cars</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="#">Ingresar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- Formulario para agregar vehiculos -->
        <div class="card mb-5">
            <!-- <div class="card-header">
                Ejercicio CRUD PHP & MySQL
            </div> -->
            <!-- agregar datos -->
            <div class="card-body">
                <h3 class="card-title">Tabla vehiculo</h3>
                <p class="card-text">Tabla vehiculo para la base de datos cmdCars, la cual nos ayuda a llevar un control de los vehiculos con los que cuenta el lote.</p>

                <!-- mostrar mensaje hecho -->
                <?php if (isset($_GET['subida'])) : ?>
                    <?php
                    if ($_GET['subida'] == 'hecho')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Exito!</strong> ¡Datos agregados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> ¡Los datos no fueron agregados!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="ingresar.php" method="POST">

                    <div class="col-6">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" name="marca" class="form-control" placeholder="Nissan" required>
                    </div>
                    <div class="col-md-6">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" name="modelo" class="form-control" placeholder="240sx" required>
                    </div>

                    <div class="col-md-6">
                        <label for="kilometraje" class="form-label">Kilometraje</label>
                        <input type="text" name="kilometraje" class="form-control" placeholder="90,000km" required>
                    </div>

                    <div class="col-md-6">
                        <label for="anio" class="form-label">Año</label>
                        <input type="text" name="anio" class="form-control" placeholder="1995" required>
                    </div>

                    <div class="col-md-6">
                        <label for="vin" class="form-label">VIN (Numero de serie)</label>
                        <input type="text" name="vin" class=" form-control" placeholder="2165454255" required>
                    </div>

                    <div class="col-md-6">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" name="color" class="form-control" placeholder="Blanco" required>
                    </div>

                    <div class="col-md-6">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" name="precio" class=" form-control" placeholder="250,000" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="enviar"><i class="fa fa-plus"></i><span class="ms-2">Enviar</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- título de la tabla -->
        <h5 class="mb-3">Contenido de la tabla</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Mostrar entradas</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Buscar..." aria-label="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!-- Mostrar mensaje de eliminación exitosa -->
        <?php if (isset($_GET['eliminacion'])) : ?>
            <?php
            if ($_GET['eliminacion'] == 'hecho')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Hecho!</strong> ¡Datos eliminados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong>¡Los datos eliminados fallaron!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- mostrar mensaje de hecho al editar -->
        <?php if (isset($_GET['actualizacion'])) : ?>
            <?php
            if ($_GET['actualizacion'] == 'hecho')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Hecho!</strong> ¡Datos actualizados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> ¡Fallo la actualizacion de datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- mesa -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>Id vehiculo</th>";
            echo "<th scope='col'>Marca</th>";
            echo "<th scope='col'>Modelo</th>";
            echo "<th scope='col'>Kilometraje</th>";
            echo "<th scope='col'>Año</th>";
            echo "<th scope='col'>VIN</th>";
            echo "<th scope='col'>Color</th>";
            echo "<th scope='col'>Precio</th>";
            echo "<th scope='col' class='text-center'>Opciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $limite = 10;  // Número de registros por página
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;  // Página actual
$pagina_inicio = ($pagina > 1) ? ($pagina * $limite) - $limite : 0;  // Índice de inicio de la página

$anterior = $pagina - 1;  // Página anterior
$siguiente = $pagina + 1;  // Página siguiente

$datos = mysqli_query($db, "SELECT * FROM vehiculo");  // Consulta para obtener todos los datos de la tabla "estudiantes"
$cantidad_datos = mysqli_num_rows($datos);  // Cantidad total de registros en la tabla
$total_pagina = ceil($cantidad_datos / $limite);  // Número total de páginas

$datos_vehiculos = mysqli_query($db, "SELECT * FROM vehiculo LIMIT $pagina_inicio, $limite");  // Consulta para obtener datos paginados
$numero = $pagina_inicio + 1;  // Número de registro en la página actual

            // $sql = "SELECT * FROM vehiculo";
            // $query = mysqli_query($db, $sql);




            while ($vehiclo = mysqli_fetch_array($datos_vehiculos)) {
                echo "<tr>";
                echo "<td>" . $vehiclo['idVehiculo'] . "</td>";
                echo "<td>" . $vehiclo['marca'] . "</td>";
                echo "<td>" . $vehiclo['modelo'] . "</td>";
                echo "<td>" . $vehiclo['kilometraje'] . "</td>";
                echo "<td>" . $vehiclo['anio'] . "</td>";
                echo "<td>" . $vehiclo['vin'] . "</td>";
                echo "<td>" . $vehiclo['color'] . "</td>";
                echo "<td>" . $vehiclo['precio'] . "</td>";

                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                // boton eliminar

                echo "
                            <!-- Botón para activar modal -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($cantidad_datos == 0) {
                echo "<p class='text-center'>No hay datos disponibles en esta tabla.</p>";
            } else {
                echo "<p>Total $cantidad_datos entradas</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- paginación -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina > 1) ? "href='?pagina=$previous'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_pagina; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina < $total_pagina) ? "href='?pagina=$next'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>

        </nav>

        <!-- Modal editar-->
        <div class='modal fade' style="top:58px !important;" id='editModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Editar datos de vehiculo</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM vehiculo";
                    $query = mysqli_query($db, $sql);
                    $vehiculo = mysqli_fetch_array($query);
                    ?>

                    <form action='editar.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='editar_id' id='editar_id'>

                            <div class="col-12 mb-3">
                                <label for="editar_marca" class="form-label">Marca</label>
                                <input type="text" name="editar_marca" id="editar_marca" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="editar_modelo" class="form-label">Modelo</label>
                                <input type="text" name="editar_modelo" id="editar_modelo" class="form-control" placeholder="G64190021" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="editar_kilometraje" class="form-label">Kilometraje</label>
                                <input type="text" name="editar_kilometraje" id="editar_kilometraje" class="form-control" placeholder="G64190021" required>
                            </div>


                            <div class="col-12 mb-3">
                                <label for="editar_anio" class="form-label">Año</label>
                                <input type="text" name="editar_anio" id="editar_anio" class="form-control" placeholder="G64190021" required>
                            </div>



                            <div class="col-12 mb-3">
                                <label for="editar_vin" class="form-label">VIN(Numero de serie)</label>
                                <input type="text" name="editar_vin" id="editar_vin" class="form-control"  placeholder="Ilmu Komputer" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="editar_color" class="form-label">Color</label>
                                <input type="text" step=0.01 name="editar_color" id="editar_color" class=" form-control" placeholder="3.52" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="editar_precio" class="form-label">Precio</label>
                                <input type="text" step=0.01 name="editar_precio" id="editar_precio" class=" form-control" placeholder="3.52" required>
                            </div>

                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='editar_datos' class='btn btn-primary'>Hecho</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- Modal eliminar-->
        <div class='modal fade' style="top:58px !important;" id='borrarModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Confirmación</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='eliminar.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='eliminar_id' id='eliminar_id'>
                            <p>¿Estás seguro de que deseas eliminar estos datos?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='eliminar_datos' class='btn btn-primary'>Hecho</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- cerrar el contenedor -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- funcion editar  -->
    <script>
        $(document).ready(function() {
            $('.editButton').on('click', function() {
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#editar_id').val(data[0]);
                // No se utiliza, ya que solo incrementa el número
                // $('#no').val(data[1]);
                $('#editar_marca').val(data[1]);
                $('#editar_modelo').val(data[2]);
                $('#editar_kilometraje').val(data[3]);

                $('#editar_anio').val(data[4]);
                $('#editar_vin').val(data[5]);
                $('#editar_color').val(data[6]);
                $('#editar_precio').val(data[7]);
            });
        });
    </script>

    <!-- funcion eliminar -->
    <script>
        $(document).ready(function() {
            $('.deleteButton').on('click', function() {
                $('#borrarModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#eliminar_id').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>

</html>