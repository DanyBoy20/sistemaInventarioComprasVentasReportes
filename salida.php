<?
session_start();
$conectate=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
mssql_query("UPDATE administracion SET abrecierra='no' WHERE  clave='$cod'",$conectate);
mssql_close($conectate);
session_destroy();
session_unset();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Gracias por usar nuestros servicios</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
<SCRIPT languague="JavaScript">
 var cuenta=0
 var texto="   >>>Gracias por usar nuestros servicios :::: EAM<<<   "
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
window.moveTo(0,0);
window.resizeTo(510,310);
function salir(){
alert("                  SESION TERMINADA\n\nGRACIAS POR UTILIZAR NUESTROS SERVICIOS\n\n  ENERGIA AMBIENTAL DE MEXICO S.A. DE C.V.\n");
window.close();
}
</script>
</head>
<?
echo "<body onLoad='salir()' bottommargin='0' leftmargin='0' marginheight='0' marginwidth='0' rightmargin='0' topmargin='0'>";
?>
<center></center><img src="img/groupam.jpg" width="487" height="290"></center>
</body>
</html>
