<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
	$cxx=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	mssql_query("DELETE FROM ordencv2 WHERE cod=$idproduct AND idcompraventa=$idadq",$cxx);
	mssql_close($cxx);
$resuls=mssql_query("SELECT SUM(totalprodcv)AS subtotal
                    FROM ordencv2
                    WHERE idcompraventa=$idadq",$cxx);
$g=mssql_fetch_array($resuls);
$totaluno=$g["subtotal"];
$iva=$totaluno*.15;
$neto=$totaluno+$iva;
mssql_query("UPDATE ordencv1 SET totalordencv=$neto WHERE idcompraventa=$idadq",$cxx);	
echo "<script>alert('Producto eliminado')</script>";
echo "<form name='formu' method='post' action='modificaocv.php'>
	  <input type='hidden' name='idocv' value=$idadq>";
echo "<script>formu.submit();</script></form>";	
?>	