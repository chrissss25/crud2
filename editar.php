<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['idcliente'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $idcliente = $_GET['idcliente'];

    $sentencia = $bd->prepare("select * from clientes where idcliente = ?;");
    $sentencia->execute([$idcliente]);
    $clientes = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($clientes);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">nombre: </label>
                        <input type="text" class="form-control" name="txtnombre" required 
                        value="<?php echo $clientes->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">apellido: </label>
                        <input type="text" class="form-control" name="txtapellido" autofocus required
                        value="<?php echo $clientes->apellido; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">direccion: </label>
                        <input type="text" class="form-control" name="txtdireccion" autofocus required
                        value="<?php echo $clientes->direccion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ciudad: </label>
                        <input type="text" class="form-control" name="txtciudad" autofocus required
                        value="<?php echo $clientes->ciudad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">estado: </label>
                        <input type="text" class="form-control" name="txtestado" autofocus required
                        value="<?php echo $clientes->estado; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">cp: </label>
                        <input type="text" class="form-control" name="txtcp" autofocus required
                        value="<?php echo $clientes->cp; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">correo: </label>
                        <input type="text" class="form-control" name="txtcorreo" autofocus required
                        value="<?php echo $clientes->correo; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="idcliente" value="<?php echo $clientes->idcliente; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>