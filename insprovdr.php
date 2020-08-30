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
      </table></td>
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
	/*
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
*/
/*sort() valor minimo ... rsort() valor maximo*/
?>
	<?
// ** Generador de Contrase�as de una longitud dada.
// ** $longitud es el n�mero de caracteres
// ** de la contrase�a generada.
// *********************************************************************

// function GeneraPassword($longitud)
// {
// global $password;
/* Se valida la longitud proporcionada. Debe ser n�mero y mayor de cero.
Si es menor o igual a cero le asignamos la longitud por defecto.
Si es mayor de 32 le asignamos 32.
*/

// if(!is_numeric($longitud) || $longitud <= 0)
// {
// $longitud = 6;
// }

// if($longitud > 6)
// {
// $longitud = 6;
// }


/* Asignamos el juego de caracteres al array $caracteres para generar la contrase�a.
Podemos a�adir m�s caracteres para hacer m�s segura la contrase�a.
*/
//
// $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

/* Introduce la semilla del generador de n�meros aleatorios mejorado */
// mt_srand(microtime() * 1000000);

// for($i = 0; $i < $longitud; $i++)
// {
/* Genera un valor aleatorio mejorado con mt_rand, entre 0 y el tama�o del array
$caracteres menos 1. Poster�ormente vamos concatenando en la cadena $password
los caracteres que se van eligiendo aleatoriamente.
*/
// $key = mt_rand(0,strlen($caracteres)-1);
// $password = $password . $caracteres{$key};
// }

// return $password;
// }
/* Llamamos a la funci�n GeneraPassword y mostramos la clave generada.
echo GeneraPassword(10);*/
// GeneraPassword(10);
// 
?>
    <?
	$idtrans=$cve;
	$rsoc=$rs;
	$tipo=$tipotrns;
	$con1=$cn1;
	$con2=$cn2;
	$con3=$cn3;
	$con4=$cn4;
	$dire=$dir;
	$ciu=$cd;
	$esta=$est;
	$correo=$em;	
	$tl=$tel;
	$fax=$fx;		
	$rfcc=$rfc;
	$comenta=$coment;
	$conx=mssql_connect("SISTEMAS","","");
		  mssql_select_db("baseDatos");
		  mssql_query("INSERT  INTO proveedores
		 (idtransporte,razonsocialtrns,tipoproveedor,nomcontactotrns,
		  nomcontacto2,nomcontacto3,nomcontacto4,direcciontrns,ciudadtrns,
		  estadotrns,telefonotrns,faxtrns,RFCtrns,emailtrns,comentariostrns)VALUES('$idtrans',
		  '$rsoc','$tipo','$con1','$con2','$con3','$con4','$dire','$ciu','$esta','$correo','$tl','$fax','$rfcc','$comenta')");
		 /* 
		  mssql_query("INSERT  INTO acceso
		 (clave,razons,nombre,apate,pwss)VALUES('$claveacceso','$rsoc','$nom','$apat','$passacceso')");
		  */
		  mssql_close($conexion);		  
	?>	</td>
    <td width="26%" background="img/blue1.jpg" class="small_text1" align="center">Registro Insertado
	</td>
    <td width="37%" align="right"><A class=main_navigation 
                  href="proveedores.php">Insertar Otro registro</A></td>
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
    <td width="26%" background="img/blue1.jpg" class="small_text1" align="center">Proveedores</td>
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
		  $result=mssql_query("SELECT idtransporte,razonsocialtrns,tipoproveedor,ciudadtrns,estadotrns,RFCtrns 
		  					   FROM proveedores",$conex);
		  echo "<table align='center' border='0' cellpadding='3' cellspacing='3'>
		  <tr align='center'>
		  <td background='img/blue1.jpg' class='peque'>Item</td>
		  <td background='img/blue1.jpg' class='peque'>Razon Soc.</td>
		  <td background='img/blue1.jpg' class='peque'>Tipo</td>
		  <td background='img/blue1.jpg' class='peque'>Ciudad</td>
		  <td background='img/blue1.jpg' class='peque'>Estado</td>
		  <td background='img/blue1.jpg' class='peque'>RFC</td>
		  </tr>";
		  while($fila=mssql_fetch_array($result)){
			$a1=$fila["idtransporte"];
			$a2=$fila["razonsocialtrns"];
			$a3=$fila["tipoproveedor"];
			$a4=$fila["ciudadtrns"];
			$a5=$fila["estadotrns"];
			$a6=$fila["RFCtrns"];
			echo "<tr align='left' class='small_text1'>
			<td class='small_text1'>" . $a1 . "</td><td class='small_text1'>" . $a2 . "</td>
			<td class='small_text1'>" . $a3 . "</td><td class='small_text1'>" . $a4 . "</td>
			<td class='small_text1'>" . $a5 . "</td><td class='small_text1'>" . $a6 . "</td>";
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
      </td>
    </tr>
  </table>
</center></BODY>
</HTML>