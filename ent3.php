<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<HTML>
<HEAD><title>REPORTES - ENTRADAS</title>

<!--
Bombas de calor para piscinas. Bombas de calor para albercas. Bomba de calor. Calderas. Calentadores
-->
<LINK href="img/style.css" type=text/css rel=stylesheet>
<style type="text/css">
.bordet{border-left-style:groove; border-right-style:ridge; border-bottom-style:groove;}

@media print 
{ 
.noprint {display: none;
		}
} 
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

</HEAD>
<BODY leftMargin=0 topMargin=0 marginwidth="0" marginheight="0" bottommargin="0" bgproperties="fixed"><center>
  <table width="804" height="78" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="24" valig$n="top">
        <table width="100%"  border="0">
          <tr>
            <td width="67%"  align="center" valign="bottom">
<?
$prd=trim($prd);
$logoprecio="$ ";
$conn=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$busc=mssql_query("select idadquisicion,ordendped from ordenadq1 where ordendped='$prd'",$conn);
$busc1=mssql_fetch_array($busc);
$bsc=$busc1["idadquisicion"];
$bsc1=$busc1["ordendped"];
if($bsc1 != $prd){
echo "<script>alert('ERROR ... NO EXISTE ESA ORDEN, INTENTE NUEVAMENTE')</SCRIPT>";
echo "<script>window.close();</script>";
}
echo "<table border=1 width='100%' cellpadding='2' cellspacing='2'>
		<tr>
			<td background='img/blue1.jpg' align='left'>
				<SPAN class='navigation_heading'>REPORTE DE ENTRADAS - ORDEN DE PEDIDO No.: $prd</SPAN>
			</td>
		</tr>
		<tr>
			<td align='left'>
		      <img src='http://www.airenergy-mexico.com/new/ventas/img/logoga.png' width='188' height='111'>
	       </td>
		</tr></table>";
