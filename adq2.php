<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<?
$cprocq=$cproc;
$ordped=trim($oped);
$conexionw=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$checa1=mssql_query("SELECT DISTINCT ordendped FROM ordenadq1 WHERE ordendped='$ordped'",$conexionw);
$checa2=mssql_fetch_array($checa1);
$checa3=$checa2["ordendped"];
$produw=mssql_query("SELECT idproduct FROM inventa1 WHERE idproduct='$cprocq' AND statusP IS NULL",$conexionw);
$lafiw=mssql_fetch_array($produw);
$cprocw=$lafiw["idproduct"];
$intento=mssql_query("SELECT idintento FROM intentos",$conexionw);
$intento1=mssql_fetch_array($intento);
$intento2=$intento1["idintento"];
?>
<? if($ordped == $checa3):?>
<?
echo "<script>alert('LA ORDEN DE PEDIDO YA EXISTE');</script>";
mssql_close($conexionw);
echo "<script>window.location='adq.php'</script>";
?>
<? elseif($cprocw == ""):?>
	<?
	if($intento2 < 3 ){
		echo "<script>alert('NO EXISTE EL PRODUCTO');</script>";
		$intento2=$intento2+1;
		mssql_query("UPDATE intentos SET idintento=$intento2",$conexionw);
		mssql_close($conexionw);
		echo "<form name='formu' method='post' action='adqpre.php'>
		  <input type='hidden' name='diaenv' value=$diaenv>
		  <input type='hidden' name='mesenv' value=$mesenv>
		  <input type='hidden' name='anioenv' value=$anioenv>
		  <input type='hidden' name='fpago' value=$fpago>
		  <input type='hidden' name='chke' value=$chke>
		  <input type='hidden' name='banc' value=$banc>
		  <input type='hidden' name='canprecio' value=$canprecio>
		  <input type='hidden' name='comenta' value=$comenta>
		  <input type='hidden' name='oped' value=$oped>
		  <input type='hidden' name='ftrans' value=$ftrans>
		  <input type='hidden' name='trnsprt' value=$trnsprt>
		  <input type='hidden' name='cndra' value=$cndra>
		  <input type='hidden' name='fpagotrns' value=$fpagotrns>
		  <input type='hidden' name='compag1' value=$compag1>
		  <input type='hidden' name='diaent' value=$diaent>
		  <input type='hidden' name='mesent' value=$mesent>
		  <input type='hidden' name='anioent' value=$anioent>
		  <input type='hidden' name='calle' value=$calle>
		  <input type='hidden' name='numero' value=$numero>
		  <input type='hidden' name='colonia' value=$colonia>
		  <input type='hidden' name='codpst' value=$codpst>
		  <input type='hidden' name='ciuda' value=$ciuda>
		  <input type='hidden' name='estado' value=$estado>
		  <input type='hidden' name='rev' value=$rev>
		  <input type='hidden' name='ndia' value=$ndia>
		  <input type='hidden' name='nmes' value=$nmes>
		  <input type='hidden' name='mmes' value=$mes>
		  <input type='hidden' name='nanio' value=$nanio>
		  <input type='hidden' name='aniocom' value=$aniocom>
		  <input type='hidden' name='orden' value=$orden>
		  <input type='hidden' name='orden2' value=$orden2>
		  <input type='hidden' name='codorden' value=$codorden>
		  <input type='hidden' name='codorden2' value=$codorden2>";
		  echo "<script>formu.submit();</script></form>";
	}else if($intento2 > 2){
		echo "<script>alert('EL PRODUCTO NO ESTA EN LA BASE DE DATOS, SI DESEA INGRESAR UN NUEVO PRODUCTO, LLENE EL SIGUIENTE FORMULARIO, RECUERDE QUE NO DEBE DE QUEDAR CAMPOS VACIOS ... DESPUES INTENTE NUEVAMENTE INGRESAR EL PRODUCTO');</script>";
		/* AQUI ABRO UNA NUEVA VENTANA PARA INGRESAR NUEVOS PRODUCTOS, DEBE DE CERRARSE AL INSERTAR EL PRODUCTO SATISFACTORIAMENTE */
		echo "<script>window.open('newproduct.php','ventana1','width=500, height=350, scrollbars=yes, menubar=no, location=no, resizable=yes')</script>"; 
		/* FIN POP UP */
		mssql_query("UPDATE intentos SET idintento=0",$conexionw);
		mssql_close($conexionw);
		echo "<form name='formu' method='post' action='adqpre.php'>
		  <input type='hidden' name='diaenv' value=$diaenv>
		  <input type='hidden' name='mesenv' value=$mesenv>
		  <input type='hidden' name='anioenv' value=$anioenv>
		  <input type='hidden' name='fpago' value=$fpago>
		  <input type='hidden' name='chke' value=$chke>
		  <input type='hidden' name='banc' value=$banc>
		  <input type='hidden' name='canprecio' value=$canprecio>
		  <input type='hidden' name='comenta' value=$comenta>
		  <input type='hidden' name='oped' value=$oped>
		  <input type='hidden' name='ftrans' value=$ftrans>
		  <input type='hidden' name='trnsprt' value=$trnsprt>
		  <input type='hidden' name='cndra' value=$cndra>
		  <input type='hidden' name='fpagotrns' value=$fpagotrns>
		  <input type='hidden' name='compag1' value=$compag1>
		  <input type='hidden' name='diaent' value=$diaent>
		  <input type='hidden' name='mesent' value=$mesent>
		  <input type='hidden' name='anioent' value=$anioent>
		  <input type='hidden' name='calle' value=$calle>
		  <input type='hidden' name='numero' value=$numero>
		  <input type='hidden' name='colonia' value=$colonia>
		  <input type='hidden' name='codpst' value=$codpst>
		  <input type='hidden' name='ciuda' value=$ciuda>
		  <input type='hidden' name='estado' value=$estado>
		  <input type='hidden' name='rev' value=$rev>
		  <input type='hidden' name='ndia' value=$ndia>
		  <input type='hidden' name='nmes' value=$nmes>
		  <input type='hidden' name='mmes' value=$mes>
		  <input type='hidden' name='nanio' value=$nanio>
		  <input type='hidden' name='aniocom' value=$aniocom>
		  <input type='hidden' name='orden' value=$orden>
		  <input type='hidden' name='orden2' value=$orden2>
		  <input type='hidden' name='codorden' value=$codorden>
		  <input type='hidden' name='codorden2' value=$codorden2>";
		  echo "<script>formu.submit();</script></form>";
	}else{
		echo "<script>alert('ERROR EN LA CAPTURA');</script>";
		mssql_query("UPDATE intentos SET idintento=0",$conexionw);
		mssql_close($conexionw);
		echo "<script>window.location='adq.php'</script>";
	}
	?>
