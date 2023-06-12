<?php

include "../back/connection.php";
session_start();
if($_POST)
{
	$name=$_SESSION['user'];
    $msg=$_POST['msg'];
    
	$sql="INSERT INTO `chat`(`user`, `message`) VALUES ('".$name."', '".$msg."')";

	$query = mysqli_query($conexion,$sql);
	if($query)
	{
		header('Location: pagina_mensajeria.php');
	}
	else
	{
		echo "Algo salió mal";
	}
	
	}
?>