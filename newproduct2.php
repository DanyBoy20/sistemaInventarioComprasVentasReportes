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
<script language="javascript">
function desactivar(formulario) {	
	formulario.botonDesactivar.disabled = true;	
	formulario.enviar.disabled = false;
}
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
<script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</HEAD>
<BODY background="img/fondo.gif" leftMargin=0 topMargin=0 marginwidth="0" marginheight="0" bottommargin="0" bgproperties="fixed"><center>
  <table width="804" height="307" align="center" cellpadding="0" cellspacing="0" class="bordet">
    <tr>
      <td height="123" valign="top" bgcolor="#FFFFFF">
<table width="100%"  border="0">
  <tr>
    <td background="img/blue1.jpg" align="center">
	<? 
$dia = date ("d"); // formato de dos digitos (ejemplo 01)
$mes = date ("F"); // mes en formato texto en ingles ( ejemplo January )
$nmes = date ("m"); // mes en formato de dos digitos con numeros ( ejemplo: 01  )
$year = date ("Y"); // fecha en formato de 4 digitos ( ejemplo 2007 )
$nyear = date ("y"); // fecha en formato de dos digitos ( ejemplo: 07 )
$fechaing="$dia/$nmes/$year";
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
	<SPAN class="navigation_heading">INGRESO NUEVOS PRODUCTOS A BASE DE DATOS</SPAN></td>
    </tr>
	<tr>
	<td align="center">
<form name="formulario" method="post" action="insertprd.php">
<table border="1" class="small_text1" width="789">
 <tr align="right"> 
 <td colspan="2" align="right"><? echo $dia;?> de <? echo $mese;?> del <? echo $year;?></td>
</tr>
<tr> 
 <td colspan="2" background="img/blue1.jpg" align="center">
<?
 $con=mssql_connect("SISTEMAS","","");
		  mssql_select_db("baseDatos");
		  $resul=mssql_query("SELECT cod from inventa1",$con);
$i=1;
while($f=mssql_fetch_array($resul)){
$a[$i]=$f["cod"];
$i++;
}
rsort ($a);
$w=$a[0];
$w=$w+1;
mssql_close($con);
 ?> 
Datos Generales</td>
</tr>
<tr> 
 <td width="105" align="right">Clave  Producto:</td>
 <td width="640" valign="middle"> 
 <input type="text" name="cproc">&nbsp;Tipo:&nbsp; 
 <select name="tipo">
 <option value="FG" selected>Equipo</option>
 <option value="Parts">Refaccion</option>
 <option value="ACC">Accesorio</option>
 </select>
 &nbsp;Linea:&nbsp; 
 <select name="linea">
 <option value="Adornos Fuentes y Cascadas">Adornos Fuentes y Cascadas</option>
 <option value="Automatizacion">Automatizacion</option>
 <option value="Bombas de agua">Bombas de agua</option>
  <option value="Bombas de Calor">Bombas de Calor</option>
 <option value="Calderas" selected>Calderas</option>
 <option value="Filtros">Filtros</option>
  <option value="Generador de Cloro">Generador de Cloro</option>
 <option value="Limpiadores de fondo">Limpiadores de fondo</option>
 <option value="Luces">Luces</option>
 <option value="Motor Actuador de Valvulas">Motor Actuador de Valvulas</option>
 <option value="Valvulas">Valvulas</option>
 </select> </td>
</tr>
<tr> 
 <td width="105" align="right">Descripcion:</td>
 <td width="640" valign="middle"> 
 <input type="text" name="descripcion" size="50">Notas:<input type="text" name="notas" size="40" value="notes">  </td>
</tr>
<tr> 
 <td colspan="2" background="img/blue1.jpg" align="center">Precios (en dolares)</td>
