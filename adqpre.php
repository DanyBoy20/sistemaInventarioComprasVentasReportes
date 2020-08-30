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
function vali(form)
{
	valor = parseInt(form.oped.value, 10); //convierte cadenas de texto a  n�meros en el sistema num�rico que le digamos
	if (isNaN(valor))    //el m�todo "isNaN" comprueba si el valor No es un n�mero
	{
		alert ("Deben de ser datos numericos");
		form.oped.value="";  //borra lo escrito en el campo edad
		form.oped.focus();    //nos coloca en el campo edad para escribir
		return false;
	}
	else
		return true;
}
</script>
<script language="javascript">
function desactivar(formulario) {	
	formulario.botonDesactivar.disabled = true;	
	formulario.enviar.disabled = false;
}

function desactivar(formulario) {	
	var res=confirm("Son correctos los datos introducidos?");
	if(res==true){
	formulario.botonDesactivar.disabled = true;	
	formulario.enviar.disabled = false;
    }else{
	formulario.botonDesactivar.disabled = false;	
	formulario.enviar.disabled = true;
	formulario.botonDesactivar.focus();
	}
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
<SCRIPT LANGUAGE="javascript">
<!--
function valida1(obj,bajo,alto){
if((obj.value<bajo) || (obj.value>alto)){
alert("La cantidad debe ser mayor que 0");
obj.focus();
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
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' campo requerido.\n'; }
  } if (errors) alert('Atencion  Error:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
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
                  <td colspan="2" background="../img/blue.png" class="small_text1">Menu Principal Gerente de Produccion</td>
                </tr>
                 <tr>
                  <td width="20%" colspan="2"><A class=main_navigation 
                  href="nada2.php">Inicio</A>
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
mssql_close($conexion);
?>
                  </td>                  
				<tr>
				<td colspan="2" align="center">
				<table width="100%"  border="1">
  <tr>
    <td width="35%" align="center"  background="img/blue1.jpg"><A class=main_navigation href="verordenesadq.php">PENDIENTES</A></td>
    <td width="30%" align="center" background="img/blue1.jpg"><A class=main_navigation href="adqrecib.php">RECIBIDAS</A></td>
    <td width="35%" align="center" background="img/blue1.jpg"><A class=main_navigation href="canceadq.php">CANCELADAS</A></td>
  </tr>
</table>

				</td>				
				</tr>
				<tr>
				<td colspan="2">
				<hr align="center" color="#0033FF" width="100%" size="1px">
				</td>				
				</tr>
				<tr>
                  <td colspan="2">
				  <table width="100%"  border="0">
  <tr>
    <td background="img/blue.png" align="center">	
	<SPAN class="navigation_heading">Nueva Orden de Adquisicion<br>No. <? echo $codorden;?></SPAN>
	</td>
    </tr>
	<tr>
	<td align="center">
<form name="formulario" method="post" action="adq2.php">
<table border="1" class="small_text1" width="100%">
 <tr align="right"> 
 <td colspan="2" align="left"><? echo $ndia;?> de <? echo $mmes;?> del <? echo $aniocom;?>
 
 
 
 
 
 
 
  
  
  
 
 
** Campos Obligatorios
 </td>
</tr>
<tr> 
 <td width="223" align="right" background="img/blue.png">** Fecha de envio(embarque):</td>
 <td width="522" valign="middle"> 
 <select name="diaenv">
 	<option value='<? echo $diaenv;?>' selected><? echo $diaenv;?></option>
    <option value=01>1</option>	
	<option value=02>2</option>  
	<option value=03>3</option> 
	<option value=04>4</option>
	<option value=05>5</option>
	<option value=06>6</option>
	<option value=07>7</option>
	<option value=08>8</option>
	<option value=09>9</option>
	<option value=10>10</option>
	<option value=11>11</option>
	<option value=12>12</option>
	<option value=13>13</option>
	<option value=14>14</option>
	<option value=15>15</option>
	<option value=16>16</option>
	<option value=17>17</option>
	<option value=18>18</option>
	<option value=19>19</option>
	<option value=20>20</option>
	<option value=21>21</option>
	<option value=22>22</option>
	<option value=23>23</option>
	<option value=24>24</option>
	<option value=25>25</option>
	<option value=26>26</option>
	<option value=27>27</option>
	<option value=28>28</option>
	<option value=29>29</option>
	<option value=30>30</option>
	<option value=31>31</option>
</select> 
<select name="mesenv">
	<option value='<? echo $mesenv;?>' selected><? echo $mesenv;?></option>
    <option value=01>Enero</option>  
	<option value=02>Febrero</option>  
	<option value=03>Marzo</option>
	<option value=04>Abril</option>
	<option value=05>Mayo</option>
	<option value=06>Junio</option>
	<option value=07>Julio</option>
	<option value=08>Agosto</option>
	<option value=09>Septiembre</option>
	<option value=10>Octubre</option>
	<option value=11>Noviembre</option>
	<option value=12>Diciembre</option>
</select> 
<select name="anioenv">
	<option value='<? echo $anioenv;?>' selected><? echo $anioenv;?></option>
    <option value=2007>2007</option> 
	<option value=2008>2008</option> 
	<option value=2009>2009</option> 
	<option value=2010>2010</option>    
</select>&nbsp;<font style="background-image:url(img/blue.png);">** Forma de pago:</font>
<select name="fpago">
<option value='<? echo $fpago;?>' selected><? echo $fpago;?></option>
 <option value="Contado">Contado</option>
 <option value="Cheque">Cheque</option>
 <option value="Transaccion Electronica">Transaccion Electronica</option>
 <option value="Credito 90 dias">Credito 90 dias</option>
 <option value="Otro">Otro</option>
 </select>
 </td>
</tr>
<tr> 
 <td width="223" align="right" background="img/blue.png">No. cheque &oacute; No. transaccion:</td>
 <td width="522" valign="middle"> 
 <input type="text" name="chke" value='<? echo $chke;?>'>&nbsp;<font style="background-image:url(img/blue.png);">Banco Emisor:</font>
 <select name="banc">
 <option value='<? echo $banc;?>' selected><? echo $banc;?></option>
 <option value="American Express">American Express</option>
 <option value="Banamex">Banamex</option>
 <option value="Bancomer">Bancomer</option>
 <option value="HSBC">HSBC</option>
 <option value="Santander">Santader</option>
 <option value="Banorte">Banorte</option>
 <option value="Inbursa">Inbursa</option>
 <option value="Inbursa">Otro</option>
 </select>
 </td>
</tr>
<tr> 
 <td width="223" align="right" background="img/blue.png">Cantidad depositada $</td>
 <td width="522" valign="middle"> 
 <input name="canprecio" type="text" value='<? echo $canprecio;?>'>
 </td>
</tr>
<tr> 
 <td align="center" background="img/blue.png" colspan="2">Comentarios</td>
</tr>
<tr> 
 <td width="522" valign="middle" colspan="2"> 
 <textarea name="comenta" rows="5" cols="50"><? echo $comenta;?></textarea>
 </td>
</tr>
<tr> 
 <td width="223" align="right" background="img/blue.png">** Orden de Pedido:</td>
 <td width="522" valign="middle"> 
 <input name="oped" type="text" onBlur="MM_validateForm('oped','','R');return document.MM_returnValue" value="<? echo $oped;?>" maxlength="6">
 </td>
</tr>

<tr> 
 <td width="223" align="right" background="img/blue.png">** Forma de transporte:</td>
 <td width="522" valign="middle"> 
 <select name="ftrans">
 <option value="<? echo $ftrans;?>" selected><? echo $ftrans;?></option>
    <option value="Aereo">Aereo</option> 
	<option value="Maritimo">Maritimo</option> 
	<option value="Terrestre">Terrestre</option> 
	<option value="UPS">UPS</option>   
</select>
 &nbsp;<font style="background-image:url(img/blue.png);">** Agencia Aduanal:</font>
 <select name="trnsprt" style="font-size:.90em;">
<?
$coexion=mssql_connect("SISTEMAS","","");
mssql_select_db("airenergy",$coexion);
$trns11=mssql_query("SELECT idtransporte,razonsocialtrns FROM proveedores WHERE idtransporte=$trnsprt",$coexion);
$tr11=mssql_fetch_array($trns11);
$idtr1x=$tr11["idtransporte"];
$idtr2x=$tr11["razonsocialtrns"];
echo "<option value=" . $idtr1x . " selected>" . $idtr2x . "</option>";
$trns=mssql_query("SELECT idtransporte,razonsocialtrns FROM proveedores WHERE tipoproveedor='Agencia Aduanal'",$coexion);
while($tr=mssql_fetch_array($trns)){
$idtr1=$tr["idtransporte"];
$idtr2=$tr["razonsocialtrns"];
echo "<option value=" . $idtr1 . ">" . $idtr2 . "</option>";
}
mssql_close($coexion);
?>
</select>
<input type="hidden" name="ndia" value=<? echo $ndia;?>>
<input type="hidden" name="nmes" value=<? echo $nmes;?>>
<input type="hidden" name="mmes" value=<? echo $mmes;?>>
<input type="hidden" name="nanio" value=<? echo $nanio;?>>
<input type="hidden" name="aniocom" value=<? echo $aniocom;?>>
<input type="hidden" name="orden" value=<? echo $orden;?>>
<input type="hidden" name="orden2" value=<? echo $orden2;?>>
<input type="hidden" name="codorden" value="<? echo $codorden;?>">
<input type="hidden" name="codorden2" value="<? echo $codorden2;?>">
 </td>
</tr>
<tr> 
 <td width="223" align="right" background="img/blue.png">** Consolidadora:</td>
 <td width="522" valign="middle"> 
 <select name="cndra" style="font-size:.90em;">
<?
$coexion=mssql_connect("SISTEMAS","","");
mssql_select_db("airenergy",$coexion);
$trnsxc=mssql_query("SELECT idtransporte,razonsocialtrns FROM proveedores WHERE idtransporte=$cndra",$coexion);
$trxx=mssql_fetch_array($trnsxc);
$idtr1cx=$trxx["idtransporte"];
$idtr2cx=$trxx["razonsocialtrns"];
echo "<option value=" . $idtr1cx . " selected>" . $idtr2cx . "</option>";
$trns=mssql_query("SELECT idtransporte,razonsocialtrns FROM proveedores WHERE tipop2='Consolidadora'",$coexion);
while($tr=mssql_fetch_array($trns)){
$idtr1=$tr["idtransporte"];
$idtr2=$tr["razonsocialtrns"];
echo "<option value=" . $idtr1 . ">" . $idtr2 . "</option>";
}
mssql_close($coexion);
?>
</select>
 </td>
</tr>
<tr> 
 <td width="223" align="right" background="img/blue.png">** Forma de pago transporte:</td>
 <td width="522" valign="middle"> 
 <select name="fpagotrns">
 <option value="<? echo $fpagotrns;?>" selected><? echo $fpagotrns;?></option>
 <option value="Contado" selected>Contado</option>
 <option value="Cheque">Cheque</option>
 <option value="Transaccion Electronica">Transaccion Electronica</option>
 <option value="Credito 90 dias">Credito 90 dias</option>
 <option value="Otro">Otro</option>
 </select>
 </td>
</tr>
<tr> 
 <td width="223" align="right" background="img/blue.png">Comentarios Pago Transporte:</td>
 <td width="522" valign="middle"> 
 <input type="text" name="compag1" size="80" value="<? echo $compag1;?>">
 </td>
</tr>
<tr> 
 <td width="223" align="right" background="img/blue.png">** Fecha deseada de entrega:</td>
 <td width="522" valign="middle"> 
<select name="diaent">
   <option value=<? echo $diaent;?> selected><? echo $diaent;?></option>
   <option value=01>1</option>	
	<option value=02>2</option>  
	<option value=03>3</option> 
	<option value=04>4</option>
	<option value=05>5</option>
	<option value=06>6</option>
	<option value=07>7</option>
	<option value=08>8</option>
	<option value=09>9</option>
	<option value=10>10</option>
	<option value=11>11</option>
	<option value=12>12</option>
	<option value=13>13</option>
	<option value=14>14</option>
	<option value=15>15</option>
	<option value=16>16</option>
	<option value=17>17</option>
	<option value=18>18</option>
	<option value=19>19</option>
	<option value=20>20</option>
	<option value=21>21</option>
	<option value=22>22</option>
	<option value=23>23</option>
	<option value=24>24</option>
	<option value=25>25</option>
	<option value=26>26</option>
	<option value=27>27</option>
	<option value=28>28</option>
	<option value=29>29</option>
	<option value=30>30</option>
	<option value=31>31</option>  
</select> 
<select name="mesent">
	<option value="<? echo $mesent;?>" selected><? echo $mesent;?></option>
    <option value=01>Enero</option>  
	<option value=02>Febrero</option>  
	<option value=03>Marzo</option>
	<option value=04>Abril</option>
	<option value=05>Mayo</option>
	<option value=06>Junio</option>
	<option value=07>Julio</option>
	<option value=08>Agosto</option>
	<option value=09>Septiembre</option>
	<option value=10>Octubre</option>
	<option value=11>Noviembre</option>
	<option value=12>Diciembre</option>   
</select> 
<select name="anioent">
	<option value="<? echo $anioent;?>" selected><? echo $anioent;?></option>
    <option value=2007>2007</option> 
	<option value=2008>2008</option> 
	<option value=2009>2009</option> 
	<option value=2010>2010</option>    
</select>
 </td>
</tr>
<tr align="center"> 
 <td align="center" background="img/blue.png" colspan="2">** Direccion de entrega:
 </td>
</tr>
<tr> 
  <td width="522" align="left" valign="middle" colspan="2"> 
 Calle:<input type="text" name="calle" value="<? echo $calle;?>">No.:<input type="text" name="numero" value="<? echo $numero;?>"><br>
 Col.:<input type="text" name="colonia" value="<? echo $colonia;?>"><br>C.P.:<input type="text" name="codpst" value="<? echo $codpst;?>"><br>
 Ciudad:<input type="text" name="ciuda" value="<? echo $ciuda;?>"> 
 Estado:<input type="text" name="estado" value="<? echo $estado;?>">
</td>
</tr>
<tr> 
 <td width="223" align="right" background="img/blue.png">** Revision:</td>
 <td width="522" valign="middle"> 
 <input name="rev" type="text" value="<? echo $rev;?>" onBlur="MM_validateForm('rev','','R');return document.MM_returnValue">
 </td>
</tr>
<tr> 
 <td colspan="2"><hr align="center" color="#0033FF" width="100%" size="1px"></td>
 </tr>
<tr> 
 <td width="223" align="right" background="img/blue.png">** Producto:</td>
 <td width="522" valign="middle"> 
 <input name="cproc" type="text" onBlur="MM_validateForm('cproc','','R');return document.MM_returnValue">
 <!--
<select name="cproc" style="width:95%; font-size:.85em;">
<?
		$cn=mssql_connect("SISTEMAS","","");
        mssql_select_db("airenergy",$cn);
		$rsl=mssql_query("SELECT cod,idproduct,linea,descripcion
		                  FROM inventa1 WHERE statusP IS NULL ORDER BY linea",$cn);
		while($linea=mssql_fetch_array($rsl)){
		$f1=$linea["cod"];
		$f2=$linea["idproduct"];
		$f3=$linea["linea"];
		$f4=$linea["descripcion"];
		echo "<option value='$f1'>$f2  -  $f3-$f4</option>";
		}
		mssql_close($cn);	
?>		
</select>
-->
</td>
</tr>
<tr> 
 <td width="223" align="right" background="img/blue.png">** Cantidad:</td>
 <td width="522" valign="middle"> 
 <input type="text" name="canti" value=1 onBlur="valida1(this,1,40)">

 </td>
</tr>
 <tr> 
 <td colspan="2" align="center" background="img/blue.png"> 
<input type="button" name="botonDesactivar" value="Verificar Datos" onClick="desactivar(this.form)">
<input type="submit" name="enviar" value="Insertar" disabled>
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