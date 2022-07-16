<?php
$verbo = $_SERVER["REQUEST_METHOD"];
switch ($verbo) {
    case "GET":
        enviar_datos();
        case "POST":
            recibir_datos();
            break;
        
}
function enviar_datos(){
    $conexion = new Conexion();
    try{
        $conn = $conexion->abrir();
        $sql = "SELECT * FROM usuario";
        $statement = $conn->prepare($sql);
        $statement -> execute();
        $resultado = $statement ->fetchAll();
        $conexion->cerrar();

    }
    echo json_encode($resultado);
}

function recibir_datos(){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $tipo = $_POST["tipo"];

$conexion = new Conexion();
try{
    $conn = $conexion->abrir();
    $sql = "INSERT INTO usuario(username,password,apellidos,tipo,id_escuela) 
    VALUES ('$username', '$password', '$nombres', '$apellidos','$tipo',1)";
}

}