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
  <table width="804" height="89" align="center" cellpadding="0" cellspacing="0" class="bordet">    
    <tr valign="middle">
      <td height="19" align="center" valign="middle" background="img/blue.png" class="main_text_bold">Inventario</td>
    </tr>
    <tr>
      <td height="24" valign="top">
        <table width="100%"  border="0">
          <tr>
            <td width="67%" valign="top" align="center">              
<?
echo "<table border=1 width='100%'>
			<tr align='center'>
					<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
					Producto</b><font>
					</td>
					<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
					Linea</b><font>
					</td>
					<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
					Descripcion</b><font>
					</td>
					<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;' color='white'><b>
					Existencia</b><font>
					</td>
			</tr>";
$conexion=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$resultado=mssql_query("SELECT idproduct,linea,descripcion,existencia FROM inventa1
			WHERE existencia<>0",$conexion);
while($fila=mssql_fetch_array($resultado)){
	$c1=$fila["idproduct"];
	$c2=$fila["linea"];
	$c3=$fila["descripcion"];
	$c4=$fila["existencia"];				
			echo "<tr>
			<td width='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>$c1<font></td>
			<td width='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>$c2<font></td>
			<td width='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>$c3<font></td>
			<td width='auto' style='text-align:center;'><font face='Arial' style='FONT-WEIGHT: bold; FONT-SIZE: 0.55em;'>$c4<font></td>
			</tr>";
			}
			echo "</table>";
mssql_close($conexion);
?>
			<Center><input type="button" class="noprint" name="imprimir" value="Imprimir" onclick="window.print();"></Center>
			</td>
          </tr>
      </table></td>
    </tr>
  </table>
</center></BODY>
</HTML>
