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
function envia(formu){
formu.submit();
}
</script>
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

<script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</HEAD>
<BODY background="img/fondo.gif" leftMargin=0 topMargin=0 marginwidth="0" marginheight="0" bottommargin="0" bgproperties="fixed"><center>
  <table width="804" height="336" align="center" cellpadding="0" cellspacing="0" class="bordet">
    <tr>
      <td height="134">
          <div align="center">
            <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0','width','800','height','134','src','img/TRANS','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','img/TRANS' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="800" height="134">
              <param name="movie" value="img/TRANS.swf">
              <param name="quality" value="high">
              <embed src="img/TRANS.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="800" height="134"></embed>
            </object></noscript>
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
      </table>
	  </td>
    </tr>
	<tr><td>
	<table width="100%"  border="0" bgcolor="#FFFFFF">
  <tr>
    <td width="33%">&nbsp;</td>
    <td width="35%" align="center" background="img/blue1.jpg" class="small_text1">Ordenes de Compra</td>
    <td width="32%">&nbsp;</td>
  </tr>
</table>
	</td></tr>
	<tr><td bgcolor="#FFFFFF">
	<form name="busc" method="post" action="modificaocvz.php">
		  <table width="100%"  border="1" bgcolor="#FFFFFF">		  
  <tr valign="middle">
    <td align="center" background="img/blue.png" class="small_text1">&nbsp;</td>
	<td align="center" background="img/blue.png" class="small_text1">No. de Orden</td>
    <td align="center" background="img/blue.png" class="small_text1">Ref. Distribuidor</td>
	<td align="center" background="img/blue.png" class="small_text1">Distribuidor</td>
	<td align="center" background="img/blue.png" class="small_text1">Status orden</td>
	<td align="center" background="img/blue.png" class="small_text1">Fecha Orden</td>
	</tr>   
        <?
	$cne=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
    $reso=mssql_query("SELECT idcompraventa,ncompraventa,diacv,mescv,aniocv,norefdist,statusordencv,razon_social 
                       FROM (ordencv1 inner join distribuidores on ordencv1.cve_distribuidor = distribuidores.cve_distribuidor)
                       WHERE statusordencv = 'Cancelada' ORDER BY idcompraventa",$cne);
	
	while($fia=mssql_fetch_array($reso)){
	$b1=$fia["idcompraventa"];	
	$b2=$fia["ncompraventa"];
	$b3=$fia["diacv"];	
	$b4=$fia["mescv"];
	$b5=$fia["aniocv"];	
	$refd=$fia["norefdist"];
	$b6=$fia["statusordencv"];
	$b7=$fia["razon_social"];
	echo "<tr><td class='peque2' align='center'>
		  <input type='hidden' name='id' value='$administra'>
		  <input type='hidden' name='id2' value='session_id()'>
		  <input type='hidden' name='nord' value='$b2'>
		  <input type='radio' name='idocv' value='$b1' onClick='envia(this.form)'>&nbsp;</td>
		  <td class='peque2' align='center'>$b2</td>
		  <td class='peque2' align='center'>&nbsp;$refd</td>
		  <td class='peque2' align='left'>$b7</td>
		  <td class='peque2' align='center'>$b6</td>
		  <td class='peque2' align='center'>$b3/$b4/$b5</td>
		  </tr>";
	
    }	
mssql_close($cne);	
?>      
</table></form>
	</td></tr>
  </table>
</center></BODY>
</HTML>
