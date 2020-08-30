<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<HTML>
<HEAD><title>REPORTES - SALIDAS</title>
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
$mes=$mes;
$anio=$anio;
$logoprecio="$ ";
$conn=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
echo "<table border=1 width='100%' cellpadding='2' cellspacing='2'>
		<tr>
			<td background='img/blue1.jpg' align='left'>
				<SPAN class='navigation_heading'>REPORTE DE SALIDAS - FECHA: $mes / $anio</SPAN>
			</td>
		</tr>
		<tr>
			<td align='left'>
		      <img src='http://www.airenergy-mexico.com/new/ventas/img/logoga.png' width='188' height='111'>
	       </td>
		</tr></table>";
/* SELECCIONO LOS DATOS DE LA ORDEN (ORDENCV1)  */  
$result5=mssql_query("SELECT salordncv1.idsalidaocv,salordncv1.foliosalocv,salordncv1.idcompraventa,salordncv1.diasalcv,salordncv1.messalcv,salordncv1.aniosalcv,
       salordncv1.clave,salordncv1.idtransporte,salordncv1.nomfactura,salordncv1.dirfactura,salordncv1.ciudadfactura,salordncv1.estadofactura,
       salordncv1.rfcfactura,salordncv1.nofacturaEA,salordncv1.direntrega1,salordncv1.ciudadentrega1,salordncv1.estadoentrega1,salordncv1.entregadaa,
       salordncv1.recibidapor,
       ordencv1.idcompraventa AS idcv,ordencv1.ncompraventa,ordencv1.diacv,ordencv1.mescv,ordencv1.aniocv,ordencv1.idtransporte AS idtrans,ordencv1.cartaporte,
       ordencv1.cve_distribuidor,ordencv1.norefdist,ordencv1.statusordencv                            
FROM salordncv1,ordencv1
WHERE (salordncv1.idcompraventa=ordencv1.idcompraventa AND salordncv1.messalcv='$mes' AND salordncv1.aniosalcv='$anio')",$conn);
$g=1;
while($ficha2=mssql_fetch_array($result5)){
$nn=$ficha2["idsalidaocv"];
$n1=$ficha2["foliosalocv"];
$n2=$ficha2["idcompraventa"];
$n3=$ficha2["diasalcv"];
$n4=$ficha2["messalcv"];
$n5=$ficha2["aniosalcv"];
$n6=$ficha2["clave"];
$n7=$ficha2["idtransporte"];
$numfact=$ficha2["nomfactura"];
$n8=$ficha2["dirfactura"];
$n9=$ficha2["ciudadfactura"];
$n10=$ficha2["estadofactura"];
$n11=$ficha2["rfcfactura"];
$n12=$ficha2["nofacturaEA"];
$n13=$ficha2["direntrega1"];
$n14=$ficha2["cidadentrega1"];
$n15=$ficha2["estadoentrega1"];
$n16=$ficha2["entregadaa"];
$n17=$ficha2["recibidapor"];
$n18=$ficha2["idcv"];
$n19=$ficha2["ncompraventa"];
$n20=$ficha2["diacv"];
$n21=$ficha2["mescv"];
$n22=$ficha2["aniocv"];
$n23=$ficha2["idtrans"];
$n24=$ficha2["cartaporte"];
$n25=$ficha2["cve_distribuidor"];
$n40=$ficha2["norefdist"];
$n26=$ficha2["statusordencv"];
$result5xz=mssql_query("SELECT nombre,apepat,apemat,cargo from administracion where clave=$n6",$conn);
$ficha2zx=mssql_fetch_array($result5xz);
$nuser1=$ficha2zx["nombre"];
$nuser2=$ficha2zx["apepat"];
$nuser3=$ficha2zx["apemat"];
$nuser4=$ficha2zx["cargo"];
$result5xz1=mssql_query("SELECT razon_social from distribuidores where cve_distribuidor=$n25",$conn);
$ficha2zx1=mssql_fetch_array($result5xz1);
$nuser1x=$ficha2zx1["razon_social"];
$vb=mssql_query("SELECT razonsocialtrns from proveedores where idtransporte=$n7",$conn);
$vb1=mssql_fetch_array($vb);
$trns1=$vb1["razonsocialtrns"];
echo "<table border=1 width='100%' cellpadding='2' cellspacing='2'>";
echo "<tr>
			<td align='right' valign='middle' colspan='8' background='img/blue1.jpg'>
			<SPAN class='navigation_heading'>CAPTURADO POR: $nuser1&nbsp;$nuser2&nbsp;$nuser3&nbsp;<-->&nbsp;$nuser4</SPAN>
			</td>
	 </tr>"; 
echo "<tr>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>FOLIO:</b></font></td>
			<td class='peque2' align='center'>$n1</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>FECHA SALIDA:</b></font></td>
			<td class='peque2' align='center'>$n3/$n4/$n5</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>ORDEN DE COMPRA:</b></font></td>
			<td class='peque2' align='center'>$n19</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>FACTURA ASIGNADA:</b></font></td>
			<td class='peque2' align='center'>&nbsp;$n12</td>
		</tr>
		<tr>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>DISTRIBUIDOR:</b></font></td>
			<td class='peque2' align='center' colspan='3'>&nbsp;$nuser1x</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>REFERENCIA DIST.:</b></font></td>
			<td class='peque2' align='center'>&nbsp;$n40</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>FECHA ORDEN COMPRA:</b></font></td>
			<td class='peque2' align='center'>$n20 / $n21 / $n22</td>
		</tr>
		<tr>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>TRANSPORTE:</b></font></td>
			<td class='peque2' align='center' colspan='2'>&nbsp;$trns1</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>CARTA PORTE:</b></font></td>
			<td class='peque2' align='center'>&nbsp;$n24</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>DIR. ENTREGA:</b></font></td>
			<td class='peque2' align='center' colspan='2'>$n13, $n14, $n15</td>
		</tr>
		<tr>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>ENTREGADA A:</b></font></td>
			<td class='peque2' align='center'>$n16</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>RECIBIDA POR:</b></font></td>
			<td class='peque2' align='center'>$n17</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>DATOS FACTURACION:</b></font></td>
			<td class='peque2' align='center' colspan='3'>RFC - $n11, Direccion: $n8, $n9, $n10</td>
		</tr>
		<tr align='center'>
			<td colspan='8' align='center'>";
/* SACO EL PRODUCTO COTIZADO, SEGUN EL NUMERO DE ORDEN DE LA TABLA INVENTARIO Y ORDEN2*/
	$resul=mssql_query("SELECT DISTINCT idproduct,linea,descripcion,idcompraventa,cantidadcv,cantentregacv
					    FROM(inventa1 INNER JOIN ordencv2 ON inventa1.cod=ordencv2.cod)			                 
						WHERE idcompraventa=$n2",$conn);	
while($f=mssql_fetch_array($resul)){
    $a1=$f["idproduct"];
	$a2=$f["linea"];
	$a3=$f["descripcion"];
	$cvm=$f["idcompraventa"];
	$a4=$f["cantidadcv"];
	$a5=$f["cantentregacv"];
$produ=mssql_query("SELECT cod FROM inventa1 WHERE idproduct='$a1'",$conn);
$lafi4=mssql_fetch_array($produ);
$cprocx=$lafi4["cod"];
$sulta=mssql_query("SELECT SUM(cantisalida) AS cantisl FROM salordncv2 WHERE idsalidaocv=$nn and cod=$cprocx",$conn);
$fx=mssql_fetch_array($sulta);
$slrec=$fx["cantisl"];							
echo "<center><table width='100%' border=1 cellpadding='2' cellspacing='2'>
<tr>
	<td align='center' background='img/blue.png' width='auto'>
		<SPAN class='navigation_heading'>Clave</SPAN>
	</td>
	<td align='center' background='img/blue.png' width='auto'>
		<SPAN class='navigation_heading'>Linea</SPAN>
	</td>
	<td align='center' background='img/blue.png' width='auto'>
		<SPAN class='navigation_heading'>Descripcion</SPAN>
	</td>
	<td align='center' background='img/blue.png' width='auto'>
		<SPAN class='navigation_heading'>Pedido(s)</SPAN>
	</td>
	<td align='center' background='img/blue.png' width='auto'>
		<SPAN class='navigation_heading'>Entregado(s)</SPAN>
	</td>
	<td align='center' background='img/blue.png' width='auto'>
		<SPAN class='navigation_heading'>Total</SPAN>
	</td>
</tr>
<tr>
	  <td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  $a1</font>
	  </td>
	  <td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  $a2</font>
	  </td>
	  <td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  $a3</font>
	  </td>
	  <td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  &nbsp;$a4</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  &nbsp;$slrec</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  &nbsp;$a5</font></td></tr>
	  <tr>
	  <td width='100%' style='text-align:left;' colspan='6'><SPAN class='navigation_heading'>Series - Pedimento</SPAN></td><tr><td colspan='6'>";
	  $resulxz=mssql_query("SELECT serial,idproduct,numpedimento4
							FROM(inventa1 INNER JOIN salordncv2 ON inventa1.cod=salordncv2.cod)
							WHERE idsalidaocv=$nn AND idproduct='$a1'",$conn);
	echo "<table width='100%' border='1'>";
	echo "<tr><td background='img/blue1.jpg'><SPAN class='navigation_heading'>CLAVE</SPAN></td>
		      <td background='img/blue1.jpg'><SPAN class='navigation_heading'>No SERIE</SPAN></td>
			  <td background='img/blue1.jpg'><SPAN class='navigation_heading'>No. Pedimento</SPAN></td></tr>";
	while($fx=mssql_fetch_array($resulxz)){
    $a1x=$fx["serial"];
	$a2x=$fx["idproduct"];
	$a3x=$fx["numpedimento4"];
	  echo "<tr><td><font face='Arial' size='0.1'>$a2x</font</td><td><font face='Arial' size='0.1'>$a1x</font></td><td><font face='Arial' size='0.1'>$a3x</font></td></tr>";	
	}	  
	  echo "</table>";
	  echo "</td></tr></table>";
}
echo "</td></tr><tr><td colspan='4' background='img/blue1.jpg' align='left' style='border-style:none;'><SPAN class='navigation_heading'>CMD&nbsp;$g</SPAN></td>
	  <td colspan='4' background='img/blue1.jpg' align='right' style='border-style:none;'><SPAN class='navigation_heading'>STATUS ORDEN DE COMPRA: $n26</SPAN></td></tr>";
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