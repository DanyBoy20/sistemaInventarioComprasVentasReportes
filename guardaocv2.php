<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}    
	$cxx=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");	
	$resuls=mssql_query("SELECT SUM(totalprodcv)AS subtotal
                    FROM ordencv2
                    WHERE idcompraventa=$orden",$cxx);
$g=mssql_fetch_array($resuls);
$totaluno=$g["subtotal"];
$iva=$totaluno*.15;
$neto=$totaluno+$iva;
mssql_query("UPDATE ordencv1 SET totalordencv=$neto WHERE idcompraventa=$orden",$cxx);
mssql_query("UPDATE bloqueacompra SET blockcompra='no' WHERE blockcompra='si'",$cxx);
mssql_close($cxx);
	echo "<script>alert('Orden De Compra Guardada')</script>";
	echo "<script>window.location='claudia.php'</script>";
?>		