<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<?
$cprocq=strtoupper(trim($pc1));
$orden=$idadq;
$cntent=0;
$conexionw=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$produw=mssql_query("SELECT idproduct FROM inventa1 WHERE idproduct='$cprocq' AND statusP IS NULL",$conexionw);
$lafiw=mssql_fetch_array($produw);
$cprocw=$lafiw["idproduct"];
/* Verifico que el producto a insertar no haya sido pedido previamente en esta misma orden */
	$produx=mssql_query("SELECT cod FROM inventa1 WHERE idproduct='$cprocq' AND statusP IS NULL",$conexionw);
    $lafizx1=mssql_fetch_array($produx);
    $chk1=$lafizx1["cod"];

	$verif=mssql_query("SELECT cod FROM ordenadq2 WHERE idadquisicion=$idadq AND cod=$chk1",$conexionw);
	$verif2=mssql_fetch_array($verif);
	$verif3=$verif2["cod"];
	
	$intento=mssql_query("SELECT idintento FROM intentos",$conexionw);
	$intento1=mssql_fetch_array($intento);
	$intento2=$intento1["idintento"];
	
if($cprocw == ""){
/* AQUI VA LA VERIFICACION E INTENTOS */
    if($intento2 < 3 ){
		echo "<script>alert('NO EXISTE EL PRODUCTO');</script>";
		$intento2=$intento2+1;
		mssql_query("UPDATE intentos SET idintento=$intento2",$conexionw);
		mssql_close($conexionw);
       echo "<form name='formu' method='post' action='oadq3.php'>
	  		 <input type='hidden' name='orden' value=$idadq>
	  		 <input type=hidden name='w' value=$w>
   	  		 <input type=hidden name='nordn' value=$nordn>";
       echo "<script>formu.submit();</script></form>";
	}else if($intento2 > 2){
		echo "<script>alert('EL PRODUCTO NO ESTA EN LA BASE DE DATOS, SI DESEA INGRESAR UN NUEVO PRODUCTO, LLENE EL SIGUIENTE FORMULARIO, RECUERDE QUE NO DEBE DE QUEDAR CAMPOS VACIOS ... DESPUES INTENTE NUEVAMENTE INGRESAR EL PRODUCTO');</script>";
		mssql_query("UPDATE intentos SET idintento=0",$conexionw);
		/* AQUI ABRO UNA NUEVA VENTANA PARA INGRESAR NUEVOS PRODUCTOS, DEBE DE CERRARSE AL INSERTAR EL PRODUCTO SATISFACTORIAMENTE */
		echo "<script>window.open('newproduct.php','ventana1','width=500, height=350, scrollbars=yes, menubar=no, location=no, resizable=yes')</script>"; 
		/* FIN POP UP */		
		mssql_close($conexionw);
	    echo "<form name='formu' method='post' action='oadq3.php'>
	  		 <input type='hidden' name='orden' value=$idadq>
	  		 <input type=hidden name='w' value=$w>
   	  		 <input type=hidden name='nordn' value=$nordn>";
       echo "<script>formu.submit();</script></form>";
	}else{
		echo "<script>alert('ERROR EN LA CAPTURA');</script>";
		mssql_query("UPDATE intentos SET idintento=0",$conexionw);
		mssql_close($conexionw);
        echo "<form name='formu' method='post' action='oadq3.php'>
	          <input type='hidden' name='orden' value=$idadq>
	         <input type=hidden name='w' value=$w>
   	         <input type=hidden name='nordn' value=$nordn>";
	   echo "<script>formu.submit();</script></form>";
	}
/* TERMINA VERIFICACION E INTENTOS */ 
/* verifico si el producto ya fue previamente insertado */
}else if($verif3!=""){
echo "<script>alert('ERROR ... EL PRODUCTO YA A SIDO INSERTADO EN LA ORDEN, SI DESEA AGREGAR MAS CANTIDADES DEL MISMO PRODUCTO, DEBE IR AL MENU MODIFICAR ORDEN');</script>";
mssql_query("UPDATE intentos SET idintento=0",$conexionw);
mssql_close($conexionw);
echo "<form name='formu' method='post' action='oadq3.php'>
      <input type='hidden' name='w' value='$w'>
	  <input type='hidden' name='orden' value=$idadq>
	  <input type='hidden' name='nordn' value=$nordn>";
echo "<script>formu.submit();</script></form>";
}else{		
	$ct1=trim($ct1);
	$cxx=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	$produ=mssql_query("SELECT cod FROM inventa1 WHERE idproduct='$cprocq' AND statusP IS NULL",$cxx);
    $lafi4=mssql_fetch_array($produ);
    $cproc1=$lafi4["cod"];	
	$resut=mssql_query("SELECT idproduct,linea,descripcion,notas,pventaEA FROM inventa1 WHERE cod=$cproc1 AND statusP IS NULL",$cxx);
	$registroz=mssql_fetch_array($resut);
		$ccprod=$registroz["idproduct"];
		$linea=$registroz["linea"];
		$descrp=$registroz["descripcion"];
		$notai=$registroz["notas"];
		$precio=$registroz["pventaEA"];
	if($verif3==$chk1){
	echo "<script>alert('ERROR');</script>";
	mssql_query("UPDATE intentos SET idintento=0",$cxx);
    mssql_close($cxx);
    echo "<form name='formu' method='post' action='oadq3.php'>
          <input type='hidden' name='w' value='$w'>
	      <input type='hidden' name='orden' value=$idadq>
	      <input type='hidden' name='nordn' value=$nordn>";
    echo "<script>formu.submit();</script></form>";	
	}else if($precio==''){
	echo "<script>alert('ERROR ... LA CLAVE QUE INTRODUJO A CAMBIADO, REVISE LA SIGUIENTE NOTA: $notai ... FAVOR DE REVISAR NUEVO CATALOGO');</script>";
	mssql_query("UPDATE intentos SET idintento=0",$cxx);
	mssql_close($cxx);
	echo "<form name='formu' method='post' action='oadq3.php'>
	      <input type='hidden' name='orden' value=$idadq>
	      <input type=hidden name='w' value=$w>
   		  <input type=hidden name='nordn' value=$nordn>";
    echo "<script>formu.submit();</script></form>";
	}else{	
	mssql_query("INSERT INTO ordenadq2(idadquisicion,cantidadadq,cantentregadadq,cod,precprouniadq)
	                            VALUES($orden,$ct1,$cntent,$cproc1,$precio)",$cxx); 
	mssql_query("UPDATE intentos SET idintento=0",$cxx);
	mssql_close($cxx);
	echo "<script>alert('Producto Insertado')</script>";
	echo "<form name='formu' method='post' action='oadq3.php'>
	  <input type='hidden' name='orden' value=$idadq>
	  <input type=hidden name='w' value=$w>
   		  <input type=hidden name='nordn' value=$nordn>";
	echo "<script>formu.submit();</script></form>";
    }	
}
?>	
