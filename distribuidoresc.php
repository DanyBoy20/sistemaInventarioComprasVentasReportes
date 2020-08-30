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
function imprimir(){
if(window.print)
 window.print()
else
 alert("Su navegador no soporta esta opcion");
}
</SCRIPT> 
</HEAD>
<BODY background="img/fondo.gif" leftMargin=0 topMargin=0 marginwidth="0" marginheight="0" bottommargin="0" bgproperties="fixed"><center>
  <table width="804" height="336" align="center" cellpadding="0" cellspacing="0" class="bordet">     
    <tr>
      <td height="123" valign="top">
        <table width="100%"  border="0" bgcolor="#FFFFFF">
          <tr>
            <td width="67%" valign="top">
              <table width="100%"  border="0" class="noprint">
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
		  <hr align="center" color="#0033FF" width="100%" size="1px" class="noprint">
		  </td>
		  </tr>
		  <tr>
		  <td> 
		 <!-- empieza -->
		  <table width="100%"  border="0" class="noprint">
  <tr>
    <td width="33%">&nbsp;</td>
    <td width="35%" align="center" background="img/blue1.jpg" class="small_text1">Insertar Nuevo Distribuidor</td>
    <td width="32%">&nbsp;</td>
  </tr>
</table>
<form name="formulario" method="post" action="insdist.php">
		  <table width="100%"  border="0" align="center" class="noprint">  
  <tr>
    <td width="12%" align="left" class="peque" background="img/blue1.jpg">Razon Social: </td>
    <td width="40%"><input type="text" name="rs" size=45></td>
    <td width="9%" align="left" class="peque" background="img/blue1.jpg">RFC:</td>
    <td width="39%"><input type="text" name="rfcdist" size=45></td>
  </tr>
  <tr>
    <td class="peque" align="left" background="img/blue1.jpg">Codigo: </td>
    <td class="peque"><input type="text" name="codig" size=5 maxlength="3"> 
    Nota: Tres letras representativas de su razon social.(AAA)</td>
    <td class="peque" align="left" background="img/blue1.jpg">Nombre: </td>
    <td><input type="text" name="nm" size=45></td>
  </tr>
  <tr>
    <td class="peque" align="left" background="img/blue1.jpg">A. Paterno: </td>
    <td><input type="text" name="ap" size=45></td>
    <td class="peque" align="left" background="img/blue1.jpg">A. Materno: </td>
    <td><input type="text" name="am" size=45></td>
  </tr>
  <tr>
    <td class="peque" align="left" background="img/blue1.jpg">Telefono:</td>
    <td><input type="text" name="tl" size=45></td>
    <td class="peque" align="left" background="img/blue1.jpg">Fax:</td>
    <td><input type="text" name="fx" size=45></td>
  </tr>
  <tr>
    <td class="peque" align="left" background="img/blue1.jpg">Ciudad:</td>
    <td><input type="text" name="cd" size=45></td>
    <td class="peque" align="left" background="img/blue1.jpg">Direccion</td>
    <td><input type="text" name="dr" size=45></td>
  </tr>
  <tr>
    <td class="peque" align="left" background="img/blue1.jpg">Estado:</td>
    <td><input type="text" name="es" size=45></td>
    <td class="peque" align="left" background="img/blue1.jpg">Email</td>
    <td><input type="text" name="em" size=45></td>
  </tr>
  <tr>
  <td class="peque" align="left" background="img/blue1.jpg">Tipo Distribuidor</td>
    <td colspan="3">
	<select name="tip">
	<option value="mayorista">Mayorista</option>
	<option value="estatal" selected>Estatal</option>
	<option value="regional">Regional</option>
	<option value="general" selected>General</option>
    <option value="guadalajara">Guadalajara</option>
    <option value="monterrey">Monterrey</option>
    <option value="spinm">Precios Spin</option>
    <option value="smayorista">Precios SwimQuip</option>
	</select>	</td>
    </tr>
  <tr>
    <td class="peque" align="left">
	<?
// ** Generador de Contrase�as de una longitud dada.
// ** $longitud es el n�mero de caracteres
// ** de la contrase�a generada.
// *********************************************************************
function GeneraPassword($longitud)
{
global $password;
/* Se valida la longitud proporcionada. Debe ser n�mero y mayor de cero.
Si es menor o igual a cero le asignamos la longitud por defecto.
Si es mayor de 32 le asignamos 32.
*/
if(!is_numeric($longitud) || $longitud <= 0)
{
$longitud = 6;
}

if($longitud > 6)
{
$longitud = 6;
}


/* Asignamos el juego de caracteres al array $caracteres para generar la contrase�a.
Podemos a�adir m�s caracteres para hacer m�s segura la contrase�a.
*/
$caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

/* Introduce la semilla del generador de n�meros aleatorios mejorado */
mt_srand(microtime() * 1000000);

for($i = 0; $i < $longitud; $i++)
{
/* Genera un valor aleatorio mejorado con mt_rand, entre 0 y el tama�o del array
$caracteres menos 1. Poster�ormente vamos concatenando en la cadena $password
los caracteres que se van eligiendo aleatoriamente.
*/
$key = mt_rand(0,strlen($caracteres)-1);
$password = $password . $caracteres{$key};
}

return $password;
}
/* Llamamos a la funci�n GeneraPassword y mostramos la clave generada.
echo GeneraPassword(10);*/
GeneraPassword(10);
?>
<input type='hidden' name='ps' value='<? echo $password;?>'>	</td>
    <td>
	<?
$con=mssql_connect("SISTEMAS","","");
		  mssql_select_db("baseDatos");
		  $resul=mssql_query("SELECT cve_distribuidor from distribuidores",$con);