</tr>
<tr> 
 <td colspan="2" align="center">
 <table width="100%" border="1" class="small_text1">
  <tr>
    <td background="img/blue.png" align="right">USA:</td>
    <td><input name="pusa" type="text" id="pusa" onBlur="MM_validateForm('pusa','','RisNum');return document.MM_returnValue" size="8" maxlength="8"></td>
    <td background="img/blue.png" align="right">Energia Ambiental:</td>
    <td><input name="pea" type="text" id="pea" onBlur="MM_validateForm('pea','','RisNum');return document.MM_returnValue" size="8" maxlength="8"></td>
    <td background="img/blue.png" align="right">Mayoristas</td>
    <td><input name="pma" type="text" id="pma" onBlur="MM_validateForm('pma','','RisNum');return document.MM_returnValue" size="8" maxlength="8"></td>
    <td background="img/blue.png" align="right">Swimquip</td>
    <td><input name="pswm" type="text" id="pswm" onBlur="MM_validateForm('pswm','','RisNum');return document.MM_returnValue" size="8" maxlength="8"></td>
    <td background="img/blue.png" align="right">Spin</td>
    <td><input name="pspn" type="text" id="pspn" onBlur="MM_validateForm('pspn','','RisNum');return document.MM_returnValue" size="8" maxlength="8"></td>
    <td background="img/blue.png" align="right">Estatal:</td>
    <td><input name="psta" type="text" id="psta" onBlur="MM_validateForm('psta','','RisNum');return document.MM_returnValue" size="8" maxlength="8"></td>
  </tr>
  <tr>
    <td background="img/blue.png" align="right">Guadalajara:</td>
    <td><input name="pgdl" type="text" id="pgdl" onBlur="MM_validateForm('pgdl','','RisNum');return document.MM_returnValue" size="8" maxlength="8"></td>
    <td background="img/blue.png" align="right">Monterrey:</td>
    <td><input name="pmty" type="text" id="pmty" onBlur="MM_validateForm('pmty','','RisNum');return document.MM_returnValue" size="8" maxlength="8"></td>
    <td background="img/blue.png" align="right">Regional:</td>
    <td><input name="preg" type="text" id="preg" onBlur="MM_validateForm('preg','','RisNum');return document.MM_returnValue" size="8" maxlength="8"></td>
    <td background="img/blue.png" align="right">General:</td>
    <td><input name="pgen" type="text" id="pgen" onBlur="MM_validateForm('pgen','','RisNum');return document.MM_returnValue" size="8" maxlength="8"></td>
    <td background="img/blue.png" align="right">Publico Min.:</td>
    <td><input name="ppubmn" type="text" id="ppubmn" onBlur="MM_validateForm('ppubmn','','RisNum');return document.MM_returnValue" size="8" maxlength="8"></td>
    <td background="img/blue.png" align="right">Publico Sug.:</td>
    <td><input name="maximo" type="text" id="maximo" onBlur="MM_validateForm('maximo','','RisNum');return document.MM_returnValue" size="8" maxlength="8"></td>
  </tr>
</table> </td> 
</tr>
<tr> 
 <td colspan="2"><hr align="center" color="#0033FF" width="100%" size="1px"></td>
 </tr>
 <tr> 
 <td colspan="2" align="center">
 <input type="hidden" name="idp" value="<? echo $w;?>"> 
 <input type="hidden" name="existe" value=0>
 <input type="hidden" name="facgen" value=.737>
 <input type="hidden" name="facmay" value=0.595>
 <input type="hidden" name="facreg" value=0.695>
 <input type="hidden" name="facest" value=0.656>
 <input type="hidden" name="facea" value=0.467>
 <input type="hidden" name="facpmin" value=0.9365>
 <input type="hidden" name="facpmx" value=1.093>
 <input type="hidden" name="aument" value=0>
 <input type="hidden" name="nprecusa" value=0>
  <input type="hidden" name="usuario" value="<? echo $cod;?>">
<input type="button" name="botonDesactivar" value="Verificar Datos" onClick="desactivar(this.form)">
<input type="submit" name="enviar" value="Guardar" disabled>  </td>
 </tr>
</table>
 
  </form>
	</td>
	</tr>
</table></td>
          </tr>
     </tr>
  </table>
</center></BODY>
</HTML>