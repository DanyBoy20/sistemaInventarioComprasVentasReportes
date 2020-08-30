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

@media print 
{ 
.noprint {display: none;
		}
} 
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

if (IE) alert('Energia Ambiental de M�xico S.A. de C.V.');
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
 var texto="   >>>Energia Ambiental de M�xico S.A. de C.V.  ::: No m�s cloro, no m�s calderas!!! Bombas de calor Air Energy: Calienta tu piscina, no quemes tu dinero   ::: <<<   "
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
  <table width="auto" height="78" align="center" cellpadding="0" cellspacing="0">
     <tr valign="middle">
      <td background="img/blue.png" align="center" class="small_text1" valign="middle">Buscar Productos</td>
    </tr>
    <tr>
      <td height="24" valign="top" align="center">
        <table width="auto"  border="0">
          <tr align="center">
            <td width="67%" valign="top" align="center" class="small_text1">
              <form method="post" action="equipment3.php">
			  <table>
			  <tr><td class="small_text1">Producto</td><td><input type="text" name="prd" size="12" maxlength="20"></td></tr>
			  <tr><td colspan="2" align="center"><input type="submit" value="Buscar"></td></tr>
			  </table>
			  </form>
			<!-- <Center><input type="button" class="noprint" name="imprimir" value="Imprimir" onclick="window.print();"></Center> -->
			</td>
          </tr>
		  <tr><td align="center"><A class=main_navigation 
                  href="equipment4.php">Mostrar todos</A></td></tr>
				<tr><td align="center"><hr align="center" color="#0033FF" width="100%" size="1px"></td></tr>
				  <tr><td align="center"><A class=main_navigation 
                  href="#">Mostrar por linea</A></td></tr>
				  <tr><td align="center">
				  <form method="post" action="equipment5.php">
				  <table>
			  <tr><td class="small_text1">Linea</td><td>
			  <select name="prd">
			  <option value="Adornos Fuentes y Cascadas">Adornos Fuentes y Cascadas</option>
			  <option value="Automatizacion">Automatizacion</option>
			  <option value="Automatizacion/Bombas de Agua">Automatizacion/Bombas de Agua</option>
			  <option value="Bombas de agua">Bombas de agua</option>
			  <option value="Bombas de Calor">Bombas de Calor</option>
			  <option value="Calderas">Calderas</option>
			  <option value="Filtros">Filtros</option>
			  <option value="Generador de Cloro">Generador de Cloro</option>
			  <option value="Limpiadores de fondo">Limpiadores de fondo</option>
			  <option value="Luces">Luces</option>
			  <option value="Motor Actuador de Valvulas">Motor Actuador de Valvulas</option>
			  <option value="Valvulas">Valvulas</option>
			  </select>
			  </td></tr>
			  <tr><td colspan="2" align="center"><input type="submit" value="Buscar"></td></tr>
			  </table></form>
				  </td></tr>  
      </table></td>
    </tr>
  </table>
</center></BODY>
</HTML>