$i=1;
while($f=mssql_fetch_array($resul)){
$a[$i]=$f["cve_distribuidor"];
$i++;
}
rsort ($a);
$w=$a[0];
$w=$w+1;
echo "<input type='hidden' name='cve' value='" . $w . "'>";
/*sort() valor minimo ... rsort() valor maximo*/
?>
	<input type="hidden" name="logo" value="img/"></td>
    <td class="peque" align="left"><input type="submit" value="Guardar"></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

<!-- acaba -->

		  </td>
		  </tr>
		  <tr><td><hr align="center" color="#0033FF" width="100%" size="1px" class="noprint"></td></tr>		  
		  <tr>
		  <td>
		  <table width="100%"  border="0" class="noprint">
  <tr>
    <td width="33%">&nbsp;</td>
    <td width="35%" align="center" background="img/blue1.jpg" class="small_text1">Modificar Datos de Distribuidor</td>
    <td width="32%">&nbsp;</td>
  </tr>
</table>
		  </td>
		  </tr>
		  <tr>
		  <td>
		  <form name="busc" method="post" action="buscadist.php">
		  <table width="100%"  border="0" class="noprint">
  <tr valign="middle">
    <td width="18%"></td>
    <td width="42%" align="center" valign="baseline">	
      <select name="dtr" style="width:320px;color:black;background-color:#86c1ff;font-size:12px;font-family:arial;">
        <?
	$cne=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
    $reso=mssql_query("SELECT cve_distribuidor,razon_social FROM distribuidores WHERE tipodist <> 'no' ORDER BY razon_social",$cne);
	while($fia=mssql_fetch_array($reso)){
	$b1=$fia["cve_distribuidor"];	
	$b2=$fia["razon_social"];
	echo "<option value='" . $b1 . "'>" . $b2;
    }	
	mssql_close($cne);
	?>
      </select>	
     
	</td>
    <td width="20%"><input type="submit" value="Buscar"></td>
    <td width="20%"></td>
  </tr>
</table> </form>

		  </td>
		  </tr>
		  <tr><td><hr align="center" color="#0033FF" width="100%" size="1px" class="noprint"></td></tr>
		  <tr bgcolor="#FFFFFF">
		  <td>
<table width="100%"  border="0">
  <tr>
    <td width="37%">&nbsp;</td>
    <td width="26%" background="img/blue1.jpg" class="small_text1" align="center">Red de Distribuidores</td>
    <td width="37%">&nbsp;</td>
  </tr>
  
</table>
		  </td>
		  </tr>
		  <tr>
		  <td>
		  <?
		  $conex=mssql_connect("SISTEMAS","","");
		  mssql_select_db("baseDatos");
		  $result=mssql_query("SELECT cve_distribuidor,tipodist,razon_social,nombre,apellido_p,apellido_m,telefono,fax,ciudad,direccion,estado,email 
		  					   FROM distribuidores WHERE tipodist <> 'no' ORDER BY razon_social",$conex);
		  echo "<table align='center' border='1' cellpadding='3' cellspacing='3'>
		  <tr align='center'>
		  <td background='img/blue.png' class='peque'>Item</td>
		  <td background='img/blue.png' class='peque'>Tipo</td>
		  <td background='img/blue.png' class='peque'>Razon Social</td>
		  <td background='img/blue.png' class='peque'>Nombre</td>
		  <td background='img/blue.png' class='peque'>A.Paterno</td>
		  <td background='img/blue.png' class='peque'>A.Materno</td>
		  <td background='img/blue.png' class='peque'>Telefono</td>
		  <td background='img/blue.png' class='peque'>Fax</td>
		  <td background='img/blue.png' class='peque'>Ciudad</td>
		  <td background='img/blue.png' class='peque'>Direccion</td>
		  <td background='img/blue.png' class='peque'>Estado</td>
		  <td background='img/blue.png' class='peque'>Email</td>
		  </tr>";
		  $i=1;
		  while($fila=mssql_fetch_array($result)){
			$a1=$fila["cve_distribuidor"];
			$tip=$fila["tipodist"];
			$a2=$fila["razon_social"];
			$a3=$fila["nombre"];
			$a4=$fila["apellido_p"];
			$a5=$fila["apellido_m"];
			$a6=$fila["telefono"];
			$a7=$fila["fax"];
			$a8=$fila["ciudad"];
			$a9=$fila["direccion"];
			$b=$fila["estado"];
			$b1=$fila["email"];
			echo "<tr align='left' class='small_text1'>
			<td class='small_text1'>&nbsp;" . $i . "</td><td class='small_text1'>&nbsp;" . $tip . "</td>
			<td class='small_text1'>&nbsp;" . $a2 . "</td><td class='small_text1'>&nbsp;" . $a3 . "</td>
			<td class='small_text1'>&nbsp;" . $a4 . "</td><td class='small_text1'>&nbsp;" . $a5 . "</td>
			<td class='small_text1'>&nbsp;" . $a6 . "</td><td class='small_text1'>&nbsp;" . $a7 . "</td>
			<td class='small_text1'>&nbsp;" . $a8 . "</td><td class='small_text1'>&nbsp;" . $a9 . "</td>
			<td class='small_text1'>&nbsp;" . $b . "</td><td class='small_text1'>&nbsp;" . $b1 . "</td></tr>";
			$i++;
			}
			echo "<tr><td colspan='12' align='center'>
			<a href='javascript:imprimir()' style='text-decoration:none; border-style:none;'>
  <img src='img/print2.jpg' width='69' height='53' style='text-decoration:none; border-style:none;' alt='IMPRIMIR LISTADO' class='noprint'></a>
			</td></tr>";
			echo "</table>";
			mssql_close($conex);			
		  ?>
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