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
<BODY leftMargin=0 topMargin=0 marginwidth="0" marginheight="0" bottommargin="0" bgproperties="fixed"><center>
  <table width="auto" height="78" align="center" cellpadding="0" cellspacing="0">
     <tr valign="middle">
      <td align="center" valign="middle">
<?
$linea=$linea;
$mes=$mes;
$anio=$anio;
$logoprecio="$ ";
$conn=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
echo "<table border=1 width='100%' cellpadding='2' cellspacing='2'>
		<tr>
			<td background='img/blue1.jpg' align='left'>
				<SPAN class='navigation_heading'>REPORTE DE ENTRADAS - FECHA: $mes / $anio</SPAN>
			</td>
		</tr>
		<tr>
			<td align='left'>
		      <img src='http://www.airenergy-mexico.com/new/ventas/img/logoga.png' width='188' height='111'>
	       </td>
		</tr></table>";
?>
      </td>
    </tr>
    <tr>
      <td height="24" valign="top" align="center">
<?
$con=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
echo "<table border=1 width='100%'
		<tr>
			<td background='img/blue1.jpg' align='left'>
				<SPAN class='navigation_heading'>LINEA: $linea</SPAN>
			</td>
		</tr>
		<tr>
			<td align='center'>";
$resul=mssql_query("SELECT idproduct,linea,descripcion,
       					   cantrecibidaadq,serial,numpedimento3,
                           diarecadq,mesrecadq,aniorecadq,
                           ordendped,nadquisicion,diaadqui,mesadqui,anioadqui
					FROM (inventa1 INNER JOIN receqpadq2 ON inventa1.cod=receqpadq2.cod)
				    INNER JOIN receqpadq1 ON receqpadq1.idreciboadq=receqpadq2.idreciboadq 
					INNER JOIN ordenadq1 ON ordenadq1.idadquisicion=receqpadq1.idadquisicion
					WHERE receqpadq1.mesrecadq='$mes' AND receqpadq1.aniorecadq='$anio' AND inventa1.linea='$linea'
					ORDER BY receqpadq1.diarecadq ASC",$con);
echo "<center><table width='100%' border=1>
<tr>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		Clave</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		Descripcion</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		Serie</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		Pedimento</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		Cantidad</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		Orden de pedido</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		No. Adquisicion</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		Fecha Orden</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		Entrada</b></font>
	</td>
</tr>";
while($f=mssql_fetch_array($resul)){
    $a1=$f["idproduct"];
	$a2=$f["linea"];
	$a3=$f["descripcion"];
	$a4=$f["cantrecibidaadq"];
	$a5=$f["serial"];
	$a6=$f["numpedimento3"];
	$a7=$f["diarecadq"];
	$a8=$f["mesrecadq"];
	$a9=$f["aniorecadq"];
	$a10=$f["ordendped"];
	$a11=$f["nadquisicion"];
	$a12=$f["diaadqui"];
	$a13=$f["mesadqui"];
	$a14=$f["anioadqui"];
echo "

<tr>
	  <td width='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $a1</font>
	  </td>
	  <td width='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $a3</font>
	  </td>
	  <td width='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $a5</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $a6</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $a4</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $a10</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $a11</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $a12 / $a13 / $a14</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $a7 / $a8 / $a9</font>
	  </td></tr>";
}
echo "</table></center>
</td></tr></table>";
?>
        <Center><input type="button" class="noprint" name="imprimir" value="Imprimir" onClick="window.print();"></Center>
      </td>
    </tr>
  </table>
</center></BODY>
</HTML>
