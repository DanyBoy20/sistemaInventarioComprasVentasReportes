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
<SCRIPT LANGUAGE="JavaScript">
function envia(formulario){
document.formulario.action="enadq.php";
document.formulario.submit();
document.formulario.botonDesactivar.disabled = true;
document.formulario.enviar.disabled = true;
document.formulario.cancela.disabled = true;
document.formulario.guardar.disabled = true;
}
</script>
<SCRIPT LANGUAGE="JavaScript">
function envias(formulario){
document.formulario.botonDesactivar.disabled = true;
document.formulario.guardar.disabled = true;
document.formulario.enviar.disabled = true;
document.formulario.cancela.disabled = true;
document.formulario.action="guardaadq2.php";
document.formulario.submit();
}
</script>
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
              <table width="100%"  border="0" bgcolor="#FFFFFF">
          <tr>
            <td width="67%" valign="top">
              <table width="100%"  border="0">
                  <tr>
                  <td align="center" colspan="2" background="../img/blue.png" class="small_text1">
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
Usuario: <? echo $c2; ?>&nbsp;<? echo $c3; ?>&nbsp;<? echo $c4; ?>&nbsp;-&nbsp;<? echo $cargo; ?>&nbsp;-&nbsp;<? echo $puntoventa; ?></td>
                </tr>
				<tr><td colspan="2">
				<A class=main_navigation 
                  href="claudia.php">Inicio</A>
				</td></tr>
				<tr><td colspan="2">
<a class=main_navigation target="_blank" href="veradqui.php?ursec=<? echo $cod;?>&ndn=<? echo $nordn;?>&idadq=<? echo $orden;?>&secur=<? echo session_id();?>">
Ver Orden Completa
</a>
</td></tr>
<tr><td colspan="2">
<a class=main_navigation target="_blank" href="modifadq.php?ursec=<? echo $cod;?>&ndn=<? echo $nordn;?>&idadq=<? echo $orden;?>&secur=<? echo session_id();?>">
Modificar Orden
</a>
</td></tr>
				<tr><td colspan="2">
				<hr align="center" color="#0033FF" width="100%" size="1px">
				</td></tr>
				<tr>
                  <td colspan="2">
				  <table width="100%"  border="0">
  <tr>
    <td background="img/blue1.jpg" align="left">
<?
	$orden=$orden;
	$nordn=$nordn;	
	$conn=mssql_connect("SISTEMAS","","");
     mssql_select_db("baseDatos");
	/* INSERTO LOS VALORES A LAS TABLAS CORRESPONDIENTES */ 
    mssql_close($conn);	
	?>
	<?
	$conon=mssql_connect("SISTEMAS","","");
    mssql_select_db("airenergy",$conon);
    $redo=mssql_query("SELECT nadquisicion FROM ordenadq1 WHERE idadquisicion=$orden",$conon);
    $fla=mssql_fetch_array($redo);
	$d1=$fla["nadquisicion"];
	mssql_close($conon);
    ?>
	<SPAN class="navigation_heading">Orden de Adquisicion No.<? echo $d1;?></SPAN>	
	</td>
    </tr>
	<tr><td align="center">
<?
	$cxxn=mssql_connect("SISTEMAS","","");
    mssql_select_db("airenergy",$cxxn);
	$ok=mssql_query("SELECT cantidadadq,precprouniadq,linea,descripcion,idproduct
                     FROM(ordenadq2 INNER JOIN inventa1 ON ordenadq2.cod=inventa1.cod)
                     WHERE idadquisicion=$orden",$cxxn);
	echo "<table width='100%' border='1'>
    <tr class='peque'>
	<td align='center' background='img/blue1.jpg'>Clave</td>
	<td align='center' background='img/blue1.jpg'>Linea</td>
    <td align='center' background='img/blue1.jpg'>Cantidad</td>
    <td align='center' background='img/blue1.jpg'>Descripcion</td>
	<td align='center' background='img/blue1.jpg'>Precio Unitario</td>
    <td align='center' background='img/blue1.jpg'>Total</td></tr>";
    while($st=mssql_fetch_array($ok)){	
	$dp1=$st["cantidadadq"];
	$dp2=$st["precprouniadq"];
	$dp3=$st["idproduct"];
	$dp4=$st["linea"];
	$dp5=$st["descripcion"];	
	$dp6=$dp1*$dp2;
	echo "<tr>
    <td style='font-size:.75em;'>" . $dp3 . "</td>
	<td style='font-size:.75em;'>" . $dp4 . "</td>
	<td style='font-size:.75em;'>" . $dp1 . "</td>
	<td style='font-size:.75em;'>" . $dp5 . "</td>
	<td style='font-size:.75em;'>" . $dp2 . "</td>
	<td style='font-size:.75em;'>" . $dp6 . "</td>
    </tr>";
	}
	mssql_close($cxxn);
	echo "</table>";
?>	
	</td></tr>
	<tr>
	<td align="center">	
	
		<form name="formulario" method="post" action="#">
<table border="0" class="small_text1" width="715">
<tr><td colspan="2" align="center"><input type="button" name="guardar" value="Guardar Orden Actual" onClick="envias(this.form)">
<input type="button" name="enviar" value="Guardar Orden Actual en PC" onClick="envia(this.form)">
<input type="submit" name="cancela" value="Cancelar Orden" onclick="this.form.action='canceln.php'"></td></tr>
<tr> 
 <td width="75">Producto:</td>
 <td width="679" valign="middle"> 
 <input type="text" name="cproc">
 <!--
<select name="cproc" style="width:95%; font-size:.85em;">
<?
		$cn=mssql_connect("SISTEMAS","","");
        mssql_select_db("airenergy",$cn);
		$rsl=mssql_query("SELECT cod,idproduct,linea,descripcion
		                  FROM inventa1 WHERE statusP IS NULL ORDER BY linea",$cn);
		while($linea=mssql_fetch_array($rsl)){
		$f1=$linea["cod"];
		$f2=$linea["idproduct"];
		$f3=$linea["linea"];
		$f4=$linea["descripcion"];
		echo "<option value='$f1'>$f2  -  $f3-$f4</option>";
		}
		mssql_close($cn);	
?>		
</select>
-->
<input type="hidden" name="orden" value="<? echo $orden;?>">
<input type="hidden" name="nordn" value="<? echo $nordn;?>">
</td>
</tr>
 <tr> 
 <td colspan="2" align="center"> 
<input type="submit" name="botonDesactivar" value="Agregar" onClick="this.form.action='oadq3.php'">

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
			
			</td>
          </tr>
      </table></td>
    </tr>
  </table>
</center></BODY>
</HTML>