<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<HTML>
<HEAD><title>REPORTES - ORDENES DE ADQUISICION</title>
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
				<SPAN class='navigation_heading'>REPORTE ORDENES DE ADQUISICION MES: $mes - $anio</SPAN>
			</td>
		</tr>
		<tr>
			<td align='left'>
		      <img src='http://www.airenergy-mexico.com/new/ventas/img/logoga.png' width='188' height='111'>
	       </td>
		</tr></table>";
/* SELECCIONO LOS DATOS DE LA ORDEN (ORDENCV1)  */  
$result5=mssql_query("SELECT ordenadq1.idadquisicion,ordenadq1.ordendped,ordenadq1.nadquisicion,ordenadq1.diaadqui,ordenadq1.mesadqui,
						     ordenadq1.anioadqui,ordenadq1.fechoadq1,ordenadq1.fechaenvioadqui2,ordenadq1.fechadesent2,
       					     ordenadq1.calleadq,ordenadq1.numeroadq,ordenadq1.coloniaadq,ordenadq1.codpost,ordenadq1.ciudadadq,
							 ordenadq1.estadoadq,ordenadq1.rfcadq,ordenadq1.idtransporte,ordenadq1.formatransporte,ordenadq1.consolidadora,
       						 ordenadq1.revision,ordenadq1.clave,ordenadq1.statusadq,
							 administracion.nombre,administracion.apepat,administracion.apemat,administracion.cargo
                      FROM ordenadq1,administracion
					  WHERE (ordenadq1.clave=administracion.clave AND ordenadq1.mesadqui='Mayo' AND ordenadq1.anioadqui='2007' AND ordenadq1.idadquisicion > 0)
					  ORDER BY ordenadq1.fechoadq1",$conn);
$d=1;
while($ficha2=mssql_fetch_array($result5)){
$n0=$ficha2["idadquisicion"];
$n1=$ficha2["ordendped"];
$n2=$ficha2["nadquisicion"];
$n3=$ficha2["diaadqui"];
$n4=$ficha2["mesadqui"];
$n5=$ficha2["anioadqui"];
$n6=$ficha2["fechoadq1"];
$n7=$ficha2["fechaenvioadqui2"];
$n8=$ficha2["fechadesent2"];
$n9=$ficha2["calleadq"];
$n10=$ficha2["numeroadq"];
$n11=$ficha2["coloniaadq"];
$n12=$ficha2["codpost"];
$n13=$ficha2["ciudadadq"];
$n14=$ficha2["estadoadq"];
$n15=$ficha2["rfcadq"];
$n16=$ficha2["idtransporte"];
$n17=$ficha2["formatransporte"];
$n18=$ficha2["consolidadora"];
$n19=$ficha2["revision"];
$n20=$ficha2["clave"];
$n21=$ficha2["statusadq"];
$n22=$ficha2["nombre"];
$n23=$ficha2["apepat"];
$n24=$ficha2["apemat"];
$n25=$ficha2["cargo"];
$xz1=mssql_query("SELECT razonsocialtrns from proveedores where idtransporte=$n18",$conn);
$fh1=mssql_fetch_array($xz1);
$consoli=$fh1["razonsocialtrns"];
$xz2=mssql_query("SELECT razonsocialtrns from proveedores where idtransporte=$n16",$conn);
$fh2=mssql_fetch_array($xz2);
$transp=$fh2["razonsocialtrns"];
echo "<table border=1 width='100%' cellpadding='2' cellspacing='2'>
	  <tr>
			<td width='auto' align='left' valign='middle' colspan='3' background='img/blue.png' style='border-style:none;'>
			<SPAN class='navigation_heading'>Revision:&nbsp;$n19</SPAN>
			</td>
			<td width='auto' align='right' valign='middle' colspan='5' background='img/blue.png' style='border-style:none;'>
			<SPAN class='navigation_heading'>CAPTURA:&nbsp;$n22&nbsp;$n23&nbsp;$n24&nbsp;<-->&nbsp;$n25</SPAN>
			</td>
	 </tr>
	  <tr>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>ORDEN DE PEDIDO:</b></font></td>
			<td class='peque2' align='center'>$n1</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>No. ADQUISICION:</b></font></td>
			<td class='peque2' align='center'>$n2</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>FECHA CAPTURA:</b></font></td>
			<td class='peque2' align='center'>$n3 / $n4 / $n5</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>FECHA ENVIO:</b></font></td>
			<td class='peque2' align='center'>&nbsp;$n7</td>
		</tr>
		<tr>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>F. DESEADA ENTREGA:</b></font></td>
			<td class='peque2' align='center'>&nbsp;$n8</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>CONSOLIDADORA:</b></font></td>
			<td class='peque2' align='center' colspan='2'>&nbsp;$consoli</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>TRANSPORTE:</b></font></td>
			<td class='peque2' align='center' colspan='2'>&nbsp;$transp</td>
		</tr>
		<tr>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>DIRECCION DE ENTREGA:</b></font></td>
			<td class='peque2' align='left' colspan='4'>$n9&nbsp;$n10&nbsp;$n11&nbsp;$n12<br>$n13&nbsp;$n14<br>$n15</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>STATUS ORDEN:</b></font></td>
			<td class='peque2' align='left' colspan='2'>&nbsp;$n21</td>
		</tr>
		<tr align='center'>
			<td colspan='8' align='center'>";
echo "<center><table width='100%' border=1 cellpadding='2' cellspacing='2'>
<tr>
	<td align='center' background='img/blue1.jpg' width='auto'>
		<SPAN class='navigation_heading'>Clave</SPAN>
	</td>
	<td align='center' background='img/blue1.jpg' width='auto'>
		<SPAN class='navigation_heading'>Linea</SPAN>
	</td>
	<td align='center' background='img/blue1.jpg' width='auto'>
		<SPAN class='navigation_heading'>Descripcion</SPAN>
	</td>
	<td align='center' background='img/blue1.jpg' width='auto'>
		<SPAN class='navigation_heading'>Cant.</SPAN>
	</td>
	<td align='center' background='img/blue1.jpg' width='auto'>
		<SPAN class='navigation_heading'>P.Unitario</SPAN>
	</td>
	<td align='center' background='img/blue1.jpg' width='auto'>
		<SPAN class='navigation_heading'>Total</SPAN>
	</td>
</tr>";
/* SACO EL PRODUCTO COTIZADO, SEGUN EL NUMERO DE ORDEN DE LA TABLA INVENTARIO Y ORDEN2*/
	$resul=mssql_query("SELECT idproduct,linea,descripcion,cantidadadq,precprouniadq,totlprdadq
					    FROM(inventa1 INNER JOIN ordenadq2 ON inventa1.cod=ordenadq2.cod)
					    WHERE idadquisicion='$n0'",$conn);
	 while($f=mssql_fetch_array($resul)){
    $a1=$f["idproduct"];
	$a2=$f["linea"];
	$a3=$f["descripcion"];
	$a4=$f["cantidadadq"];
	$a5=$f["precprouniadq"];
	$a6=$f["totlprdadq"];
echo "<tr>
	  <td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  $a1</font>
	  </td>
	  <td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  $a2 </font>
	  </td>
	  <td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  $a3 </font>
	  </td>
	  <td width='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  $a4</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  $logoprecio" .  number_format($a5,2) . "</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  $logoprecio" .  number_format($a6,2) . "</font>
	  </td></tr>";
    }	
$resuls=mssql_query("SELECT SUM(totlprdadq)AS subtotal
					 FROM ordenadq2
					 WHERE idadquisicion='$n0'",$conn);
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
echo "</td></tr><tr><td colspan='8' background='img/blue1.jpg' align='right'><SPAN class='navigation_heading'>CMD&nbsp;$d</SPAN></td></tr>";	
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