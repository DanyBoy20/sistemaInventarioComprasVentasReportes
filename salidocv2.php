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
<!--
function desactivar(formulario) {	
	var res=confirm("Son correctos los datos introducidos?");
	if(res==true){
	formulario.botonDesactivar.disabled = true;	
	formulario.guardar.disabled = false;
    }else{
	formulario.botonDesactivar.disabled = false;	
	formulario.guardar.disabled = true;
	formulario.botonDesactivar.focus();
	}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' DEBE DE INSERTAR UN VALOR NUMERICO.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' DEBE SER VALOR NUMERICO ENTRE 0 Y 99 '+min+' Y '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += 'CAMPO VACIO '+nm+' .\n'; }
  } if (errors) alert('ERROR ... VEA LA SIGUIENTE NOTA:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>

<script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</HEAD>
<BODY background="img/fondo.gif" leftMargin=0 topMargin=0 marginwidth="0" marginheight="0" bottommargin="0" bgproperties="fixed" onLoad="javascript:popUp('equipment2.php')"><center>
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
			<table width="100%"  border="0">
  <tr>
    <td background="img/blue1.jpg" align="center">
	<? 
$dia = date ("d"); // dia en formato de dos digitos (ejemplo 01)
$mes = date ("F"); // mes en formato texto en ingles ( ejemplo January )
$nmes = date ("m"); // mes en formato de dos digitos con numeros ( ejemplo: 01  )
$year = date ("Y"); // fecha en formato de 4 digitos ( ejemplo 2007 )
$nyear = date ("y"); // fecha en formato de dos digitos ( ejemplo: 07 )
$vl="pendiente";
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

/* saco el ultimo valor de la tabla orden1 y le asigno el siguiente valor a este presupuesto */
$con=mssql_connect("SISTEMAS","","");
		  mssql_select_db("baseDatos");
		  $resul=mssql_query("SELECT idsalidaocv from salordncv1",$con);
$i=1;
while($f=mssql_fetch_array($resul)){
$a[$i]=$f["idsalidaocv"];
$i++;
}
rsort ($a);
$w=$a[0];
$w=$w+1;
mssql_close($con);
/*sort() valor minimo ... rsort() valor maximo*/
/*  realizo la asignacion del numero de orden con el siguiente formato: diamesaniocodigodist-numeroorden ejemplo:140606EAC-1 */ 
?>
	<?		
$idocv=$idocv;
	$conn=mssql_connect("SISTEMAS","","");
     mssql_select_db("baseDatos");
	/* selecciono LOS VALORES A LAS TABLAS CORRESPONDIENTES */ 
	$adquisicion1=mssql_query("SELECT idcompraventa,ncompraventa,diacv,mescv,aniocv,cve_distribuidor,statusordencv
							  FROM ordencv1 WHERE idcompraventa=$idocv",$conn);
	$reg1=mssql_fetch_array($adquisicion1);
	$regis1=$reg1["idcompraventa"];
	$regis2=$reg1["ncompraventa"];
	$regis3=$reg1["diacv"];
	$distri=$reg1["cve_distribuidor"];
	$regis4=$reg1["mescv"];
	$regis5=$reg1["aniocv"];
	$regis6=$reg1["statusordencv"];
	?>
	<SPAN class="navigation_heading">Datos Orden de Compra</SPAN>
	<?
	$conx=mssql_connect("SISTEMAS","","");
		  mssql_select_db("baseDatos");
		  $rest=mssql_query("SELECT cve_distribuidor,razon_social,nombre,apellido_p,
		               apellido_m,telefono,fax,ciudad,direccion,estado
		  		       FROM distribuidores WHERE cve_distribuidor=$distri",$conx);
	while($reg=mssql_fetch_row($rest)){
	$a1=$reg[0]; //clave distribuidor
	$a2=$reg[1]; // razon social
	$a3=$reg[2]; // nombre
	$a4=$reg[3]; // apellido paterno
	$a5=$reg[4]; // apellido materno
	$a6=$reg[5]; //telefono
	$a7=$reg[6]; // fax
	$a8=$reg[7]; // ciudad
	$a9=$reg[8]; // direccion
	$b1=$reg[9]; // estado
	}					   
    mssql_close($conexion);		  
	?>	</td>	
    </tr>
	<tr><td align="center">
	<table width="100%"  border="0">
  <tr>
    <td width="51%" align="left" class="main_text_bold">Orden de Compra: <? echo $regis2;?></td>
    <td width="19%">
	<a class=main_navigation target="_blank" href="verordncv.php?ursec=<? echo $cod;?>&ndn=<? echo $regis2;?>&idadq=<? echo $idocv;?>&secur=<? echo session_id();?>">
	Ver Orden Completa	</a>	</td>
    <td width="9%">&nbsp;</td>
    <td width="21%">&nbsp;</td>
  </tr>
  <tr>
    <td  class="main_text_bold" align="left">Fecha Orden de Compra: <? echo $regis3 . " / " . $regis4 . " / " . $regis5;?></td>
    <td>
	<A class=main_navigation 
    href="prevconsul.php?ursec=<? echo $cod;?>&secur=<? echo session_id();?>" target="_blank">
	Inventario	</A>	</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td  class="main_text_bold" align="left">Estatus Orden de Compra: <? echo $regis6;?></td>
    <td><A class=main_navigation 
    href="foliosalida.php?ursec=<? echo $cod;?>&ndn=<? echo $w;?>&secur=<? echo session_id();?>" target="_blank">
	Imprimir Recibo
	</A></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
	<?
	$adquisicion2=mssql_query("SELECT idproduct,linea,descripcion,cantidadcv,cantentregacv
                                 FROM (inventa1 INNER JOIN ordencv2 ON inventa1.cod=ordencv2.cod)
                                 WHERE idcompraventa=$idocv",$conn);								 
	echo "<table width='100%' border='1'>
    <tr class='peque'>
	<td align='center' background='img/blue1.jpg'>Item</td>
	<td align='center' background='img/blue1.jpg'>Descripcion</td>
    <td align='center' background='img/blue1.jpg'>Ordenada</td>
    <td align='center' background='img/blue1.jpg'>Recibida</td></tr>";
	$a=1;
    while($st=mssql_fetch_array($adquisicion2)){	
	$dp1=$st["idproduct"];
	$dp2=$st["linea"];
	$dp3=$st["descripcion"];
	$dp4=$st["cantidadcv"];
	$dp5=$st["cantentregacv"];
	echo "<tr>
    <td style='font-size:.75em;' align='center'>" . $a . "</td>
	<td style='font-size:.75em;'>$dp1 - $dp2 - $dp3</td>
	<td style='font-size:.75em;' align='center'>" . $dp4 . "</td>
	<td style='font-size:.75em;' align='center'>" . $dp5 . "</td>
    </tr>";
	$a++;
	}	
	mssql_close($conn);
	echo "</table>";
	?>			
	</td>
	</tr>
	<tr>
	<td align="center">	
	
		<form name="formulario" method="post" action="salidocv7.php">
<table border="1" width="100%" class="small_text">
<tr><td colspan="3"><hr align="center" color="#0033FF" width="100%" size="1px"></td></tr>
<tr>
	<td colspan="3" align="center" background="img/blue1.jpg"><SPAN class="navigation_heading">No. Salida</SPAN></td>
	</tr>
<tr>
	<td width="94" align="right">EA-CT-YY-MES</td>
	<td width="574" colspan="2">
	Numero de control:
	<input name='ncntrl' type='text' onBlur="MM_validateForm('ncntrl','','RisNum');return document.MM_returnValue" size="5" maxlength="2">
	A&ntilde;o:
	<select name='yer' style="font-size:.90em;">
	<option value='07' selected>2007</option>
	<option value='08'>2008</option>
	</select>
	Mes:
	<select name='mnth' style="font-size:.90em;">
      <option value='ENE'>ENERO</option>
      <option value='FEB'>FEBRERO</option>
      <option value='MAR'>MARZO</option>
      <option value='ABR'>ABRIL</option>
      <option value='MAY'>MAYO</option>
      <option value='JUN'>JUNIO</option>
      <option value='JUL' selected>JULIO</option>
      <option value='AGO'>AGOSTO</option>
      <option value='SEP'>SEPTIEMBRE</option>
      <option value='OCT'>OCTUBRE</option>
      <option value='NOV'>NOVIEMBRE</option>
      <option value='DIC'>DICIEMBRE</option>
    </select></td>
</tr>
<tr>
	<td colspan="3" align="center" background="img/blue1.jpg"><SPAN class="navigation_heading">Distribuidor</SPAN></td>
	</tr>
	<tr>
	<td width="574" colspan="3"><SPAN class="navigation_heading"></SPAN><? echo $a2; ?></td>
</tr>
	<tr>
	<td colspan="3" align="center" background="img/blue1.jpg"><SPAN class="navigation_heading">Direccion de Entrega</SPAN></td>
	</tr>    
<tr>
	<td width="94" align="right">Fecha Real de entrega: </td>
	<td width="574" colspan="2">
    <select name='dayreal' style="font-size:.90em;">
    <option value='<? echo $dia;?>' selected><? echo $dia;?></option>
	<option value='01'>1</option>
	<option value='02'>2</option>
    <option value='03'>3</option>
    <option value='04'>4</option>
    <option value='05'>5</option>
    <option value='06'>6</option>
    <option value='07'>7</option>
    <option value='08'>8</option>
    <option value='09'>9</option>
    <option value='10'>10</option>
    <option value='11'>11</option>
    <option value='12'>12</option>
    <option value='13'>13</option>
    <option value='14'>14</option>
    <option value='15'>15</option>
    <option value='16'>16</option>
    <option value='17'>17</option>
    <option value='18'>18</option>
    <option value='19'>19</option>
    <option value='20'>20</option>
    <option value='21'>21</option>
    <option value='22'>22</option>
    <option value='23'>23</option>
    <option value='24'>24</option>
    <option value='25'>25</option>
    <option value='26'>26</option>
    <option value='27'>27</option>
    <option value='28'>28</option>
    <option value='29'>29</option>
    <option value='30'>30</option>
    <option value='31'>31</option>
	</select>
    &nbsp; / &nbsp;
    <select name='mesreal' style="font-size:.90em;">
    <option value='<? echo $nmes;?>' selected><? echo $nmes;?></option>
	<option value='01'>Enero</option>
	<option value='02'>Febrero</option>
    <option value='03'>Marzo</option>
    <option value='04'>Abril</option>
    <option value='05'>Mayo</option>
    <option value='06'>Junio</option>
    <option value='07'>Julio</option>
    <option value='08'>Agosto</option>
    <option value='09'>Septiembre</option>
    <option value='10'>Octubre</option>
    <option value='11'>Noviembre</option>
    <option value='12'>Diciembre</option>
    </select>
    &nbsp; / &nbsp;
    <select name='anioreal' style="font-size:.90em;">
    <option value='<? echo $year;?>' selected><? echo $year;?></option>
	<option value='2007' selected>2007</option>
	<option value='2008'>2008</option>
	</select>
    </td>
</tr>
	<tr>
	<td width="94" align="right">Transporte: </td>
	<td width="574" colspan="2">
	<select name="trnsprt" style="font-size:.90em;">
     <?
$conn=mssql_connect("SISTEMAS","","");
mssql_select_db("airenergy",$conn);

$trns=mssql_query("SELECT idtransporte,razonsocialtrns FROM proveedores WHERE tipoproveedor='Transporte de Carga'",$conn);
while($tr=mssql_fetch_array($trns)){
$idtr1=$tr["idtransporte"];
$idtr2=$tr["razonsocialtrns"];
echo "<option value=" . $idtr1 . ">" . $idtr2;
}
mssql_close($conn);
?>
   </select></td>
</tr>

<tr>
	<td width="94" align="right">Carta Porte: </td>
	<td width="574" colspan="2"><input type="text" name="cpor" size="20"></td>
</tr>
<tr>
	<td width="94" align="right">Direccion: </td>
	<td width="574" colspan="2"><input type="text" name="dirent" size="100" value="<? echo $a9;?>"></td>
</tr>
<tr>
	<td width="94" align="right">Ciudad: </td>
	<td width="574" colspan="2"><input type="text" name="ciudadent" size="100" value="<? echo $a8;?>"></td>
</tr>
<tr>
	<td width="94" align="right">Estado: </td>
	<td width="574" colspan="2"><input type="text" name="estadoent" size="100" value="<? echo $b1;?>"></td>
</tr>
<tr>
	<td width="94" align="right">Entregado a:</td>
	<td width="574" colspan="2"><input type="text" name="entregaa" size="100" value="<? echo $a3 . " " . $a4 . " " . $a5;?>"></td>
</tr>
<tr>
	<td width="94" align="right">Recibido por:</td>
	<td width="574" colspan="2"><input type="text" name="recibidox" size="100" value="<? echo $a3 . " " . $a4 . " " . $a5;?>"></td>
</tr>
<tr>
	<td colspan="3" align="center" background="img/blue1.jpg"><SPAN class="navigation_heading">Datos Facturacion</SPAN></td>
	</tr>
	<tr>
	<td width="94" align="right">Razon Social :</td>
	<td width="574" colspan="2"><input type="text" name="nom" size="100" value="<? echo $a3 . " " . $a4 . " " . $a5;?>"></td>
</tr>
<tr>
	<td width="94" align="right">R.F.C. : </td>
	<td width="574" colspan="2"><input type="text" name="rfcfactura" size="100"></td>
</tr>
<tr>
	<td width="94" align="right">Direccion:</td>
	<td width="574" colspan="2"><input type="text" name="dirfactura" size="100" value="<? echo $a9;?>"></td>
</tr>
<tr>
	<td width="94" align="right">Ciudad:</td>
	<td width="574" colspan="2"><input type="text" name="ciudadfactura" size="100" value="<? echo $a8;?>"></td>
</tr>
<tr>
	<td width="94" align="right">Estado:</td>
	<td width="574" colspan="2"><input type="text" name="estadofactura" size="100" value="<? echo $b1;?>"></td>
</tr>
<tr>
	<td width="94" align="right">No. Factura: </td>
	<td width="574" colspan="2"><input type="text" name="numerofact" size="100"></td>
</tr>
<tr>
	<td width="94" align="right">Comentarios: </td>
	<td width="574" colspan="2"><input type="text" name="comenta" size="100"></td>
</tr>
<tr>
	<td colspan="3" align="center" background="img/blue1.jpg"><SPAN class="navigation_heading">Equipo a enviar</SPAN></td>
	</tr>
<tr> 
 <td width="94" align="right">Producto:</td>
 <td valign="middle" colspan="2"> 

<select name="cproc" style="width:95%; font-size:.85em;">
<?
		$cn=mssql_connect("SISTEMAS","","");
        mssql_select_db("airenergy",$cn);
		$rsl=mssql_query("SELECT idproduct,linea,descripcion
                          FROM (inventa1 INNER JOIN ordencv2 ON inventa1.cod=ordencv2.cod)
                          WHERE idcompraventa=$idocv AND diferente <> 0 ORDER BY linea",$cn);
		while($linea=mssql_fetch_array($rsl)){
		$f2=$linea["idproduct"];
		$f3=$linea["linea"];
		$f4=$linea["descripcion"];		
		echo "<option value=$f2>$f2  -  $f3-$f4</option>";
		}
		mssql_close($cn);	
?>		
</select></td>
</tr>
<tr>
    <td width="94" align="right">Cantidad:</td>
	<td width="574" colspan="2"><input type="text" name="canti" width="40">	  &nbsp;
	<!-- Pedimento:<input type="text" name="pedi"> -->	</td>
 </tr> 
 <tr>
	<td width="94" align="right">No.de Serie(s):</td>
	<td width="574" colspan="2"><font class="peque2">&nbsp;Formato:XX00/XX11<br></font><textarea name="serie" rows="5" cols="50"></textarea></td>
</tr>
 <tr> 
 <td colspan="3" align="center">
 	<input type="hidden" name="idadq" value="<? echo $idadq;?>">
	<input type="hidden" name="idocv" value="<? echo $idocv;?>">
	<input type="hidden" name="code" value="<? echo $w;?>">	
    <input type="hidden" name="mes" value="<? echo $mese;?>">
	<input type="hidden" name="nmes" value="<? echo $nmes;?>">
	<input type="hidden" name="year" value="<? echo $year;?>">
	<input type="hidden" name="nyear" value="<? echo $nyear;?>">
	<input type="hidden" name="dia" value="<? echo $dia;?>">
	<input type="hidden" name="dist" value="<? echo $a1;?>">
	<input type="hidden" name="disponible" value="No registrado">
 <input type="button" name="botonDesactivar" value="Verificar Datos" onClick="desactivar(this.form)"> 
<input type="submit" name="guardar" value="Insertar Producto" disabled>  </td>
 </tr>
</table>
  </form>	</td>
	</tr>
</table>
			</td>
          </tr>
      </table></td>
    </tr>
  </table>
</center></BODY>
</HTML>