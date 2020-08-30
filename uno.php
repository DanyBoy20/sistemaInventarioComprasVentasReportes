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
document.formulario.agrega.disabled = true;
document.formulario.cancela.disabled = true;
document.formulario.action="guardaadq1.php";
document.formulario.submit();
document.formulario.enviar.disabled = true;
document.formulario.imprime.disabled = true;
document.formulario.cproc.disabled = true;
document.formulario.unitario.disabled = true;
}
</script>
<SCRIPT LANGUAGE="JavaScript">
function envias(formulario){
document.formulario.agrega.disabled = true;
document.formulario.cancela.disabled = true;
document.formulario.action="eadq.php";
document.formulario.submit();
document.formulario.enviar.disabled = true;
document.formulario.cproc.disabled = true;
document.formulario.unitario.disabled = true;
document.formulario.imprime.disabled = true;
}
</script>
<script language="javascript">
function desactivarbtns(formulario){	
	var res=confirm("Son correctos los datos introducidos?");
	if(res==true){
	formulario.agrega.disabled = false;	
	formulario.enviar.disabled = false;
	formulario.imprime.disabled = false;
	formulario.cancela.disabled = true;
    }else{
	formulario.agrega.disabled = true;	
	formulario.enviar.disabled = true;
	formulario.imprime.disabled = true;
	formulario.cancela.disabled = false;
	formulario.unitario.focus();
	}
}	
</script>
<SCRIPT LANGUAGE="javascript">
function valida1(obj,bajo,alto){
if((obj.value<bajo) || (obj.value>alto)){
alert("Debe de ingresar el precio");
obj.focus();
}
}
</SCRIPT>
<script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</HEAD>
<BODY background="img/fondo.gif" leftMargin=0 topMargin=0 marginwidth="0" marginheight="0" bottommargin="0" bgproperties="fixed"><center>
  <table width="804" height="245" align="center" cellpadding="0" cellspacing="0" class="bordet">
    <tr>
      <td height="134">
      <div align="center">
            <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0','width','800','height','134','src','img/TRANS','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','img/TRANS' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="800" height="134">
              <param name="movie" value="img/TRANS.swf">
              <param name="quality" value="high">
              <embed src="img/TRANS.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="800" height="134"></embed>
            </object></noscript>
        </div></td>
    </tr>    
    <tr>
      <td height="58" valign="top">
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
Usuario: <? echo $c2; ?>&nbsp;<? echo $c3; ?>&nbsp;<? echo $c4; ?>&nbsp;-&nbsp;<? echo $cargo; ?>&nbsp;-&nbsp;<? echo $puntoventa; ?>

</td>
                </tr>
                <!--
				<tr><td colspan="2">
				<A class=main_navigation 
                  href="claudia.php">Inicio</A>
				</td></tr>
<tr><td colspan="2">
<A class=main_navigation href="adq.php">Regresar</A>
</td></tr>
				<tr><td colspan="2">
				<hr align="center" color="#0033FF" width="100%" size="1px">
				</td></tr>
				<tr>
                -->
                  <td colspan="2">
