<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
	$cxx=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	mssql_query("UPDATE intentos SET idintento=0",$cxx);
	mssql_query("DELETE FROM pagoadq2 WHERE npagoadq=$w",$cxx);
	mssql_query("DELETE FROM pagoadq1 WHERE npagoadq=$w",$cxx);
	mssql_query("DELETE FROM ordenadq2 WHERE idadquisicion=$orden",$cxx);
	mssql_query("DELETE FROM ordenadq1 WHERE idadquisicion=$orden",$cxx);
	mssql_close($cxx);
	echo "<script>alert('Orden De Compra Cancelada')</script>";
	echo "<script>window.location='claudia.php'</script>";
?>			