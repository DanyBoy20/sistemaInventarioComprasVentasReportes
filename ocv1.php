<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<?
$conectate=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$resultadoss=mssql_query("SELECT blockcompra FROM bloqueacompra",$conectate);
$filass=mssql_fetch_array($resultadoss);
$bloce=trim($filass["blockcompra"]);
if($bloce=="si"){
echo "<script>alert('SERVIDOR OCUPADO ... INTENTE MAS TARDE O CONTACTE A SISTEMAS - ENERGIA AMBIENTAL DE MEXICO S.A. DE C.V. !!!');</script>";
mssql_close($conectate);
echo "<script>window.location.href='claudia.php';</script>";
}else{
//mssql_query("UPDATE bloqueacompra SET blockcompra='si'",$conectate);
mssql_close($conectate);
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
</script>
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
              <table width="100%"  border="0">
                <tr>
                  <td colspan="2" background="../img/blue.png" class="small_text1">Menu Principal Gerente de Produccion</td>
                </tr>
                 <tr>
                  <td colspan="2">
<a class=main_navigation target="_self" href="nada.php">
Inicio
</a>
</td>				
				
				</tr>
            </table>
			<table width="100%"  border="0">
  <tr>
    <td background="img/blue1.jpg" align="center">
<? 
$dtr=$dtr;
$conecta=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$resultad=mssql_query("SELECT codigo,razon_social,direccion,ciudad,estado FROM distribuidores
			WHERE cve_distribuidor=$dtr",$conecta);
			$codg=mssql_fetch_array($resultad);
		    $cdgo=$codg["codigo"];
			$cdgo1=$codg["razon_social"];
			$cdgo2=$codg["direccion"];
			$cdgo3=$codg["ciudad"];
			$cdgo4=$codg["estado"];
mssql_close($conecta);
$dia = date ("d"); // texto en formato de dos digitos (ejemplo 01)
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
		  $resul=mssql_query("SELECT idcompraventa from ordencv1",$con);
$i=1;
while($f=mssql_fetch_array($resul)){
$a[$i]=$f["idcompraventa"];
$i++;
}
rsort ($a);
$w=$a[0];
$w=$w+1;
mssql_close($con);
/*sort() valor minimo ... rsort() valor maximo*/
/*  realizo la asignacion del numero de orden con el siguiente formato: EA-CVDIAMESANIO-CODDISTRIBUIDOR-FOLIO; ejemplo:EA-CV010107-TCA-1 */
$mse=date("m");
    $conn=mssql_connect("SISTEMAS","","");
     mssql_select_db("baseDatos");
$dis=mssql_query("SELECT clave FROM administracion WHERE clave='$code'",$conn);
$ds=mssql_fetch_array($dis);
$usuarioadq=$ds["clave"];
$codorden="EA-CV$dia$nmes$nyear-$cdgo-$w";
?>
	<SPAN class="navigation_heading">Orden de Compra No. <? echo $codorden;?></SPAN></td>
    </tr>
	<tr>
	<td align="center">
<form name="formulario" method="post" action="ocv6.php">
<table border="1" class="small_text1" width="100%">
 <tr align="right"> 
 <td colspan="2" align="left"><? echo $dia;?> de <? echo $mese;?> del <? echo $year;?>
  
 
 
 
 
 
 
  
  
  
 
 
** Campos Obligatorios
 </td>
</tr>
<tr> 
 <td width="188" align="right" background="img/blue.png">Fecha estimada de entrega:</td>
 <td width="584" valign="middle"> 
 <select name="diaenv">
    <option value='<? echo $dia;?>' selected><? echo $dia;?></option>	
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
	<option value='<? echo $nmes;?>' selected><? echo $mese;?></option>
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
    <option value='<? echo $year;?>' selected><? echo $year;?></option>
    <option value=2007>2007</option> 
	<option value=2008>2008</option> 
	<option value=2009>2009</option> 
	<option value=2010>2010</option>    
</select>
<!--
&nbsp;<font style="background-image:url(img/blue.png);">Fecha real de entrega:</font>
 <select name="diaenv1">
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
<select name="mesenv1">
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
<select name="anioenv1">
    <option value=2007>2007</option> 
	<option value=2008>2008</option> 
	<option value=2009>2009</option> 
	<option value=2010>2010</option>    
</select>
-->
 </td>
</tr>
<tr> 
 <td width="188" align="right" background="img/blue.png">Forma de pago: 
 </td>
 <td width="584" valign="middle">
 <select name="fpago">
 <option value="Efectivo">Efectivo</option>
 <option value="Cheque">Cheque</option>
 <option value="Transaccion Electronica">Transaccion Electronica</option>
 <option value="Credito 30 dias" selected>Credito 30 dias</option>
 <option value="Otro">Otro</option>
 </select>
 
 </td>
</tr>
<tr> 
 <td align="right" background="img/blue.png">No. cheque y/&oacute; No. transaccion:</td>
 <td valign="middle"><input type="text" name="chke">&nbsp;<font style="background-image:url(img/blue.png);">Banco Emisor:</font>
 <select name="banc">
 <option value="American Express">American Express</option>
 <option value="Banamex">Banamex</option>
 <option value="Bancomer">Bancomer</option>
 <option value="HSBC">HSBC</option>
 <option value="Santander">Santander</option>
 <option value="Banorte">Banorte</option>
 <option value="Inbursa">Inbursa</option>
 <option value="Otro">Otro</option>
 <option value="Pendiente" selected>Pendiente</option>
 </select>
 </td>
</tr>
<tr> 
 <td align="right" background="img/blue.png">Cantidad depositada $</td>
 <td valign="middle"> 
 <input name="canprecio" type="text" value=0>
 </td>
</tr>
<tr> 
 <td width="188" align="right" background="img/blue.png">Transporte:</td>
 <td width="584" valign="middle">  
   <select name="trnsprt" style="font-size:.90em;">
     <?
$coexion=mssql_connect("SISTEMAS","","");
mssql_select_db("airenergy",$coexion);

$trns=mssql_query("SELECT idtransporte,razonsocialtrns FROM proveedores",$conn);
while($tr=mssql_fetch_array($trns)){
$idtr1=$tr["idtransporte"];
$idtr2=$tr["razonsocialtrns"];
echo "<option value=" . $idtr1 . ">" . $idtr2;
}
mssql_close($conn);
?>
   </select>
   <input type="hidden" name="ndia" value=<? echo $dia;?>>
<input type="hidden" name="nmes" value=<? echo $nmes;?>>
<input type="hidden" name="mmes" value="<? echo $mese;?>">
<input type="hidden" name="aniocom" value=<? echo $year;?>>
<input type="hidden" name="orden" value=<? echo $w;?>>
<input type="hidden" name="codorden" value="<? echo $codorden;?>">
<input type="hidden" name="distbr" value="<? echo $dtr;?>"> </td>
</tr>
<tr> 
 <td width="188" align="right" background="img/blue.png">Carta porte:</td>
 <td width="584" valign="middle">  
   <input type="text" name="cporte" value="pendiente por asignar">
   </td>
</tr>
<tr> 
 <td width="188" align="right" background="img/blue.png">Distribuidor:</td>
 <td width="584" valign="middle"> 
 <? echo $cdgo1;?>
 </td>
</tr>
<tr> 
 <td width="188" align="right" background="img/blue.png">Direccion de entrega:</td>
 <td width="584" valign="middle"> 
 <input type="text" name="calle" value="<? echo $cdgo2;?>" maxlength="180" size="60">
</td>
</tr>
<tr> 
 <td width="188" align="right" background="img/blue.png">Ciudad:</td>
 <td width="584" valign="middle"> 
 <input type="text" name="ciuda" value="<? echo $cdgo3;?>"><font style="background-image:url(img/blue.png);">Estado:</font><input type="text" name="estado" value="<? echo $cdgo4;?>">
 </td>
</tr>
<tr> 
 <td width="188" align="right" background="img/blue.png">No. Referencia Cliente:</td>
 <td width="584" valign="middle"> 
 <input type="text" name="refe">
 </td>
</tr>
<tr> 
 <td width="188" align="right" background="img/blue.png">Comentarios:</td>
 <td width="584" valign="middle"> 
  <input type="text" name="comenta" size="60" maxlength="120">
 </td>
</tr>
<tr> 
 <td colspan="2"><hr align="center" color="#0033FF" width="100%" size="1px"></td>
 </tr>
<tr> 
 <td width="188" align="right" background="img/blue.png">Producto:</td>
 <td width="584" valign="middle"> 
<input type="text" name="cproc">
</td>
</tr>
<tr> 
 <td width="188" align="right" background="img/blue.png">Cantidad:</td>
 <td width="584" valign="middle"> 
 <input type="text" name="canti" value=1 onBlur="valida1(this)">

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
</center></BODY>
</HTML>