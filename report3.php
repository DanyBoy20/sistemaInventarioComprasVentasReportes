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
$referencia=strtoupper(trim($ref));
$distri=trim($dtr);
$logoprecio="$ ";
$conn=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
/* SELECCIONO LOS DATOS DE LA ORDEN (ORDENCV1)  */  
$result5=mssql_query("SELECT idcompraventa,ncompraventa,diacv,mescv,aniocv,idtransporte,cve_distribuidor,direnviocv,ciudadcv,estadocv,
                             norefdist,fechestentregacv1,condipagocv,comentarioscv,statusordencv
			            FROM ordencv1 WHERE cve_distribuidor=$distri AND norefdist='$referencia'",$conn);
$ficha2=mssql_fetch_array($result5);
$n0=$ficha2["idcompraventa"];
$n1=$ficha2["ncompraventa"];
$n2=$ficha2["diacv"];
$n3=$ficha2["mescv"];
$n4=$ficha2["aniocv"];
$n5=$ficha2["idtransporte"];
$n6=$ficha2["cve_distribuidor"];
$n7=$ficha2["direnviocv"];
$m6=$ficha2["ciudadcv"];
$m7=$ficha2["estadocv"];
$n8=$ficha2["norefdist"];
$n9=$ficha2["fechestentregacv1"];
$n10=$ficha2["condipagocv"];
$n11=$ficha2["comentarioscv"];
$n12=$ficha2["statusordencv"];
if($referencia != $n8 AND $distri != $n6){
echo "<script>alert('ORDEN NO ENCONTRADA')</SCRIPT>";
echo "<script>window.location.href='salirs.php';</script>";
}
if($referencia == ""){
echo "<script>alert('CAMPOS VACIOS')</SCRIPT>";
echo "<script>window.location.href='salirs.php';</script>";
}
/* SELECCIONO LOS DATOS DEL TRANSPORTE (PROVEEDORES) */
if($n5 == ""){
echo "<script>alert('NO hay transporte asignado')</script>";
$n13='sin transporte asignado';
}else{
$result89=mssql_query("SELECT razonsocialtrns
			            FROM proveedores WHERE idtransporte=$n5",$conn);
$ficha3=mssql_fetch_array($result89);
$n13=$ficha3["razonsocialtrns"];
}
/* SELECCIONO LOS DATOS DEL DISTRIBUIDOR (DISTRIBUIDORES) */
$result69=mssql_query("SELECT razon_social,ciudad,direccion,estado
			            FROM distribuidores WHERE cve_distribuidor=$n6",$conn);
$ficha4=mssql_fetch_array($result69);
$n14=$ficha4["razon_social"];
$ciud=$ficha4["ciudad"];
$dire=$ficha4["direccion"];
$estad=$ficha4["estado"];
mssql_close($conn);
echo "
<table border=0 width='100%' cellpadding='2' cellspacing='2'>
<tr>
	<td align='right' valign='middle' colspan='3' rowspan='3'>
		<img src='http://www.airenergy-mexico.com/new/ventas/img/logoga.png' width='148' height='81'>
	</td>
	<td align='right' valign='middle' with='auto' colspan='4' rowspan='3'>
		<img src='http://www.airenergy-mexico.com/new/img/whitespace.png' width='180' height='81'>
	</td>	
	<td align='right' colspan='4'>&nbsp;
	</td>	
</tr>
<tr>
	<td align='right' valign='middle' colspan='2'><font face='Arial' size='0.2'><b>
	ORDEN DE COMPRA No.:</b></font>
	</td>
	<td align='center' valign='middle' colspan='2'><font face='Arial' size='0.2' color='red'><b>
	$n1</b></font>
	</td>
</tr>
<tr>
	<td align='right' valign='middle' colspan='2'><font face='Arial' size='0.2'><b>
	FECHA:</b></font>
	</td>
	<td align='center' valign='middle' colspan='2'><font face='Arial' size='0.2'><b>
	$n2 de $n3 del $n4</b></font>
	</td>
</tr>
</table>
<hr align='center' color='#0033FF' width='100%' size='2px'>
<table border=0 width='100%' cellpadding='2' cellspacing='2'>
<tr>
	<td colspan='3' align='left' valign='middle'><font face='Arial' size='0.2'><b>
		Distribuidor:		
		</b><font>	
	</td>
	<td>&nbsp;</td>
	<td colspan='2' align='right' valign='middle'><font face='Arial' size='0.2'><b>
		Fecha Estimada de Entrega:		
		</b><font>	
	</td>
	<td align='center' valign='middle'><font face='Arial' size='0.2'>
		$n9		
	<font>	
	</td>
	<td colspan='4'>&nbsp;</td>
</tr>
<tr>
	<td colspan='3' rowspan='4' align='left' valign='middle'><font face='Arial' size='0.2'>
	$n14 <br> $dire <br> $ciud,$estad
	</font>
	</td>
	<td>&nbsp;</td>
	<td colspan='2' align='right' valign='middle'><font face='Arial' size='0.2'><b>
		Forma de pago:		
		</b><font>	
	</td>
	<td align='center' valign='middle'><font face='Arial' size='0.2'>
		$n10	
	</font>	
	</td>
	<td colspan='4'>&nbsp;</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td colspan='2' align='right' valign='middle'><font face='Arial' size='0.2'><b>
		Transporte:		
		</b></font>	
	</td>
	<td align='center' valign='middle' colspan='5'><font face='Arial' size='0.2'>
		$n13	
	</font>	
	</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td colspan='2' align='right' valign='middle'><font face='Arial' size='0.2'><b>
		No. Referencia:		
		</b></font>	
	</td>
	<td align='center' valign='middle'><font face='Arial' size='0.2' color='red'>
		$n8
	</font>	
	</td>
	<td colspan='4'>
	&nbsp;
	</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td colspan='2' align='right' valign='middle'><font face='Arial' size='0.2'><b>
		Estatus Orden:		
		</b></font>	
	</td>
	<td align='center' valign='middle'><font face='Arial' size='0.2'>
		$n12
	</font>	
	</td>
	<td colspan='4'>
	&nbsp;
	</td>
</tr>
</table>
<hr align='center' color='#0033FF' width='100%' size='2px'>
<table border=0 width='100%' cellpadding='2' cellspacing='2'>
<tr>
	<td colspan='3' align='left' valign='middle' height='3' bgcolor='#0033ff'><font face='Arial' size='0.2' color='white'><b>
		Direccion de Entrega:		
		</b><font>	
	</td>
	<td>
	&nbsp;
	</td>
	<td align='right' valign='middle'><font face='Arial' size='0.2'><b>
		Comentarios:		
		</b><font>	
	</td>
	<td align='right' valign='middle'><font face='Arial' size='0.2'>
		$n11		
		<font>	
	</td>
</tr>
<tr>
	<td colspan='3' rowspan='3' align='left' valign='middle'><font face='Arial' size='0.2'>
	$n7<br>$m6<br>$m7	
	</font>
	</td>
	<td colspan='8'>
	&nbsp;
	</td>
	<td colspan='8'>
	&nbsp;
	</td>
	<td colspan='8'>
	&nbsp;
	</td>
</tr>
</table>
<hr align='center' color='#0033FF' width='100%' size='2px'>
<table width='100%' border=1 cellpadding='2' cellspacing='2'>
<tr>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' size='0.1' color='white'><b>
		Clave</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' size='0.1' color='white'><b>
		Cant</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' size='0.1' color='white'><b>
		Linea</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' size='0.1' color='white'><b>
		Descripcion</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' size='0.1' color='white'><b>
		P.Unitario</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' size='0.1' color='white'><b>
		Total</b></font>
	</td>
</tr>";
/* SACO EL PRODUCTO COTIZADO, SEGUN EL NUMERO DE ORDEN DE LA TABLA INVENTARIO Y ORDEN2*/
    $con=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	$resul=mssql_query("SELECT idproduct,linea,descripcion,cantidadcv,preciounitcv,totalprodcv
                        FROM(inventa1 INNER JOIN ordencv2 ON inventa1.cod=ordencv2.cod)
                        WHERE idcompraventa=$n0",$con);
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
                    WHERE idcompraventa=$n0",$con);
$g=mssql_fetch_array($resuls);
$totaluno=$g["subtotal"];
$iva=$totaluno*.15;
$neto=$totaluno+$iva;
mssql_close($con);
echo "<tr>
    <td colspan='4' rowspan='3'>&nbsp;</td>
    <td bgcolor='#0033ff' style='text-align:right;'><font face='Arial' size='0.1' color='white'>Subtotal </font></td>
    <td style='text-align:center;'><font face='Arial' size='0.1'>$logoprecio" . number_format($totaluno,2) . "</font></td>
  </tr>
  <tr>
    <td bgcolor='#0033ff' style='text-align:right;'><font face='Arial' size='0.1' color='white'>i.v.a. </font></td>
    <td style='text-align:center;'><font face='Arial' size='0.1'>$logoprecio" .  number_format($iva,2) ."</font></td>
  </tr>
  <tr>
    <td bgcolor='#0033ff' style='text-align:right;'><font face='Arial' size='0.1' color='white'>Total</font></td>
    <td style='text-align:center;'><font face='Arial' size='0.1'>$logoprecio" .  number_format($neto,2) ."</font></td>
  </tr>
  </table>  
  </center>";
?>
            <Center><input type="button" class="noprint" name="imprimir" value="Imprimir" onClick="window.print();">
                
            </Center>			</td>
          </tr>
		  
      </table></td>
    </tr>
  </table>
</center></BODY>
</HTML>