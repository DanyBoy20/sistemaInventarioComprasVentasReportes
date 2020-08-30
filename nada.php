<?
session_start();
if(!isset($_SESSION['code']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
    $cxx=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	mssql_query("UPDATE intentos2 SET idintento=0",$cxx);
	//mssql_query("UPDATE bloqueacompra SET blockcompra='no' WHERE blockcompra='si'",$cxx);
    mssql_close($cxx);
	echo "<script>window.location='claudia.php'</script>";
?>