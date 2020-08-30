<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
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

if (IE) alert('Energia Ambiental de México S.A. de C.V.');
return ;
}



var NS = (document.layers) ;
var IE = (document.all) ;
if (NS) document.captureEvents(Event.MOUSEDOWN) ;
document.onmousedown = click ;
</SCRIPT>
<SCRIPT languague="JavaScript">
 var cuenta=0
 var texto="   >>>Energia Ambiental de México S.A. de C.V.  ::: No más cloro, no más calderas!!! Bombas de calor Air Energy: Calienta tu piscina, no quemes tu dinero   ::: <<<   "
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

<script language=javascript > 
window.moveTo(0,0);
window.resizeTo(402,512);
</script>
<script language="javascript">
function cerrar(){ 
var ventana = window.self; 
ventana.opener = window.self;
alert("Acceso Denegado ... Usuario no registrado !!! "); 
ventana.close(); 
} 
</script>
</head>

<body bgcolor="#000000" onLoad="cerrar()" bgproperties="FIXED" leftMargin=0 topMargin=25 marginwidth="0" marginheight="0" bottommargin="0">
<center><img src="img/ind.jpg" width="228" height="290"></center>
</body>
</html>
