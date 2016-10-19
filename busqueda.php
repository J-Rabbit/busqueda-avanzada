<!--Autor Jhon Jairo Salazar Agudelo-->
<?php
//busqueda es una variable inventada,
//GET es el metodo que se uso//
//buscar es la variable que se coloco en el html para nombrarlo//
$busqueda=$_GET['buscar'];
//Aqui estamos seleccionando la busqueda avanzada que deseamos buscar en la tabla con su respectiva especificación//
	$sql= "SELECT * FROM tb_usuarios,tb_correos,tb_rh where (tb_usuarios.documento like '$busqueda' or tb_usuarios.nombre like '%$busqueda%' or tb_correos.correo like '%$busqueda%'
	or tb_rh.tipo_sangre like '%$busqueda%') and tb_usuarios.documento=tb_correos.documento and tb_usuarios.id_tipo_sangre=tb_rh.id_tipo_sangre";


//Aqui estamos haciendo la conexión con la base de datos//
	$conexion=mysqli_connect ("localhost","root","","aqui va la base de datos");

	$resultado=$conexion->query($sql);

//Aqui estamos poniendo el resultado de la búsqueda en tablas para que se vea mas ordenado//
	echo "<table border=2>";
		while ($row=mysqli_fetch_assoc($resultado))

		{
			echo "<tr>";
			echo "<td>";
			echo$row['documento']; echo"<br>";
			echo "</td>";
			echo "<td>";
			echo$row['nombre']; echo"<br>";
			echo "</td>";
			echo "<td>";
			echo$row['tipo_sangre']; echo"<br>";
			echo "</td>";
			echo "<td>";
			echo$row['correo']; echo"<br>";
			echo "</td>";
			echo "</tr>";
		}
			echo"</table>";

?>

<a href="buscar.html">Volver</a>
