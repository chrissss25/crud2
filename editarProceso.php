<?php
    print_r($_POST);
    if(!isset($_POST['idcliente'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $idcliente = $_POST['idcliente'];
    $nombre = $_POST['txtnombre'];
    $apellido = $_POST['txtapellido'];
    $direccion = $_POST['txtdireccion'];
    $ciudad = $_POST['txtciudad'];
    $estado = $_POST['txtestado'];
    $cp = $_POST['txtcp'];
    $correo = $_POST['txtcorreo'];

    $sentencia = $bd->prepare("UPDATE clientes SET nombre = ?, apellido = ?, direccion = ?, ciudad = ?, estado = ?, cp = ?, correo = ? where idcliente = ?;");
    $resultado = $sentencia->execute([$nombre, $apellido, $direccion, $ciudad, $estado, $cp, $correo, $idcliente]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>