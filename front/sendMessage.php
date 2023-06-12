<?php
session_start();
include("cabecera_log.php");
include("../back/connection.php");

if (!isset($_SESSION['id_user']) || !isset($_POST['msg']) || !isset($_POST['receiver'])) {
    header('location:index.php');
    exit;
}

$sender = $_SESSION['id_user'];
$message = $_POST['msg'];
$receiver = $_POST['receiver'];

$message = mysqli_real_escape_string($conexion, $message);
$receiver = mysqli_real_escape_string($conexion, $receiver);

$sql = "INSERT INTO `chat` (`id_emisor`, `id_receptor`, `message`) VALUES ('$sender', '$receiver', '$message')";

if(mysqli_query($conexion, $sql)){
    header("location:pagina_mensajeria.php?selectedChatUserId=" . urlencode($receiver));
} else {
    echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($conexion);
}
?>
