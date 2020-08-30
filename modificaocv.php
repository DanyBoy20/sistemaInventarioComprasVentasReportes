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
<style type="text/css">
@media print 
{ 
.noprint {display: none;
@page rotated {size: landscape} 
TABLE {page: rotated; width:auto; border-style:none; border:0;

}  
td{
			font-weight: 400;
			font-size: 0.70em;
			color: 10px;
		}
} 
</style>
<script language="javascript">
function imprimir(){
if(window.print)
 window.print()
else
 alert("Su navegador no soporta esta opcion");
}
</SCRIPT> 
<script language="javascript">
function desactivar(formulario) {	
	formulario.botonDesactivar.disabled = true;	
	formulario.enviar.disabled = false;
}
</script>
</HEAD>
<BODY background="img/fondo.gif" leftMargin=0 topMargin=0 marginwidth="0" marginheight="0" bottommargin="0" bgproperties="fixed"><center>
  <table width="804" height="109" align="center" cellpadding="0" cellspacing="0" class="bordet">    
    <tr>
      <td height="25" valign="top">
        <table width="100%"  border="0" bgcolor="#FFFFFF" class="noprint">
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
	<tr>
	  <td height="20" align="center" background="../img/blue.png" class="small_text1">
<?
$diacam=date("d"); // dia en formato de dos digitos
$mescam=date("m"); // mes en formato de dos difitos
$aniocam=date("Y"); // anio en formato de 4 digitos 0000
$nombremes=date("F"); // mes en formato texto en ingles ( ejemplo January )
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
      Ordenes de Compra Pendientes<br>
	  <hr align="center" color="#0033FF" width="100%" size="1px">
	  </td>
	</tr>
	<tr><td height="18" width="100%" bgcolor="#FFFFFF">
<?
$idadq=$idocv;
$logoprecio="$ ";
/* SELECCIONO LOS DATOS DE LA ORDEN (ORDENADQ1)  */  

$conn=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$result5=mssql_query("SELECT ncompraventa,diacv,mescv,aniocv,idtransporte,cartaporte,cve_distribuidor,direnviocv,ciudadcv,estadocv,
                             norefdist,fechestentregacv1,fecharealent2,condipagocv,comentarioscv,statusordencv
			            FROM ordencv1 WHERE idcompraventa=$idadq",$conn);
						$ficha2=mssql_fetch_array($result5);
$n1=$ficha2["ncompraventa"];
$n2=$ficha2["diacv"];
$n3=$ficha2["mescv"];
$n4=$ficha2["aniocv"];
$n5=$ficha2["idtransporte"];
$crtprte=$ficha2["cartaporte"];
$n6=$ficha2["cve_distribuidor"];
$n7=$ficha2["direnviocv"];
$m6=$ficha2["ciudadcv"];
$m7=$ficha2["estadocv"];
$n8=$ficha2["norefdist"];
$n9=$ficha2["fechestentregacv1"];
$freal=$ficha2["fecharealent2"];
$n10=$ficha2["condipagocv"];
$n11=$ficha2["comentarioscv"];
$n12=$ficha2["statusordencv"];
$diae1=substr($n9,0,2);
$mese1=substr($n9,3,-5);
$anioe1=substr($n9,-4);
$diar1=substr($freal,0,2);
$mesr1=substr($freal,3,-5);
$anior1=substr($freal,-4);
if($n5==""){
$fich1="Sin transporte asignado";
}else{
$result89=mssql_query("SELECT razonsocialtrns
			            FROM proveedores WHERE idtransporte=$n5",$conn);
$ficha3=mssql_fetch_array($result89);
$fich1=$ficha3["razonsocialtrns"];
}
/* SELECCIONO LOS DATOS DEL DISTRIBUIDOR (DISTRIBUIDORES) */
$result69=mssql_query("SELECT razon_social,ciudad,direccion,estado
			            FROM distribuidores WHERE cve_distribuidor=$n6",$conn);
$ficha4=mssql_fetch_array($result69);
$n14=$ficha4["razon_social"];
$ciud=$ficha4["ciudad"];
$dire=$ficha4["direccion"];
$estad=$ficha4["estado"];
mssql_close($conn);
echo "<form name='formulario' method='post' action='actuali.php'>
<table border=0 width='100%' cellpadding='2' cellspacing='2'>
<tr>
	<td align='center' valign='middle' colspan='3' rowspan='3'>
		<img src='http://www.airenergy-mexico.com/new/ventas/img/logoga.png' width='148' height='81'>
	</td>
	<td align='center' valign='middle' with='auto' colspan='4' rowspan='3'>
		<img src='http://www.airenergy-mexico.com/new/img/whitespace.png' width='180' height='81'>
	</td>	
	<td align='right' colspan='2' background='img/blue.png'><font face='Arial' size='0.2'><b>
	ORDEN DE COMPRA No.:</b></font>
	</td>	
	<td align='center' colspan='2'><font face='Arial' size='0.2' color='red'><b>
	$n1</b></font>
	</td>
</tr>
<tr>
	<td align='right' valign='middle' colspan='2' background='img/blue.png'><font face='Arial' size='0.2'><b>
	FECHA CREACION DE ORDEN:</b></font>
	</td>
	<td align='center' valign='middle' colspan='2'><font face='Arial' size='0.2' color='red'><b>
	$n2 de $n3 del $n4</b></font>
	</td>
</tr>
<tr>
	<td align='right' valign='middle' colspan='2' background='img/blue.png'><font face='Arial' size='0.2'><b>
	FECHA ESTIMADA DE ENTREGA:</td>
			<td align='center' valign='middle' colspan='2'>
			<select name='dia' class='peque'>
	<option value=$diae1 SELECTED>$diae1</option>
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
	<select name='mes' class='peque'>
	<option value=$mese1 SELECTED>$mese1</option>
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
	<option value=11>Noviemnbre</option>
	<option value=12>Diciembre</option>
	</select>
	<select name='anio' class='peque'>
	<option value=$anioe1 SELECTED>$anioe1</option>
	<option value=2007>2007</option>
	<option value=2008>2008</option>
	<option value=2009>2009</option>
	<option value=2010>2010</option>
	<option value=2011>2011</option>
	<option value=2012>2012</option>
	<option value=2013>2013</option>
	<option value=2014>2014</option>
	<option value=2015>2015</option>
	<option value=2016>2016</option>
	<option value=2017>2017</option>
	<option value=2018>2018</option>
	<option value=2019>2019</option>
	<option value=2020>2020</option>
	</select>
	</b></font></td>	
</tr>
</table>
<hr align='center' color='#0033FF' width='100%' size='2px'>
<table border=0 width='100%' cellpadding='2' cellspacing='2'>
<tr>
	<td colspan='3' align='left' valign='middle' background='img/blue.png'><font face='Arial' size='0.2'><b>
		Distribuidor:		
		</b><font>	
	</td>
	<td align='right' valign='middle' background='img/blue.png'><font face='Arial' size='0.2'><b>
		Fecha Real de Entrega:	&nbsp;	
	</td><td colspan='7'>
	<select name='diar' class='peque'>
	<option value=$diar1 SELECTED>$diar1</option>
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
	<select name='mesr' class='peque'>
	<option value=$mesr1 SELECTED>$mesr1</option>
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
	<option value=11>Noviemnbre</option>
	<option value=12>Diciembre</option>
	</select>
	<select name='anior' class='peque'>
	<option value=$anior1 SELECTED>$anior1</option>
	<option value=2007>2007</option>
	<option value=2008>2008</option>
	<option value=2009>2009</option>
	<option value=2010>2010</option>
	<option value=2011>2011</option>
	<option value=2012>2012</option>
	<option value=2013>2013</option>
	<option value=2014>2014</option>
	<option value=2015>2015</option>
	<option value=2016>2016</option>
	<option value=2017>2017</option>
	<option value=2018>2018</option>
	<option value=2019>2019</option>
	<option value=2020>2020</option>
	</select>
	<font>	
	</td>
</tr>
<tr>
	<td colspan='3' rowspan='4' align='left' valign='middle'><font face='Arial' size='0.2'>
	$n14 <br> $dire <br> $ciud,$estad
	</font>
	</td>
	<td align='right' valign='middle' background='img/blue.png'><font face='Arial' size='0.2'><b>
		Transporte:&nbsp;		
		</b></font></td>
		<td colspan='7'>";
		/*				
<select name='trs' style='font-size:.90em;' disabled>
<option value=$n5 SELECTED>$fich1</option>";
$coexion=mssql_connect("SISTEMAS","","");
mssql_select_db("airenergy",$coexion);
$trns=mssql_query("SELECT idtransporte,razonsocialtrns FROM proveedores  WHERE tipoproveedor='Transporte de Carga'",$coexion);
while($tr=mssql_fetch_array($trns)){
$idtr1=$tr["idtransporte"];
$idtr2=$tr["razonsocialtrns"];
echo "<option value=$idtr1>$idtr2";
}
mssql_close($coexion);
echo "</select>
*/
	echo "<font face='Arial' size='0.2'><b>$fich1</b></font>	
	</td>
</tr>
<tr>
	<td align='right' background='img/blue.png'><font face='Arial' size='0.2'><b>Carta porte:</b></font></td>
	<td colspan='7' align='left' valign='middle'><font face='Arial' size='0.2'><b>";
	/* <input type='text' name='cporte' value='$crtprte' disabled> */
echo "$crtprte</b></font>	
	</td>
</tr>
<tr>
	<td align='right' valign='middle' background='img/blue.png'><font face='Arial' size='0.2'><b>
		No.Referencia:		
		</b></font>	
	</td>
	<td colspan='2' align='center' valign='middle'><font face='Arial' size='0.2' color='red'>
		$n8
	</font>	
	</td>
	<td align='center' valign='middle'>&nbsp;	
	</td>
	<td colspan='4'>
	&nbsp;
	</td>
</tr>
<tr>
	<td align='right' background='img/blue.png'><font face='Arial' size='0.2'><b>Estatus Orden:</b></font></td>
	<td colspan='2' align='right' valign='middle'><font face='Arial' size='0.2'>
		<select name='stdo' style='font-size:.90em;'>
		<option value='$n12' SELECTED>$n12</option>
		<option value='En proceso'>En Proceso</option>
		<option value='Enviada'>Enviada</option>
		<option value='Entregado'>Entregada</option>
		<option value='Cancelada'>Cancelada</option>
		</select>
	</font>	
	</td>
	<td align='center' valign='middle'>&nbsp;
	</td>
	<td colspan='4'>
	&nbsp;
	</td>
</tr>
</table>";
echo "\n<table align='center' width='100%' border='1'>"; 
echo "\n<tr class='small_text1' align='center' >
		  <td background='img/blue1.jpg'>CMD</td>
		  <td background='img/blue1.jpg'>Clave</td>
		  <td background='img/blue1.jpg'>Linea</td>
		  <td background='img/blue1.jpg'>Descripcion</td>
		  <td background='img/blue1.jpg'>Cantidad</td>
		  <td background='img/blue1.jpg'>Precio</td>
		  <td background='img/blue1.jpg'>Total</td>
		  </tr>"; 
$result=mssql_query("SELECT inventa1.cod,inventa1.idproduct,inventa1.linea,inventa1.descripcion,ordencv2.cantidadcv,ordencv2.preciounitcv
	                 FROM inventa1,ordencv2
                     WHERE (ordencv2.cod=inventa1.cod AND ordencv2.idcompraventa=$idadq)",$conn);
$numerofilas=mssql_num_rows($result); 
   $i = 1; 
   while ($fila2=mssql_fetch_array($result)){ 
   	  echo "\n<input type=hidden name=idproduct" . $i . " value=" . $fila2["cod"] . ">";
      echo "<tr>"; 
	  if($numerofilas==1){
	  echo "<td  class='peque' align='center'>$i</td>";
	  }else{
	  echo "<td  class='peque' align='center'><a href='elimn2.php?idadq=$idadq&idproduct=" . $fila2['cod'] . "'>Eliminar</a></td>";
	  }
      echo "<td  class='peque' align='center'>" . $fila2["idproduct"] . "</td>"; 
	  echo "<td  class='peque' align='center'>" . $fila2["linea"] . "</td>";
	  echo "<td  class='peque'>" . $fila2["descripcion"] . "</td>";
	  echo "<td align='center'><input type=text maxlength='3' size='3' name=canti" . $i . " value=" . $fila2["cantidadcv"] . "></td>"; 
	  echo "<td  class='peque' align='center'>$<input type='text' size='5' name=preci" . $i . " value=" . $fila2["preciounitcv"] . "></td>"; 
	  echo "<td  class='peque' align='center'>$ " . number_format($fila2["preciounitcv"]*$fila2["cantidadcv"],2) . "</td>";
      echo "</tr>"; 
      $i++; 
} 

   echo "\n<tr>
   			<td colspan='5' class='peque'>";
			$okw=mssql_query("SELECT SUM(totalprodcv) AS tot FROM ordencv2 
                     WHERE idcompraventa=$idadq",$conn);
		    $registroqz=mssql_fetch_array($okw);
		    $subt=$registroqz["tot"];
		    $iv=$subt*.15;
		    $neto=$subt+$iv;
	echo "</td>
    		<td class='peque' align='right' background='img/blue1.jpg'>Subtotal</td>
			<td class='peque' align='center'>$ " . number_format($subt,2) . "</td>
   		   </td></tr>";
   echo "\n<tr>
   			<td colspan='5' class='peque'></td>
    		<td class='peque' align='right' background='img/blue1.jpg'>I.V.A.</td>
			<td class='peque' align='center'>$ " . number_format($iv,2) . "</td>
   		   </td></tr>";
   echo "\n<tr>
   			<td colspan='5' class='peque'></td>
    		<td class='peque' align='right' background='img/blue1.jpg'>Total</td>
			<td class='peque' align='center'>$ " . number_format($neto,2) . "</td>
   		   </td></tr>";	
   echo "\n<tr><td colspan=7 align=center style='border:0;'>
   <hr align='center' color='#0033FF' width='100%' size='1px'>
   <table class='noprint' border='0'><tr><td class='small_text1'>
   Control de Cambios<br><br>
   Tipo:<br><select name='tcam'>
   <option value='general'>General(toda la orden)</option>
   <option value='precio'>Precio(solo precios)</option>
   <option value='productos'>Productos(solo productos)</option>
   <option value='precio y productos'>Precios y Productos</option>
   <option value='otro'>Otro</option>
   </select><br><br>
   Descripcion:<br><textarea name='dcam' rows='5' cols='50'></textarea><BR><br>
Autorizado por:<br><select name='aucam' style='width:320px;color:black;background-color:#86c1ff;font-size:12px;font-family:arial;'>";

	$cne=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
    $reso=mssql_query("SELECT clave,nombre,apepat,apemat,cargo FROM administracion WHERE clave=111 OR clave=113",$cne);
	while($fia=mssql_fetch_array($reso)){
	$b1=$fia["clave"];	
	$b2=$fia["nombre"];
	$b3=$fia["apepat"];	
	$b4=$fia["apemat"];
	$b5=$fia["cargo"];
	echo "<option value=$b1>$b2&nbsp;$b3&nbsp;$b4&nbsp;<&nbsp;--&nbsp;>$b5</option>";
    }	
	mssql_close($cne);

echo "</select><br><br>
   <input type=hidden name='numefilas' value='$numerofilas'>
   <input type=hidden name='idadq' value='$idadq'>
   <input type=hidden name='diacam' value='$diacam'>
   <input type=hidden name='mescam' value='$mescam'>
   <input type=hidden name='aniocam' value='$aniocam'>
   <input type=hidden name='nommes' value='$mese'></td></tr>";
   /*<input type='submit' value='Actualizar Orden' onClick=this.form.action='actuali.php'>*/
   echo "<tr><td><input type='button' name='botonDesactivar' value='Verificar Datos' onClick='desactivar(this.form)'>
   		<input type='submit' name='enviar' value='Actualizar Orden' disabled>
   </td></tr></table>
   </td></tr>"; 
   echo "\n</table>";
  echo "</center></form>";
?>
	</td></tr>
	<tr><td bgcolor="#FFFFFF">
	<table border='0' class='noprint' width="100%">
 <tr><td class="small_text1" align="center">
  <a href="javascript:imprimir()" style="text-decoration:none; border-style:none;">
  <img src="img/print2.jpg" width="69" height="53" style="text-decoration:none; border-style:none;" alt="IMPRIMIR ORDEN DE COMPRA"></a>
  </td>
 </tr></table>
	</td></tr>
  </table>
</center></BODY>
</HTML>