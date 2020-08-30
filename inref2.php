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
	$cproc2=strtoupper(trim($cproc));
	$produ=mssql_query("SELECT cod FROM inventa1 WHERE idproduct='$cproc2'",$conexion);
    $lafi4=mssql_fetch_array($produ);
    $cproc1=$lafi4["cod"];	
	$resut=mssql_query("SELECT idproduct,linea,descripcion,notas,pventaEA FROM inventa1 WHERE cod=$cproc1",$conexion);
	$registroz=mssql_fetch_array($resut);
	$ccprod=$registroz["idproduct"];
	$linea=$registroz["linea"];
	$descrp=$registroz["descripcion"];
	$notai=$registroz["notas"];
	$precio=$registroz["pventaEA"];
if($cproc==''){
	echo "<script>alert('CAMPO PRODUCTO VACIO');</script>";
	mssql_close($conexion);
	echo "<script>window.location='inref.php'</script>";
}else if($cproc2 != $ccprod){
echo "<script>alert('NO EXISTE EL PRODUCTO');</script>";
mssql_close($conexion);
echo "<script>window.location='inref.php'</script>";
}else if($precio==''){
echo "<script>alert('ERROR ... LA CLAVE QUE INTRODUJO A CAMBIADO, REVISE LA SIGUIENTE NOTA: $notai ... FAVOR DE REVISAR NUEVO CATALOGO');</script>";
mssql_close($conexion);
echo "<script>window.location='inref.php'</script>";
}
?>
<?
$conn1=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
	$serie=strtoupper(trim($serie));
	$series1=explode("/",$serie);
	$series3=count($series1);
	$sal=0;
	$pedi=$pedi;
	$cproc=$cproc;
	$canti=$canti;
	$ndia=$ndia;
	$mmes=$mmes;
	$nmes=$nmes;
	$year=$nanio;
	$nyear=$aniocom;
	$comenta=$comenta;
	$disponible=$disponible;
	$esta=$esta;
	$ubica=$ubica;
	$tipoentra=$tipoentra;
$axx=0; // BUSCO EN LA BD LOS NUMEROS DE SERIE Y VERIFICO QUE LOS MISMOS NO ESTEN REPETIDOS	
if($canti == "" OR $pedi == ""){
            echo "<script>alert('Registro incompleto, campos sin llenar !!!');</script>";
			echo "<form name='formu' method='post' action='inref.php'>";
	        echo "<script>formu.submit();</script></form>";
}else if($serie == "" AND $canti >= 1){
echo "<form name='formu' method='post' action='inref3.php'>
	  <input type='hidden' name='serie' value=$serie>
	  <input type='hidden' name='pedi' value=$pedi>
	  <input type='hidden' name='cproc' value=$cproc>
	  <input type='hidden' name='canti' value=$canti>
	  <input type='hidden' name='ndia' value=$ndia>
	  <input type='hidden' name='nmes' value=$nmes>
	  <input type='hidden' name='mmes' value=$mmes>
	  <input type='hidden' name='year' value=$year>
	  <input type='hidden' name='nyear' value=$nyear>	  
	  <input type='hidden' name='comenta' value=$comenta>
	  <input type='hidden' name='disponible' value=$disponible>
	  <input type='hidden' name='esta' value=$esta>
	  <input type='hidden' name='ubica' value=$ubica>
	  <input type='hidden' name='tipoentra' value=$tipoentra>
	  <input type='hidden' name='sal' value=$sal>";
echo "<script>formu.submit();</script></form>";	
}else if($canti == $series3){	
	for($ux=1;$ux<=$series3;$ux++){	
		$serix=$series1[$axx];
		$resultax=mssql_query("SELECT serial FROM inventa2 WHERE serial='$serix'",$conn1);
		$lafilx=mssql_fetch_array($resultax);
		$lafx=$lafilx["serial"];
			if($lafx == $serix){
				echo "<script>alert('Error, el numero de serie $serix esta repetido, favor de hacer la insercion nuevamente')</script>";
				echo "<form name='formu' method='post' action='inref.php'>
					  <input type='hidden' name='idadq' value=$idadq>";
				echo "<script>formu.submit();</script></form>";			
			}else if($lafx != $serix){
				echo "<script>alert('Serie $serix Valido')</script>";
			}
		$axx++;
	}
echo "<form name='formu' method='post' action='inref3.php'>
	  <input type='hidden' name='serie' value=$serie>
	  <input type='hidden' name='pedi' value=$pedi>
	  <input type='hidden' name='cproc' value=$cproc>
	  <input type='hidden' name='canti' value=$canti>
	  <input type='hidden' name='ndia' value=$ndia>
	  <input type='hidden' name='nmes' value=$nmes>
	  <input type='hidden' name='mmes' value=$mmes>
	  <input type='hidden' name='year' value=$year>
	  <input type='hidden' name='nyear' value=$nyear>	  
	  <input type='hidden' name='comenta' value=$comenta>
	  <input type='hidden' name='disponible' value=$disponible>
	  <input type='hidden' name='esta' value=$esta>
	  <input type='hidden' name='ubica' value=$ubica>
	  <input type='hidden' name='tipoentra' value=$tipoentra>
	  <input type='hidden' name='sal' value=$sal>";
echo "<script>formu.submit();</script></form>";
}else if($canti != $series3){
		    echo "<script>alert('No concuerda el numero de equipos con el numero de series');</script>";
			echo "<form name='formu' method='post' action='inref.php'>";
	        echo "<script>formu.submit();</script></form>";
}else{
echo "<script>alert('ERROR !!! VERIFICAR QUE LOS NUMEROS DE SERIE LLEVEN EL FORMATO ADECUADO: 0000AAAA/0000BBBB/0000CCCC  RECUERDE QUE SI SON TRES EQUIPOS, EL ULTIMO NUMERO DE SERIE NO LLEVA /  . GRACIAS');</script>";
echo "<form name='formu' method='post' action='inref.php'>";
echo "<script>formu.submit();</script></form>";	
}
?>