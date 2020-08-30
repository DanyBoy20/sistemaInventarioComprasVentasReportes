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
$resuls=mssql_query("SELECT SUM(totlprdadq)AS subtotal
                    FROM ordenadq2
                    WHERE idadquisicion=$idadq",$cxx);
$g=mssql_fetch_array($resuls);
$totaluno=$g["subtotal"];
$iva=$totaluno*.15;
$neto=$totaluno+$iva;
mssql_query("UPDATE ordenadq1 SET totalordenadq=$neto WHERE idadquisicion=$idadq",$cxx);
	echo "<script>alert('Producto eliminado')</script>";
echo "<form name='formu' method='post' action='modificaadq.php'>
	  <input type='hidden' name='idadq' value=$idadq>";
echo "<script>formu.submit();</script></form>";	
?>			