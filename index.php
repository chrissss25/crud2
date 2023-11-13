<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from clientes");
    $clientes = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($clientes);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista clientes
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">nombre</th>
                                <th scope="col">apellido</th>
                                <th scope="col">direccion</th>
                                <th scope="col">ciudad</th>
                                <th scope="col">estado</th>
                                <th scope="col">cp</th>
                                <th scope="col">correo</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($clientes as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->idcliente; ?></td>
                                <td><?php echo $dato->nombre; ?></td>
                                <td><?php echo $dato->apellido; ?></td>
                                <td><?php echo $dato->direccion; ?></td>
                                <td><?php echo $dato->ciudad; ?></td>
                                <td><?php echo $dato->estado; ?></td>
                                <td><?php echo $dato->cp; ?></td>
                                <td><?php echo $dato->correo; ?></td>
                                <td><a class="text-success" href="editar.php?idcliente=<?php echo $dato->idcliente; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?idcliente=<?php echo $dato->idcliente; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">nombre: </label>
                        <input type="text" class="form-control" name="txtnombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">apellido: </label>
                        <input type="text" class="form-control" name="txtapellido" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">direccion: </label>
                        <input type="text" class="form-control" name="txtdireccion" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ciudad: </label>
                        <input type="text" class="form-control" name="txtciudad" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">estado: </label>
                        <input type="text" class="form-control" name="txtestado" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">cp: </label>
                        <input type="text" class="form-control" name="txtcp" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">correo: </label>
                        <input type="text" class="form-control" name="txtcorreo" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>