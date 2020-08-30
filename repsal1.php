<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<HTML>
<HEAD><title>REPORTES - SALIDAS</title>
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
      <td background="img/blue.png" align="center" class="small_text1" valign="middle">Reportes Salidas</td>
    </tr>
    <tr>
      <td height="24" valign="top" align="center">
      <table width="100%" border="1">
  <tr>
   <td align="center"><A class=main_navigation 
                  href="#"><font color="#000000">X Folio</font></A></td>
    <td align="center"><A class=main_navigation 
                  href="#"><font color="#000000">X Fecha (detalle)</font></A></td>
    <td align="center"><A class=main_navigation 
                  href="#"><font color="#000000">X Fecha (resumen)</font></A></td>
  </tr>
  <tr>
    <td align="center"> <form method="post" action="repsal3.php" target="_blank">
			  <table>
			  <tr><td class="small_text1">No. Salida</td><td><input type="text" name="prd" size="12" maxlength="20"></td></tr>
			  <tr><td colspan="2" align="center"><input type="submit" value="Buscar"></td></tr>
			  </table>
			  </form></td>
    <td align="center"> <form method="post" action="repsal2.php" target="_blank">
				  <table>
			  <tr><td class="small_text1" align="center">
			  Mes</td><td>
			  <select name="mes">
			  <option value="Enero">Enero</option>
			  <option value="Fenrero">Febrero</option>
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
			  <tr><td class="small_text1" align="center">A&ntilde;o</td><td>
			  <select name="anio">
			  <option value="2006">2006</option>
			  <option value="2007" selected>2007</option>
			  <option value="2008">2008</option>
			  </select>
			  </td></tr>
			  <tr><td colspan="2" align="center"><input type="submit" value="Buscar"></td></tr>
			  </table></form></td>
    <td align="center"><form method="post" action="sal1.php" target="_blank">
				  <table>
			  <tr><td class="small_text1" align="center">
			  Mes</td><td>
			  <select name="mes">
			  <option value="Enero">Enero</option>
			  <option value="Fenrero">Febrero</option>
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
			  <tr><td class="small_text1" align="center">A&ntilde;o</td><td>
			  <select name="anio">
			  <option value="2006">2006</option>
			  <option value="2007" selected>2007</option>
			  <option value="2008">2008</option>
			  </select>
			  </td></tr>
			  <tr><td colspan="2" align="center"><input type="submit" value="Buscar"></td></tr>
			  </table></form></td>
  </tr>
   <tr>
    <td colspan="3"><hr align="center" color="#0033FF" width="100%" size="3px"></td>
  </tr>
  <tr>
    <td align="center"><A class=main_navigation 
                  href="#"><font color="#000000">X Linea</font></A></td>
    <td align="center"><A class=main_navigation 
                  href="#"><font color="#000000">X Distribuidor</font></A></td>
    <td align="center"><A class=main_navigation 
                  href="#"><font color="#000000">X Distribuidor Anual</font></A></td>
  </tr>
  <tr>
    <td align="center">              <form method="post" action="sal2.php" target="_blank">
			  <table>
			  <tr><td class="small_text1">Producto</td><td>
              <select name="linea" style="width:auto; font-size:.65em;">
<?
		$cn=mssql_connect("SISTEMAS","","");
        mssql_select_db("airenergy",$cn);
		$rsl=mssql_query("SELECT DISTINCT linea
                          FROM inventa1",$cn);
		while($linea=mssql_fetch_array($rsl)){
		$f1=$linea["linea"];
		echo "<option value='$f1'>$f1</option>";
		}
		mssql_close($cn);	
?>		
</select>
              </td></tr>
              <tr><td class="small_text1">Mes</td><td><select name="mes">
			  <option value="Enero">Enero</option>
			  <option value="Fenrero">Febrero</option>
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
			  </select></td></tr>
              <tr><td class="small_text1">A&ntilde;o</td><td><select name="anio">
			  <option value="2006">2006</option>
			  <option value="2007" selected>2007</option>
			  <option value="2008">2008</option>
			  </select></td></tr>
			  <tr><td colspan="2" align="center"><input type="submit" value="Buscar"></td></tr>
			  </table>
		    </form></td>
    <td align="center">              <form method="post" action="sal3.php" target="_blank">
			  <table>
			  <tr><td class="small_text1">Distribuidor</td><td>
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
              <tr><td class="small_text1">Mes</td><td><select name="mes">
			  <option value="Enero">Enero</option>
			  <option value="Fenrero">Febrero</option>
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
			  </select></td></tr>
              <tr><td class="small_text1">A&ntilde;o</td><td><select name="anio">
			  <option value="2006">2006</option>
			  <option value="2007" selected>2007</option>
			  <option value="2008">2008</option>
			  </select></td></tr>
			  <tr><td colspan="2" align="center"><input type="submit" value="Buscar"></td></tr>
			  </table>
		    </form></td>
    <td align="center"> <form method="post" action="sal4.php" target="_blank">			  
			  <table>
			  <tr><td class="small_text1">Distribuidor</td><td><select name="dtr" style="width:320px;color:black;background-color:#86c1ff;font-size:12px;font-family:arial;">
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
              <tr><td class="small_text1">A&ntilde;o</td><td><select name="anio">
			  <option value="2006">2006</option>
			  <option value="2007" selected>2007</option>
			  <option value="2008">2008</option>
			  </select></td></tr>
			  <tr><td colspan="2" align="center"><input type="submit" value="Buscar"></td></tr>
			  </table>
		    </form></td>
  </tr> 
  <!-- aqui -->
  <tr>
    <td colspan="3"><hr align="center" color="#0033FF" width="100%" size="3px"></td>
  </tr>
  <tr>
    <td align="center"><A class=main_navigation 
                  href="#"><font color="#000000">X Orden de Compra</font></A></td>
                  <td align="center"><A class=main_navigation 
                  href="#"><font color="#000000">X Referencia Distribuidor</font></A></td>
                  <td align="center"><A class=main_navigation 
                  href="#"><font color="#000000">&nbsp;</font></A></td>
  </tr>
  <tr>
    <td align="center">
                  <form method="post" action="sal5.php" target="_blank">
			  <table>
			  <tr><td class="small_text1">Distribuidor</td><td>
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
              <tr><td class="small_text1">Orden de Compra</td>
                <td><input type="text" name="orden" size="12" maxlength="20"></td>
              </tr>              
			  <tr><td colspan="2" align="center"><input type="submit" value="Buscar"></td></tr>
			  </table>
		    </form>
    </td>
    <td align="center">              <form method="post" action="sal6.php" target="_blank">
			  <table>
			  <tr><td class="small_text1">Distribuidor</td><td>
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
              <tr><td class="small_text1">No. Referencia</td><td><input type="text" name="orden" size="12" maxlength="20"></td></tr>
              <tr><td colspan="2" align="center"><input type="submit" value="Buscar"></td></tr>
			  </table>
		    </form></td>
    <td align="center">&nbsp;</td>
  </tr> 
</table>        
      </td>
    </tr>
  </table>
</center></BODY>
</HTML>