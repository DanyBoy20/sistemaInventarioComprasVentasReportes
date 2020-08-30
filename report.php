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
<BODY background="img/fondo.gif" leftMargin=0 topMargin=0 marginwidth="0" marginheight="0" bottommargin="0" bgproperties="fixed"><center>
  <table width="auto" height="78" align="center" cellpadding="0" cellspacing="0">
     <tr valign="middle">
      <td background="img/blue.png" align="center" class="small_text1" valign="middle">REPORTE ORDENES DE COMPRA POR FECHA</td>
    </tr>
    <tr>
      <td height="24" valign="top" align="center">
      <table width="100%" border="1">
  <tr>
    <td height="27" align="center"><A class=main_navigation 
                  href="#">Por fecha</A></td>
   <td align="center"><A class=main_navigation 
                  href="#">Por No. de orden</A></td>
   <td align="center"><A class=main_navigation 
                  href="#">Por No. de referencia</A></td>
  </tr>
  <tr>
    <td align="center"><form method="post" action="report1.php" target="_blank">
				  <table>
			  <tr><td class="small_text1">Mes</td><td>
			  <select name="mes">
			  <option value="Enero">Enero</option>
			  <option value="Febrero">Febrero</option>
			  <option value="Marzo">Marzo</option>
			  <option value="Abril">Abril</option>
			  <option value="Mayo">Mayo</option>
			  <option value="Junio">Junio</option>
			  <option value="Julio" selected>Julio</option>
			  <option value="Agosto">Agosto</option>
			  <option value="Septiembre">Septiembre</option>
			  <option value="Octubre">Octubre</option>
			  <option value="Noviembre">Noviembre</option>
			  <option value="Diciembre">Diciembre</option>
			  </select>
			  </td></tr>
			  <tr><td class="small_text1">A&ntilde;o</td><td>
			  <select name="anio">
			  <option value="2006">2006</option>
			  <option value="2007" selected>2007</option>
			  <option value="2008">2008</option>
			  </select>
			  </td></tr>
			  <tr><td colspan="2" align="center"><input type="submit" value="Buscar"></td></tr>
			  </table></form></td>
    <td align="center"><form method="post" action="report2.php" target="_blank">
				  <table>			  
			  <tr><td class="small_text1">No. de Orden</td><td>
			  <input type="text" name="ref">
			  </td></tr>
			  <tr><td colspan="2" align="center"><input type="submit" value="Buscar"></td></tr>
			  </table></form></td>
    <td><form method="post" action="report3.php" target="_blank">
				  <table>
			  <tr><td class="small_text1" align="center">Distribuidor</td></tr>
              <tr><td align="center">
			  <select name="dtr" style="width:320px;color:black;background-color:#86c1ff;font-size:12px;font-family:arial;">
        <?
	$cne=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
    $reso=mssql_query("SELECT cve_distribuidor,razon_social FROM distribuidores WHERE tipodist <> 'no' ORDER BY razon_social",$cne);
	while($fia=mssql_fetch_array($reso)){
	$b1=$fia["cve_distribuidor"];	
	$b2=$fia["razon_social"];
	echo "<option value='" . $b1 . "'>" . $b2;
    }	
	mssql_close($cne);
	?>
      </select>	
			  </td></tr>
			  <tr><td class="small_text1" align="center">No. de Referencia</td>
              </tr><tr><td align="center">
			  <input type="text" name="ref">
			  </td></tr>
			  <tr><td colspan="2" align="center"><input type="submit" value="Buscar"></td></tr>
			  </table></form></td>
  </tr>
  <tr>
    <td colspan="3"><hr align="center" color="#0033FF" width="100%" size="3px"></td>
  </tr>
  <tr>
    <td height="27" align="center"><A class=main_navigation 
                  href="#">X Distribuidor Mensual</A></td>
    <td height="27" align="center"><A class=main_navigation 
                  href="#">X Distribuidor Anual</A></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><form method="post" action="report4.php" target="_blank">
				  <table>
                  <tr><td class="small_text1">Distribuidor</td>
                  <td align="center">
                  <select name="dtr" style="width:320px;color:black;background-color:#86c1ff;font-size:12px;font-family:arial;">
        <?
	$cne=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
    $reso=mssql_query("SELECT cve_distribuidor,razon_social FROM distribuidores WHERE tipodist <> 'no' ORDER BY razon_social",$cne);
	while($fia=mssql_fetch_array($reso)){
	$b1=$fia["cve_distribuidor"];	
	$b2=$fia["razon_social"];
	echo "<option value='" . $b1 . "'>" . $b2;
    }	
	mssql_close($cne);
	?>
      </select></td></tr>
                <tr><td class="small_text1">Mes</td><td>
			  <select name="mes">
			  <option value="Enero">Enero</option>
			  <option value="Febrero">Febrero</option>
			  <option value="Marzo">Marzo</option>
			  <option value="Abril">Abril</option>
			  <option value="Mayo">Mayo</option>
			  <option value="Junio">Junio</option>
			  <option value="Julio" selected>Julio</option>
			  <option value="Agosto">Agosto</option>
			  <option value="Septiembre">Septiembre</option>
			  <option value="Octubre">Octubre</option>
			  <option value="Noviembre">Noviembre</option>
			  <option value="Diciembre">Diciembre</option>
			  </select>
			  </td></tr>
			  <tr><td class="small_text1">A&ntilde;o</td><td>
			  <select name="anio">
			  <option value="2006">2006</option>
			  <option value="2007" selected>2007</option>
			  <option value="2008">2008</option>
			  </select>
			  </td></tr>
              <tr><td class="small_text1">Tipo</td><td>
			  <select name="tips">
			  <option value="pendiente">Pendientes</option>
			  <option value="En proceso">En proceso</option>
              <option value="Enviada">Enviada</option>
			  <option value="Entregado">Entregadas</option>
			  <option value="Cancelada">Canceladas</option>
              <option value="%" SELECTED>Todas</option>
			  </select>
			  </td></tr>
			  <tr><td colspan="2" align="center"><input type="submit" value="Buscar"></td></tr>
			  </table></form></td>
    <td align="center"><form method="post" action="report5.php" target="_blank">
				  <table>
                  <tr><td class="small_text1">Distribuidor</td>
                  <td align="center"><select name="dtr2" style="width:320px;color:black;background-color:#86c1ff;font-size:12px;font-family:arial;">
                    <?
	$cne=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
    $reso=mssql_query("SELECT cve_distribuidor,razon_social FROM distribuidores WHERE tipodist <> 'no' ORDER BY razon_social",$cne);
	while($fia=mssql_fetch_array($reso)){
	$b1=$fia["cve_distribuidor"];	
	$b2=$fia["razon_social"];
	echo "<option value='" . $b1 . "'>" . $b2;
    }	
	mssql_close($cne);
	?>
                  </select></td>
                  </tr>			  
			  <tr><td class="small_text1">A&ntilde;o</td><td>
			  <select name="anio">
			  <option value="2006">2006</option>
			  <option value="2007" selected>2007</option>
			  <option value="2008">2008</option>
			  </select>
			  </td></tr>
              <tr><td class="small_text1">Tipo</td><td>
			  <select name="tips">
			  <option value="pendiente">Pendientes</option>
			  <option value="En proceso">En proceso</option>
              <option value="Enviada">Enviada</option>
			  <option value="Entregado">Entregadas</option>
			  <option value="Cancelada">Canceladas</option>
              <option value="%" SELECTED>Todas</option>
			  </select>
			  </td></tr>
			  <tr><td colspan="2" align="center"><input type="submit" value="Buscar"></td></tr>
			  </table>
    </form></td>
    <td>&nbsp;</td>
  </tr>
</table>        
      </td>
    </tr>
  </table>
</center></BODY>
</HTML>