<? else:?>
<HTML>
<HEAD><title>Administracion</title>
<!--
Bombas de calor para piscinas. Bombas de calor para albercas. Bomba de calor. Calderas. Calentadores
-->
<LINK href="img/style.css" type=text/css rel=stylesheet>
<style type="text/css">
.bordet{border-left-style:groove; border-right-style:ridge; border-bottom-style:groove;}

</style>
<SCRIPT type="text/javascript">

function click(e) {
// Explorer
if (IE)
if (event.button == 2){
accion() ;
return false ;
}

// Netscape
if (NS)
if (e.which == 3) {
accion() ;
return false ;
}
}

function accion() {

window.status = 'Bombas de Calor para Piscinas y Spa' ;

if (IE) alert('EAM');
return ;
}



var NS = (document.layers) ;
var IE = (document.all) ;
if (NS) document.captureEvents(Event.MOUSEDOWN) ;
document.onmousedown = click ;


</SCRIPT>

<SCRIPT LANGUAGE="JavaScript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=yes,location=0,statusbar=0,menubar=0,resizable=yes,width=425,height=410');");
}


</script>

<SCRIPT languague="JavaScript">
 var cuenta=0
 var texto="   >>>EAM  ::: HPMP: Calienta tu piscina, no quemes tu dinero   ::: <<<   "
 function scrolltexto () {
 window.status=texto.substring (cuenta,texto.length)+  texto.substring(0,cuenta)
 if (cuenta <texto.length){ cuenta ++
 }else{
 cuenta=0
 }
 setTimeout("scrolltexto()",150)
 }
 scrolltexto ()
