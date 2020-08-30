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
	$ncntrl=trim($ncntrl);
	$yer=$yer;
	$mnth=$mnth;
	$cproc=$cproc;	
	$dist=trim($dist);
	$cpor=trim($cpor);
	$dayreal=$dayreal;
	$mesreal=$mesreal;
	$anioreal=$anioreal;
    $trnsprt=trim($trnsprt);
	$dirent=trim($dirent);
	$ciudadent=trim($ciudadent);
	$estadoent=trim($estadoent);
	$entregaa=trim($entregaa);
	$recibidox=trim($recibidox);
	$nom=trim($nom);
	$rfcfactura=trim($rfcfactura);
	$dirfactura=trim($dirfactura);
	$ciudadfactura=trim($ciudadfactura);
	$estadofactura=trim($estadofactura);
	$numerofact=trim($numerofact);
	$canti=trim($canti);	
	$serie=strtoupper(trim($serie));
	$series1=explode("/",$serie);
	$series3=count($series1);	
	$series2=substr($serie,0,2);
	$idadq=trim($idadq);
	$idocv=trim($idocv);
	$code=trim($code);
	$dia=trim($dia);
	$mes=trim($mes);
	$nmes=trim($nmes);
	$year=trim($year);
	$nyear=trim($nyear);
	$comenta=trim($comenta);
	$disponible=trim($disponible);
	$codorden="EA-$ncntrl-$yer-$mnth";
	$axx=0;
	$produ=mssql_query("SELECT cod FROM inventa1 WHERE idproduct='$cproc'",$conn1);
	$lafi4=mssql_fetch_array($produ);
	$cproc1=$lafi4["cod"];
	$rsl=mssql_query("SELECT diferente,cod FROM ordencv2 WHERE cod=$cproc1 AND idcompraventa=$idocv",$conn1);
	$linea=mssql_fetch_array($rsl);
	$f1=$linea["diferente"];
	$f2=$linea["cod"];	
	$produqa=mssql_query("SELECT foliosalocv FROM salordncv1 WHERE foliosalocv='$codorden'",$conn1);
	$lafi4zx=mssql_fetch_array($produqa);
	$fol=$lafi4zx["foliosalocv"];
