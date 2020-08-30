<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<?
$conexion=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$stdo=$stdo;
mssql_query("UPDATE ordencv1 SET statusordencv='$stdo' 
	         WHERE idcompraventa=$idadq",$conexion); 
echo "<script>alert('Orden de Adquisicion Actualizada !!!');</script>";
mssql_close($conexion);
echo "<form name='formu' method='post' action='verordenesocven1.php'>";
echo "<script>formu.submit();</script></form>";
mssql_close($conexion);
?>