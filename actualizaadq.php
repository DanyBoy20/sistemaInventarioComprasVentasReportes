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
<SCRIPT LANGUAGE="JavaScript">
function envia(formulario){
document.formulario.agrega.disabled = true;
document.formulario.cancela.disabled = true;
document.formulario.action="guardaadq1.php";
document.formulario.submit();
document.formulario.enviar.disabled = true;
document.formulario.imprime.disabled = true;
document.formulario.cproc.disabled = true;
document.formulario.unitario.disabled = true;
}
</script>
<SCRIPT LANGUAGE="JavaScript">
function envias(formulario){
document.formulario.agrega.disabled = true;
document.formulario.cancela.disabled = true;
document.formulario.action="eadq.php";
document.formulario.submit();
document.formulario.enviar.disabled = true;
document.formulario.cproc.disabled = true;
document.formulario.unitario.disabled = true;
document.formulario.imprime.disabled = true;
}
</script>
<script language="javascript">
function desactivarbtns(formulario) {	
	formulario.agrega.disabled = false;	
	formulario.enviar.disabled = false;
	formulario.imprime.disabled = false;
	formulario.cancela.disabled = false;
}
</script>
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
    <tr>
      <td height="123" valign="top">
        <table width="100%"  border="0" bgcolor="#FFFFFF">
          <tr>
            <td width="67%" valign="top">
              <table width="100%"  border="0" bgcolor="#FFFFFF">
          <tr>
            <td width="67%" valign="top">
              <table width="100%"  border="0">
                <tr>
                  <td align="center" colspan="2" background="../img/blue.png" class="small_text1">
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
	$cargo=$fila["cargo"];
	$c5=$fila["pw"];	
	$c6=$fila["foto"];		
	$puntoventa=$fila["puntoventa"];		
	$cdg=$fila["cdg"];	
mssql_close($conexion);
?>
Usuario: <? echo $c2; ?>&nbsp;<? echo $c3; ?>&nbsp;<? echo $c4; ?>&nbsp;-&nbsp;<? echo $cargo; ?>&nbsp;-&nbsp;<? echo $puntoventa; ?>
<?
	$dia="01";
	$mes="02";
	$mss="Febrero";
	$anio="07";
	$aniocm="2007";
	$orden=1;
	$orden2=$orden2;
	$nordn="EA-OA010207-1";
	$nordn2=$codorden2;
	$den=$diaenv;
	$menv=$mesenv;
	$anenv=$anioenv;
	$fpg=$fpago;
	$consdra=$cndra;
	$ftrs=$ftrans;
	$trns=$trnsprt;
	$fpgotrs=$fpagotrns;
	$diaent=$diaent;
	$mesent=$mesent;
	$anioent=$anioent;
	$revson=$rev;
	$comt=$comenta;
	$cproc=$cproc;
	$canti=$canti;	
	$status="Pendiente";	
	$fechaadq="$ndia/$mes/$aniocm";
	$fechaenv="$den/$menv/$anenv";
	$fchdsent="$diaent/$mesent/$anioent";
	$calle=$calle;
	$numero=$numero;
	$colonia=$colonia;
	$codpst=$codpst;
	$ciuda=$ciuda;
	$estado=$estado;
	$rfc="EAM-020710-G93";
	?>
</td>
                </tr>
				<tr><td colspan="2">
				<A class=main_navigation 
                  href="claudia.php">Inicio</A>
				</td></tr>
<tr><td colspan="2">
<a class=main_navigation target="_blank" href="veradqui.php?ursec=<? echo $cod;?>&ndn=<? echo $nordn;?>&idadq=<? echo $orden;?>&secur=<? echo session_id();?>">
Ver Orden Completa
</a>
</td></tr>
				<tr><td colspan="2">
				<hr align="center" color="#0033FF" width="100%" size="1px">
				</td></tr>
				<tr>
                  <td colspan="2">
				  <table width="100%"  border="0">
  <tr>
    <td background="img/blue1.jpg" align="left">
	
	
	
<SPAN class="navigation_heading">Orden de Adquisicion No. <? echo $codorden;?>
&nbsp;
</SPAN>
	</td>
    </tr>
	<tr>
	<td align="center">	
		<form name="formulario" method="post" action="">
		<table width="auto">
  <tr class='peque'>
    <td width="50" align='center' background='img/blue1.jpg'>Cantidad</td>
    <td width="601" align='center' background='img/blue1.jpg'>Descripcion</td>
    <td width="75" align='center' background='img/blue1.jpg'>Precio Unitario</td>
  </tr>
  <tr>
    <td class="small_text1" align="center"><input type="text" name="canti" value=1></td>
<td align="center">
<select name="cproc" style="width:100%; font-size:.75em;">	
	<?
    $cxnn=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	$result=mssql_query("SELECT cod,idproduct,linea,descripcion FROM inventa1",$cxnn);
	$registro=mssql_fetch_array($result);
	$cprod=$registro["cod"];
	$ccprod=$registro["idproduct"];
	$linea=$registro["linea"];
	$descrp=$registro["descripcion"];
	echo "<option value='$cprod'>$ccprod - $linea - $descrp</option>";
	mssql_close($cxnn);
    ?>
</select>
</td>
    <td align="center">	
	<!--
	<SCRIPT LANGUAGE="javascript">
        function valida(obj,bajo,alto){
        if((obj.value<bajo) || (obj.value>alto)){
        alert("                     VALOR NO VALIDO !!! \n\nEl precio debe de coincidir con su lista de precios \n\n    EAM \n          � 2000-2006 All Rights Reserved \n               www.airenergy-mexico.com \n                        01 800 300-1580");
		obj.value="<? /*echo $pdist;*/?>";
        obj.focus();
        }
        }
        </SCRIPT>
		
<input type="text" name="unitario" maxlength="5" size="5" value="<? /*echo $pdist;*/?>" onBlur="valida(this,<?/* echo $pdist;*/?>,<?/* echo $pdist;*/?>)"></td>
-->
<input type="text" name="unitario" maxlength="5" size="5" value="" onFocus="JavaScript:alert('           \nEl precio a introducir debera coincidir\n      con el precio de lista')" onBlur="desactivarbtns(this.form)"></td>
</tr>
<tr>
<td colspan="3" align="center">	
	<input type="hidden" name="orden" value="<? echo $orden;?>">	
	<input type="hidden" name="nordn" value="<? echo $nordn;?>">
	<input type="submit" name="agrega" value="Agregar Producto a Orden" onclick="this.form.action='2.php'" disabled>
	<input type="button" name="enviar" value="Guardar" onClick="envia(this.form)" disabled>
	<input type="button" name="imprime" value="Guardar en PC" onclick="envias(this.form)" disabled>
	<input type="submit" name="cancela" value="Cancelar Orden" onclick="this.form.action='cancadq.php'">
	</td>
  </tr>
</table>
</form>
	</td>
	</tr>
</table>
				  </td>
                </tr>
            </table></td>
          </tr>
      </table>
			
			</td>
          </tr>
      </table></td>
    </tr>
   
  </table>
</center></BODY>
</HTML>