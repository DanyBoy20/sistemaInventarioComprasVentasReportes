<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<HTML>
<HEAD><title>Administracion</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="EXPIRES" CONTENT="0">

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
<BODY background="img/fondo.gif" leftMargin=0 topMargin=0 marginwidth="0" marginheight="0" bottommargin="0" bgproperties="fixed"><center>
  <table width="804" height="78" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="24" valign="top">
        <table width="100%"  border="0">
          <tr>
            <td width="67%" valign="top" align="center">
<?
$idsal=$ndn;
/* SELECCIONO LOS DATOS DE LA ORDEN (ORDENADQ1)  */  
$conn=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$result5=mssql_query("SELECT ncompraventa,foliosalocv,diasalcv,messalcv,aniosalcv,nomfactura,dirfactura,
                             ciudadfactura,estadofactura,rfcfactura,direntrega1,ciudadentrega1,estadoentrega1,entregadaa,recibidapor
                      FROM(ordencv1 INNER JOIN salordncv1 ON ordencv1.idcompraventa=salordncv1.idcompraventa)
                      WHERE idsalidaocv=$idsal",$conn);
//$result5=mssql_query("SELECT norden,dayo,montho,yearo,formapago FROM orden1 WHERE idorden=$orden",$conn);
$ficha2=mssql_fetch_array($result5);
$ncompraventa=$ficha2["ncompraventa"];
$foliosalocv=$ficha2["foliosalocv"];
$diasalcv=$ficha2["diasalcv"];
$messalcv=$ficha2["messalcv"];
$aniosalcv=$ficha2["aniosalcv"];
$nomfactura=$ficha2["nomfactura"];
$dirfactura=$ficha2["dirfactura"];
$ciudadfactura=$ficha2["ciudadfactura"];
$estadofactura=$ficha2["estadofactura"];
$rfcfactura=$ficha2["rfcfactura"];
$direntrega1=$ficha2["direntrega1"];
$ciudadentrega1=$ficha2["ciudadentrega1"];
$estadoentrega1=$ficha2["estadoentrega1"];
$entregadaa=$ficha2["entregadaa"];
$recibidapor=$ficha2["recibidapor"];
mssql_close($conn);
echo "
<table border=0 width='100%' cellpadding='2' cellspacing='2'>
<tr>
	<td align='right' valign='middle' with='auto' colspan='3' rowspan='4'>
		<img src='http://www.airenergy-mexico.com/new/ventas/img/logoga.png' width='148' height='81'>
	</td>	
	<td align='right' valign='middle' with='auto' colspan='3' rowspan='4'>
		<img src='http://www.airenergy-mexico.com/new/img/whitespace.png' width='225' height='81'>
	</td>	
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='0.2'><b>
	&nbsp;</b></font>
	</td>
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='0.2' color='red'><b>
	&nbsp;</b></font>
	</td>
</tr>
<tr>
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='0.2'><b>
	&nbsp;</b></font>
	</td>
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='0.2'>
	&nbsp;</font>
	</td>
</tr>
<tr>
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='0.2'><b>
	Folio:</b></font>
	</td>
	<td align='center' valign='middle' with='auto' colspan='2'><font face='Arial' size='0.2' color='red'>
	$foliosalocv</font>
	</td>
</tr>
<tr>
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='0.2'><b>
	Fecha:</b></font>
	</td>
	<td align='center' valign='middle' with='auto' colspan='2'><font face='Arial' size='0.2'>
	$diasalcv/$messalcv/$aniosalcv</font>
	</td>
</tr>
</table>
<hr align='center' color='#0033FF' width='100%' size='2px'>
<table border=0 width='100%' cellpadding='2' cellspacing='2'>
<tr>
	<td align='left' valign='middle' colspan='3' width='30%' bgcolor='blue'><font face='Arial' size='0.2' color='white'><b>
		Energia Ambiental de M&eacute;xico S.A. de C.V.		
	</b><font>
	</td>
	<td rowspan='6'>
	
	</td>
	<td align='center' valign='middle' colspan='2' width='auto' bgcolor='blue'><font face='Arial' size='0.2' color='white'><b>
	Datos de Facturacion:		
	</b><font>
	</td>
</tr>
<tr>
	<td align='left' valign='top' colspan='3' rowspan='5'><font face='Arial' size='0.2'>
		Angel Urraza # 1111 Col. del Valle<br>
		C.P. 03100<br>
		Mexico, D.F.<br>
		R.F.C.: EAM-020710-G93		
		 </font>
	</td>
	<td align='right'><font face='Arial' size='0.2'><b>
		Razon Social:</b></font>
	</td>
	<td align='left'><font face='Arial' size='0.2'>
	$nomfactura</font>
	</td>
</tr>
<tr>
	<td align='right'><font face='Arial' size='0.2'><b>
		R.F.C.:</b></font>
	</td>
	<td align='left'><font face='Arial' size='0.2'>
	$rfcfactura</font>
	</td>
</tr>
<tr>
	<td align='right'><font face='Arial' size='0.2'><b>
		Direccion:</b></font>
	</td>
	<td align='left'><font face='Arial' size='0.2'>
	$dirfactura</font>
	</td>
</tr>
<tr>
	<td align='right'><font face='Arial' size='0.2'><b>
		Ciudad:</b></font>
	</td>
	<td align='left'><font face='Arial' size='0.2'>
	$ciudadfactura</font>
	</td>
</tr>
<tr>
	<td align='right'><font face='Arial' size='0.2'><b>
		Estado:</b></font>
	</td>
	<td align='left'><font face='Arial' size='0.2'>
	$estadofactura</font>
	</td>
</tr>
<tr>
	<td align='left' valign='middle' colspan='6'><font face='Arial' size='0.2'><b>
		Recibi de: Energia Ambiental de M&eacute;xico S.A. de C.V.		</b><font>
	</td>
</tr>
<tr>
    <td align='left' valign='middle' colspan='6'><font face='Arial' size='0.2'><b>
		A trav&eacute;s de su representante: Alejandro Guillen Morales</b><font>
	</td>
</tr>
<tr>
    <td align='left' valign='middle' colspan='6'><font face='Arial' size='0.2'><b>
		El siguiente equipo:		
		</b><font>
	</td>
</tr>
</table>
<hr align='center' color='#0033FF' width='100%' size='2px'>

<table width='100%' border=1 cellpadding='2' cellspacing='2'>
<tr>
	<td align='center' bgcolor='blue' width='auto'><font face='Arial' size='0.1' color='white'><b>
		Clave</b></font>
	</td>
	<td align='center' bgcolor='blue' width='auto'><font face='Arial' size='0.1' color='white'><b>
		Cant</b></font>
	</td>
	<td align='center' bgcolor='blue' width='auto'><font face='Arial' size='0.1' color='white'><b>
		Linea</b></font>
	</td>
	<td align='center' bgcolor='blue' width='auto'><font face='Arial' size='0.1' color='white'><b>
		Descripcion</b></font>
	</td>
</tr>";
/* SACO EL PRODUCTO COTIZADO, SEGUN EL NUMERO DE ORDEN DE LA TABLA INVENTARIO Y ORDEN2*/
    $con=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	$resul=mssql_query("SELECT idproduct,SUM(cantisalida) AS cantidad,linea,descripcion
                        FROM(inventa1 INNER JOIN salordncv2 ON inventa1.cod=salordncv2.cod)
                        WHERE idsalidaocv=$idsal GROUP BY idproduct,linea,descripcion",$con);
	while($f=mssql_fetch_array($resul)){;
    $a1=$f["idproduct"];
	$a2=$f["cantidad"];
	$a3=$f["linea"];
	$a4=$f["descripcion"];
echo "<tr>
	  <td style='text-align:center;' width='auto'><font face='Arial' size='0.1'>
	  $a1</font>
	  </td>
	  <td style='text-align:center;' width='auto'><font face='Arial' size='0.1'>
	  $a2 </font>
	  </td>
	  <td style='text-align:center;' width='auto'><font face='Arial' size='0.1'>
	  $a3 </font>
	  </td>
	  <td style='text-align:left;' width='auto'><font face='Arial' size='0.1'>
	  $a4 </font>
	  </td></tr>";
	  }
echo "<tr>
    <td style='text-align:left;' bgcolor='blue' width='auto' colspan='4'><font face='Arial' size='0.1' color='white'><b>
	Con los siguientes numeros de serie:
	</b></font>
	</td>    
  	</tr>
	<tr><td align='left' colspan='4'>
	<table width='auto' border='0'>";
$resuls=mssql_query("SELECT serial,linea
                     FROM(inventa1 INNER JOIN salordncv2 ON inventa1.cod=salordncv2.cod)
                     WHERE idsalidaocv=$idsal",$con);
while($g=mssql_fetch_array($resuls)){
$serial=$g["serial"];
$linea=$g["linea"];
echo "<tr>
    <td style='text-align:center;' bgcolor='blue' width='auto'>
	<font face='Arial' size='0.1' color='white'><b>$linea &nbsp;<br>&nbsp;
	</b></font>
	</td>
    <td style='text-align:center;' width='auto'><font face='Arial' size='0.1'>$serial &nbsp;<br>&nbsp;</font></td>
	</tr>";
	}
echo "</table></td></tr>
<tr>
<td align='left' colspan='4' bgcolor='blue' >
<font face='Arial' size='0.1' color='white'><b>
Entregada en:
</b></font>
</td>
</tr>
<tr>
<td align='left' colspan='4'>
<font face='Arial' size='0.1'><b>
$direntrega1<br>
$ciudadentrega1<br>
$estadoentrega1<br>
</b></font>
</td>
</tr>
<tr>
<td align='left' colspan='4'>
<font face='Arial' size='0.1'><b>
Entregada a:</b>$entregadaa<br>
<b>Recibida por:</b>$recibidapor<br>
<b>Comentarios:</b>
</font>
</td>
</tr>
</table>";
echo "</center>";
?>
<Center><input type="button" class="noprint" name="imprimir" value="Imprimir" onclick="window.print();"></Center>
			</td>
          </tr>
      </table></td>
    </tr>
  </table>
</center></BODY>
</HTML>