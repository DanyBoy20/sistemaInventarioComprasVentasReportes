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
<BODY background="img/fondo.gif" leftMargin=0 topMargin=0 marginwidth="0" marginheight="0" bottommargin="0" bgproperties="fixed"><center>
  <table width="804" height="78" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="24" valign="top">
        <table width="100%"  border="0">
          <tr>
            <td width="67%" valign="top">
              <?
$idadq=$idadq;
$logoprecio="$ ";
/* SELECCIONO LOS DATOS DE LA ORDEN (ORDENADQ1)  */  
$conn=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$result5=mssql_query("SELECT ordendped,nadquisicion,diaadqui,mesadqui,anioadqui,fechoadq1,fecharevision,
                             condicionespago,fechaenvioadqui1,fechaenvioadqui2,fechadesent,fechadesent2,
							 calleadq,numeroadq,coloniaadq,codpost,ciudadadq,estadoadq,rfcadq,
							 idtransporte,formatransporte,consolidadora,frmpagotranspadq,revision,comentaadq
			          FROM ordenadq1 WHERE idadquisicion=$idadq",$conn);
//$result5=mssql_query("SELECT norden,dayo,montho,yearo,formapago FROM orden1 WHERE idorden=$orden",$conn);
$ficha2=mssql_fetch_array($result5);
$n0=$ficha2["ordendped"];
$n1=$ficha2["nadquisicion"];
$n2=$ficha2["diaadqui"];
$n3=$ficha2["mesadqui"];
$n4=$ficha2["anioadqui"];
$fechacreada=$ficha2["fechoadq1"];
$fecharevisa=$ficha2["fecharevision"];
$n5=$ficha2["condicionespago"];
$n6=$ficha2["fechaenvioadqui1"];
$n7=$ficha2["fechadesent"];
$fchdeseada=$ficha2["fechadesent2"];
$m6=$ficha2["fechaenvioadqui2"];
$m7=$ficha2["fechadesent2"];
$n8=$ficha2["calleadq"];
$n9=$ficha2["numeroadq"];
$n10=$ficha2["coloniaadq"];
$n11=$ficha2["codpost"];
$n12=$ficha2["ciudadadq"];
$n13=$ficha2["estadoadq"];
$n14=$ficha2["rfcadq"];
$n15=$ficha2["idtransporte"];
$n16=$ficha2["formatransporte"];
$consolida=$ficha2["consolidadora"];
$n17=$ficha2["frmpagotranspadq"];
$revi=$ficha2["revision"];
$n18=$ficha2["comentaadq"];
$trns=mssql_query("SELECT razonsocialtrns FROM proveedores WHERE idtransporte=$n15",$conn);
$fich1=mssql_fetch_array($trns);
$tran=$fich1["razonsocialtrns"];
$cons=mssql_query("SELECT razonsocialtrns FROM proveedores WHERE idtransporte=$consolida",$conn);
$fich34=mssql_fetch_array($cons);
$consol=$fich34["razonsocialtrns"];
mssql_close($conn);
echo "
<table border=0 width='100%' cellpadding='2' cellspacing='2'>
<tr>
	<td align='center' valign='middle' with='auto' colspan='3' rowspan='4'>
		<img src='http://www.airenergy-mexico.com/new/ventas/img/logoga.png' width='188' height='111'>
	</td>	
	<td align='right' valign='middle' with='auto' colspan='3' rowspan='4'>
		<img src='http://www.airenergy-mexico.com/new/img/whitespace.png' width='225' height='81'>
	</td>	
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='2'><b>
	Orden de Adquisicion No.:</b></font>
	</td>
	<td align='center' valign='middle' with='auto' colspan='2'><font face='Arial' size='2' color='red'><b>
	$n1</b></font>
	</td>
</tr>
<tr>
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='2'><b>
	Orden de Pedido:</b></font>
	</td>
	<td align='center' valign='middle' with='auto' colspan='2'><font face='Arial' size='2' COLOR='RED'>
	$n0</font>
	</td>
</tr>
<tr>
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='2'><b>
	Fecha creacion orden:</b></font>
	</td>
	<td align='center' valign='middle' with='auto' colspan='2'><font face='Arial' size='2'>
	$n2 / $n3 / $n4</font>
	</td>
</tr>
<tr>
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='2'><b>
	Revision:</FONT><font face='Arial' size='2' color='red'>$revi</font><font face='Arial' size='2'>Fecha revision:</b></font>
	</td>
	<td align='center' valign='middle' with='auto' colspan='2'><font face='Arial' size='2'>
	$fecharevisa</font>
	</td>
</tr>
</table>
<hr align='center' color='#0033FF' width='100%' size='2px'>
<table border=0 width='100%' cellpadding='2' cellspacing='2'>
<tr>
	<td align='left' valign='middle' colspan='3' rowspan='4'><font face='Arial' size='2'>
		Energia Ambiental de Mexico S.A. de C.V.<br>
		Angel Urraza # 1111 Col. del Valle<br>
		C.P. 03100<br>
		Mexico, D.F.<br>
		R.F.C.: EAM-020710-G93		
		 </font>
	</td>
	<td align='right'>&nbsp;
	</td>
	<td align='right'><font face='Arial' size='2'><b>
		Fecha de envio:</b></font>
	</td>
	<td align='left'><font face='Arial' size='2'>
	$m6</font>
	</td>
	<td align='right' colspan='2'><font face='Arial' size='2'><b>
		Fecha deseada de Entrega:</b></font>
	</td>
	<td align='left'><font face='Arial' size='2'>
	$fchdeseada</font>
	</td>
	<td align='right'><font face='Arial' size='2'><b>
		Forma de Pago:</b></font>
	</td>
	<td align='left'><font face='Arial' size='2'>
	$n5</font>
	</td>
</tr>
<tr>
	<td align='right'>&nbsp;
	</td>
	<td align='right'><font face='Arial' size='2'><b>
		Agencia Aduanal:</b></font>
	</td>
	<td align='left' colspan='4'><font face='Arial' size='2'>
	$tran</font>
	</td>
	<td align='right'><font face='Arial' size='2'><b>
		Transporte:</b></font>
	</td>
	<td align='left'><font face='Arial' size='2'>
	$n16</font>
	</td>
</tr>
<tr>
	<td align='right'>&nbsp;
	</td>
	<td align='right'><font face='Arial' size='2'><b>
		Consolidadora:</b></font>
	</td>
	<td align='left' colspan='6'><font face='Arial' size='2'>
	$consol</font>
	</td>
</tr>
<tr>
	<td align='right'>&nbsp;
	</td>
	<td align='right' colspan='2'><font face='Arial' size='2'><b>
	Forma de Pago Transporte:</b></font>
	</td>
	<td align='left' colspan='5'><font face='Arial' size='2'>
		$n17</font>
	</td>
</tr>
</table>
<table border=0 width='auto' cellpadding='2' cellspacing='2'>
<tr>
	<td align='left' valign='middle' colspan='3'  height='3' width='auto' bgcolor='blue'><font face='Arial' size='2' color='white'><b>
		Direccion de Entrega:		
		</b><font>
	</td>
	<td align='right'>&nbsp;
	</td>	
	<td align='right' colspan='2'><font face='Arial' size='2'><b>
		Comentarios:</b></font>
	</td>
	<td align='left' colspan='5'><font face='Arial' size='2'>
	$n18</font>
	</td>	
</tr>
<tr>
	<td align='left' valign='middle' colspan='3' rowspan='3'><font face='Arial' size='2'>
		$n8 # $n9 Col. $n10<br>
		C.P. $n11<br>
		$n12 , $n13<br>		
		</font>
	</td>
	<td align='left' colspan='7' rowspan='3'><font face='Arial' size='2'><b>
	
	</b></font>
	</td>
</tr>
</table>
<hr align='center' color='#0033FF' width='100%' size='2px'>
<center>
<table width='100%' border=1 cellpadding='2' cellspacing='2'>
<tr>
	<td align='center' bgcolor='blue' width='auto'><font face='Arial' size='2' color='white'><b>
		Clave</b></font>
	</td>
	<td align='center' bgcolor='blue' width='auto'><font face='Arial' size='2' color='white'><b>
		Pedida</b></font>
	</td>
	<td align='center' bgcolor='blue' width='auto'><font face='Arial' size='2' color='white'><b>
		Entregada</b></font>
	</td>
	<td align='center' bgcolor='blue' width='auto'><font face='Arial' size='2' color='white'><b>
		Linea</b></font>
	</td>
	<td align='center' bgcolor='blue' width='auto'><font face='Arial' size='2' color='white'><b>
		Descripcion</b></font>
	</td>
	<td align='center' bgcolor='blue' width='auto'><font face='Arial' size='2' color='white'><b>
		P.Unitario</b></font>
	</td>
	<td align='center' bgcolor='blue' width='auto'><font face='Arial' size='2' color='white'><b>
		Total</b></font>
	</td>
</tr>";
/* SACO EL PRODUCTO COTIZADO, SEGUN EL NUMERO DE ORDEN DE LA TABLA INVENTARIO Y ORDEN2*/
    $con=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	$resul=mssql_query("SELECT idproduct,linea,descripcion,cantidadadq,cantentregadadq,precprouniadq,totlprdadq
                        FROM(inventa1 INNER JOIN ordenadq2 ON inventa1.cod=ordenadq2.cod)
                        WHERE idadquisicion=$idadq",$con);
	 while($f=mssql_fetch_array($resul)){
    $a1=$f["idproduct"];
	$a2=$f["linea"];
	$a3=$f["descripcion"];
	$a4=$f["cantidadadq"];
	$zx=$f["cantentregadadq"];
	$a5=$f["precprouniadq"];
	$a6=$f["totlprdadq"];
echo "<tr>
	  <td style='text-align:center;' width='auto'><font face='Arial' size='2'>
	  $a1`</font>
	  </td>
	  <td style='text-align:center;' width='auto'><font face='Arial' size='2'>
	  $a4 </font>
	  </td>
	  <td style='text-align:center;' width='auto'><font face='Arial' size='2'>
	  $zx </font>
	  </td>
	  <td style='text-align:center;' width='auto'><font face='Arial' size='2'>
	  $a2 </font>
	  </td>
	  <td style='text-align:left;' width='auto'><font face='Arial' size='2'>
	  $a3 </font>
	  </td>
	  <td style='text-align:center;' width='auto'><font face='Arial' size='2'>
	  $logoprecio". number_format($a5,2) . "</font>
	  </td>
	  <td style='text-align:center;' width='auto'><font face='Arial' size='2'>
	  $logoprecio" . number_format($a6,2) . "</font>
	  </td></tr>";
    }	
$resuls=mssql_query("SELECT SUM(totlprdadq)AS subtotal
                    FROM ordenadq2
                    WHERE idadquisicion=$idadq",$con);
$g=mssql_fetch_array($resuls);
$totaluno=$g["subtotal"];
$iva=$totaluno*.15;
$neto=$totaluno+$iva;
mssql_close($con);
echo "<tr>
    <td colspan='5' rowspan='3'>&nbsp;</td>
    <td style='text-align:right;' bgcolor='blue' width='auto'><font face='Arial' size='2' color='white'><b>SUBTOTAL</b></font></td>
    <td style='text-align:center;' width='auto'><font face='Arial' size='2'>$logoprecio" . number_format($totaluno,2) . "</font></td>
  </tr>
  <tr>
    <td style='text-align:right;' bgcolor='blue' width='auto'><font face='Arial' size='2' color='white'><b>I.V.A.</b></font></td>
    <td style='text-align:center;' width='auto'><font face='Arial' size='2'>$logoprecio" . number_format($iva,2) . "</font></td>
  </tr>
  <tr>
    <td style='text-align:right;' bgcolor='blue' width='auto'><font face='Arial' size='2' color='white'><b>TOTAL</b></font></td>
    <td style='text-align:center;' width='auto'><font face='Arial' size='2'>$logoprecio" . number_format($neto,2) . "</font></td>
  </tr>
  </table>  
  </center>";
?>
			<Center><input type="button" class="noprint" name="imprimir" value="Imprimir" onclick="window.print();"></Center>
			</td>
          </tr>
      </table></td>
    </tr>
  </table>
</center></BODY>
</HTML>