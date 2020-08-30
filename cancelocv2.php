<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
	$cxx=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");	
	mssql_query("DELETE FROM ordencv2 WHERE idcompraventa=$orden",$cxx);
	mssql_query("DELETE FROM ordencv1 WHERE idcompraventa=$orden",$cxx);
	mssql_query("UPDATE bloqueacompra SET blockcompra='no' WHERE blockcompra='si'",$cxx);
	mssql_close($cxx);
	echo "<script>alert('Orden de Compra Cancelada')</script>";
	echo "<script>window.location='claudia.php'</script>";
?>			