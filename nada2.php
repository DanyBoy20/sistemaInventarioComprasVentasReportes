<?
session_start();
if(!isset($_SESSION['code']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
    $cxx=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	mssql_query("UPDATE intentos SET idintento=0",$cxx);
    mssql_close($cxx);
	echo "<script>window.location='claudia.php'</script>";
?>