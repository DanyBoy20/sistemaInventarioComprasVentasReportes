<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<?
$nordn=trim($nordn);
$orden=trim($orden);
$canti=trim($canti);
$w=trim($w);
$cproc=strtoupper(trim($cproc));
$conexionw=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$intento=mssql_query("SELECT idintento FROM intentos2",$conexionw);
$intento1=mssql_fetch_array($intento);
$intento2=$intento1["idintento"];

if($cproc=="" OR $canti==""){
echo "<script>alert('CAMPOS INCOMPLETOS ... INTENTELO NUEVAMENTE !!!');</script>";
mssql_close($conexionw);
echo "<form name='formu' method='post' action='ocv5.php'>
	  <input type='hidden' name='orden' value=$orden>
	  <input type='hidden' name='dtr' value=$dtr>
	  <input type='hidden' name='nordn' value=$nordn>
	  <input type='hidden' name='w' value=$w>";
echo "<script>formu.submit();</script></form>";

}else if($cproc!="" AND $canti!=""){
	$produw=mssql_query("SELECT idproduct FROM inventa1 WHERE idproduct='$cproc' AND statusP IS NULL",$conexionw);
		$lafiw=mssql_fetch_array($produw);
		$cprocw=$lafiw["idproduct"];
		
	/* Verifico que el producto a insertar no haya sido pedido previamente en esta misma orden */
	$produx=mssql_query("SELECT cod FROM inventa1 WHERE idproduct='$cproc' AND statusP IS NULL",$conexionw);
    $lafizx1=mssql_fetch_array($produx);
    $chk1=$lafizx1["cod"];
		
	$verif=mssql_query("SELECT cod FROM ordencv2 WHERE idcompraventa=$orden AND cod=$chk1",$conexionw);
	$verif2=mssql_fetch_array($verif);
	$verif3=$verif2["cod"];
		
	if($cprocw!=$cproc){
	
	/* AQUI VA LA VERIFICACION DE PRODUCTOS QUE NO ESTEN EN BD, DESPUES DE TRES INTENTOS ENVIAR FORMULARIO PARA INSERTAR PRODUCTOS */
		if($intento2 < 3 ){
			echo "<script>alert('NO EXISTE EL PRODUCTO');</script>";
			$intento2=$intento2+1;
			mssql_query("UPDATE intentos2 SET idintento=$intento2",$conexionw);
			mssql_close($conexionw);
			echo "<form name='formu' method='post' action='ocv5.php'>
	  		  		<input type='hidden' name='orden' value=$orden>
	  		  		<input type='hidden' name='dtr' value=$dtr>
	  		  		<input type='hidden' name='nordn' value=$nordn>
	  		  		<input type='hidden' name='w' value=$w>";
			echo "<script>formu.submit();</script></form>";

		}else if($intento2 > 2){
			echo "<script>alert('EL PRODUCTO NO ESTA EN LA BASE DE DATOS, SI DESEA INGRESAR UN NUEVO PRODUCTO, LLENE EL SIGUIENTE FORMULARIO, RECUERDE QUE NO DEBE DE QUEDAR CAMPOS VACIOS ... DESPUES INTENTE NUEVAMENTE INGRESAR EL PRODUCTO');</script>";
		/* AQUI ABRO UNA NUEVA VENTANA PARA INGRESAR NUEVOS PRODUCTOS, DEBE DE CERRARSE AL INSERTAR EL PRODUCTO SATISFACTORIAMENTE */
			echo "<script>window.open('newproduct.php','ventana1','width=500, height=350, scrollbars=yes, menubar=no, location=no, resizable=yes')</script>"; 
		/* FIN POP UP */
			mssql_query("UPDATE intentos2 SET idintento=0",$conexionw);
			mssql_close($conexionw);
			echo "<form name='formu' method='post' action='ocv5.php'>
	  		  		<input type='hidden' name='orden' value=$orden>
	  		  		<input type='hidden' name='dtr' value=$dtr>
	  		  		<input type='hidden' name='nordn' value=$nordn>
	  		  		<input type='hidden' name='w' value=$w>";
			echo "<script>formu.submit();</script></form>";

		}else{
			echo "<script>alert('ERROR AL CONECTAR CON LA BASE DE DATOS');</script>";
			mssql_close($conexionw);
			echo "<script>window.location='nada.php'</script>";
		}
	/* TERMINA VERIFICACION */
	
	}else if($verif3!=""){
		echo "<script>alert('ERROR ... EL PRODUCTO YA A SIDO INSERTADO EN LA ORDEN, SI DESEA AGREGAR MAS CANTIDADES DEL MISMO PRODUCTO, DEBE IR AL MENU MODIFICAR ORDEN');</script>";
		mssql_query("UPDATE intentos2 SET idintento=0",$conexionw);
	     mssql_close($conexionw);
	     echo "<form name='formu' method='post' action='ocv5.php'>
	           <input type='hidden' name='orden' value=$orden>
	           <input type='hidden' name='dtr' value=$dtr>
	           <input type='hidden' name='nordn' value=$nordn>
	           <input type='hidden' name='w' value=$w>";
	     echo "<script>formu.submit();</script></form>";
	
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
				mssql_close($conexionw);
				mssql_query("UPDATE intentos2 SET idintento=0",$conexionw);
				echo "<form name='formu' method='post' action='ocv5.php'>
	  				  <input type='hidden' name='orden' value=$orden>
	  				  <input type='hidden' name='dtr' value=$dtr>
	  				  <input type='hidden' name='nordn' value=$nordn>
	  				  <input type='hidden' name='w' value=$w>";
				echo "<script>formu.submit();</script></form>";
			}else{
			    mssql_query("UPDATE intentos2 SET idintento=0",$conexionw);
				echo "<form name='formu' method='post' action='ocv3.php'>
	  				  <input type='hidden' name='w' value=$w>
	  				  <input type='hidden' name='orden' value=$orden>
					  <input type='hidden' name='nordn' value=$nordn>
					  <input type='hidden' name='dtr' value=$dtr>
	  				  <input type='hidden' name='cproc' value=$cproc>
	  				  <input type='hidden' name='canti' value=$canti>";
				echo "<script>formu.submit();</script></form>";
			}
		}
}else{
echo "<script>alert('ERROR DE SISTEMA ... INTENTE MAS TARDE O LLAME AL DEPARTAMENTO DE SISTEMAS (777-310-6873) ENERGIA AMBIENTAL S.A. DE C.V.');</script>";
//mssql_query("UPDATE bloqueacompra SET blockcompra='no' WHERE blockcompra='si'",$conexionw);
mssql_query("UPDATE intentos2 SET idintento=0",$conexionw);
mssql_close($conexionw);
echo "<form name='formu' method='post' action='claudia.php'></form>";
echo "<script>formu.submit();</script>";
}
?>