<?
$orden=$orden;
$idadq=$idadq;
$nordn=$ndn;
$w=$w;
$logoprecio="$ ";
/* SELECCIONO LOS DATOS DE LA ORDEN (ORDENADQ1)  */  
$conn=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
mssql_query("UPDATE intentos SET idintento=0",$conn);
$result5=mssql_query("SELECT nadquisicion,diaadqui,mesadqui,anioadqui,fechoadq1,fecharevision,
                             condicionespago,fechaenvioadqui1,fechaenvioadqui2,fechadesent,fechadesent2,
							 calleadq,numeroadq,coloniaadq,codpost,ciudadadq,estadoadq,rfcadq,
							 idtransporte,formatransporte,consolidadora,frmpagotranspadq,revision,comentaadq
			          FROM ordenadq1 WHERE idadquisicion=$idadq",$conn);
$ficha2=mssql_fetch_array($result5);
$n1=$ficha2["nadquisicion"];
$n2=$ficha2["diaadqui"];
$n3=$ficha2["mesadqui"];
$n4=$ficha2["anioadqui"];
$fechacreada=$ficha2["fechoadq1"];
$fecharevisa=$ficha2["fecharevision"];
$n5=$ficha2["condicionespago"];
$n6=$ficha2["fechaenvioadqui1"];
$n7=$ficha2["fechadesent"];
$fchdeseada=$ficha2["fechadesent2"];
$m6=$ficha2["fechaenvioadqui2"];
$m7=$ficha2["fechadesent2"];
$n8=$ficha2["calleadq"];
$n9=$ficha2["numeroadq"];
$n10=$ficha2["coloniaadq"];
$n11=$ficha2["codpost"];
$n12=$ficha2["ciudadadq"];
$n13=$ficha2["estadoadq"];
$n14=$ficha2["rfcadq"];
$n15=$ficha2["idtransporte"];
$n16=$ficha2["formatransporte"];
$consolida=$ficha2["consolidadora"];
$n17=$ficha2["frmpagotranspadq"];
$revi=$ficha2["revision"];
$n18=$ficha2["comentaadq"];
$trns=mssql_query("SELECT razonsocialtrns FROM proveedores WHERE idtransporte=$n15",$conn);
$fich1=mssql_fetch_array($trns);
$tran=$fich1["razonsocialtrns"];
$cons=mssql_query("SELECT razonsocialtrns FROM proveedores WHERE idtransporte=$consolida",$conn);
$fich34=mssql_fetch_array($cons);
$consol=$fich34["razonsocialtrns"];
$dia1=date("d");
$mes1=date("m");
$anio1=date("Y");
$fecharevisa="$dia1/$mes1/$anio1";
mssql_close($conn);
echo "<form action='#' method='post'>
<hr align='center' color='#0033FF' width='100%' size='2px'>
<center>";
echo "\n<table align=center width='100%'>"; 
echo "\n<tr class='small_text1' align='center'>
		  <td background='img/blue1.jpg'>CMD</td>
		  <td background='img/blue1.jpg'>Clave</td>
		  <td background='img/blue1.jpg'>Linea</td>
		  <td background='img/blue1.jpg'>Descripcion</td>
		  <td background='img/blue1.jpg'>Cantidad</td>
		  <td background='img/blue1.jpg'>Precio</td>
		  <td background='img/blue1.jpg'>Total</td>
		  </tr>"; 
$conn=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$result=mssql_query("SELECT inventa1.cod,inventa1.idproduct,inventa1.linea,inventa1.descripcion,ordenadq2.cantidadadq,ordenadq2.precprouniadq
                       FROM inventa1,ordenadq2
                      WHERE (ordenadq2.cod=inventa1.cod and idadquisicion=$idadq)",$conn);
$numerofilas=mssql_num_rows($result); 
   $i = 1; 
   while ($fila2=mssql_fetch_array($result)){ 
	  echo "\n<input type=hidden name=idproduct" . $i . " value=" . $fila2["cod"] . ">";
      echo "<tr>"; 
	  if($numerofilas==1){
	  echo "<td  class='peque' align='center'>$i</td>";
	  }else{
	  echo "<td  class='peque' align='center'><a href='uno3.php?idadq=$idadq&w=$w&nordn=$nordn&idproduct=" . $fila2['cod'] . "'>Eliminar</a></td>";
	  }
      echo "<td  class='peque' align='center'>" . $fila2["idproduct"] . "</td>"; 
	  echo "<td  class='peque' align='center'>" . $fila2["linea"] . "</td>";
	  echo "<td  class='peque'>" . $fila2["descripcion"] . "</td>";
	  echo "<td align='center'><input type=text maxlength='3' size='3' name=canti" . $i . " value=" . $fila2["cantidadadq"] . "></td>"; 
	  echo "<td  class='peque' align='center'>$<input type='text' size='5' name=preci" . $i . " value=" . $fila2["precprouniadq"] . "></td>"; 
	  echo "<td  class='peque' align='center'>$ " . number_format($fila2["precprouniadq"]*$fila2["cantidadadq"],2) . "</td>";
      echo "</tr>"; 
      $i++; 
} 
   echo "\n<tr>
   			<td colspan='5' class='peque'>";
			$okw=mssql_query("SELECT SUM(totlprdadq) AS tot FROM ordenadq2 
                     WHERE idadquisicion=$idadq",$conn);
		    $registroqz=mssql_fetch_array($okw);
		    $subt=$registroqz["tot"];
		    $iv=$subt*.15;
		    $neto=$subt+$iv;
	echo "</td>
    		<td class='peque' align='right' background='img/blue1.jpg'>Subtotal</td>
			<td class='peque' align='center'>$ " . number_format($subt,2) . "</td>
   		   </td></tr>";
   echo "\n<tr>
   			<td colspan='5' class='peque'>&nbsp;</td>
    		<td class='peque' align='right' background='img/blue1.jpg'>I.V.A.</td>
			<td class='peque' align='center'>$ " . number_format($iv,2) . "</td>
   		   </td></tr>";
   echo "\n<tr>
   			<td colspan='5' class='peque'>&nbsp;</td>
    		<td class='peque' align='right' background='img/blue1.jpg'>Total</td>
			<td class='peque' align='center'>$ " . number_format($neto,2) . "</td>
   		   </td></tr>";
   echo "\n<tr><td colspan=7 align=center>
   <input type=hidden name='numefilas' value='$numerofilas'>
   <input type=hidden name='idadq' value=$idadq>
   <input type=hidden name='w' value=$w>
   <input type=hidden name='nordn' value=$nordn>
   <input type=hidden name='orden' value=$orden>
   <input type='submit' value='Actualizar Orden' onClick=this.form.action='uno2.php'>
   </td></tr>"; 
   echo "\n</table>";
  echo "\n<tr class='small_text1' align='center'>
		  <td colspan=7 background='img/blue1.jpg'>Agregar Producto a Orden</td>
		  </tr>";
  echo "\n<tr class='small_text1' align='center'>
		  <td colspan=7>
		  Clave Producto:<input type='text' name='pc1'>&nbsp;
		  Cantidad<input type='text' name='ct1' size='5' maxlength='2'>";
		  /*
		  <input type='hidden' name='idadq' value=$idadq>
		  <input type=hidden name='w' value=$w>
   		  <input type=hidden name='nordn' value=$nordn>
   	      <input type=hidden name='orden' value=$orden>
		  */
		  echo "<br>
		  <input type='submit' value='Agregar Producto a Orden' onClick=this.form.action='uno1.php'>
		  </td>
		  </tr>";
  echo "</center></form>";
?>
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