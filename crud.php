<?php
/*llamar un archivo incluir el archivo y el once solo una vez lo va a cargar*/
include_once 'db.php';

/*insertar*/
if(isset($_POST['save']))
{
	/*real_escape_string valida que solo halla una cadena de caracteres*/
	$fn = $MySQLiconn->real_escape_string($_POST['fn']);
	$ln = $MySQLiconn->real_escape_string($_POST['ln']);
	$an = $MySQLiconn->real_escape_string($_POST['an']);
	$ur = $MySQLiconn->real_escape_string($_POST['ur']);


	/*query es un metedo */
	$SQL = $MySQLiconn->query("INSERT INTO data(fn,ln,an,ur) VALUES('$fn','$ln','$an','$ur')");

	if(!$SQL)
	{
		echo $MySQLiconn->error;
	}
}
/**/

/*delete*/
/*Se verifica si a pasado por url la varibale del*/
if(isset($_GET['del']))
{
	$SQL = $MySQLiconn->query("DELETE FROM data WHERE id=".$_GET['del']);
	/*recargue la pagina*/
	header("Location: index.php");
}

/**/

/*update*/
/*recibir*/
if(isset($_GET['edit']))
{
	$SQL = $MySQLiconn->query("SELECT * FROM data WHERE id =".$_GET['edit']);
	/*fetch_array la data que es un objeto aun arreglo*/
	$getROW = $SQL ->fetch_array();
}
if(isset($_POST['update']))
{
	$SQL = $MySQLiconn->query("UPDATE data SET fn='".$_POST['fn']."', ln='".$_POST['ln']."' , an='".$_POST['an']."', ur='".$_POST['ur']."' WHERE id=".$_GET['edit']);
	header("Location: index.php");
}
