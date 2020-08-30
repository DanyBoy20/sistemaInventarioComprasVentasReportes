<?
session_start();
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
<script language="javascript">
function envia(formu){
formu.submit();
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
                  <td colspan="2" background="../img/blue.png" class="small_text1">Menu Principal Administradores</td>
                </tr>
                 <tr>
                  <td width="20%"><A class=main_navigation 
                  href="claudia.php">Inicio</A>
				  </td>
                  <td width="80%" rowspan="7" class="small_text1">
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
                  href="pedidosea.php">Pedidos Vendedores Energia Ambiental</A></td>
                </tr>
				<tr>
                  <td><A class=main_navigation 
                  href="pedidosdist.php">Pedidos Distribuidores</A></td>
                </tr>                
                <tr>
                  <td><A class=main_navigation 
                  href="reportesc.php">Reportes</A></td>
                </tr>
				<tr>
                  <td><A class=main_navigation 
                  href="clientesc.php">Clientes</A></td>
                </tr>
                <tr>
                  <td><A class=main_navigation 
                  href="vendedoresc.php'">Vendedores</A></td>
                </tr>
				<tr>
                  <td><A class=main_navigation 
                  href="libro.php'">Firmar Libro de visitas</A></td>
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
<? 
//Conexion con la base 
$conn=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");

if (!$_POST){ 
   //si no recibo datos de POST, muestro el formulario 

   //es posible que recibamos un id a partir del que hay que mostrar los datos 
   if (isset($_GET["id_mostrar"])) 
      $id_mostrar = $_GET["id_mostrar"]; 
   else 
      $id_mostrar = 0; 

   //extraemos de la base de datos los registros a mostrar 
   //Ejecutamos la sentencia SQL, limitando la b�squeda a 10 registros 
   $ssql="SELECT TOP 10 cve_produc,producto,modelo,descripcion,existen FROM inventario WHERE cve_produc>$id_mostrar"; 
   $result=mssql_query($ssql); 

   echo "<form action='inventarioc.php' method=post>"; 
   echo "\n<table align=center>"; 
   echo "\n<tr class='small_text1' align='center'>
		  <td background='img/blue1.jpg'>Producto</td>
		  <td background='img/blue1.jpg'>Modelo</td>
		  <td background='img/blue1.jpg'>Descripcion</td>
		  <td background='img/blue1.jpg'>Existencia</td>
		  </tr>"; 

   $i = 1; 
   while ($fila=mssql_fetch_array($result)){ 
      echo "\n<input type=hidden name='id$i' value='" . $fila["cve_produc"] . "'>"; 
      echo "<tr>"; 
      echo "<td  class='peque'>" . $fila["producto"] . "</td>"; 
	  echo "<td  class='peque'>" . $fila["modelo"] . "</td>";
	  echo "<td  class='peque'>" . $fila["descripcion"] . "</td>";
	        echo "<td><input type=text name='telefono$i' value='" . $fila["existen"] . "'></td>"; 
      echo "</tr>"; 
      $i++; 
      $ultimo_mostrado = $fila["cve_produc"]; 
   } 

   echo "\n<tr><td colspan=4 align=center><input type='submit' value='OK'></td></tr>"; 
   echo "\n</table>"; 
   echo "\n</form>"; 

   //si se han mostrado registros, pongo el enlace para ver los siguientes 
   if (isset($ultimo_mostrado)) 
      echo "\n<br><a class=main_navigation href='inventarioc.php?id_mostrar=" . $ultimo_mostrado . "'>Ver los 10 siguientes</a>"; 
   }else{ 

   //es que he recibido datos de formulario, entonces tengo que recibirlos y actualizar la base de datos 
   for ($i=1;$i<=10;$i++){ 
      //para cada uno de los elementos que puede haber en el formulario 
      if (isset($_POST["id" . $i])){ 
         //es que este registro estaba en el formulario 
         $id = $_POST["id" . $i]; 
         $telefono = $_POST["telefono" . $i]; 
         $ssql = "update inventario set existen='$telefono' where cve_produc=$id"; 
         if (mssql_query($ssql)) 
            echo "<br><font face='ariel' size='2' color='#666666'>Actualizacion con �xito</font>"; 
         else 
            echo "<br><font face='ariel' size='2' color='#666666'Actualizacion fallida</font>"; 
      } 
   } 
      echo "\n<p><a class='main_navigation' href=inventarioc.php>Volver</font></a>"; 
   } 
?>
<br>	</td>
	</tr>
	<tr bgcolor="#FFFFFF">
	<td class="small_text1">
	<hr align="center" color="#0033FF" width="100%" size="1px">
	
    	
	</td>
	</tr>
    <tr>
  </table>
</center></BODY>
</HTML>  