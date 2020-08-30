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
  <table width="804" height="336" align="center" cellpadding="0" cellspacing="0" class="bordet">
    <tr>
      <td height="134"><div align="center"> </div>
          <div align="center">
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="800" height="134">
              <param name="movie" value="img/TRANS.swf">
              <param name="quality" value="high">
              <embed src="img/TRANS.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="800" height="134"></embed>
            </object>
        </div></td>
    </tr>
    <tr valign="middle">
      <td background="img/blue.png" align="right" class="main_text_bold_blue" valign="middle">&nbsp; </td>
    </tr>
    <tr>
      <td height="123" valign="top">
        <table width="100%"  border="0" bgcolor="#FFFFFF">
          <tr>
            <td width="67%" valign="top">
              <table width="100%"  border="0">
                <tr>
                  <td colspan="2" background="../img/blue.png" class="small_text1">Menu Principal Gerente de Produccion</td>
                </tr>
                 <tr>
                  <td width="20%"><A class=main_navigation 
                  href="claudia.php">Inicio</A>
				  </td>
                  <td width="80%" rowspan="14" class="small_text1">
<?
$conexion=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$resultado=mssql_query("SELECT * FROM administracion
			WHERE nombre='$administra'",$conexion);
$fila=mssql_fetch_array($resultado);
	$c1=$fila["clave"];
	$c2=$fila["nombre"];
	$c3=$fila["apepat"];
	$c4=$fila["apemat"];
	$c5=$fila["pw"];	
	$c6=$fila["foto"];		
			echo "<table border='0'>";
			echo "<tr align='center'>
			<td class='small_text1'>Hola&nbsp;" . $c2 . "  " . "</td>
			</tr>
			<tr>
			<td><img src='$c6' width=87 height=101 style='border-style:inset;border-width:3';></td>
			</tr>";   						
			echo "</table>";
mssql_close($conexion);

?>
				  </td>
                </tr>
				<tr>
                  <td width="20%"><A class=main_navigation 
                  href="proveedores.php">Proveedores</A></td>
                </tr>
				<tr>
                  <td width="20%"><A class=main_navigation 
                  href="distribuidoresc.php">Distribuidores</A></td>
                </tr>
				<tr>
                  <td><A class=main_navigation 
                  href="adq.php">Ordenes de adquisicion</A></td>
                </tr>                
                <tr>
                  <td><A class=main_navigation 
                  href="compvent.php">Ordenes de compra</A></td>
                </tr>
				<tr>
                  <td><A class=main_navigation 
                  href="reciboadq1.php">Recibo de equipo</A></td>
                </tr>
                <tr>
                  <td><A class=main_navigation 
                  href="salidocv1.php">Salida de equipo</A></td>
                </tr>
				<tr>
                  <td><A class=main_navigation 
                  href="javascript:popUp('prevconsul.php')">Inventario</A></td>
                </tr>
				<tr>
                  <td><A class=main_navigation 
                  href="inref.php">Entrada Refacciones</A></td>
                </tr>
				<tr>
                  <td><A class=main_navigation 
                  href="javascript:popUp('preinventario.php')">Entrada Inventario 2006</A></td>
                </tr>
				<tr>
                  <td><A class=main_navigation 
                  href="javascript:popUp('preci1.php')">Precios productos</A></td>
                </tr>
				<tr>
                  <td><A class=main_navigation 
                  href="reportesc.php">Reportes</A></td>
                </tr>
				<tr>
                  <td><A class=main_navigation 
                  href="ftp://www.airenergy-mexico.com" target="_blank">FTP</A></td>
                </tr>
				<tr>
				<td><A class=main_navigation 
                  href="javascript:window.location='salida.php';">Cerrar Sesion</A></td>				
				
				</tr>
            </table>
			</td>
          </tr>
		  <tr bgcolor="#FFFFFF">
		  <td>
		  <hr align="center" color="#0033FF" width="100%" size="1px">
		  </td>
		  </tr>
		  <tr bgcolor="#FFFFFF">
		  <td>
		  <table width="100%"  border="0">
  <tr>
    <td width="37%">
	<?
	$clave=$dtr;	
	$conx=mssql_connect("SISTEMAS","","");
		  mssql_select_db("baseDatos");
		  $rest=mssql_query("SELECT idtransporte,razonsocialtrns,tipoproveedor,nomcontactotrns,nomcontacto2,nomcontacto3,
		               nomcontacto4,direcciontrns,ciudadtrns,estadotrns,telefonotrns,faxtrns,RFCtrns,emailtrns,comentariostrns
		  		       FROM proveedores WHERE idtransporte='$clave'",$conx);
	while($reg=mssql_fetch_row($rest)){
	$a1=$reg[0];
	$a2=$reg[1];
	$a3=$reg[2];
	$a4=$reg[3];
	$a5=$reg[4];
	$a6=$reg[5];
	$a7=$reg[6];
	$a8=$reg[7];
	$a9=$reg[8];
	$b1=$reg[9];
	$b2=$reg[10];
	$b3=$reg[11];
	$b4=$reg[12];
	$b5=$reg[13];
	$b6=$reg[14];
	}					   
    mssql_close($conexion);		  
	?>
	</td>
    <td width="26%" background="img/blue1.jpg" class="small_text1" align="center">Actualizar Registro</td>
    <td width="37%" align="right"></td>
  </tr>  
</table>
		  </td>
		  </tr>
		  <tr bgcolor="#FFFFFF">
		  <td>
		  <form name="formu" method="post" action="actua2.php">
		  <table width="100%"  border="0">
  <tr>
    <td width="13%" align="left">&nbsp;</td>
    <td width="87%"><input type="hidden" name="cve" value="<? echo $a1;?>"></td>
  </tr>
  <tr>
    <td background="img/blue1.jpg" align="left" class="peque">Razon Social</td>
    <td><input type="text" size="100" style="font-size:8pt;font-family:Arial;font-weight:bold;" name="rs" value="<? echo $a2;?>"></td>
  </tr>
  <tr>
    <td background="img/blue1.jpg" align="left" class="peque">Tipo Proveedor</td>
    <td>
	<select name="tipo">
	<option value="<? echo $a3;?>"><? echo $a3;?></option>
	<option value="Agencia Aduanal">Agencia Aduanal</option>
	<option value="Transporte de Carga">Transporte de Carga</option>
	</select>
	</td>
  </tr>
  <tr>
    <td background="img/blue1.jpg" align="left" class="peque">Contacto 1</td>
    <td><input type="text" size="100" style="font-size:8pt;font-family:Arial;font-weight:bold;" name="cn1" value="<? echo $a4;?>"></td>
  </tr>
  <tr>
    <td background="img/blue1.jpg" align="left" class="peque">Contacto 2</td>
    <td><input type="text" size="100" style="font-size:8pt;font-family:Arial;font-weight:bold;" name="cn2" value="<? echo $a5;?>"></td>
  </tr>
  <tr>
    <td background="img/blue1.jpg" align="left" class="peque">Contacto 3</td>
    <td><input type="text" size="100" style="font-size:8pt;font-family:Arial;font-weight:bold;" name="cn3" value="<? echo $a6;?>"></td>
  </tr>
  <tr>
    <td background="img/blue1.jpg" align="left" class="peque">Contacto 4</td>
    <td><input type="text" size="100" style="font-size:8pt;font-family:Arial;font-weight:bold;" name="cn4" value="<? echo $a7;?>"></td>
  </tr>
  <tr>
    <td background="img/blue1.jpg" align="left" class="peque">Direccion</td>
    <td><input type="text" size="100" style="font-size:8pt;font-family:Arial;font-weight:bold;" name="dr" value="<? echo $a8;?>"></td>
  </tr>
  <tr>
    <td background="img/blue1.jpg" align="left" class="peque">Ciudad</td>
    <td><input type="text" size="100" style="font-size:8pt;font-family:Arial;font-weight:bold;" name="cd" value="<? echo $a9;?>"></td>
  </tr>
  <tr>
    <td background="img/blue1.jpg" align="left" class="peque">Estado</td>
    <td><input type="text" size="100" style="font-size:8pt;font-family:Arial;font-weight:bold;" name="es" value="<? echo $b1;?>"></td>
  </tr>
  <tr>
    <td background="img/blue1.jpg" align="left" class="peque">Telefono(s):</td>
    <td><input type="text" size="100" style="font-size:8pt;font-family:Arial;font-weight:bold;" name="tels" value="<? echo $b2;?>"></td>
  </tr>
  <tr>
    <td background="img/blue1.jpg" align="left" class="peque">Fax:</td>
    <td><input type="text" size="100" style="font-size:8pt;font-family:Arial;font-weight:bold;" name="fx" value="<? echo $b3;?>"></td>
  </tr>
  <tr>
    <td background="img/blue1.jpg" align="left" class="peque">RFC:</td>
    <td><input type="text" size="100" style="font-size:8pt;font-family:Arial;font-weight:bold;" name="rfcs" value="<? echo $b4;?>"></td>
  </tr>
  <tr>
    <td background="img/blue1.jpg" align="left" class="peque">Email:</td>
    <td><input type="text" size="100" style="font-size:8pt;font-family:Arial;font-weight:bold;" name="em" value="<? echo $b5;?>"></td>
  </tr>
  <tr>
    <td background="img/blue1.jpg" align="left" class="peque">Comentarios:</td>
    <td><input type="text" size="100" style="font-size:8pt;font-family:Arial;font-weight:bold;" name="cmn" value="<? echo $b6;?>"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="Actualizar"><A class=main_navigation 
                  href="proveedores.php">Regresar</A></td>
  </tr>
</table>
</form>
		  </td>
		  </tr>		  
		  <tr bgcolor="#FFFFFF">
		  <td>
		  <hr align="center" color="#0033FF" width="100%" size="1px">
		  </td>
		  </tr>
      </table></td>
    </tr>
  </table>
</center></BODY>
</HTML>