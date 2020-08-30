<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<?
$rs=trim($rs);
$rfcdist=trim(strtoupper($rfcdist));
$codig=strtoupper($codig);
$nm=trim($nm);
$ap=trim($ap);
$am=trim($am);
$tl=trim($tl);
$fx=trim($fx);
$cd=trim($cd);
$dr=trim($dr);
$es=trim($es);
$em=trim($em);
$cve=$cve;
$conexionw=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$checa1=mssql_query("SELECT codigo FROM distribuidores WHERE codigo='$codig'",$conexionw);
$checa2=mssql_fetch_array($checa1);
$checa3=$checa2["codigo"];
?>
<? if($rs == "" || $codig == "" || $nm == "" || $ap == "" || $tl == "" || $cd == "" || $dr == "" || $es == ""):?>
<?
echo "<script>alert('EXISTEN CAMPOS VACIOS ... FAVOR DE HACER LA INSERCION NUEVAMENTE');</script>";
mssql_close($conexionw);
echo "<form name='formu' method='post' action='distribuidores.php'>
		<input type='hidden' name='rs' value=$rs>
		<input type='hidden' name='rfcdist' value=$rfcdist>
		<input type='hidden' name='codig' value=$codig>
		<input type='hidden' name='nm' value=$nm>
		<input type='hidden' name='ap' value=$ap>
		<input type='hidden' name='am' value=$am>
		<input type='hidden' name='tl' value=$tl>
		<input type='hidden' name='fx' value=$fx>
		<input type='hidden' name='cd' value=$cd>
		<input type='hidden' name='dr' value=$dr>
		<input type='hidden' name='es' value=$es>
		<input type='hidden' name='em' value=$em>
		<input type='hidden' name='tip' value=$tip>
		<input type='hidden' name='ps' value=$ps>
		<input type='hidden' name='cve' value=$cve>
		<input type='hidden' name='logo' value=$logo>";
echo "<script>formu.submit();</script></form>";
?>
?>
<? elseif($checa3 == $codig):?>
<?
echo "<script>alert('EL CODIGO $codig ESTA REPETIDO, ASIGNE OTRO');</script>";
mssql_close($conexionw);
echo "<form name='formu' method='post' action='distribuidores.php'>
		<input type='hidden' name='rs' value=$rs>
		<input type='hidden' name='rfcdist' value=$rfcdist>
		<input type='hidden' name='codig' value=$codig>
		<input type='hidden' name='nm' value=$nm>
		<input type='hidden' name='ap' value=$ap>
		<input type='hidden' name='am' value=$am>
		<input type='hidden' name='tl' value=$tl>
		<input type='hidden' name='fx' value=$fx>
		<input type='hidden' name='cd' value=$cd>
		<input type='hidden' name='dr' value=$dr>
		<input type='hidden' name='es' value=$es>
		<input type='hidden' name='em' value=$em>
		<input type='hidden' name='tip' value=$tip>
		<input type='hidden' name='ps' value=$ps>
		<input type='hidden' name='cve' value=$cve>
		<input type='hidden' name='logo' value=$logo>";
echo "<script>formu.submit();</script></form>";
?>
<? else:?>
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

</HEAD>
<BODY background="img/fondo.gif" leftMargin=0 topMargin=0 marginwidth="0" marginheight="0" bottommargin="0" bgproperties="fixed"><center>
  <table width="804" height="336" align="center" cellpadding="0" cellspacing="0" class="bordet">
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
		  <tr bgcolor="#FFFFFF">
		  <td>
		  <hr align="center" color="#0033FF" width="100%" size="1px">
		  </td>
		  </tr>
		  <tr bgcolor="#FFFFFF">
		  <td>
		  <table width="100%"  border="0">
  <tr>
    <td width="37%">
	<?
$con=mssql_connect("SISTEMAS","","");
		  mssql_select_db("baseDatos");
		  $resul=mssql_query("SELECT clave from acceso",$con);
$i=1;
while($f=mssql_fetch_array($resul)){
$a[$i]=$f["clave"];
$i++;
}
rsort ($a);
$w=$a[0];
$w=$w+1;
/*sort() valor minimo ... rsort() valor maximo*/
?>
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
	<?
	$tip=$tip;
	$claveacceso=$w;
	$passacceso=$password;
	$clave=$cve;
	$rsoc=$rs;
	$nom=$nm;
	$apat=$ap;
	$amat=$am;
	$tel=$tl;
	$fax=$fx;
	$ciud=$cd;
	$direcc=$dr;
	$esta=$es;
	$correo=$em;	
	$log=$logo;
	$pass=$ps;
	$ste="activo";		
	$conx=mssql_connect("SISTEMAS","","");
		  mssql_select_db("baseDatos");
		  mssql_query("INSERT  INTO distribuidores
		 (cve_distribuidor,codigo,tipodist,razon_social,rfcdst,nombre,apellido_p,
		  apellido_m,telefono,fax,ciudad,direccion,estado,email,logo,contra,status,abrecierra)VALUES('$clave','$codig','$tip',
		  '$rsoc','$rfcdist','$nom','$apat','$amat','$tel','$fax','$ciud','$direcc','$esta','$correo','$log','$pass','$ste','no')");
		  
		  mssql_query("INSERT  INTO acceso
		 (clave,razons,nombre,apate,pwss)VALUES('$claveacceso','$rsoc','$nom','$apat','$passacceso')");
		  
		  mssql_close($conexion);		  
	?>
	</td>
    <td width="26%" background="img/blue1.jpg" class="small_text1" align="center">Registro Insertado
	</td>
    <td width="37%" align="right"><A class=main_navigation 
                  href="distribuidoresc.php">Insertar Otro registro</A></td>
  </tr>
  <tr><td colspan="3"><hr align="center" color="#0033FF" width="100%" size="1px"></td></tr>
</table>
		  </td>
		  </tr>
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
		  <tr bgcolor="#FFFFFF">
		  <td>
		  <?
		  $conex=mssql_connect("SISTEMAS","","");
		  mssql_select_db("baseDatos");
		  $result=mssql_query("SELECT cve_distribuidor,tipodist,razon_social,nombre,apellido_p,apellido_m,telefono,fax,ciudad,direccion,estado,email 
		  					   FROM distribuidores WHERE tipodist <> 'no'",$conex);
		  echo "<table align='center' border='1' cellpadding='3' cellspacing='3'>
		  <tr align='center'>
		  <td background='img/blue.png' class='peque'>Item</td>
		  <td background='img/blue.png' class='peque'>Razon Soc.</td>
		  <td background='img/blue.png' class='peque'>Tipo</td>
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
<? endif;?>