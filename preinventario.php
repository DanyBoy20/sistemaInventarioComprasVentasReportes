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

if (IE) alert('Energia Ambiental de M�xico S.A. de C.V.');
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
 var texto="   >>>Energia Ambiental de M�xico S.A. de C.V.  ::: No m�s cloro, no m�s calderas!!! Bombas de calor Air Energy: Calienta tu piscina, no quemes tu dinero   ::: <<<   "
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
<script language="javascript">
function desactivar(formulario) {	
	formulario.botonDesactivar.disabled = true;	
	formulario.enviar.disabled = false;
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
                  <td colspan="2" background="../img/blue.png" class="small_text1">Hola Claudia</td>
                </tr>
                            <tr>
                  <td colspan="2">
				  <table width="100%"  border="0">
  <tr>
    <td background="img/blue1.jpg" align="center">
	<? 
$dia = date ("d"); // texto en formato de dos digitos (ejemplo 01)
$mes = date ("F"); // mes en formato texto en ingles ( ejemplo January )
$nmes = date ("m"); // mes en formato de dos digitos con numeros ( ejemplo: 01  )
$year = date ("Y"); // fecha en formato de 4 digitos ( ejemplo 2007 )
$nyear = date ("y"); // fecha en formato de dos digitos ( ejemplo: 07 )
$disponible="si";
function meses(){
global $me;
global $mes;
if($mes=="January"){
$me="Enero";
}else if($mes=="February"){
$me="Febrero";
}else if($mes=="March"){
$me="Marzo";
}else if($mes=="April"){
$me="Abril";
}else  if($mes=="May"){
$me="Mayo";
}else if($mes=="June"){
$me="Junio";
}else if($mes=="July"){
$me="Julio";
}else if($mes=="August"){
$me="Agosto";
}else if($mes=="September"){
$me="Septiembre";
}else if($mes=="October"){
$me="Octubre";
}else if($mes=="November"){
$me="Noviembre";
}else{
$me="Diciembre";
}
return $me;
}
meses();
$mese=$me;
?>
	<SPAN class="navigation_heading">Ingreso de productos en Almacen D.F. (productos ya existentes en almacen 2006)</SPAN></td>
    </tr>
	<tr>
	<td align="center">
<form name="formulario" method="post" action="preinventario2.php">
<table border="1" class="small_text1" width="761">
 <tr align="right"> 
 <td width="168" colspan="2" align="right"><? echo $dia;?> de <? echo $mese;?> del <? echo $year;?></td>
</tr>
<tr> 
 <td width="168" align="right">Producto:</td>
 <td width="531" valign="middle"> 
 <input type="text" name="cproc">
 </td>
</tr>
<tr> 
 <td width="168" align="right">Cantidad:</td>
 <td width="531" valign="middle"> 
 <input type="text" name="canti" width="50"> 
 
 </td>
</tr>
<tr> 
 <td width="168" align="right">No. de serie :</td>
 <td width="531" valign="middle"> 
<textarea name="serie" rows="5" cols="50"></textarea>
</td>
</tr>
<tr> 
 <td width="168" align="right">Condiciones Producto:</td>
 <td width="531" valign="middle"> 
<select name="esta">
    <option value="Optimo">Nuevo</option>	
	<option value="Maltratado">Da&ntilde;ado</option> 
</select>
</td>
</tr>
<tr> 
 <td width="168" align="right">No. Pedimento :</td>
 <td width="531" valign="middle"> 
 <input type="text" name="pedi">  Tipo de entrada: <select name="tipoentra">
    <option value="directa">Directa</option>	  
</select>
Ubicacion:
<select name="ubica">
    <option value="MDF">Mexico, D.F.</option>  
	<option value="GDL">Guadalajara</option>  
	<option value="MTY">Monterrey</option>	  
</select>
 </td>
</tr>

<tr> 
 <td width="168" align="right">Comentarios:</td>
 <td width="531" valign="middle"> 
 <input type="text" name="comenta" size="50" value="equipo en inventario desde el 2006">
 <input type="hidden" name="ndia" value=<? echo $dia;?>>
<input type="hidden" name="nmes" value=<? echo $nmes;?>>
<input type="hidden" name="mmes" value=<? echo $mese;?>>
<input type="hidden" name="nanio" value=<? echo $nyear;?>>
<input type="hidden" name="aniocom" value=<? echo $year;?>>
<input type="hidden" name="disponible" value=<? echo $disponible;?>>
</td>
</tr>
<tr> 
 <td colspan="2"><hr align="center" color="#0033FF" width="100%" size="1px"></td>
 </tr>
 <tr> 
 <td colspan="2" align="center"> 
<input type="button" name="botonDesactivar" value="Verificar Datos" onClick="desactivar(this.form)">
<input type="submit" name="enviar" value="Guardar" disabled>
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
     </td>
    </tr>
  </table>
</center></BODY>
</HTML>