/*error.... checamos si el folio esta repetido*/
if($canti == "" OR $serie == ""){
            echo "<script>alert('Registro incompleto, campos sin llenar !!!');</script>";
			echo "<form name='formu' method='post' action='salidocv6.php'>
			      <input type='hidden' name='yer' value='$yer'>
	 			  <input type='hidden' name='ncntrl' value='$ncntrl'>
	 			  <input type='hidden' name='mnth' value='$mnth'>				  
				  <input type='hidden' name='cpor' value='$cpor'>
				  <input type='hidden' name='dayreal' value='$dayreal'>
				  <input type='hidden' name='mesreal' value='$mesreal'>
				  <input type='hidden' name='anioreal' value='$anioreal'>				  
	  			 <input type='hidden' name='trnsprt' value='$trnsprt'>
	  			 <input type='hidden' name='dirent' value='$dirent'>
	  			 <input type='hidden' name='ciudadent' value='$ciudadent'>
	  			 <input type='hidden' name='estadoent' value='$estadoent'>
	  			 <input type='hidden' name='entregaa' value='$entregaa'>
	  			 <input type='hidden' name='recibidox' value='$recibidox'>
	  			 <input type='hidden' name='nom' value='$nom'>
	  			 <input type='hidden' name='rfcfactura' value='$rfcfactura'>
	 			 <input type='hidden' name='dirfactura' value='$dirfactura'>
	  			 <input type='hidden' name='ciudadfactura' value='$ciudadfactura'>
	  			 <input type='hidden' name='estadofactura' value='$estadofactura'>
	  			 <input type='hidden' name='numerofact' value='$numerofact'>
	  			 <input type='hidden' name='comenta' value='$comenta'>
	  			 <input type='hidden' name='cproc' value='$cproc'>
	  			 <input type='hidden' name='canti' value='$canti'>
	  			 <input type='hidden' name='serie' value='$serie'>
	  			 <input type='hidden' name='idadq' value='$idadq'>
	  			 <input type='hidden' name='idocv' value='$idocv'>
	  			 <input type='hidden' name='code' value='$code'>
	  			 <input type='hidden' name='mes' value='$mes'>
	  			 <input type='hidden' name='nmes' value='$nmes'>
	  			 <input type='hidden' name='year' value='$year'>
	  			 <input type='hidden' name='nyear' value='$nyear'>
	  			 <input type='hidden' name='dia' value='$dia'>
	 			 <input type='hidden' name='dist' value='$dist'>
	  			 <input type='hidden' name='disponible' value='$disponible'>";
	        echo "<script>formu.submit();</script></form>";
}else if($codorden == $fol){
    echo "<script>alert('El folio de salida esta repetido !!! ');</script>";
	echo "<form name='formu' method='post' action='salidocv6.php'>
			      <input type='hidden' name='yer' value='$yer'>
	 			  <input type='hidden' name='ncntrl' value='$ncntrl'>
	 			  <input type='hidden' name='mnth' value='$mnth'>
				  <input type='hidden' name='cpor' value='$cpor'>
				  <input type='hidden' name='dayreal' value='$dayreal'>
				  <input type='hidden' name='mesreal' value='$mesreal'>
				  <input type='hidden' name='anioreal' value='$anioreal'>
	  			 <input type='hidden' name='trnsprt' value='$trnsprt'>
	  			 <input type='hidden' name='dirent' value='$dirent'>
	  			 <input type='hidden' name='ciudadent' value='$ciudadent'>
	  			 <input type='hidden' name='estadoent' value='$estadoent'>
	  			 <input type='hidden' name='entregaa' value='$entregaa'>
	  			 <input type='hidden' name='recibidox' value='$recibidox'>
	  			 <input type='hidden' name='nom' value='$nom'>
	  			 <input type='hidden' name='rfcfactura' value='$rfcfactura'>
	 			 <input type='hidden' name='dirfactura' value='$dirfactura'>
	  			 <input type='hidden' name='ciudadfactura' value='$ciudadfactura'>
	  			 <input type='hidden' name='estadofactura' value='$estadofactura'>
	  			 <input type='hidden' name='numerofact' value='$numerofact'>
	  			 <input type='hidden' name='comenta' value='$comenta'>
	  			 <input type='hidden' name='cproc' value='$cproc'>
	  			 <input type='hidden' name='canti' value='$canti'>
	  			 <input type='hidden' name='serie' value='$serie'>
	  			 <input type='hidden' name='idadq' value='$idadq'>
	  			 <input type='hidden' name='idocv' value='$idocv'>
	  			 <input type='hidden' name='code' value='$code'>
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
	echo "<form name='formu' method='post' action='salidocv6.php'>
			      <input type='hidden' name='yer' value='$yer'>
	 			  <input type='hidden' name='ncntrl' value='$ncntrl'>
	 			  <input type='hidden' name='mnth' value='$mnth'>
				  <input type='hidden' name='cpor' value='$cpor'>
				  <input type='hidden' name='dayreal' value='$dayreal'>
				  <input type='hidden' name='mesreal' value='$mesreal'>
				  <input type='hidden' name='anioreal' value='$anioreal'>
	  			 <input type='hidden' name='trnsprt' value='$trnsprt'>
	  			 <input type='hidden' name='dirent' value='$dirent'>
	  			 <input type='hidden' name='ciudadent' value='$ciudadent'>
	  			 <input type='hidden' name='estadoent' value='$estadoent'>
	  			 <input type='hidden' name='entregaa' value='$entregaa'>
	  			 <input type='hidden' name='recibidox' value='$recibidox'>
	  			 <input type='hidden' name='nom' value='$nom'>
	  			 <input type='hidden' name='rfcfactura' value='$rfcfactura'>
	 			 <input type='hidden' name='dirfactura' value='$dirfactura'>
	  			 <input type='hidden' name='ciudadfactura' value='$ciudadfactura'>
	  			 <input type='hidden' name='estadofactura' value='$estadofactura'>
	  			 <input type='hidden' name='numerofact' value='$numerofact'>
	  			 <input type='hidden' name='comenta' value='$comenta'>
	  			 <input type='hidden' name='cproc' value='$cproc'>
	  			 <input type='hidden' name='canti' value='$canti'>
	  			 <input type='hidden' name='serie' value='$serie'>
	  			 <input type='hidden' name='idadq' value='$idadq'>
	  			 <input type='hidden' name='idocv' value='$idocv'>
	  			 <input type='hidden' name='code' value='$code'>
	  			 <input type='hidden' name='mes' value='$mes'>
	  			 <input type='hidden' name='nmes' value='$nmes'>
	  			 <input type='hidden' name='year' value='$year'>
	  			 <input type='hidden' name='nyear' value='$nyear'>
	  			 <input type='hidden' name='dia' value='$dia'>
	 			 <input type='hidden' name='dist' value='$dist'>
	  			 <input type='hidden' name='disponible' value='$disponible'>";
	        echo "<script>formu.submit();</script></form>";
/* si en la variable series2 no es EA y que cantidad sea diferente al numero de series */			
}else if($series2 != "EA" AND $canti != $series3){
    echo "<script>alert('La cantidad no concuerda con los numero de serie !!! ');</script>";
	echo "<form name='formu' method='post' action='salidocv6.php'>
			      <input type='hidden' name='yer' value='$yer'>
	 			  <input type='hidden' name='ncntrl' value='$ncntrl'>
	 			  <input type='hidden' name='mnth' value='$mnth'>
				  <input type='hidden' name='cpor' value='$cpor'>
				  <input type='hidden' name='dayreal' value='$dayreal'>
				  <input type='hidden' name='mesreal' value='$mesreal'>
				  <input type='hidden' name='anioreal' value='$anioreal'>
	  			 <input type='hidden' name='trnsprt' value='$trnsprt'>
	  			 <input type='hidden' name='dirent' value='$dirent'>
	  			 <input type='hidden' name='ciudadent' value='$ciudadent'>
	  			 <input type='hidden' name='estadoent' value='$estadoent'>
	  			 <input type='hidden' name='entregaa' value='$entregaa'>
	  			 <input type='hidden' name='recibidox' value='$recibidox'>
	  			 <input type='hidden' name='nom' value='$nom'>
	  			 <input type='hidden' name='rfcfactura' value='$rfcfactura'>
	 			 <input type='hidden' name='dirfactura' value='$dirfactura'>
	  			 <input type='hidden' name='ciudadfactura' value='$ciudadfactura'>
	  			 <input type='hidden' name='estadofactura' value='$estadofactura'>
	  			 <input type='hidden' name='numerofact' value='$numerofact'>
	  			 <input type='hidden' name='comenta' value='$comenta'>
	  			 <input type='hidden' name='cproc' value='$cproc'>
	  			 <input type='hidden' name='canti' value='$canti'>
	  			 <input type='hidden' name='serie' value='$serie'>
	  			 <input type='hidden' name='idadq' value='$idadq'>
	  			 <input type='hidden' name='idocv' value='$idocv'>
	  			 <input type='hidden' name='code' value='$code'>
	  			 <input type='hidden' name='mes' value='$mes'>
	  			 <input type='hidden' name='nmes' value='$nmes'>
	  			 <input type='hidden' name='year' value='$year'>
	  			 <input type='hidden' name='nyear' value='$nyear'>
	  			 <input type='hidden' name='dia' value='$dia'>
	 			 <input type='hidden' name='dist' value='$dist'>
	  			 <input type='hidden' name='disponible' value='$disponible'>";
	        echo "<script>formu.submit();</script></form>";
// BUSCO EN LA BD LOS NUMEROS DE SERIE Y VERIFICO QUE LOS MISMOS NO ESTEN REPETIDOS
}else if($series3 == 1){
		$resultax=mssql_query("SELECT serial FROM receqpadq2 WHERE serial='$serie'",$conn1);
		$lafilx=mssql_fetch_array($resultax);
		$lafx=$lafilx["serial"];
	 		if($lafx != $serie){
		 		  echo "<script>alert('ERROR!!! EL NUMERO DE SERIE $serie NO EXISTE, FAVOR DE HACER LA INSERCION NUEVAMENTE')</script>";
		 		  echo "<form name='formu' method='post' action='salidocv6.php'>
			      		<input type='hidden' name='yer' value='$yer'>
	 			  		<input type='hidden' name='ncntrl' value='$ncntrl'>
	 			  		<input type='hidden' name='mnth' value='$mnth'>
						<input type='hidden' name='cpor' value='$cpor'>
				  	    <input type='hidden' name='dayreal' value='$dayreal'>
				  	    <input type='hidden' name='mesreal' value='$mesreal'>
				  	    <input type='hidden' name='anioreal' value='$anioreal'>
	  			 		<input type='hidden' name='trnsprt' value='$trnsprt'>
	  			 		<input type='hidden' name='dirent' value='$dirent'>
	  			 		<input type='hidden' name='ciudadent' value='$ciudadent'>
	  			 		<input type='hidden' name='estadoent' value='$estadoent'>
	  			 		<input type='hidden' name='entregaa' value='$entregaa'>
	  			 		<input type='hidden' name='recibidox' value='$recibidox'>
	  			 		<input type='hidden' name='nom' value='$nom'>
	  			 		<input type='hidden' name='rfcfactura' value='$rfcfactura'>
	 			 		<input type='hidden' name='dirfactura' value='$dirfactura'>
	  			 		<input type='hidden' name='ciudadfactura' value='$ciudadfactura'>
	  			 		<input type='hidden' name='estadofactura' value='$estadofactura'>
	  			 		<input type='hidden' name='numerofact' value='$numerofact'>
	  			 		<input type='hidden' name='comenta' value='$comenta'>
	  			 		<input type='hidden' name='cproc' value='$cproc'>
	  			 		<input type='hidden' name='canti' value='$canti'>
	  			 		<input type='hidden' name='serie' value='$serie'>
	  			 		<input type='hidden' name='idadq' value='$idadq'>
	  			 		<input type='hidden' name='idocv' value='$idocv'>
	  			 		<input type='hidden' name='code' value='$code'>
	  			 		<input type='hidden' name='mes' value='$mes'>
	  			 		<input type='hidden' name='nmes' value='$nmes'>
	  			 		<input type='hidden' name='year' value='$year'>
	  			 		<input type='hidden' name='nyear' value='$nyear'>
	  			 		<input type='hidden' name='dia' value='$dia'>
	 			 		<input type='hidden' name='dist' value='$dist'>
	  			 		<input type='hidden' name='disponible' value='$disponible'>";
	        	  echo "<script>formu.submit();</script></form>";	
		    // aqui va insertado la verificacion de series salieron y quedo equipo en BD		
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
						 echo "<form name='formu' method='post' action='salidocv6.php'>
			      				<input type='hidden' name='yer' value='$yer'>
	 			  				<input type='hidden' name='ncntrl' value='$ncntrl'>
	 			  				<input type='hidden' name='mnth' value='$mnth'>
								<input type='hidden' name='cpor' value='$cpor'>
				  				<input type='hidden' name='dayreal' value='$dayreal'>
				  				<input type='hidden' name='mesreal' value='$mesreal'>
				  				<input type='hidden' name='anioreal' value='$anioreal'>
	  			 				<input type='hidden' name='trnsprt' value='$trnsprt'>
	  			 				<input type='hidden' name='dirent' value='$dirent'>
	  			 				<input type='hidden' name='ciudadent' value='$ciudadent'>
	  			 				<input type='hidden' name='estadoent' value='$estadoent'>
	  			 				<input type='hidden' name='entregaa' value='$entregaa'>
	  			 				<input type='hidden' name='recibidox' value='$recibidox'>
	  			 				<input type='hidden' name='nom' value='$nom'>
	  			 				<input type='hidden' name='rfcfactura' value='$rfcfactura'>
	 			 				<input type='hidden' name='dirfactura' value='$dirfactura'>
	  			 				<input type='hidden' name='ciudadfactura' value='$ciudadfactura'>
	  			 				<input type='hidden' name='estadofactura' value='$estadofactura'>
	  			 				<input type='hidden' name='numerofact' value='$numerofact'>
	  			 				<input type='hidden' name='comenta' value='$comenta'>
	  			 				<input type='hidden' name='cproc' value='$cproc'>
	  			 				<input type='hidden' name='canti' value='$canti'>
	  			 				<input type='hidden' name='serie' value='$serie'>
	  			 				<input type='hidden' name='idadq' value='$idadq'>
	  			 				<input type='hidden' name='idocv' value='$idocv'>
	  			 				<input type='hidden' name='code' value='$code'>
	  			 				<input type='hidden' name='mes' value='$mes'>
	  			 				<input type='hidden' name='nmes' value='$nmes'>
	  			 				<input type='hidden' name='year' value='$year'>
	  			 				<input type='hidden' name='nyear' value='$nyear'>
	  			 				<input type='hidden' name='dia' value='$dia'>
	 			 				<input type='hidden' name='dist' value='$dist'>
	  			 				<input type='hidden' name='disponible' value='$disponible'>";
	        	  			echo "<script>formu.submit();</script></form>";
					/* FIN */					
					}else if($serie == $cs1 && $hayequipo == 0){
						 echo "<script>alert('ERROR!!! EL NUMERO DE SERIE $serie YA FUE INSERTADO EN ESTA U OTRA ORDEN, INSERTE OTRO NUMERO DE SERIE')</script>";
						 echo "<form name='formu' method='post' action='salidocv6.php'>
			      				<input type='hidden' name='yer' value='$yer'>
	 			  				<input type='hidden' name='ncntrl' value='$ncntrl'>
	 			  				<input type='hidden' name='mnth' value='$mnth'>
								<input type='hidden' name='cpor' value='$cpor'>
				  				<input type='hidden' name='dayreal' value='$dayreal'>
				  				<input type='hidden' name='mesreal' value='$mesreal'>
				  				<input type='hidden' name='anioreal' value='$anioreal'>
	  			 				<input type='hidden' name='trnsprt' value='$trnsprt'>
	  			 				<input type='hidden' name='dirent' value='$dirent'>
	  			 				<input type='hidden' name='ciudadent' value='$ciudadent'>
	  			 				<input type='hidden' name='estadoent' value='$estadoent'>
	  			 				<input type='hidden' name='entregaa' value='$entregaa'>
	  			 				<input type='hidden' name='recibidox' value='$recibidox'>
	  			 				<input type='hidden' name='nom' value='$nom'>
	  			 				<input type='hidden' name='rfcfactura' value='$rfcfactura'>
	 			 				<input type='hidden' name='dirfactura' value='$dirfactura'>
	  			 				<input type='hidden' name='ciudadfactura' value='$ciudadfactura'>
	  			 				<input type='hidden' name='estadofactura' value='$estadofactura'>
	  			 				<input type='hidden' name='numerofact' value='$numerofact'>
	  			 				<input type='hidden' name='comenta' value='$comenta'>
	  			 				<input type='hidden' name='cproc' value='$cproc'>
	  			 				<input type='hidden' name='canti' value='$canti'>
	  			 				<input type='hidden' name='serie' value='$serie'>
	  			 				<input type='hidden' name='idadq' value='$idadq'>
	  			 				<input type='hidden' name='idocv' value='$idocv'>
	  			 				<input type='hidden' name='code' value='$code'>
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
							echo "<form name='formu' method='post' action='salidocv3.php'>
			      				<input type='hidden' name='yer' value='$yer'>
	 			  				<input type='hidden' name='ncntrl' value='$ncntrl'>
	 			  				<input type='hidden' name='mnth' value='$mnth'>
								<input type='hidden' name='cpor' value='$cpor'>
				  				<input type='hidden' name='dayreal' value='$dayreal'>
				  				<input type='hidden' name='mesreal' value='$mesreal'>
				  				<input type='hidden' name='anioreal' value='$anioreal'>
	  			 				<input type='hidden' name='trnsprt' value='$trnsprt'>
	  			 				<input type='hidden' name='dirent' value='$dirent'>
	  			 				<input type='hidden' name='ciudadent' value='$ciudadent'>
	  			 				<input type='hidden' name='estadoent' value='$estadoent'>
	  			 				<input type='hidden' name='entregaa' value='$entregaa'>
	  			 				<input type='hidden' name='recibidox' value='$recibidox'>
	  			 				<input type='hidden' name='nom' value='$nom'>
	  			 				<input type='hidden' name='rfcfactura' value='$rfcfactura'>
	 			 				<input type='hidden' name='dirfactura' value='$dirfactura'>
	  			 				<input type='hidden' name='ciudadfactura' value='$ciudadfactura'>
	  			 				<input type='hidden' name='estadofactura' value='$estadofactura'>
	  			 				<input type='hidden' name='numerofact' value='$numerofact'>
	  			 				<input type='hidden' name='comenta' value='$comenta'>
	  			 				<input type='hidden' name='cproc' value='$cproc'>
	  			 				<input type='hidden' name='canti' value='$canti'>
	  			 				<input type='hidden' name='serie' value='$serie'>
	  			 				<input type='hidden' name='idadq' value='$idadq'>
	  			 				<input type='hidden' name='idocv' value='$idocv'>
	  			 				<input type='hidden' name='code' value='$code'>
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
		 			echo "<form name='formu' method='post' action='salidocv6.php'>
			      		<input type='hidden' name='yer' value='$yer'>
	 			  		<input type='hidden' name='ncntrl' value='$ncntrl'>
	 			  		<input type='hidden' name='mnth' value='$mnth'>
						<input type='hidden' name='cpor' value='$cpor'>
				 	    <input type='hidden' name='dayreal' value='$dayreal'>
				 	    <input type='hidden' name='mesreal' value='$mesreal'>
				        <input type='hidden' name='anioreal' value='$anioreal'>
	  			 		<input type='hidden' name='trnsprt' value='$trnsprt'>
	  			 		<input type='hidden' name='dirent' value='$dirent'>
	  			 		<input type='hidden' name='ciudadent' value='$ciudadent'>
	  			 		<input type='hidden' name='estadoent' value='$estadoent'>
	  			 		<input type='hidden' name='entregaa' value='$entregaa'>
	  			 		<input type='hidden' name='recibidox' value='$recibidox'>
	  			 		<input type='hidden' name='nom' value='$nom'>
	  			 		<input type='hidden' name='rfcfactura' value='$rfcfactura'>
	 			 		<input type='hidden' name='dirfactura' value='$dirfactura'>
	  			 		<input type='hidden' name='ciudadfactura' value='$ciudadfactura'>
	  			 		<input type='hidden' name='estadofactura' value='$estadofactura'>
	  			 		<input type='hidden' name='numerofact' value='$numerofact'>
	  			 		<input type='hidden' name='comenta' value='$comenta'>
	  			 		<input type='hidden' name='cproc' value='$cproc'>
	  			 		<input type='hidden' name='canti' value='$canti'>
	  			 		<input type='hidden' name='serie' value='$serie'>
	  			 		<input type='hidden' name='idadq' value='$idadq'>
	  			 		<input type='hidden' name='idocv' value='$idocv'>
	  			 		<input type='hidden' name='code' value='$code'>
	  			 		<input type='hidden' name='mes' value='$mes'>
	  			 		<input type='hidden' name='nmes' value='$nmes'>
	  			 		<input type='hidden' name='year' value='$year'>
	  			 		<input type='hidden' name='nyear' value='$nyear'>
	  			 		<input type='hidden' name='dia' value='$dia'>
	 			 		<input type='hidden' name='dist' value='$dist'>
	  			 		<input type='hidden' name='disponible' value='$disponible'>";
	        	  echo "<script>formu.submit();</script></form>";			
	 			}else if($lafx == $serix){
						$bv=mssql_query("SELECT serial FROM salordncv2 WHERE serial='$serix'",$conn1);
				    	$bv1=mssql_fetch_array($bv);
				    	$cs1=$bv1["serial"];				
						if($serix == $cs1){
							echo "<script>alert('ERROR!!! EL NUMERO DE SERIE $serix YA FUE INSERTADO EN ESTA U OTRA ORDEN, INSERTE OTRO NUMERO DE SERIE')</script>";
						    echo "<form name='formu' method='post' action='salidocv6.php'>
			      				<input type='hidden' name='yer' value='$yer'>
	 			  				<input type='hidden' name='ncntrl' value='$ncntrl'>
	 			  				<input type='hidden' name='mnth' value='$mnth'>
								<input type='hidden' name='cpor' value='$cpor'>
				  			    <input type='hidden' name='dayreal' value='$dayreal'>
				                <input type='hidden' name='mesreal' value='$mesreal'>
				                <input type='hidden' name='anioreal' value='$anioreal'>
	  			 				<input type='hidden' name='trnsprt' value='$trnsprt'>
	  			 				<input type='hidden' name='dirent' value='$dirent'>
	  			 				<input type='hidden' name='ciudadent' value='$ciudadent'>
	  			 				<input type='hidden' name='estadoent' value='$estadoent'>
	  			 				<input type='hidden' name='entregaa' value='$entregaa'>
	  			 				<input type='hidden' name='recibidox' value='$recibidox'>
	  			 				<input type='hidden' name='nom' value='$nom'>
	  			 				<input type='hidden' name='rfcfactura' value='$rfcfactura'>
	 			 				<input type='hidden' name='dirfactura' value='$dirfactura'>
	  			 				<input type='hidden' name='ciudadfactura' value='$ciudadfactura'>
	  			 				<input type='hidden' name='estadofactura' value='$estadofactura'>
	  			 				<input type='hidden' name='numerofact' value='$numerofact'>
	  			 				<input type='hidden' name='comenta' value='$comenta'>
	  			 				<input type='hidden' name='cproc' value='$cproc'>
	  			 				<input type='hidden' name='canti' value='$canti'>
	  			 				<input type='hidden' name='serie' value='$serie'>
	  			 				<input type='hidden' name='idadq' value='$idadq'>
	  			 				<input type='hidden' name='idocv' value='$idocv'>
	  			 				<input type='hidden' name='code' value='$code'>
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
echo "<form name='formu' method='post' action='salidocv3.php'>
<input type='hidden' name='yer' value='$yer'>
<input type='hidden' name='ncntrl' value='$ncntrl'>
<input type='hidden' name='mnth' value='$mnth'>
<input type='hidden' name='cpor' value='$cpor'>
<input type='hidden' name='dayreal' value='$dayreal'>
<input type='hidden' name='mesreal' value='$mesreal'>
<input type='hidden' name='anioreal' value='$anioreal'>
<input type='hidden' name='trnsprt' value='$trnsprt'>
<input type='hidden' name='dirent' value='$dirent'>
<input type='hidden' name='ciudadent' value='$ciudadent'>
<input type='hidden' name='estadoent' value='$estadoent'>
<input type='hidden' name='entregaa' value='$entregaa'>
<input type='hidden' name='recibidox' value='$recibidox'>
<input type='hidden' name='nom' value='$nom'>
<input type='hidden' name='rfcfactura' value='$rfcfactura'>
<input type='hidden' name='dirfactura' value='$dirfactura'>
<input type='hidden' name='ciudadfactura' value='$ciudadfactura'>
<input type='hidden' name='estadofactura' value='$estadofactura'>
<input type='hidden' name='numerofact' value='$numerofact'>
<input type='hidden' name='comenta' value='$comenta'>
<input type='hidden' name='cproc' value='$cproc'>
<input type='hidden' name='canti' value='$canti'>
<input type='hidden' name='serie' value='$serie'>
<input type='hidden' name='idadq' value='$idadq'>
<input type='hidden' name='idocv' value='$idocv'>
<input type='hidden' name='code' value='$code'>
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