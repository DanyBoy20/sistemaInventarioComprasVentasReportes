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
	mssql_close($conexion);	
    $serie=strtoupper(trim($serie));
	$series1=explode("/",$serie);
	$series3=count($series1);
	$sal=$sal;
	$pedi=$pedi;
	$canti=$canti;
	$ndia=$ndia;
	$mmes=$mmes;
	$nmes=$nmes;
	$year=$year;
	$nyear=$nyear;
	$comenta=$comenta;
	$disponible=$disponible;
	$esta=$esta;
	$ubica=$ubica;
	$tipoentra=$tipoentra;
	$fecha1="$ndia/$nmes/$nyear"; // fecha datetime
	$fecha2="$ndia/$nmes/$nyear"; // fecha varchar
/*
	$cxx=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	mssql_query("INSERT INTO inventa2(cod,serial,cantidad,fechaentrada1,fechaentrada2,ubicacion,status,comentas,numpedimento,tipoentrada,disponible)
	                           VALUES($cproc,'$serie',$canti,'$fecha2','$fecha1','$ubica','$status','$comenta','$pedimento','$tipoentrada','$disponible')",$cxx);								   
	$resulta=mssql_query("SELECT existencia FROM inventa1 WHERE cod = $cproc",$cxx);
	$existe=mssql_fetch_array($resulta);
	$exist=$existe["existencia"];
	$existactual=$exist+$canti;				
    mssql_query("UPDATE inventa1 SET existencia=$existactual WHERE cod=$cproc",$cxx);
	mssql_close($cxx);
	echo "<script>alert('Registro Guardado')</script>";
	echo "<script>window.location='preinventario.php'</script>";
*/
?>	
<?
$conn1=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
	// saco la cantidad en existencia del producto seleccionado y le agrego lo que esta entrando
	$resulta1w=mssql_query("SELECT existencia FROM inventa1 WHERE cod=$cproc1",$conn1);
    $lafilw=mssql_fetch_array($resulta1w);
    $lafw=$lafilw["existencia"];
    $cantentregadaw=$lafw+$canti;	
	$resul45=mssql_query("SELECT idinventa FROM inventa3",$conn1);
                        $i=1;
                        while($f=mssql_fetch_array($resul45)){
                              $a[$i]=$f["idinventa"];
                              $i++;
                              }
                        rsort ($a);
                        $w=$a[0];
                        $w=$w+1;
	$serial2="EA$ndia$nmes$year$ubica$w";	
// si los campos cantidad y pedido estan vacios
if($canti == "" OR $pedi == ""){
            echo "<script>alert('Registro incompleto, campos sin llenar !!!');</script>";
			echo "<form name='formu' method='post' action='inref.php'>";
	        echo "<script>formu.submit();</script></form>";
// si el campo serie esta vacio y el campo cantidad tiene por lo menos 1 
}else if($serie == "" AND $canti >= 1){						
			mssql_query("INSERT INTO inventa3(idinventa)VALUES($w)",$conn1);
			mssql_query("INSERT INTO inventa2(cod,serial,cantidad,cantsalid,fechaentrada1,fechaentrada2,ubicacion,
	 					 status,comentas,numpedimento1,tipoentrada,disponible)
	                     VALUES($cproc1,'$serial2',$canti,$sal,'$fecha1','$fecha1',
			            '$ubica','$esta','$comenta','$pedi','$tipoentra','$disponible')",$conn1);
            mssql_query("UPDATE inventa1 SET existencia=$cantentregadaw WHERE cod=$cproc1",$conn1);
			echo "<script>alert('Producto(s) insertados');</script>";
			echo "<script>window.location='inref.php'</script>";
// si el campo serie tiene un solo registro y el campo cantidad tienen 1 registro
}else if($series3 == 1 AND $canti == 1){  
			mssql_query("INSERT INTO inventa2(cod,serial,cantidad,cantsalid,fechaentrada1,fechaentrada2,ubicacion,
	 					 status,comentas,numpedimento1,tipoentrada,disponible)
	                     VALUES($cproc1,'$serie',$canti,$sal,'$fecha1','$fecha1',
			            '$ubica','$esta','$comenta','$pedi','$tipoentra','$disponible')",$conn1);
            mssql_query("UPDATE inventa1 SET existencia=$cantentregadaw WHERE cod=$cproc1",$conn1);
			echo "<script>alert('1 producto insertados');</script>";
			echo "<script>window.location='inref.php'</script>";
}else if($canti != $series3){
		    echo "<script>alert('No concuerda el numero de equipos con el numero de series');</script>";
			echo "<form name='formu' method='post' action='inref.php'>";
	        echo "<script>formu.submit();</script></form>";
// si la cantidad es igual a la cantidad de series 
}else if($canti == $series3){
			$xa=1;
			$ax=0;
					for($u=1;$u<=$canti;$u++){			    
			     	mssql_query("INSERT INTO inventa2(cod,serial,cantidad,cantsalid,fechaentrada1,fechaentrada2,ubicacion,
	 				status,comentas,numpedimento1,tipoentrada,disponible)
	                VALUES($cproc1,'$series1[$ax]',$xa,$sal,'$fecha1','$fecha1',
					'$ubica','$esta','$comenta','$pedi','$tipoentra','$disponible')",$conn1);
					$ax++;
			        }	
            mssql_query("UPDATE inventa1 SET existencia=$cantentregadaw WHERE cod=$cproc1",$conn1);
			echo "<script>alert('Producto(s) insertados');</script>";
			echo "<script>window.location='inref.php'</script>";        					
}else{
echo "<script>alert('Error ... Inserte los datos nuevamente');</script>";
echo "<form name='formu' method='post' action='inref.php'>";
echo "<script>formu.submit();</script></form>";
}
mssql_close($conn1);	
?>