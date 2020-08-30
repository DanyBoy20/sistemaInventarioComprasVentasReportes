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
$numefilas=$_POST['numefilas'];
$idadq=$_POST['idadq'];
$diar=$diar;
$mesr=$mesr;
$anior=$anior;
$tcam=trim($tcam);
$dcam=trim($dcam);
$aucam=$aucam;
$diacam=$diacam;
$mescam=$mescam;
$aniocam=$aniocam;
$nommes=$nommes;
$fechacam="$diacam/$mescam/$aniocam";
/*
$cporte=$cporte;
*/
$freal="$diar/$mesr/$anior";
$dia=$dia;
$mes=$mes;
$anio=$anio;
$fechas="$dia/$mes/$anio";
/*
$trs=$trs;
*/
$stdo=$stdo;
/* cambios a las ordenes de compra */
			 
mssql_query("UPDATE ordencv1 SET fechestentregacv1='$fechas',fechestentregacv2='$fechas',
								 fecharealent1='$freal',fecharealent2='$freal',statusordencv='$stdo' 
	         WHERE idcompraventa=$idadq",$conexion); 
for($i=1;$i<=$numefilas;$i++){ 	 
		 $prod=$_POST['idproduct' . $i];
		 $canti=$_POST['canti' . $i]; 
		 $preci=$_POST['preci' . $i];		 
         mssql_query("UPDATE ordencv2 SET cantidadcv=$canti,preciounitcv=$preci WHERE idcompraventa=$idadq AND cod=$prod",$conexion); 
} 
$resuls=mssql_query("SELECT SUM(totalprodcv)AS subtotal
                    FROM ordencv2
                    WHERE idcompraventa=$idadq",$conexion);
$g=mssql_fetch_array($resuls);
$totaluno=$g["subtotal"];
$iva=$totaluno*.15;
$neto=$totaluno+$iva;
mssql_query("UPDATE ordencv1 SET totalordencv=$neto WHERE idcompraventa=$idadq",$conexion);
echo "<script>alert('Orden de Compra Actualizada !!!');</script>";
mssql_query("INSERT INTO ORDENCVCAMBIOS(idcompraventa,tipocambio,comencambio,diacam,mescam,aniocam,fechacambio,clave)
	                            VALUES($idadq,'$tcam','$dcam',$diacam,'$nommes',$aniocam,'$fechacam',$aucam)",$conexion); 
mssql_close($conexion);
echo "<form name='formu' method='post' action='verordenesocv.php'>";
echo "<script>formu.submit();</script></form>";
mssql_close($conexion);
?>