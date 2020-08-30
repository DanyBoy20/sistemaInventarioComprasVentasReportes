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
</script>
<SCRIPT LANGUAGE="javascript">
function valida1(obj,bajo,alto){
if((obj.value<bajo) || (obj.value>alto)){
alert("La cantidad debe ser mayor que 0");
obj.focus();
}
}
</SCRIPT>
</HEAD>
<BODY background="img/fondo.gif" leftMargin=0 topMargin=0 marginwidth="0" marginheight="0" bottommargin="0" bgproperties="fixed"><center>
  <table width="804" height="336" align="center" cellpadding="0" cellspacing="0" class="bordet"> 
  <tr>
      <td height="134"><div align="center"></div>
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
              <table width="100%"  border="0">
                <tr>
                  <td colspan="2" background="../img/blue.png" class="small_text1" align="center">
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
				  </td>
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
    <td background="img/blue1.jpg" align="left">
	<? 
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
		  $resul=mssql_query("SELECT idreciboadq from receqpadq1",$con);
$i=1;
while($f=mssql_fetch_array($resul)){
$a[$i]=$f["idreciboadq"];
$i++;
}
rsort ($a);
$w=$a[0];
$w=$w+1;
mssql_close($con);
/*sort() valor minimo ... rsort() valor maximo*/

