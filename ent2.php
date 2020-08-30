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
$prd=strtoupper(trim($prd));
$logoprecio="$ ";
$conn=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$busc=mssql_query("SELECT idreciboadq,folioadq from receqpadq1 where folioadq='$prd'",$conn);
$busc1=mssql_fetch_array($busc);
$bsc=$busc1["idreciboadq"];
$bsc1=$busc1["folioadq"];
if($bsc1 != $prd){
echo "<script>alert('ERROR ... NO EXISTE ESE FOLIO, INTENTE NUEVAMENTE')</SCRIPT>";
echo "<script>window.close();</script>";
}
echo "<table border=1 width='100%' cellpadding='2' cellspacing='2'>
		<tr>
			<td background='img/blue1.jpg' align='left'>
				<SPAN class='navigation_heading'>REPORTE DE ENTRADAS - No.: $prd</SPAN>
			</td>
		</tr>
		<tr>
			<td align='left'>
		      <img src='http://www.airenergy-mexico.com/new/ventas/img/logoga.png' width='188' height='111'>
	       </td>
		</tr></table>";
/* SELECCIONO LOS DATOS DE LA ORDEN (ORDENCV1)  */  
$result5=mssql_query("SELECT receqpadq1.idreciboadq,receqpadq1.folioadq,receqpadq1.idadquisicion AS idadqrecibo,receqpadq1.diarecadq,
							 receqpadq1.mesrecadq,receqpadq1.aniorecadq,receqpadq1.fechapuerto2, receqpadq1.fechaalmacen2,receqpadq1.clave,
							 ordenadq1.idadquisicion,ordenadq1.ordendped,ordenadq1.nadquisicion,ordenadq1.diaadqui,ordenadq1.mesadqui,
							 ordenadq1.anioadqui,ordenadq1.calleadq,ordenadq1.numeroadq,ordenadq1.coloniaadq,ordenadq1.codpost,
							 ordenadq1.ciudadadq,ordenadq1.estadoadq,ordenadq1.statusadq                            
					  FROM receqpadq1,ordenadq1
					  WHERE (ordenadq1.idadquisicion=receqpadq1.idadquisicion AND receqpadq1.folioadq='$prd')",$conn);
$g=1;
while($ficha2=mssql_fetch_array($result5)){
$nn=$ficha2["idreciboadq"];
$n1=$ficha2["folioadq"];
$n2=$ficha2["idadqrecibo"];
$n3=$ficha2["diarecadq"];
$n4=$ficha2["mesrecadq"];
$n5=$ficha2["aniorecadq"];
$n6=$ficha2["fechapuerto2"];
$n7=$ficha2["fechaalmacen2"];
$usuaro=$ficha2["clave"];
$n8=$ficha2["idadquisicion"];
$n9=$ficha2["ordendped"];
$n10=$ficha2["nadquisicion"];
$n11=$ficha2["diaadqui"];
$n12=$ficha2["mesadqui"];
$n13=$ficha2["anioadqui"];
$n14=$ficha2["calleadq"];
$n15=$ficha2["numeroadq"];
$n16=$ficha2["coloniaadq"];
$n17=$ficha2["codpost"];
$n18=$ficha2["ciudadadq"];
$n19=$ficha2["estadoadq"];
$n20=$ficha2["statusadq"];
$result5xz=mssql_query("SELECT nombre,apepat,apemat,cargo from administracion where clave=$usuaro",$conn);
$ficha2zx=mssql_fetch_array($result5xz);
$nuser1=$ficha2zx["nombre"];
$nuser2=$ficha2zx["apepat"];
$nuser3=$ficha2zx["apemat"];
$nuser4=$ficha2zx["cargo"];
echo "<table border=1 width='100%' cellpadding='2' cellspacing='2'>";
echo "<tr>
			<td align='right' valign='middle' colspan='8' background='img/blue1.jpg'>
			<SPAN class='navigation_heading'>CAPTURADO POR: $nuser1&nbsp;$nuser2&nbsp;$nuser3&nbsp;<-->&nbsp;$nuser4</SPAN>
			</td>
	 </tr>"; 
echo "<tr>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>FOLIO:</b></font></td>
			<td class='peque2' align='center'>$n1</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>FECHA PUERTO:</b></font></td>
			<td class='peque2' align='center'>&nbsp; $n6</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>FECHA CAPTURA:</b></font></td>
			<td class='peque2' align='center'>&nbsp; $n3 / $n4 / $n5</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>FECHA ALMACEN:</b></font></td>
			<td class='peque2' align='center'>&nbsp; $n7</td>
		</tr>
		<tr>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>ORDEN DE PEDIDO:</b></font></td>
			<td class='peque2' align='center'>&nbsp;$n9</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>No. ADQUISICION:</b></font></td>
			<td class='peque2' align='center'>&nbsp;$n10</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>FECHA ADQUISICION:</b></font></td>
			<td class='peque2' align='center'>$n11 / $n12 / $n13</td>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>STATUS ORDEN ADQ.:</b></font></td>
			<td class='peque2' align='center'>$n20</td>
		</tr>
		<tr>
			<td align='right' valign='middle'><font face='Arial' size='0.2'><b>ENTREGADA EN:</b></font></td>
			<td class='peque2' align='left' colspan='7'>&nbsp;$n14&nbsp;# $n15&nbsp;Col.&nbsp;$n16&nbsp;C.P.$n17<br>$n18,&nbsp;$n19</td>
		</tr>
		<tr align='center'>
			<td colspan='8' align='center'>";
/* SACO EL PRODUCTO COTIZADO, SEGUN EL NUMERO DE ORDEN DE LA TABLA INVENTARIO Y ORDEN2*/
	$resul=mssql_query("SELECT DISTINCT idproduct,linea,descripcion,idadquisicion,cantidadadq,cantentregadadq
					    FROM(inventa1 INNER JOIN receqpadq2 ON inventa1.cod=receqpadq2.cod)			
	      				              INNER JOIN ordenadq2 ON inventa1.cod=ordenadq2.cod		                 
						WHERE idreciboadq=$nn AND idadquisicion=$n8",$conn);	
while($f=mssql_fetch_array($resul)){
    $a1=$f["idproduct"];
	$a2=$f["linea"];
	$a3=$f["descripcion"];
	$cvm=$f["idadquisicion"];
	$a4=$f["cantidadadq"];
	$a5=$f["cantentregadadq"];						
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
		<SPAN class='navigation_heading'>Cant. Pedida</SPAN>
	</td>
	<td align='center' background='img/blue.png' width='auto'>
		<SPAN class='navigation_heading'>Cant. Entregada</SPAN>
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
	  $a4</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' size='0.1'>
	  $a5</font>
	  </td></tr>
	  <tr>
	  <td width='100%' style='text-align:left;' colspan='5'><SPAN class='navigation_heading'>Series - Pedimento</SPAN></td><tr><td>";
	  $resulxz=mssql_query("SELECT serial,idproduct,numpedimento3
					      FROM(inventa1 INNER JOIN receqpadq2 ON inventa1.cod=receqpadq2.cod)
						  WHERE idreciboadq=$nn AND idproduct='$a1'",$conn);
	echo "<table width='100%' border='1'>";
	echo "<tr><td background='img/blue1.jpg'><SPAN class='navigation_heading'>CLAVE</SPAN></td>
		      <td background='img/blue1.jpg'><SPAN class='navigation_heading'>No SERIE</SPAN></td>
			  <td background='img/blue1.jpg'><SPAN class='navigation_heading'>No. Pedimento</SPAN></td></tr>";
	while($fx=mssql_fetch_array($resulxz)){
    $a1x=$fx["serial"];
	$a2x=$fx["idproduct"];
	$a3x=$fx["numpedimento3"];
	  echo "<tr><td><font face='Arial' size='0.1'>$a2x</font</td><td><font face='Arial' size='0.1'>$a1x</font></td><td><font face='Arial' size='0.1'>$a3x</font></td></tr>";	
	}	  
	  echo "</table>";
	  echo "</td></tr></table>";
}
echo "</td></tr><tr><td colspan='8' background='img/blue1.jpg' align='right'><SPAN class='navigation_heading'>CMD&nbsp;$bsc</SPAN></td></tr>";
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