/* SELECCIONO LOS DATOS DE LA ORDEN (ORDENCV1)  */  
$result5=mssql_query("SELECT idadquisicion,ordendped,nadquisicion,diaadqui,mesadqui,anioadqui,fecharevision,calleadq,
							 numeroadq,coloniaadq,codpost,ciudadadq,estadoadq,revision,clave,statusadq
					  FROM ordenadq1 WHERE idadquisicion=$bsc",$conn);
$g=1;
while($ficha2=mssql_fetch_array($result5)){
$nn=$ficha2["idadquisicion"];
$n1=$ficha2["ordendped"];
$n2=$ficha2["nadquisicion"];
$n3=$ficha2["diaadqui"];
$n4=$ficha2["mesadqui"];
$n5=$ficha2["anioadqui"];
$n6=$ficha2["fecharevision"];
$n7=$ficha2["calleadq"];
$n8=$ficha2["numeroadq"];
$n9=$ficha2["coloniaadq"];
$n10=$ficha2["codpost"];
$n11=$ficha2["ciudadadq"];
$n12=$ficha2["estadoadq"];
$n13=$ficha2["revision"];
$n14=$ficha2["clave"];
$n15=$ficha2["statusadq"];
$result5xz=mssql_query("SELECT nombre,apepat,apemat,cargo from administracion where clave=$n14",$conn);
$ficha2zx=mssql_fetch_array($result5xz);
$nuser1=$ficha2zx["nombre"];
$nuser2=$ficha2zx["apepat"];
$nuser3=$ficha2zx["apemat"];
$nuser4=$ficha2zx["cargo"];
$re1=mssql_query("SELECT idadquisicion from receqpadq1 where idadquisicion=$nn",$conn);
$noentrada=mssql_num_rows($re1);
echo "<table border=1 width='100%' cellpadding='2' cellspacing='2'>";
echo "<tr>
			<td align='right' valign='middle' colspan='8' background='img/blue1.jpg'>
			<SPAN class='navigation_heading'>ORDEN CAPTURADA POR: $nuser1&nbsp;$nuser2&nbsp;$nuser3&nbsp;<-->&nbsp;$nuser4</SPAN>
			</td>
	 </tr>"; 
echo "<tr>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>FECHA ORDEN:</b></font></td>
			<td class='peque2' align='center'>$n3 / $n4 / $n5</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>No. ADQUISICION:</b></font></td>
			<td class='peque2' align='center'>$n2</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>REVISION:</b></font></td>
			<td class='peque2' align='center'>$n13</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>FECHA REVISION:</b></font></td>
			<td class='peque2' align='center'>$n6</td>
		</tr>
		<tr>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>DIRECCION ENTREGA:</b></font></td>
			<td class='peque2' align='left' colspan='3'>$n7&nbsp;$n8 &nbsp;Col. $n9, C.P. $n10<br>$n11, $n12</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>No. ENTRADAS:</b></font></td>
			<td class='peque2' align='center'>&nbsp;$noentrada</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>STATUS ORDEN:</b></font></td>
			<td class='peque2' align='center'>$n15</td>
		</tr>
		<tr align='center'>		
			<td colspan='8' align='center'>";
			
/* SACO EL PRODUCTO COTIZADO, SEGUN EL NUMERO DE ORDEN DE LA TABLA INVENTARIO Y ORDEN2*/
	$resul=mssql_query("SELECT idproduct,linea,descripcion,cantidadadq,cantentregadadq
                        FROM (inventa1 INNER JOIN ordenadq2 ON inventa1.cod=ordenadq2.cod)
                        WHERE idadquisicion=$nn",$conn);	
	echo "<table width='100%' border='1'>
    <tr class='peque'>
	<td align='center' background='img/blue1.jpg'>CLAVE</td>
	<td align='center' background='img/blue1.jpg'>LINEA</td>
	<td align='center' background='img/blue1.jpg'>DESCRIPCION</td>
    <td align='center' background='img/blue1.jpg'>ORDENADA</td>
    <td align='center' background='img/blue1.jpg'>RECIBIDA</td></tr>";
    while($st=mssql_fetch_array($resul)){	
	$dp1=$st["idproduct"];
	$dp2=$st["linea"];
	$dp3=$st["descripcion"];
	$dp4=$st["cantidadadq"];
	$dp5=$st["cantentregadadq"];
	echo "<tr>
    <td style='font-size:.75em;' align='center'>" . $dp1 . "</td>
	<td style='font-size:.75em;' align='center'>" . $dp2 . "</td>
	<td style='font-size:.75em;' align='center'>" . $dp3 . "</td>
	<td style='font-size:.75em;' align='center'>" . $dp4 . "</td>
	<td style='font-size:.75em;' align='center'>" . $dp5 . "</td>
    </tr>";
	}	
	mssql_close($conn);
	echo "</table>";
echo "</td></tr>";
echo "<tr><td colspan='8' background='img/blue1.jpg' align='right'><SPAN class='navigation_heading'>SERIES</SPAN></td></tr>";
echo "<tr align='center'><td colspan='8' align='center'>";
/* aqui va las series , en esta celda */
						
echo "<center><table width='100%' border=1 cellpadding='2' cellspacing='2'>
<tr>
	<td align='center' background='img/blue.png' width='auto'>
		<SPAN class='navigation_heading'>Clave</SPAN>
	</td>
	<td align='center' background='img/blue.png' width='auto'>
		<SPAN class='navigation_heading'>No. Serie</SPAN>
	</td>
	<td align='center' background='img/blue.png' width='auto'>
		<SPAN class='navigation_heading'>No. Pedimento</SPAN>
	</td>
	<td align='center' background='img/blue.png' width='auto'>
		<SPAN class='navigation_heading'>No. Folio Entrada</SPAN>
	</td>
	<td align='center' background='img/blue.png' width='auto'>
		<SPAN class='navigation_heading'>Fecha Puerto</SPAN>
	</td>
	<td align='center' background='img/blue.png' width='auto'>
		<SPAN class='navigation_heading'>Fecha Almacen</SPAN>
	</td>
	<td align='center' background='img/blue.png' width='auto'>
		<SPAN class='navigation_heading'>Fecha Captura</SPAN>
	</td>
	<td align='center' background='img/blue.png' width='auto'>
		<SPAN class='navigation_heading'>Capturado por</SPAN>
	</td>
</tr>";

$rx1=mssql_query("SELECT inventa1.idproduct,
				         receqpadq2.serial,receqpadq2.numpedimento3,
       					 receqpadq1.folioadq,receqpadq1.diarecadq,receqpadq1.mesrecadq,
						 receqpadq1.aniorecadq,receqpadq1.fechapuerto2,receqpadq1.fechaalmacen2,
       					 administracion.nombre,administracion.apepat,administracion.apemat
				  FROM inventa1,receqpadq2,receqpadq1,administracion
				  WHERE (inventa1.cod=receqpadq2.cod AND receqpadq2.idreciboadq=receqpadq1.idreciboadq 
				  AND receqpadq1.clave=administracion.clave AND receqpadq1.idadquisicion=$nn)
				  ORDER BY folioadq",$conn);
while($fx=mssql_fetch_array($rx1)){
    $a1x=$fx["idproduct"];
	$a2x=$fx["serial"];
	$a3x=$fx["numpedimento3"];
	$a4x=$fx["folioadq"];
	$a5x=$fx["diarecadq"];
	$a6x=$fx["mesrecadq"];
	$a7x=$fx["aniorecadq"];
	$a8x=$fx["fechapuerto2"];
	$a9x=$fx["fechaalmacen2"];
	$a10x=$fx["nombre"];
	$a11x=$fx["apepat"];
	$a12x=$fx["apemat"];
	  echo "<tr>
	  			<td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  			$a1x</font>
	  			</td>
				<td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  			$a2x</font>
	  			</td>
				<td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  			$a3x</font>
	  			</td>
				<td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  			$a4x</font>
	  			</td>
				<td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  			&nbsp;$a8x</font>
	  			</td>
				<td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  			&nbsp;$a9x</font>
	  			</td>
				<td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  			$a5x / $a6x / $a7x</font>
	  			</td>
				<td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  			$a10x&nbsp;$a11x&nbsp;$a12x</font>
	  			</td></tr>";	
	}	  
echo "</table>";

/* aqui terminan las series */
echo "</td></tr><tr><td colspan='8' background='img/blue1.jpg' align='right'><SPAN class='navigation_heading'>CMD&nbsp;$bsc1</SPAN></td></tr>";
echo "</table>";
echo "<hr align='center' color='blue' width='100%' size='4px'>";
$g=$g+1;
}	
?>
<Center><input type="button" class="noprint" name="imprimir" value="Imprimir" onClick="window.print();"></Center>
</td>
     </tr>
      </table></td>
    </tr>
  </table>
</center></BODY>
</HTML>