/*  realizo la asignacion del numero de orden con el siguiente formato: diamesaniocodigodist-numeroorden ejemplo:140606EAC-1 */ 
$codorden="EA-$w-$nyear-ADQ";
?>
<?		
$idadq=$idadq;
	$conn=mssql_connect("SISTEMAS","","");
     mssql_select_db("baseDatos");
	/* selecciono LOS VALORES A LAS TABLAS CORRESPONDIENTES */ 
	$adquisicion1=mssql_query("SELECT idadquisicion,ordendped,nadquisicion,diaadqui,mesadqui,anioadqui,fechaenvioadqui2,statusadq
							  FROM ordenadq1 WHERE idadquisicion=$idadq",$conn);
	$reg1=mssql_fetch_array($adquisicion1);
	$regis1=$reg1["idadquisicion"];
	$ordnpedi=$reg1["ordendped"];
	$regis2=$reg1["nadquisicion"];
	$regis3=$reg1["diaadqui"];
	$regis4=$reg1["mesadqui"];
	$regis5=$reg1["anioadqui"];
	$fenvioad=$reg1["fechaenvioadqui2"];
	$regis6=$reg1["statusadq"];
	?>
	<SPAN class="navigation_heading">Folio de Entrada No.<? echo $codorden;?></SPAN>	
	</td>	
    </tr>
	<tr><td align="center">
	<table width="100%"  border="0">
  <tr>
    <td width="36%" align="left" class="main_text_bold">Orden de Adquisicion: <font color="#FF0000"> <? echo $regis2;?></font></td>
    <td width="31%" align="left" class="main_text_bold">Orden de Pedido: <font color="#FF0000"><? echo $ordnpedi;?></font></td>
    <td width="10%">&nbsp;</td>
    <td width="23%">
	<a class=main_navigation target="_blank" href="veradqui.php?ursec=<? echo $cod;?>&ndn=<? echo $regis2;?>&idadq=<? echo $idadq;?>&secur=<? echo session_id();?>">
	Ver Orden Completa
	</a></td>
  </tr>
  <tr>
    <td  class="main_text_bold" align="left">Fecha Orden de adquisicion: <font color="#FF0000"><? echo $regis3 . " / " . $regis4 . " / " . $regis5;?></font></td>
    <td class="main_text_bold">Fecha de envio:	<font color="#FF0000"><? echo $fenvioad;?></font></td>
    <td>&nbsp;</td>
    <td>
	<a class=main_navigation target="_blank" href="equipment2.php?ursec=<? echo $cod;?>&ndn=<? echo $regis2;?>&idadq=<? echo $idadq;?>&secur=<? echo session_id();?>">
	Series
	</a>	
	</td>
  </tr>
  <tr>
    <td class="main_text_bold" align="left">Fecha de captura: <font color="#FF0000"><? echo date("d / m / Y");?></font></td>
    <td class="main_text_bold" align="left">Estado Orden : <font color="#FF0000"><? echo $regis6;?></font></td>
    <td>&nbsp;</td>
    <td>
	<a class=main_navigation target="_blank" href="reciboimpradq.php?ursec=<? echo $cod;?>&ndn=<? echo $regis2;?>&idadq=<? echo $idadq;?>&secur=<? echo session_id();?>&nrec=<? echo $w;?>&orn=<? echo $codorden;?>">
	Recibo Impreso
	</a>
	</td>
  </tr>
</table>


	<?
	$adquisicion2=mssql_query("SELECT idproduct,linea,descripcion,cantidadadq,cantentregadadq
                                 FROM (inventa1 INNER JOIN ordenadq2 ON inventa1.cod=ordenadq2.cod)
                                 WHERE idadquisicion=$idadq",$conn);								 
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
	$dp4=$st["cantidadadq"];
	$dp5=$st["cantentregadadq"];
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
			
	</td></tr>
	<tr>
	<td align="center">	
		<form name="formulario" method="post" action="reciboadq7.php">
<table border="1" width="100%" class="small_text1">
<tr>
	<td width="135" align="right" background="img/blue.png">Fecha llegada a puerto:</td>
	<td width="636">
	<select name="diaenv">
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
    <option value=2007>2007</option> 
	<option value=2008>2008</option> 
	<option value=2009>2009</option> 
	<option value=2010>2010</option>    
</select><font style="background-image:url(img/blue.png);">Fecha de entrada al almacen:</font>&nbsp;
	<select name="diaenv2">
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
<select name="mesenv2">
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
<select name="anioenv2">
    <option value=2007>2007</option> 
	<option value=2008>2008</option> 
	<option value=2009>2009</option> 
	<option value=2010>2010</option>    
</select>
	</td>
	<td width="3">&nbsp;</td>
</tr>
<tr>
	<td width="135" align="right" background="img/blue.png">Pedimento:</td>
	<td width="636"><input type="text" name="pedi" width="250"></td>
	<td width="3">&nbsp;</td>
</tr>
<tr> 
 <td width="135" align="right" background="img/blue.png">Producto:</td>
 <td valign="middle" colspan="2"> 
<select name="cproc" style="width:75%; font-size:.85em;">
<?
		$cn=mssql_connect("SISTEMAS","","");
        mssql_select_db("airenergy",$cn);
		$rsl=mssql_query("SELECT idproduct,linea,descripcion
                          FROM (inventa1 INNER JOIN ordenadq2 ON inventa1.cod=ordenadq2.cod)
                          WHERE idadquisicion=$idadq AND diferen <> 0 ORDER BY linea",$cn);
		while($linea=mssql_fetch_array($rsl)){
		$f2=$linea["idproduct"];
		$f3=$linea["linea"];
		$f4=$linea["descripcion"];
		echo "<option value=$f2>$f2  -  $f3-$f4</option>";
		}
		mssql_close($cn);	
?>		
</select>

</td>
</tr>
<tr>
    <td width="135" align="right" background="img/blue.png">Cantidad:
	<script language="javascript">
	function verificando(){
	alert("* Si el producto y/o productos no trae numero de serie,\nfavor de dejar en blanco\n\n o en su defecto, asignarle uno\n\n* Si son varios productos con numero de serie distintos,\nfavor de separar los numeros de serie con una diagonal  \" / \" .\n\n Gracias");
	}
	</script>
	<script language="javascript">
	function verificando1(){
	alert("* Escribir la Cantidad completa de productos.\n\n Gracias");
	}
	</script>
	</td>
	<td width="636">	
<input type="text" name="canti" width="40" onFocus="verificando();" onBlur="valida1(this,0,30)">	
<font style="background-image:url(img/blue.png);">Estado:</font>
	  <select name="esta" style="font-size:.85em;">
	<option value="Optimo" selected>Optimo</option>
	<option value="Maltratado">Da&ntilde;ado</option>
	</select>
	<font style="background-image:url(img/blue.png);">Ubicacion:</font><select name="ubica" style="font-size:.85em;">
	<option value="MDF" selected>Mexico, D.F.</option>
	<option value="GDL">Guadalajara</option>
	<option value="MTY">Monterrey</option>
	</select></td>
	<td width="3">&nbsp;</td>
 </tr>
 <tr>
	<td width="135" align="right" background="img/blue.png">Comentarios:</td>
	<td width="636"><input type="text" name="comenta"></td>
	<td width="3">&nbsp;</td>
</tr>
 <tr>
	<td width="135" align="right" background="img/blue.png">No. de serie:</td>
	<td width="636">
	<font class="peque2">&nbsp;Formato de series:&nbsp;XX00/XX11/XX22/XX33</font><br><textarea name="serie" rows="5" cols="50"></textarea>	
	</td>
	<td width="3">&nbsp;</td>
</tr>
 <tr> 
 <td colspan="3" align="center">
 <input type="hidden" name="idadq" value="<? echo $idadq;?>">
	<input type="hidden" name="code" value="<? echo $w;?>">
    <input type="hidden" name="codorden" value="<? echo $codorden;?>">	
    <input type="hidden" name="mes" value="<? echo $mese;?>">
	<input type="hidden" name="nmes" value="<? echo $nmes;?>">
	<input type="hidden" name="year" value="<? echo $year;?>">
	<input type="hidden" name="nyear" value="<? echo $nyear;?>">
	<input type="hidden" name="dia" value="<? echo $dia;?>">
	<input type="hidden" name="disponible" value="si">
	<input type="hidden" name="tipoentra" value="ADQ">
 <input type="button" name="botonDesactivar" value="Verificar Datos" onClick="desactivar(this.form)"> 
<input type="submit" name="guardar" value="Insertar Producto" disabled>
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