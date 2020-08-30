<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<?
$prd=trim(strtoupper($prd));
$con11=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$produ=mssql_query("SELECT cod FROM inventa1 WHERE idproduct='$prd'",$con11);
$lafi4=mssql_fetch_array($produ);
$cproc1=$lafi4["cod"];	
$resul11=mssql_query("SELECT idproduct,existencia,precioUSA,notas
                         FROM inventa1 
						 WHERE cod='$cproc1'",$con11);
$f11=mssql_fetch_array($resul11);
    $a1zx=$f11["idproduct"];
	$a2zx=$f11["existencia"];
	$a3zx=$f11["precioUSA"];
	$a4zx=$f11["notas"];
?>
<? if($a1zx != $prd):
	 echo "<script>alert('ERROR ... NO EXISTE EL PRODUCTO')</script>";
     echo "<script>window.location='preci1.php'</script>";
?>
<? elseif($a1zx == ""):
     echo "<script>alert('ERROR ... CAMPO SIN LLENAR')</script>";
     echo "<script>window.location='preci1.php'</script>";
?>
<? elseif($a3zx==""):
echo "<script>alert('ERROR ... LA CLAVE QUE INTRODUJO A CAMBIADO, REVISE LA SIGUIENTE NOTA: $a4zx');</script>";
echo "<script>window.location='preci1.php'</script>";
?>
<? else: ?>
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
  <table width="auto" height="78" align="center" cellpadding="0" cellspacing="0">
     <tr valign="middle">
      <td background="img/blue.png" align="center" class="small_text1" valign="middle">Precios</td>
    </tr>
    <tr>
      <td height="24" valign="top" align="center">
        <table width="auto"  border="0">
		<tr><td align="center"><A class=main_navigation 
                  href="preci1.php">Buscar otro producto</A></td></tr>
          <tr align="center">
            <td width="67%" valign="top" align="center">
              <?
echo "
<hr align='center' color='#0033FF' width='100%' size='2px'>
<table width='auto' border=1 cellpadding='2' cellspacing='2'>
<tr>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		CLAVE</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		LINEA</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		DESCRIPCION</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		MAYORISTAS</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		SPIN</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		SWIMQUIP</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		GUADALAJARA</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		MONTERREY</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		ESTATAL</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		REGIONAL</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		GENERAL</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		PUB. MIN.</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		PUB. SUG.</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		E.A.</b></font>
	</td>	
</tr>";
/* SACO los productos*/
    $con=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	$resul=mssql_query("SELECT idproduct,linea,descripcion,general,mayoristas,regional,estatal,guadalajara,monterrey,ppubmin,spin,ppubmx,pventaEA,pswimquip
                         FROM inventa1
						 WHERE idproduct = '$prd' AND statusP IS NULL",$con);
	 while($f=mssql_fetch_array($resul)){
    $a1=$f["idproduct"];
	$a2=$f["linea"];
	$a3=$f["descripcion"];
	$a4=$f["general"];
	$a5=$f["mayoristas"];
	$a6=$f["regional"];
	$a7=$f["estatal"];
	$a8=$f["guadalajara"];
	$a9=$f["monterrey"];
	$a10=$f["ppubmin"];
	$a11=$f["spin"];
	$a12=$f["ppubmx"];
	$a13=$f["pventaEA"];
	$a14=$f["pswimquip"];
echo "<tr>
	  <td width='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $a1</font>
	  </td>
	  <td width='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $a2</font>
	  </td>
	  <td width='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  &nbsp; $a3</font>
	  </td>
	  <td width='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $ " . number_format($a5,2) . "</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $ " . number_format($a11,2) . "</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $ " . number_format($a14,2) . "</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $ " . number_format($a8,2) . "</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $ " . number_format($a9,2) . "</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $ " . number_format($a7,2) . "</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $ " . number_format($a6,2) . "</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $ " . number_format($a4,2) . "</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $ " . number_format($a10,2) . "</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $ " . number_format($a12,2) . "</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $ " . number_format($a13,2) . "</font>
	  </td></tr>";
    }
echo "</table></center>";
?>
			<Center><input type="button" class="noprint" name="imprimir" value="Imprimir" onClick="window.print();"></Center>
			</td>
          </tr>
		  <tr><td align="center"><A class=main_navigation 
                  href="preci1.php">Buscar otro producto</A></td></tr>
      </table></td>
    </tr>
  </table>
</center></BODY>
</HTML>
<? endif;?>