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
$idadq=$_POST['orden'];
$nordn=$_POST['nordn'];
$revi=$_POST['revi'];
$fecharevisa=$_POST['fecharevisa'];
/* mssql_query("UPDATE ordenadq1 SET fecharevision='$fecharevisa',revision='$revi' WHERE idadquisicion=$idadq",$conexion); */ 
for($i=1;$i<=$numefilas;$i++){ 	 
		 $prod=$_POST['idproduct' . $i];
		 $canti=$_POST['canti' . $i];
		 $preci=$_POST['preci'. $i]; 		 
         mssql_query("UPDATE ordenadq2 SET cantidadadq=$canti,precprouniadq=$preci WHERE idadquisicion=$idadq AND cod=$prod",$conexion); 
} 
echo "<script>alert('Orden de Adquisicion Actualizada !!!');</script>";
mssql_close($conexion);
echo "<form name='formu' method='post' action='oadq3.php'>
	  <input type='hidden' name='orden' value=$idadq>
	  <input type='hidden' name='nordn' value=$nordn>
	  <input type='hidden' name='w' value=$w>";
echo "<script>formu.submit();</script></form>";
mssql_close($conexion);
?>