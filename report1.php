<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<HTML>
<HEAD><title>REPORTES - ORDENES DE COMPRA</title>
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
				<SPAN class='navigation_heading'>REPORTE ORDENES DE COMPRA MES: $mes - $anio</SPAN>
			</td>
		</tr>
		<tr>
			<td align='left'>
		      <img src='http://www.airenergy-mexico.com/new/ventas/img/logoga.png' width='188' height='111'>
	       </td>
		</tr></table>";
/* SELECCIONO LOS DATOS DE LA ORDEN (ORDENCV1)  */  
$result5=mssql_query("SELECT idcompraventa,ncompraventa,diacv,mescv,aniocv,direnviocv,ciudadcv,estadocv,
                             norefdist,fechestentregacv1,statusordencv,razon_social
			            FROM (ordencv1 INNER JOIN distribuidores ON ordencv1.cve_distribuidor=distribuidores.cve_distribuidor)
					    WHERE mescv='$mes' AND aniocv='$anio' AND idcompraventa > 0 ORDER BY fechaocv1",$conn);
$d=1;
while($ficha2=mssql_fetch_array($result5)){
$n0=$ficha2["idcompraventa"];
$n1=$ficha2["ncompraventa"];
$n2=$ficha2["diacv"];
$n3=$ficha2["mescv"];
$n4=$ficha2["aniocv"];
$enviara=$ficha2["direnviocv"];
$ciud=$ficha2["ciudadcv"];
$estad=$ficha2["estadocv"];
$n5=$ficha2["norefdist"];
$n6=$ficha2["fechestentregacv1"];
$n7=$ficha2["statusordencv"];
$n8=$ficha2["razon_social"];
echo "<table border=1 width='100%' cellpadding='2' cellspacing='2'>
	  <tr>
			<td align='center' valign='middle' colspan='6' background='img/blue1.jpg'>
			<SPAN class='navigation_heading'>$n8</SPAN>
			</td>
	 </tr>
	  <tr>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>MES:</b></font></td>
			<td class='peque2' align='center'>$n3</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>FOLIO:</b></font></td>
			<td class='peque2' align='center'>$n1</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>FECHA CAPTURA:</b></font></td>
			<td class='peque2' align='center'>$n2 / $n3 / $n4</td>
		</tr>
		<tr>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>REFERENCIA:</b></font></td>
			<td class='peque2' align='center'>&nbsp;$n5</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>FECHA ESTIMADA ENT.:</b></font></td>
			<td class='peque2' align='center'>&nbsp;$n6</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>STATUS ORDEN:</b></font></td>
			<td class='peque2' align='center'>$n7</td>
		</tr>
		<tr>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>DIRECCION DE ENVIO:</b></font></td>
			<td class='peque2' align='left' colspan='5'>&nbsp;$enviara<br>$ciud<br>$estad</td>
		</tr>
		<tr align='center'>
			<td colspan='6' align='center'>";
echo "<center><table width='100%' border=1 cellpadding='2' cellspacing='2'>
<tr>
	<td align='center' background='img/blue1.jpg' width='auto'>
		<SPAN class='navigation_heading'>Clave</SPAN>
	</td>
	<td align='center' background='img/blue1.jpg' width='auto'>
		<SPAN class='navigation_heading'>Cant</SPAN>
	</td>
	<td align='center' background='img/blue1.jpg' width='auto'>
		<SPAN class='navigation_heading'>Linea</SPAN>
	</td>
	<td align='center' background='img/blue1.jpg' width='auto'>
		<SPAN class='navigation_heading'>Descripcion</SPAN>
	</td>
	<td align='center' background='img/blue1.jpg' width='auto'>
		<SPAN class='navigation_heading'>P.Unitario</SPAN>
	</td>
	<td align='center' background='img/blue1.jpg' width='auto'>
		<SPAN class='navigation_heading'>Total</SPAN>
	</td>
</tr>";
/* SACO EL PRODUCTO COTIZADO, SEGUN EL NUMERO DE ORDEN DE LA TABLA INVENTARIO Y ORDEN2*/
	$resul=mssql_query("SELECT idproduct,linea,descripcion,cantidadcv,preciounitcv,totalprodcv
                        FROM(inventa1 INNER JOIN ordencv2 ON inventa1.cod=ordencv2.cod)
                        WHERE idcompraventa='$n0'",$conn);
	 while($f=mssql_fetch_array($resul)){
    $a1=$f["idproduct"];
	$a2=$f["linea"];
	$a3=$f["descripcion"];
	$a4=$f["cantidadcv"];
	$a5=$f["preciounitcv"];
	$a6=$f["totalprodcv"];
echo "<tr>
	  <td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  $a1</font>
	  </td>
	  <td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  $a4 </font>
	  </td>
	  <td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  $a2 </font>
	  </td>
	  <td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  $a3 </font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  $logoprecio" .  number_format($a5,2) . "</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  $logoprecio" .  number_format($a6,2) . "</font>
	  </td></tr>";
    }	
$resuls=mssql_query("SELECT SUM(totalprodcv)AS subtotal
                    FROM ordencv2
                    WHERE idcompraventa='$n0'",$conn);
$g=mssql_fetch_array($resuls);
$totaluno=$g["subtotal"];
$iva=$totaluno*.15;
$neto=$totaluno+$iva;
mssql_query("UPDATE ordencv1 SET totalordencv=$neto WHERE idcompraventa='$n0'",$conn);
echo "<tr>
    <td colspan='4' rowspan='3'>&nbsp;</td>
    <td  background='img/blue1.jpg' style='text-align:right;'><SPAN class='navigation_heading'>Subtotal</SPAN></td>
    <td style='text-align:center;'><font face='Arial' size='0.1'>$logoprecio" . number_format($totaluno,2) . "</font></td>
  </tr>
  <tr>
    <td background='img/blue1.jpg' style='text-align:right;'><SPAN class='navigation_heading'>I.V.A.</SPAN></td>
    <td style='text-align:center;'><font face='Arial' size='0.1'>$logoprecio" .  number_format($iva,2) ."</font></td>
  </tr>
  <tr>
    <td background='img/blue1.jpg' style='text-align:right;'><SPAN class='navigation_heading'>Total</SPAN></td>
    <td style='text-align:center;'><font face='Arial' size='0.1'>$logoprecio" .  number_format($neto,2) ."</font></td>
  </tr>
  </table>  
</center>";
echo "</td></tr><tr><td colspan='6' background='img/blue1.jpg' align='right'><SPAN class='navigation_heading'>CMD&nbsp;$d</SPAN></td></tr>";	
echo "</table>";
echo "<hr align='center' color='#0033FF' width='100%' size='2px'>";
$d=$d+1;
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