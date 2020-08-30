<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<?
$diaenv=$diaenv;
$mesenv=$mesenv;
$anioenv=$anioenv;
$fpago=$fpago;
$chke=$chke;
$banc=$banc;
$canprecio=$canprecio;
$trnsprt=$trnsprt;
$ndia=$ndia;
$nmes=$nmes;
$mmes=$mmes;
$aniocom=$aniocom;
$orden=$orden;
$codorden=$codorden;
$distbr=$distbr;
$cporte=$cporte;
$calle=$calle;
$ciuda=$ciuda;
$estado=$estado;
$refe=strtoupper(trim($refe));
$comenta=$comenta;
$canti=$canti;
$cproc=strtoupper(trim($cproc));
$conexionw=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$intento=mssql_query("SELECT idintento FROM intentos2",$conexionw);
$intento1=mssql_fetch_array($intento);
$intento2=$intento1["idintento"];

if($cproc=="" OR $canti=="" OR $refe == ""){
echo "<script>alert('Campos incompletos ... Intentelo nuevamente !!!');</script>";
//mssql_query("UPDATE bloqueacompra SET blockcompra='no' WHERE blockcompra='si'",$conexionw);
echo "<form name='formu' method='post' action='ocv1a.php'>
			  <input type='hidden' name='diaenv' value='$diaenv'>
			  <input type='hidden' name='mesenv' value='$mesenv'>
			  <input type='hidden' name='anioenv' value='$anioenv'>
			  <input type='hidden' name='fpago' value='$fpago'>
			  <input type='hidden' name='chke' value=$chke>
			  <input type='hidden' name='banc' value='$banc'>
			  <input type='hidden' name='canprecio' value='$canprecio'>
			  <input type='hidden' name='trnsprt' value=$trnsprt>
			  <input type='hidden' name='cporte' value='$cporte'>
			  <input type='hidden' name='calle' value='$calle'>
			  <input type='hidden' name='ciuda' value='$ciuda'>
			  <input type='hidden' name='estado' value='$estado'>
			  <input type='hidden' name='refe' value='$refe'>
			  <input type='hidden' name='comenta' value='$comenta'>
			  <input type='hidden' name='ndia' value=$ndia>
			  <input type='hidden' name='nmes' value=$nmes>
			  <input type='hidden' name='mmes' value='$mmes'>
			  <input type='hidden' name='aniocom' value=$aniocom>
			  <input type='hidden' name='orden' value=$orden>
		      <input type='hidden' name='codorden' value='$codorden'>
			  <input type='hidden' name='distbr' value=$distbr>";
echo "<script>formu.submit();</script></form>";

}else if($cproc!="" AND $canti!=""){
    
	$produw=mssql_query("SELECT idproduct FROM inventa1 WHERE idproduct='$cproc' AND statusP IS NULL",$conexionw);
		$lafiw=mssql_fetch_array($produw);
		$cprocw=$lafiw["idproduct"];
		
	if($cprocw!=$cproc){	
	/* aqui va la verificacion de intentos , si en 3 intentos sigue sin existir el producto, lanzar ventana de aviso y formulario */    
			if($intento2 < 3 ){
				echo "<script>alert('NO EXISTE EL PRODUCTO');</script>";
				$intento2=$intento2+1;
				mssql_query("UPDATE intentos2 SET idintento=$intento2",$conexionw);
            	//mssql_query("UPDATE bloqueacompra SET blockcompra='no' WHERE blockcompra='si'",$conexionw);
				mssql_close($conexionw);
				echo "<form name='formu' method='post' action='ocv1a.php'>
            			<input type='hidden' name='diaenv' value=$diaenv>
		    			<input type='hidden' name='mesenv' value='$mesenv'>
		    			<input type='hidden' name='anioenv' value='$anioenv'>
		    			<input type='hidden' name='fpago' value='$fpago'>
						<input type='hidden' name='chke' value=$chke>
						<input type='hidden' name='banc' value='$banc'>
						<input type='hidden' name='canprecio' value='$canprecio'>
						<input type='hidden' name='trnsprt' value=$trnsprt>
						<input type='hidden' name='cporte' value='$cporte'>
						<input type='hidden' name='calle' value='$calle'>
						<input type='hidden' name='ciuda' value='$ciuda'>
						<input type='hidden' name='estado' value='$estado'>
						<input type='hidden' name='refe' value='$refe'>
						<input type='hidden' name='comenta' value='$comenta'>
						<input type='hidden' name='ndia' value=$ndia>
						<input type='hidden' name='nmes' value=$nmes>
						<input type='hidden' name='mmes' value='$mmes'>
						<input type='hidden' name='aniocom' value=$aniocom>
						<input type='hidden' name='orden' value=$orden>
						<input type='hidden' name='codorden' value='$codorden'>
						<input type='hidden' name='distbr' value=$distbr>";
				echo "<script>formu.submit();</script></form>";

	        }else if($intento2 > 2){
				echo "<script>alert('EL PRODUCTO NO ESTA EN LA BASE DE DATOS, SI DESEA INGRESAR UN NUEVO PRODUCTO, LLENE EL SIGUIENTE FORMULARIO, RECUERDE QUE NO DEBE DE QUEDAR CAMPOS VACIOS ... DESPUES INTENTE NUEVAMENTE INGRESAR EL PRODUCTO');</script>";
		/* AQUI ABRO UNA NUEVA VENTANA PARA INGRESAR NUEVOS PRODUCTOS, DEBE DE CERRARSE AL INSERTAR EL PRODUCTO SATISFACTORIAMENTE */
				echo "<script>window.open('newproduct.php','ventana1','width=500, height=350, scrollbars=yes, menubar=no, location=no, resizable=yes')</script>"; 
		/* FIN POP UP */
				mssql_query("UPDATE intentos2 SET idintento=0",$conexionw);
           		//mssql_query("UPDATE bloqueacompra SET blockcompra='no' WHERE blockcompra='si'",$conexionw);
				mssql_close($conexionw);
				echo "<form name='formu' method='post' action='ocv1a.php'>
            			<input type='hidden' name='diaenv' value=$diaenv>
		    			<input type='hidden' name='mesenv' value='$mesenv'>
		    			<input type='hidden' name='anioenv' value='$anioenv'>
		    			<input type='hidden' name='fpago' value='$fpago'>
						<input type='hidden' name='chke' value=$chke>
						<input type='hidden' name='banc' value='$banc'>
						<input type='hidden' name='canprecio' value='$canprecio'>
						<input type='hidden' name='trnsprt' value=$trnsprt>
						<input type='hidden' name='cporte' value='$cporte'>
						<input type='hidden' name='calle' value='$calle'>
						<input type='hidden' name='ciuda' value='$ciuda'>
						<input type='hidden' name='estado' value='$estado'>
						<input type='hidden' name='refe' value='$refe'>
						<input type='hidden' name='comenta' value='$comenta'>
						<input type='hidden' name='ndia' value=$ndia>
						<input type='hidden' name='nmes' value=$nmes>
						<input type='hidden' name='mmes' value='$mmes'>
						<input type='hidden' name='aniocom' value=$aniocom>
						<input type='hidden' name='orden' value=$orden>
						<input type='hidden' name='codorden' value='$codorden'>
						<input type='hidden' name='distbr' value=$distbr>";
				echo "<script>formu.submit();</script></form>";

	        }else{
				echo "<script>alert('ERROR AL CONECTAR CON LA BASE DE DATOS');</script>";
				mssql_close($conexionw);
				echo "<script>window.location='nada.php'</script>";
	        }
		/* termina verificacion de productos inexistentes */
	}else{		
		$produ=mssql_query("SELECT cod FROM inventa1 WHERE idproduct='$cproc' AND statusP IS NULL",$conexionw);
    		$lafi4=mssql_fetch_array($produ);
    		$cproc1=$lafi4["cod"];

		$resut=mssql_query("SELECT idproduct,linea,descripcion,notas,pventaEA FROM inventa1 WHERE cod=$cproc1 AND statusP IS NULL",$conexionw);
        	$registroz=mssql_fetch_array($resut);
			$ccprod=$registroz["idproduct"];
			$linea=$registroz["linea"];
			$descrp=$registroz["descripcion"];
			$notai=$registroz["notas"];
			$precio=$registroz["pventaEA"];
			
			if($precio==''){
				echo "<script>alert('ERROR ... LA CLAVE QUE INTRODUJO A CAMBIADO, REVISE LA SIGUIENTE NOTA: $notai ... FAVOR DE REVISAR NUEVO CATALOGO');</script>";
				//mssql_query("UPDATE bloqueacompra SET blockcompra='no' WHERE blockcompra='si'",$conexionw);
				mssql_query("UPDATE intentos2 SET idintento=0",$conexionw);
				echo "<form name='formu' method='post' action='ocv1a.php'>
			  		  <input type='hidden' name='diaenv' value='$diaenv'>
					  <input type='hidden' name='mesenv' value='$mesenv'>
					  <input type='hidden' name='anioenv' value='$anioenv'>
					  <input type='hidden' name='fpago' value='$fpago'>
					  <input type='hidden' name='chke' value=$chke>
					  <input type='hidden' name='banc' value='$banc'>
					  <input type='hidden' name='canprecio' value='$canprecio'>
					  <input type='hidden' name='trnsprt' value=$trnsprt>
					  <input type='hidden' name='cporte' value='$cporte'>
					  <input type='hidden' name='calle' value='$calle'>
					  <input type='hidden' name='ciuda' value='$ciuda'>
					  <input type='hidden' name='estado' value='$estado'>
				  	  <input type='hidden' name='refe' value='$refe'>
					  <input type='hidden' name='comenta' value='$comenta'>
					  <input type='hidden' name='ndia' value=$ndia>
					  <input type='hidden' name='nmes' value=$nmes>
					  <input type='hidden' name='mmes' value='$mmes'>
					  <input type='hidden' name='aniocom' value=$aniocom>
					  <input type='hidden' name='orden' value=$orden>
					  <input type='hidden' name='codorden' value='$codorden'>
					  <input type='hidden' name='distbr' value=$distbr>";
				echo "<script>formu.submit();</script></form>";
			}else{
			    mssql_query("UPDATE intentos2 SET idintento=0",$conexionw);
				echo "<form name='formu' method='post' action='ocv2.php'>
	  				  <input type='hidden' name='diaenv' value='$diaenv'>
	  				  <input type='hidden' name='mesenv' value='$mesenv'>
	  				  <input type='hidden' name='anioenv' value='$anioenv'>
	  				  <input type='hidden' name='fpago' value='$fpago'>
	  				  <input type='hidden' name='chke' value='$chke'>
	  				  <input type='hidden' name='banc' value='$banc'>
	  				  <input type='hidden' name='canprecio' value='$canprecio'>
	 				  <input type='hidden' name='trnsprt' value='$trnsprt'>
	  				  <input type='hidden' name='ndia' value='$ndia'>
	  				  <input type='hidden' name='nmes' value='$nmes'>
	  				  <input type='hidden' name='aniocom' value='$aniocom'>
					  <input type='hidden' name='mmes' value='$mmes'>
	  				  <input type='hidden' name='orden' value='$orden'>
	  				  <input type='hidden' name='codorden' value='$codorden'>
	  				  <input type='hidden' name='distbr' value='$distbr'>
	  				  <input type='hidden' name='cporte' value='$cporte'>
  	  				  <input type='hidden' name='calle' value='$calle'>
	  				  <input type='hidden' name='ciuda' value='$ciuda'>
	  				  <input type='hidden' name='estado' value='$estado'>
	  				  <input type='hidden' name='refe' value='$refe'>
	  				  <input type='hidden' name='comenta' value='$comenta'>
	  				  <input type='hidden' name='cproc' value='$cproc'>
	  				  <input type='hidden' name='canti' value=$canti>";
				echo "<script>formu.submit();</script></form>";
			}
		}
}else{
echo "<script>alert('ERROR DE SISTEMA');</script>";
//mssql_query("UPDATE bloqueacompra SET blockcompra='no' WHERE blockcompra='si'",$conexionw);
mssql_query("UPDATE intentos2 SET idintento=0",$conexionw);
mssql_close($conexionw);
echo "<form name='formu' method='post' action='claudia.php'></form>";
echo "<script>formu.submit();</script>";
}
?>