</SCRIPT>
<SCRIPT LANGUAGE="JavaScript">
function envia(formulario){
document.formulario.action="eadq.php";
document.formulario.submit();
document.formulario.enviar.disabled = true;
document.formulario.cancela.disabled = true;
document.formulario.cproc.disabled = true;
document.formulario.canti.disabled = true;
document.formulario.agrega.disabled = true;
document.formulario.inicio.disabled = false;
}
</script>
<SCRIPT LANGUAGE="javascript">
function valida1(obj,bajo,alto){
if((obj.value<bajo) || (obj.value>alto)){
alert("Debe de ingresar el precio");
obj.focus();
}
}
</SCRIPT>
<script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</HEAD>
<BODY background="img/fondo.gif" leftMargin=0 topMargin=0 marginwidth="0" marginheight="0" bottommargin="0" bgproperties="fixed"><center>
  <table width="804" height="336" align="center" cellpadding="0" cellspacing="0" class="bordet">
    <tr>
      <td height="134">
          <div align="center">
            <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0','width','800','height','134','src','img/TRANS','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','img/TRANS' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="800" height="134">
              <param name="movie" value="img/TRANS.swf">
              <param name="quality" value="high">
              <embed src="img/TRANS.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="800" height="134"></embed>
            </object></noscript>
        </div></td>
    </tr>    
    <tr>
      <td height="123" valign="top">
        <table width="100%"  border="0" bgcolor="#FFFFFF">
          <tr>
            <td width="67%" valign="top">
              <table width="100%"  border="0" bgcolor="#FFFFFF">
          <tr>
            <td width="67%" valign="top">
              <table width="100%"  border="0">
                <tr>
                  <td align="center" colspan="2" background="../img/blue.png" class="small_text1">
