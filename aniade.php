<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<?
$cprocq=$pc1;
$conexionw=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$produw=mssql_query("SELECT idproduct FROM inventa1 WHERE idproduct='$cprocq'",$conexionw);
$lafiw=mssql_fetch_array($produw);
$cprocw=$lafiw["idproduct"];
 if($cprocw == ""){
echo "<script>alert('No existe el producto ... Intentelo nuevamente !!!');</script>";
mssql_close($conexionw);
echo "<form name='formu' method='post' action='modifadq.php'>
	  <input type='hidden' name='idadq' value=$idadq>";
echo "<script>formu.submit();</script></form>";
}else{
	$orden=$iddq;
	$cproc3=$pc1;
	$cntent=0;
	$ct1=$ct1;
	$cxx=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	$cproc2=strtoupper(trim($cproc3));
	$produ=mssql_query("SELECT cod FROM inventa1 WHERE idproduct='$cproc2'",$cxx);
    $lafi4=mssql_fetch_array($produ);
    $cproc1=$lafi4["cod"];
	$resut=mssql_query("SELECT idproduct,linea,descripcion,pventaEA FROM inventa1 WHERE cod=$cproc1",$cxx);
	$registroz=mssql_fetch_array($resut);
		$ccprod=$registroz["idproduct"];
		$linea=$registroz["linea"];
		$descrp=$registroz["descripcion"];
		$precio=$registroz["pventaEA"];
	mssql_query("INSERT INTO ordenadq2(idadquisicion,cantidadadq,cantentregadadq,cod,precprouniadq)
	                            VALUES($orden,$ct1,$cntent,$cproc1,$precio)",$cxx); 
	$resuls=mssql_query("SELECT SUM(totlprdadq)AS subtotal
                    FROM ordenadq2
                    WHERE idadquisicion=$idadq",$cxx);
	$g=mssql_fetch_array($resuls);
	$totaluno=$g["subtotal"];
	$iva=$totaluno*.15;
	$neto=$totaluno+$iva;
	mssql_query("UPDATE ordenadq1 SET totalordenadq=$neto WHERE idadquisicion=$idadq",$cxx);
	mssql_close($cxx);
	echo "<script>alert('Producto Insertado')</script>";
echo "<form name='formu' method='post' action='modificaadq.php'>
	  <input type='hidden' name='idadq' value=$idadq>";
echo "<script>formu.submit();</script></form>";	
}
?>	
