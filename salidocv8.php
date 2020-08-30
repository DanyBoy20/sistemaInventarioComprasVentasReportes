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
	$cproc=$cproc;	
	$dist=trim($dist);
	$canti=trim($canti);	
	$serie=strtoupper(trim($serie));
	$series1=explode("/",$serie);
	$series3=count($series1);	
	$series2=substr($serie,0,2);
	$idadq=trim($idadq);
	$idocv=trim($idocv);
	$code=trim($code);
	$codorden=trim($codorden);
	$dia=trim($dia);
	$mes=trim($mes);
	$nmes=trim($nmes);
	$year=trim($year);
	$nyear=trim($nyear);
	$disponible=trim($disponible);
	$produ=mssql_query("SELECT cod FROM inventa1 WHERE idproduct='$cproc'",$conn1);
	$lafi4=mssql_fetch_array($produ);
	$cproc1=$lafi4["cod"];
	$rsl=mssql_query("SELECT diferente,cod FROM ordencv2 WHERE cod=$cproc1 AND idcompraventa=$idocv",$conn1);
	$linea=mssql_fetch_array($rsl);
	$f1=$linea["diferente"];
	$f2=$linea["cod"];	
$axx=0; // BUSCO EN LA BD LOS NUMEROS DE SERIE Y VERIFICO QUE LOS MISMOS NO ESTEN REPETIDOS	
if($canti == "" OR $serie == ""){
            echo "<script>alert('Registro incompleto, campos sin llenar !!!');</script>";
			echo "<form name='formu' method='post' action='salidocv5.php'>
	  			 <input type='hidden' name='cproc' value='$cproc'>
	  			 <input type='hidden' name='canti' value='$canti'>
	  			 <input type='hidden' name='serie' value='$serie'>
	  			 <input type='hidden' name='idadq' value='$idadq'>
	  			 <input type='hidden' name='idocv' value='$idocv'>
	  			 <input type='hidden' name='code' value='$code'>
				 <input type='hidden' name='codorden' value='$codorden'>
	  			 <input type='hidden' name='mes' value='$mes'>
	  			 <input type='hidden' name='nmes' value='$nmes'>
	  			 <input type='hidden' name='year' value='$year'>
	  			 <input type='hidden' name='nyear' value='$nyear'>
	  			 <input type='hidden' name='dia' value='$dia'>
	 			 <input type='hidden' name='dist' value='$dist'>
	  			 <input type='hidden' name='disponible' value='$disponible'>";
	        echo "<script>formu.submit();</script></form>";
}else if($canti > $f1){
    echo "<script>alert('ERROR !!! LA CANTIDAD ES MAYOR A LA ORDENADA !!! ');</script>";
	echo "<form name='formu' method='post' action='salidocv5.php'>
	  			 <input type='hidden' name='cproc' value='$cproc'>
	  			 <input type='hidden' name='canti' value='$canti'>
	  			 <input type='hidden' name='serie' value='$serie'>
	  			 <input type='hidden' name='idadq' value='$idadq'>
	  			 <input type='hidden' name='idocv' value='$idocv'>
	  			 <input type='hidden' name='code' value='$code'>
				 <input type='hidden' name='codorden' value='$codorden'>
	  			 <input type='hidden' name='mes' value='$mes'>
	  			 <input type='hidden' name='nmes' value='$nmes'>
	  			 <input type='hidden' name='year' value='$year'>
	  			 <input type='hidden' name='nyear' value='$nyear'>
	  			 <input type='hidden' name='dia' value='$dia'>
	 			 <input type='hidden' name='dist' value='$dist'>
	  			 <input type='hidden' name='disponible' value='$disponible'>";
	        echo "<script>formu.submit();</script></form>";
/* si en la variable series2 no esta EA y que cantidad sea diferente al numero de series */			
}else if($series2 != "EA" AND $canti != $series3){
    echo "<script>alert('Error !!! No concuerda el numero de equipos con el numero de series !!!');</script>";
    echo "<form name='formu' method='post' action='salidocv5.php'>
	  			 <input type='hidden' name='cproc' value='$cproc'>
	  			 <input type='hidden' name='canti' value='$canti'>
	  			 <input type='hidden' name='serie' value='$serie'>
	  			 <input type='hidden' name='idadq' value='$idadq'>
	  			 <input type='hidden' name='idocv' value='$idocv'>
	  			 <input type='hidden' name='code' value='$code'>
				 <input type='hidden' name='codorden' value='$codorden'>
	  			 <input type='hidden' name='mes' value='$mes'>
	  			 <input type='hidden' name='nmes' value='$nmes'>
	  			 <input type='hidden' name='year' value='$year'>
	  			 <input type='hidden' name='nyear' value='$nyear'>
	  			 <input type='hidden' name='dia' value='$dia'>
	 			 <input type='hidden' name='dist' value='$dist'>
	  			 <input type='hidden' name='disponible' value='$disponible'>";
	        echo "<script>formu.submit();</script></form>";
}else if($series3 == 1){
		$resultax=mssql_query("SELECT serial FROM receqpadq2 WHERE serial='$serie'",$conn1);
		$lafilx=mssql_fetch_array($resultax);
		$lafx=$lafilx["serial"];
	 		if($lafx != $serie){
		 		  echo "<script>alert('ERROR!!! EL NUMERO DE SERIE $serie NO EXISTE, FAVOR DE HACER LA INSERCION NUEVAMENTE')</script>";
		 		  echo "<form name='formu' method='post' action='salidocv5.php'>
	  			 <input type='hidden' name='cproc' value='$cproc'>
	  			 <input type='hidden' name='canti' value='$canti'>
	  			 <input type='hidden' name='serie' value='$serie'>
	  			 <input type='hidden' name='idadq' value='$idadq'>
	  			 <input type='hidden' name='idocv' value='$idocv'>
	  			 <input type='hidden' name='code' value='$code'>
				 <input type='hidden' name='codorden' value='$codorden'>
	  			 <input type='hidden' name='mes' value='$mes'>
	  			 <input type='hidden' name='nmes' value='$nmes'>
	  			 <input type='hidden' name='year' value='$year'>
	  			 <input type='hidden' name='nyear' value='$nyear'>
	  			 <input type='hidden' name='dia' value='$dia'>
	 			 <input type='hidden' name='dist' value='$dist'>
	  			 <input type='hidden' name='disponible' value='$disponible'>";
	        echo "<script>formu.submit();</script></form>";
	 	    }else if($lafx == $serie){
			        // selecciono el numero de serie de las salidas, siempre y cuando este sea igual al insertado
					$bv=mssql_query("SELECT serial FROM salordncv2 WHERE serial='$serie'",$conn1);
				    $bv1=mssql_fetch_array($bv);
				    $cs1=$bv1["serial"];
					// verifico que haya equipo de acuerdo al numero de serie
					$bv1=mssql_query("SELECT serial,difinventa FROM inventa2 WHERE serial='$serie'",$conn1);
				    $bv2=mssql_fetch_array($bv1);
					$serieenBD=$bv2["serial"];
				    $hayequipo=$bv2["difinventa"];
					/* AQUI VERIFICO QUE LA CANTIDAD A INSERTAR NO PASE DE LA CANTIDAD EXISTENTE DE ACUERDO AL NUMERO DE SERIE */
					    if($serie == $serieenBD && $canti > $hayequipo){
						    echo "<script>alert('ERROR!!! LA CANTIDAD ES DIFERENTE A LA CANTIDAD EXISTENTE EN INVENTARIO')</script>";
							echo "<form name='formu' method='post' action='salidocv5.php'>
	  								 <input type='hidden' name='cproc' value='$cproc'>
	  			 					<input type='hidden' name='canti' value='$canti'>
	  			 					<input type='hidden' name='serie' value='$serie'>
	  			 					<input type='hidden' name='idadq' value='$idadq'>
	  			 					<input type='hidden' name='idocv' value='$idocv'>
	  			 					<input type='hidden' name='code' value='$code'>
				 					<input type='hidden' name='codorden' value='$codorden'>
	  			 					<input type='hidden' name='mes' value='$mes'>
	  			 					<input type='hidden' name='nmes' value='$nmes'>
	  			 					<input type='hidden' name='year' value='$year'>
	  			 					<input type='hidden' name='nyear' value='$nyear'>
	  			 					<input type='hidden' name='dia' value='$dia'>
	 			 					<input type='hidden' name='dist' value='$dist'>
	  			 					<input type='hidden' name='disponible' value='$disponible'>";
	        				echo "<script>formu.submit();</script></form>";
						}else if($serie == $cs1 && $hayequipo == 0){
							echo "<script>alert('ERROR!!! EL NUMERO DE SERIE $serie YA FUE INSERTADO EN ESTA U OTRA ORDEN, INSERTE OTRO NUMERO DE SERIE')</script>";
							echo "<form name='formu' method='post' action='salidocv5.php'>
	  								 <input type='hidden' name='cproc' value='$cproc'>
	  			 					<input type='hidden' name='canti' value='$canti'>
	  			 					<input type='hidden' name='serie' value='$serie'>
	  			 					<input type='hidden' name='idadq' value='$idadq'>
	  			 					<input type='hidden' name='idocv' value='$idocv'>
	  			 					<input type='hidden' name='code' value='$code'>
				 					<input type='hidden' name='codorden' value='$codorden'>
	  			 					<input type='hidden' name='mes' value='$mes'>
	  			 					<input type='hidden' name='nmes' value='$nmes'>
	  			 					<input type='hidden' name='year' value='$year'>
	  			 					<input type='hidden' name='nyear' value='$nyear'>
	  			 					<input type='hidden' name='dia' value='$dia'>
	 			 					<input type='hidden' name='dist' value='$dist'>
	  			 					<input type='hidden' name='disponible' value='$disponible'>";
	        				echo "<script>formu.submit();</script></form>";
						}else{
		 	    		echo "<script>alert('Serie $serie Valido')</script>";
						echo "<form name='formu' method='post' action='salidocv4.php'>
							<input type='hidden' name='cproc' value='$cproc'>
	  			 			<input type='hidden' name='canti' value='$canti'>
	  			 			<input type='hidden' name='serie' value='$serie'>
	  			 			<input type='hidden' name='idadq' value='$idadq'>
	  			 			<input type='hidden' name='idocv' value='$idocv'>
	  			 			<input type='hidden' name='code' value='$code'>
				 			<input type='hidden' name='codorden' value='$codorden'>
	  			 			<input type='hidden' name='mes' value='$mes'>
	  			 			<input type='hidden' name='nmes' value='$nmes'>
	  			 			<input type='hidden' name='year' value='$year'>
	  			 			<input type='hidden' name='nyear' value='$nyear'>
	  			 			<input type='hidden' name='dia' value='$dia'>
	 			 			<input type='hidden' name='dist' value='$dist'>
	  			 			<input type='hidden' name='disponible' value='$disponible'>";
	        			echo "<script>formu.submit();</script></form>";
						}
	 		}
}else{
$axx=0;
		for($ux=1;$ux<=$series3;$ux++){	
    		$serix=$series1[$axx];
    		$resultax=mssql_query("SELECT serial FROM receqpadq2 WHERE serial='$serix'",$conn1);
    		$lafilx=mssql_fetch_array($resultax);
    		$lafx=$lafilx["serial"];
				 if($lafx != $serix){
		 			echo "<script>alert('ERROR!!! EL NUMERO DE SERIE $serix NO EXISTE, FAVOR DE HACER LA INSERCION NUEVAMENTE')</script>";
		 			echo "<form name='formu' method='post' action='salidocv5.php'>
	  			 			<input type='hidden' name='cproc' value='$cproc'>
	  			 			<input type='hidden' name='canti' value='$canti'>
	  			 			<input type='hidden' name='serie' value='$serie'>
	  			 			<input type='hidden' name='idadq' value='$idadq'>
	  			 			<input type='hidden' name='idocv' value='$idocv'>
	  			 			<input type='hidden' name='code' value='$code'>
				 			<input type='hidden' name='codorden' value='$codorden'>
	  			 			<input type='hidden' name='mes' value='$mes'>
	  			 			<input type='hidden' name='nmes' value='$nmes'>
	  			 			<input type='hidden' name='year' value='$year'>
	  			 			<input type='hidden' name='nyear' value='$nyear'>
	  			 			<input type='hidden' name='dia' value='$dia'>
	 			 			<input type='hidden' name='dist' value='$dist'>
	  			 			<input type='hidden' name='disponible' value='$disponible'>";
	       			 echo "<script>formu.submit();</script></form>";
	 			}else if($lafx == $serix){
						//if(){
						$bv=mssql_query("SELECT serial FROM salordncv2 WHERE serial='$serix'",$conn1);
				    	$bv1=mssql_fetch_array($bv);
				    	$cs1=$bv1["serial"];				
						if($serix == $cs1){
							echo "<script>alert('ERROR!!! EL NUMERO DE SERIE $serix YA FUE INSERTADO EN ESTA U OTRA ORDEN, INSERTE OTRO NUMERO DE SERIE')</script>";
							echo "<form name='formu' method='post' action='salidocv5.php'>
	  			 			<input type='hidden' name='cproc' value='$cproc'>
	  			 			<input type='hidden' name='canti' value='$canti'>
	  			 			<input type='hidden' name='serie' value='$serie'>
	  			 			<input type='hidden' name='idadq' value='$idadq'>
	  			 			<input type='hidden' name='idocv' value='$idocv'>
	  			 			<input type='hidden' name='code' value='$code'>
				 			<input type='hidden' name='codorden' value='$codorden'>
	  			 			<input type='hidden' name='mes' value='$mes'>
	  			 			<input type='hidden' name='nmes' value='$nmes'>
	  			 			<input type='hidden' name='year' value='$year'>
	  			 			<input type='hidden' name='nyear' value='$nyear'>
	  			 			<input type='hidden' name='dia' value='$dia'>
	 			 			<input type='hidden' name='dist' value='$dist'>
	  			 			<input type='hidden' name='disponible' value='$disponible'>";
	       			 		echo "<script>formu.submit();</script></form>";
						}else{
		 					echo "<script>alert('Serie $serix Valido')</script>";
						}
	 			}
    		$axx++;
		}
echo "<form name='formu' method='post' action='salidocv4.php'>
	  <input type='hidden' name='cproc' value='$cproc'>
	  <input type='hidden' name='canti' value='$canti'>
	  <input type='hidden' name='serie' value='$serie'>
	  <input type='hidden' name='idadq' value='$idadq'>
	  <input type='hidden' name='idocv' value='$idocv'>
	  <input type='hidden' name='code' value='$code'>
	  <input type='hidden' name='codorden' value='$codorden'>
	  <input type='hidden' name='mes' value='$mes'>
	  <input type='hidden' name='nmes' value='$nmes'>
	  <input type='hidden' name='year' value='$year'>
	  <input type='hidden' name='nyear' value='$nyear'>
	  <input type='hidden' name='dia' value='$dia'>
	  <input type='hidden' name='dist' value='$dist'>
	  <input type='hidden' name='disponible' value='$disponible'>";
echo "<script>formu.submit();</script></form>";	
}		
?>