<?
$conexion=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$resultado=mssql_query("SELECT * FROM administracion
			WHERE nombre='$administra'",$conexion);
$fila=mssql_fetch_array($resultado);
	$c1=$fila["clave"];
	$c2=$fila["nombre"];
	$c3=$fila["apepat"];
	$c4=$fila["apemat"];
	$cargo=$fila["cargo"];
	$c5=$fila["pw"];	
	$c6=$fila["foto"];		
	$puntoventa=$fila["puntoventa"];		
	$cdg=$fila["cdg"];	
?>
Usuario: <? echo $c2; ?>&nbsp;<? echo $c3; ?>&nbsp;<? echo $c4; ?>&nbsp;-&nbsp;<? echo $cargo; ?>&nbsp;-&nbsp;<? echo $puntoventa; ?>
<?
	$canprecio=$canprecio;
	$oped=$oped;
	$compag1=$compag1;
	$chke=$chke;
	$banc=$banc;
	$dia=$ndia;
	$mes=$nmes;
	$mss=$mmes;
	$anio=$nanio;
	$aniocm=$aniocom;
	$orden=$orden;
	$orden2=$orden2;
	$nordn=$codorden;
	$nordn2=$codorden2;
	$den=$diaenv;
	$menv=$mesenv;
	$anenv=$anioenv;
	$fpg=$fpago;
	$consdra=$cndra;
	$ftrs=$ftrans;
	$trns=$trnsprt;
	$fpgotrs=$fpagotrns;
	$diaent=$diaent;
	$mesent=$mesent;
	$anioent=$anioent;
	$revson=$rev;
	$comt=$comenta;
	$cproc2=strtoupper(trim($cproc));
	$produ=mssql_query("SELECT cod FROM inventa1 WHERE idproduct='$cproc2' AND statusP IS NULL",$conexion);
    $lafi4=mssql_fetch_array($produ);
    $cproc1=$lafi4["cod"];
	$canti=$canti;	
	$status="Pendiente";	
	$fechaadq="$ndia/$mes/$aniocm";
	$fechaenv="$den/$menv/$anenv";
	$fchdsent="$diaent/$mesent/$anioent";
	$calle=$calle;
	$numero=$numero;
	$colonia=$colonia;
	$codpst=$codpst;
	$ciuda=$ciuda;
	$estado=$estado;
	$rfc="EAM-020710-G93";
	$cntent=0;
// saco el ultimo valor de la tabla pagoadq1 y asignarle el siguiente para  llenar mi tabla de pagos de ordenes de adquisicion
$nume=mssql_query("SELECT npagoadq from pagoadq1",$conexion);
$i=1;
while($f=mssql_fetch_array($nume)){
$a[$i]=$f["npagoadq"];
$i++;
}
rsort ($a);
$w=$a[0];
$w=$w+1;
mssql_close($conexion);
?>
</td>
                </tr>
				
<tr><td colspan="2">
<a class=main_navigation target="_blank" href="veradqui.php?ursec=<? echo $cod;?>&ndn=<? echo $nordn;?>&idadq=<? echo $orden;?>&secur=<? echo session_id();?>">
Ver Orden Completa
</a>
</td></tr>
<tr><td colspan="2">
<a class=main_navigation href="uno.php?ursec=<? echo $cod;?>&ndn=<? echo $nordn;?>&w=<? echo $w;?>&idadq=<? echo $orden;?>&orden=<? echo $orden;?>&secur=<? echo session_id();?>">
Modificar Orden
</a>
</td></tr>
				<tr><td colspan="2">
				<hr align="center" color="#0033FF" width="100%" size="1px">
				</td></tr>
				<tr>
                  <td colspan="2">
				  <table width="100%"  border="0">
  <tr>
    <td background="img/blue1.jpg" align="left">
<?
	$conn=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	$resut=mssql_query("SELECT idproduct,linea,descripcion,notas,pventaEA FROM inventa1 WHERE cod=$cproc1 AND statusP IS NULL",$conn);
	$registroz=mssql_fetch_array($resut);
		$ccprod=$registroz["idproduct"];
		$linea=$registroz["linea"];
		$descrp=$registroz["descripcion"];
		$notai=$registroz["notas"];
		$precio=$registroz["pventaEA"];
if($precio==''){
	echo "<script>alert('ERROR ... LA CLAVE QUE INTRODUJO A CAMBIADO, REVISE LA SIGUIENTE NOTA: $notai ... FAVOR DE REVISAR NUEVO CATALOGO');</script>";
	mssql_query("UPDATE intentos SET idintento=0",$conn);
	mssql_close($conn);
	echo "<form name='formu' method='post' action='adqpre.php'>
		  <input type='hidden' name='diaenv' value=$diaenv>
		  <input type='hidden' name='mesenv' value=$mesenv>
		  <input type='hidden' name='anioenv' value=$anioenv>
		  <input type='hidden' name='fpago' value=$fpago>
		  <input type='hidden' name='chke' value=$chke>
		  <input type='hidden' name='banc' value=$banc>
		  <input type='hidden' name='canprecio' value=$canprecio>
		  <input type='hidden' name='comenta' value=$comenta>
		  <input type='hidden' name='oped' value=$oped>
		  <input type='hidden' name='ftrans' value=$ftrans>
		  <input type='hidden' name='trnsprt' value=$trnsprt>
		  <input type='hidden' name='cndra' value=$cndra>
		  <input type='hidden' name='fpagotrns' value=$fpagotrns>
		  <input type='hidden' name='compag1' value=$compag1>
		  <input type='hidden' name='diaent' value=$diaent>
		  <input type='hidden' name='mesent' value=$mesent>
		  <input type='hidden' name='anioent' value=$anioent>
		  <input type='hidden' name='calle' value=$calle>
		  <input type='hidden' name='numero' value=$numero>
		  <input type='hidden' name='colonia' value=$colonia>
		  <input type='hidden' name='codpst' value=$codpst>
		  <input type='hidden' name='ciuda' value=$ciuda>
		  <input type='hidden' name='estado' value=$estado>
		  <input type='hidden' name='rev' value=$rev>
		  <input type='hidden' name='ndia' value=$ndia>
		  <input type='hidden' name='nmes' value=$nmes>
		  <input type='hidden' name='mmes' value=$mes>
		  <input type='hidden' name='nanio' value=$nanio>
		  <input type='hidden' name='aniocom' value=$aniocom>
		  <input type='hidden' name='orden' value=$orden>
		  <input type='hidden' name='orden2' value=$orden2>
		  <input type='hidden' name='codorden' value=$codorden>
		  <input type='hidden' name='codorden2' value=$codorden2>";
		  echo "<script>formu.submit();</script></form>";
}else{
	/* INSERTO LOS VALORES A LAS TABLAS CORRESPONDIENTES PARA DESPUES REALIZAR LA COPIA FISICA DE LA ORDEN A IMPRIMIR */
mssql_query("UPDATE intentos SET idintento=0",$conn);						  
mssql_query("INSERT INTO ordenadq1(idadquisicion,ordendped,idfolioimpreso,folioimpresoadq,nadquisicion,diaadqui,mesadqui,anioadqui,
	                      fechoadq1,fecharevision,condicionespago,nrefe,banco,fechaenvioadqui1,fechaenvioadqui2,fechadesent,fechadesent2,calleadq,numeroadq,coloniaadq,codpost,
						  ciudadadq,estadoadq,rfcadq,idtransporte,consolidadora,formatransporte,
						  frmpagotranspadq,compag,revision,comentaadq,clave,statusadq)
	                      VALUES($orden,'$oped',$orden2,'$nordn2','$nordn',$dia,'$mss',$aniocm,'$fechaadq','$fechaadq','$fpg','$chke','$banc',
						  '$fechaenv','$fechaenv','$fchdsent','$fchdsent',
						  '$calle','$numero','$colonia','$codpst','$ciuda','$estado','$rfc',$trns,$consdra,
						  '$ftrs','$fpgotrs','$compag1','$revson','$comt',$cod,'$status')",$conn);

	mssql_query("INSERT INTO ordenadq2(idadquisicion,cantidadadq,cantentregadadq,cod,precprouniadq)
	                            VALUES($orden,$canti,$cntent,$cproc1,$precio)",$conn);
							

//inserto los valores
$estadp="pendiente";					
mssql_query("INSERT INTO pagoadq1(npagoadq,idadquisicion,tippag,estadopago)
	                            VALUES($w,$orden,'$fpg','$estadp')",$conn);
mssql_query("INSERT INTO pagoadq2(npagoadq,tpog,numeropago,cantidpa,bancoed)
	                            VALUES($w,'$fpg','$chke',$canprecio,'$banc')",$conn);									 
mssql_close($conn);
}
?>	
<SPAN class="navigation_heading">Orden de Adquisicion No. <? echo $codorden;?></SPAN>
</td>
    </tr>
	<tr>
	<td align="center">
	<?
	$cxxn=mssql_connect("SISTEMAS","","");
    mssql_select_db("airenergy",$cxxn);
	$ok=mssql_query("SELECT cantidadadq,precprouniadq,linea,descripcion,idproduct
                     FROM(ordenadq2 INNER JOIN inventa1 ON ordenadq2.cod=inventa1.cod)
                     WHERE idadquisicion=$orden",$cxxn);
	echo "<table width='100%' border='1' align='center'>
    <tr class='peque'>
	<td align='center' width='auto' background='img/blue1.jpg'>Clave</td>
	<td align='center' width='auto' background='img/blue1.jpg'>Linea</td>
    <td align='center' width='auto' background='img/blue1.jpg'>Cantidad</td>
    <td align='center' width='auto' background='img/blue1.jpg'>Descripcion</td>
	<td align='center' width='auto' background='img/blue1.jpg'>Precio Unitario</td>
    <td align='center' width='auto' background='img/blue1.jpg'>Total</td></tr>";
    while($st=mssql_fetch_array($ok)){	
	$dp1=$st["cantidadadq"];
	$dp2=$st["precprouniadq"];
	$dp3=$st["idproduct"];
	$dp4=$st["linea"];
	$dp5=$st["descripcion"];	
	$dp6=$dp1*$dp2;
	echo "<tr>
    <td style='font-size:.75em;' align='center' width='auto'>" . $dp3 . "</td>
	<td style='font-size:.75em;' align='center' width='auto'>" . $dp4 . "</td>
	<td style='font-size:.75em;' align='center' width='auto'>" . $dp1 . "</td>
	<td style='font-size:.75em;' align='center' width='auto'>" . $dp5 . "</td>
	<td style='font-size:.75em;' align='center' width='auto'>$signo" . number_format($dp2,2) . "</td>
	<td style='font-size:.75em;' align='center' width='auto'>$signo" . number_format($dp6,2) . "</td>
    </tr>";
	}
	$okw=mssql_query("SELECT SUM(totlprdadq) AS tot FROM ordenadq2 
                     WHERE idadquisicion=$orden",$cxxn);
	$registroqz=mssql_fetch_array($okw);
	$subt=$registroqz["tot"];
	$iv=$subt*.15;
	$neto=$subt+$iv;
/*
	echo "<tr><td colspan='4' rowspan='3' align='center' valign='top'><br>
	<select name='lusta' style='width:95%; font-size:.75em;'>";
		$rsl=mssql_query("SELECT cod,idproduct,linea,descripcion
		                  FROM inventa1 WHERE statusP IS NULL ORDER BY linea",$cxxn);
		while($linea=mssql_fetch_array($rsl)){
		$f1=$linea['cod'];
		$f2=$linea['idproduct'];
		$f3=$linea['linea'];
		$f4=$linea['descripcion'];
		echo "<option value='$f1'>$f2  -  $f3-$f4</option>";
}
echo "</select></td>
*/
echo "<tr><td colspan='3'><td><td align='center' width='auto' background='img/blue1.jpg'>Subtotal</td>
	<td style='font-size:.75em;' align='center' width='auto'>$ " . number_format($subt,2) . "</td>
	</tr>
	<tr>
	<td colspan='3'><td><td align='center' width='auto' background='img/blue1.jpg'>I.V.A.</td>
	<td style='font-size:.75em;' align='center' width='auto'>$ " . number_format($iv,2) . "</td>
	</tr>
	<tr>
	<td colspan='3'><td><td align='center' width='auto' background='img/blue1.jpg'>Total</td>
	<td style='font-size:.75em;' align='center' width='auto'>$ " . number_format($neto,2) . "</td>
	</tr>";
	mssql_close($cxxn);
	echo "</table>";
	?>
	</td>
	</tr>
	<tr>
	<td align="center">	
<form name="formulario" method="post" action="">
<table width="100%">
<tr>
    <td align='center' colspan="3"><input type="submit" name="inicio" value="Inicio" onClick="this.form.action='claudia.php'" disabled>	</td>
  </tr>
  <tr>
    <td align='center' colspan="3"><!--<input type="button" name="guardar" value="Guardar Orden" onClick="envias(this.form)">-->
	<input type="button" name="enviar" value="Guardar copia de orden en PC" onClick="envia(this.form)">
	<input type="submit" name="cancela" value="Cancelar Orden" onClick="this.form.action='cancadq.php'"></td>
  </tr>
  <tr>
    <td align='center' background='img/blue1.jpg' colspan="3"><SPAN class="navigation_heading">Insertar otro Producto a Orden</span></td>
  </tr>
  <tr>
<td class="small_text1" align="center" colspan="3">
Clave Producto:<input type="text" name="cproc">&nbsp;Cantidad<input type="text" name="canti" size="5" maxlength="2"></td>
</tr>
<tr>
<td colspan="3" align="center">	
	<input type="hidden" name="orden" value="<? echo $orden;?>"><input type="hidden" name="nordn" value="<? echo $codorden;?>">
	<input type="hidden" name="w" value="<? echo $w;?>">
	<input type="submit" name="agrega" value="Agregar Producto a Orden" onClick="this.form.action='oadq.php'"></td>
  </tr>
</table>
</form>
	</td>
	</tr>
</table>
				  </td>
                </tr>
            </table></td>
          </tr>
      </table>
			
			</td>
          </tr>
      </table></td>
    </tr>
  </table>
</center></BODY>
</HTML>
<? endif;?>