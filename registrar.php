<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtnombre"]) || empty($_POST["txtapellido"]) || empty($_POST["txtdireccion"]) || empty($_POST["txtciudad"])|| empty($_POST["txtestado"]) || empty($_POST["txtcp"]) || empty($_POST["txtcorreo"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtnombre"];
    $apellido = $_POST["txtapellido"];
    $direccion = $_POST["txtdireccion"];
    $ciudad = $_POST["txtciudad"];
    $estado = $_POST["txtestado"];
    $cp = $_POST["txtcp"];
    $correo = $_POST["txtcorreo"];
    
    $sentencia = $bd->prepare("INSERT INTO clientes(nombre,apellido,direccion,ciudad,estado,cp,correo) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$apellido,$direccion,$ciudad,$estado,$cp,$correo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>