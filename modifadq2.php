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
$ordenpe=$_POST['ordenpe'];
$revi=$_POST['revi'];
$diacam=$_POST['diacam'];
$mescam=$_POST['mescam'];
$aniocam=$_POST['aniocam'];
$di1=((string)$diacam);
$me1=((string)$mescam);
$an1=((string)$aniocam);
$diae1=$_POST['diae1'];
$mese1=$_POST['mese1'];
$anioe1=$_POST['anioe1'];
$di2=((string)$diae1);
$me2=((string)$mese1);
$an2=((string)$anioe1);
$agenciaad=$_POST['trnsprt'];
$ftrans=$_POST['ftrans'];
$staus=$_POST['staus'];
$cndra=$_POST['cndra'];
$calle=$_POST['calle'];
$numero=$_POST['numero'];
$colonia=$_POST['colonia'];
$codpst=$_POST['codpst'];
$ciuda=$_POST['ciuda'];
$estado=$_POST['estado'];
$comet=$_POST['comet'];
$fecharevisa=$_POST['fecharevisa'];
$fechen="$di1/$me1/$an1";
$fechdes="$di2/$me2/$an2";
mssql_query("UPDATE ordenadq1 SET ordendped='$ordenpe',fecharevision='$fecharevisa',fechaenvioadqui1='$fechen',fechaenvioadqui2='$fechen',
								  fechadesent='$fechdes',fechadesent2='$fechdes',calleadq='$calle',numeroadq='$numero',
								  coloniaadq='$colonia',codpost='$codpst',ciudadadq='$ciuda',estadoadq='$estado',
								  idtransporte=$agenciaad,formatransporte='$ftrans',consolidadora=$cndra,revision='$revi',
								  comentaadq='$comet',statusadq='$staus' WHERE idadquisicion=$idadq",$conexion); 
for($i=1;$i<=$numefilas;$i++){ 	 
		 $prod=$_POST['idproduct' . $i];
		 $canti=$_POST['canti' . $i]; 
		 $preci=$_POST['preci' . $i];		 
         mssql_query("UPDATE ordenadq2 SET cantidadadq=$canti,precprouniadq=$preci WHERE idadquisicion=$idadq AND cod=$prod",$conexion); 
} 
$resuls=mssql_query("SELECT SUM(totlprdadq)AS subtotal
                    FROM ordenadq2
                    WHERE idadquisicion=$idadq",$conexion);
$g=mssql_fetch_array($resuls);
$totaluno=$g["subtotal"];
$iva=$totaluno*.15;
$neto=$totaluno+$iva;
mssql_query("UPDATE ordenadq1 SET totalordenadq=$neto WHERE idadquisicion=$idadq",$conexion);
echo "<script>alert('Orden de Adquisicion Actualizada !!!');</script>";
mssql_close($conexion);
echo "<form name='formu' method='post' action='verordenesadq.php'>";
echo "<script>formu.submit();</script></form>";
mssql_close($conexion);
?>
