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
     echo "<script>window.location='equipment2.php'</script>";
?>
<? elseif($a1zx == ""):
     echo "<script>alert('ERROR ... CAMPO SIN LLENAR')</script>";
     echo "<script>window.location='equipment2.php'</script>";
?>
<? elseif($a3zx==""):
echo "<script>alert('ERROR ... LA CLAVE QUE INTRODUJO A CAMBIADO, REVISE LA SIGUIENTE NOTA: $a4zx');</script>";
echo "<script>window.location='equipment2.php'</script>";
?>
<? elseif($a2zx == "" OR $a2zx == 0):
	 echo "<script>alert('ERROR ... NO HAY EXISTENCIAS DEL PRODUCTO SELECCIONADO')</script>";
     echo "<script>window.location='equipment2.php'</script>";
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
      <td background="img/blue.png" align="center" class="small_text1" valign="middle">Inventario X Series</td>
    </tr>
    <tr>
      <td height="24" valign="top" align="center">
        <table width="auto"  border="0">
          <tr align="center">
            <td width="67%" valign="top" align="center">
              <?
echo "
<hr align='center' color='#0033FF' width='100%' size='2px'>
<table width='auto' border=1 cellpadding='2' cellspacing='2'>
<tr>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		Clave</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		Linea</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		Descripcion</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		Serie</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		Cantidad</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		Pedimento</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
		Fecha de entrada</b></font>
	</td>
</tr>";
/* SACO los productos*/
    $con=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	$resul=mssql_query("SELECT idproduct,linea,descripcion,serial,difinventa,numpedimento1,fechaentrada1
                         FROM (inventa1 INNER JOIN inventa2 ON inventa1.cod=inventa2.cod)
						 WHERE idproduct = '$prd' AND difinventa <> 0 AND disponible='si'",$con);
	 while($f=mssql_fetch_array($resul)){
    $a1=$f["idproduct"];
	$a2=$f["linea"];
	$a3=$f["descripcion"];
	$a4=$f["serial"];
	$a5=$f["difinventa"];
	$a6=$f["numpedimento1"];
	$a7=$f["fechaentrada1"];
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
	  $a4</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $a5</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $a6</font>
	  </td>
	  <td widht='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>
	  $a7</font>
	  </td></tr>";
    }
echo "</table></center>";
?>
			<Center><input type="button" class="noprint" name="imprimir" value="Imprimir" onclick="window.print();"></Center>
			</td>
          </tr>
		  <tr><td align="center"><A class=main_navigation 
                  href="equipment2.php">Buscar otro producto</A></td></tr>
      </table></td>
    </tr>
    
  </table>
</center></BODY>
</HTML>
<? endif;?>