<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<?
$conn1=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
	$idadq=$idadq;
	$serie=strtoupper(trim($serie));
	$series1=explode("/",$serie);
	$series3=count($series1);
	$sal=0;
	$pedi=$pedi;
	$canti=$canti;
	$cproc=$cproc;
		        $produ=mssql_query("SELECT cod,linea,tipo FROM inventa1 WHERE idproduct='$cproc'",$conn1);
    			$lafi4=mssql_fetch_array($produ);
				$lineaeqp=$lafi4["linea"];
				$tipoprd=$lafi4["tipo"];
    			$cproc1=$lafi4["cod"];
					$rsl=mssql_query("SELECT diferen,cod FROM ordenadq2 WHERE cod=$cproc1 AND idadquisicion=$idadq",$conn1);
					$linea=mssql_fetch_array($rsl);
					$f1=$linea["diferen"];
					$f2=$linea["cod"];			
	$codorden=$codorden;
	$code=$code;
	$dia=$dia;
	$mes=$mes;
	$nmes=$nmes;
	$year=$year;
	$nyear=$nyear;
	$comenta=$comenta;
	$disponible=$disponible;
	$esta=$esta;
	$ubica=$ubica;
	$tipoentra=$tipoentra;
if($canti == "" OR $pedi == ""){
	  echo "<script>alert('ERROR!!! REGISTRO INCOMPLETO');</script>";
	  echo "<form name='formu' method='post' action='reciboadq6.php'>
	  <input type='hidden' name='idadq' value='$idadq'>	  
	  <input type='hidden' name='pedi' value='$pedi'>
	  <input type='hidden' name='codorden' value='$codorden'>
	  <input type='hidden' name='code' value='$code'>
	  <input type='hidden' name='disponible' value='$disponible'>
	  <input type='hidden' name='tipoentra' value='$tipoentra'>
	  <input type='hidden' name='dia' value='$dia'>
	  <input type='hidden' name='mes' value='$mes'>
	  <input type='hidden' name='nmes' value='$nmes'>
	  <input type='hidden' name='year' value='$year'>
	  <input type='hidden' name='nyear' value='$nyear'>";
echo "<script>formu.submit();</script></form>";	
}else if($canti > $f1){
	  echo "<script>alert('ERROR!!! LA CANTIDAD ES MAYOR A LA ORDENADA');</script>";
	  echo "<form name='formu' method='post' action='reciboadq6.php'>
	  <input type='hidden' name='idadq' value='$idadq'>	  
	  <input type='hidden' name='pedi' value='$pedi'>
	  <input type='hidden' name='codorden' value='$codorden'>
	  <input type='hidden' name='code' value='$code'>
	  <input type='hidden' name='disponible' value='$disponible'>
	  <input type='hidden' name='tipoentra' value='$tipoentra'>
	  <input type='hidden' name='dia' value='$dia'>
	  <input type='hidden' name='mes' value='$mes'>
	  <input type='hidden' name='nmes' value='$nmes'>
	  <input type='hidden' name='year' value='$year'>
	  <input type='hidden' name='nyear' value='$nyear'>";
echo "<script>formu.submit();</script></form>";	
// verifico que el equipo a insertar sea equipo y pertenesca a las lineas que tienen numero de serie
}else if($serie == "" && $tipoprd == "FG" && $lineaeqp != "Valvulas"){
			echo "<script>alert('ERROR !!! DEBE DE INSERTAR NUMERO DE SERIE. TODO EQUIPO LLEVA NUMERO DE SERIE A EXCEPCION DE REFACCIONES(TODAS LAS LINEAS), ACCESORIOS Y VALVULAS(INCLUYE EQUIPO FG)');</script>";
echo "<form name='formu' method='post' action='reciboadq6.php'>
	  <input type='hidden' name='idadq' value='$idadq'>	  
	  <input type='hidden' name='pedi' value='$pedi'>
	  <input type='hidden' name='codorden' value='$codorden'>
	  <input type='hidden' name='code' value='$code'>
	  <input type='hidden' name='disponible' value='$disponible'>
	  <input type='hidden' name='tipoentra' value='$tipoentra'>
	  <input type='hidden' name='dia' value='$dia'>
	  <input type='hidden' name='mes' value='$mes'>
	  <input type='hidden' name='nmes' value='$nmes'>
	  <input type='hidden' name='year' value='$year'>
	  <input type='hidden' name='nyear' value='$nyear'>";
echo "<script>formu.submit();</script></form>";	
// end	
}else if($serie == "" AND $canti >= 1){
echo "<form name='formu' method='post' action='reciboadq4.php'>
	  <input type='hidden' name='idadq' value=$idadq>
	  <input type='hidden' name='serie' value='$serie'>
	  <input type='hidden' name='pedi' value='$pedi'>
	  <input type='hidden' name='cproc' value=$cproc>
	  <input type='hidden' name='canti' value=$canti>
	  <input type='hidden' name='codorden' value='$codorden'>
	  <input type='hidden' name='code' value=$code>
	  <input type='hidden' name='dia' value=$dia>
	  <input type='hidden' name='mes' value=$mes>
	  <input type='hidden' name='nmes' value='$nmes'>
	  <input type='hidden' name='year' value=$year>
	  <input type='hidden' name='nyear' value=$nyear>
	  <input type='hidden' name='comenta' value='$comenta'>
	  <input type='hidden' name='disponible' value='$disponible'>
	  <input type='hidden' name='esta' value='$esta'>
	  <input type='hidden' name='ubica' value='$ubica'>
	  <input type='hidden' name='tipoentra' value='$tipoentra'>";
echo "<script>formu.submit();</script></form>";	
}else if($canti == $series3){	
$axx=0; // BUSCO EN LA BD LOS NUMEROS DE SERIE Y VERIFICO QUE LOS MISMOS NO ESTEN REPETIDOS	
	for($ux=1;$ux<=$series3;$ux++){	
		$serix=$series1[$axx];
		$resultax=mssql_query("SELECT serial FROM inventa2 WHERE serial='$serix'",$conn1);
		$lafilx=mssql_fetch_array($resultax);
		$lafx=$lafilx["serial"];
			if($lafx == $serix){
				echo "<script>alert('ERROR!!! EL NUMERO DE SERIE $serix ESTA REPETIDO, FAVOR DE HACER LA INSERCION NUEVAMENTE')</script>";
				echo "<form name='formu' method='post' action='reciboadq6.php'>
	  				  <input type='hidden' name='idadq' value='$idadq'>	  
	  				  <input type='hidden' name='pedi' value='$pedi'>
	  				  <input type='hidden' name='codorden' value='$codorden'>
	  				  <input type='hidden' name='code' value='$code'>
	  				  <input type='hidden' name='disponible' value='$disponible'>
	  				  <input type='hidden' name='tipoentra' value='$tipoentra'>
	  				  <input type='hidden' name='dia' value='$dia'>
	  				  <input type='hidden' name='mes' value='$mes'>
	  				  <input type='hidden' name='nmes' value='$nmes'>
	  				  <input type='hidden' name='year' value='$year'>
	  				  <input type='hidden' name='nyear' value='$nyear'>";
				echo "<script>formu.submit();</script></form>";				
			}else if($lafx != $serix){
				echo "<script>alert('SERIE $serix VALIDO')</script>";
			}
		$axx++;
	}
echo "<form name='formu' method='post' action='reciboadq4.php'>
	  <input type='hidden' name='idadq' value=$idadq>
	  <input type='hidden' name='serie' value='$serie'>
	  <input type='hidden' name='pedi' value='$pedi'>
	  <input type='hidden' name='cproc' value=$cproc>
	  <input type='hidden' name='canti' value=$canti>
	  <input type='hidden' name='codorden' value='$codorden'>
	  <input type='hidden' name='code' value=$code>
	  <input type='hidden' name='dia' value=$dia>
	  <input type='hidden' name='mes' value=$mes>
	  <input type='hidden' name='nmes' value='$nmes'>
	  <input type='hidden' name='year' value=$year>
	  <input type='hidden' name='nyear' value=$nyear>
	  <input type='hidden' name='comenta' value='$comenta'>
	  <input type='hidden' name='disponible' value='$disponible'>
	  <input type='hidden' name='esta' value='$esta'>
	  <input type='hidden' name='ubica' value='$ubica'>
	  <input type='hidden' name='tipoentra' value='$tipoentra'>";
echo "<script>formu.submit();</script></form>";
}else if($canti != $series3){
		    echo "<script>alert('ERROR!!! NO CONCUERDA EL NUMERO DE EQUIPOS CON EL NUMERO DE SERIE');</script>";
			echo "<form name='formu' method='post' action='reciboadq6.php'>
	  				  <input type='hidden' name='idadq' value='$idadq'>	  
	  				  <input type='hidden' name='pedi' value='$pedi'>
	  				  <input type='hidden' name='codorden' value='$codorden'>
	  				  <input type='hidden' name='code' value='$code'>
	  				  <input type='hidden' name='disponible' value='$disponible'>
	  				  <input type='hidden' name='tipoentra' value='$tipoentra'>
	  				  <input type='hidden' name='dia' value='$dia'>
	  				  <input type='hidden' name='mes' value='$mes'>
	  				  <input type='hidden' name='nmes' value='$nmes'>
	  				  <input type='hidden' name='year' value='$year'>
	  				  <input type='hidden' name='nyear' value='$nyear'>";
				echo "<script>formu.submit();</script></form>";
}else{
echo "<script>alert('ERROR DE SISTEMA!!!);</script>";
echo "<form name='formu' method='post' action='reciboadq6.php'>
	  				  <input type='hidden' name='idadq' value='$idadq'>	  
	  				  <input type='hidden' name='pedi' value='$pedi'>
	  				  <input type='hidden' name='codorden' value='$codorden'>
	  				  <input type='hidden' name='code' value='$code'>
	  				  <input type='hidden' name='disponible' value='$disponible'>
	  				  <input type='hidden' name='tipoentra' value='$tipoentra'>
	  				  <input type='hidden' name='dia' value='$dia'>
	  				  <input type='hidden' name='mes' value='$mes'>
	  				  <input type='hidden' name='nmes' value='$nmes'>
	  				  <input type='hidden' name='year' value='$year'>
	  				  <input type='hidden' name='nyear' value='$nyear'>";
echo "<script>formu.submit();</script></form>";
}
?>