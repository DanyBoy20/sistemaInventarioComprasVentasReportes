<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
	$cxx=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	mssql_query("DELETE FROM ordenadq2 WHERE cod=$idproduct AND idadquisicion=$idadq",$cxx);
	mssql_close($cxx);
	echo "<script>alert('Producto eliminado')</script>";
echo "<form name='formu' method='post' action='oadq3.php'>
	  <input type='hidden' name='orden' value=$idadq>
	  <input type=hidden name='w' value=$w>
   		  <input type=hidden name='nordn' value=$nordn>";
echo "<script>formu.submit();</script></form>";	
?>			