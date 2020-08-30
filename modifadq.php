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
  <table width="804" height="314" align="center" cellpadding="0" cellspacing="0" class="bordet">
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
Usuario: <? echo $c2; ?>&nbsp;<? echo $c3; ?>&nbsp;<? echo $c4; ?>&nbsp;-&nbsp;<? echo $cargo; ?>&nbsp;-&nbsp;<? echo $puntoventa; ?>

</td>
                </tr>
				<tr><td colspan="2">
				<A class=main_navigation 
                  href="claudia.php">Inicio</A>
				</td></tr>
<tr><td colspan="2">
<A class=main_navigation href="verordenesadq.php">Revisar otra orden</A>
</td></tr>
<tr><td colspan="2">
<A class=main_navigation href="adq.php">Nueva Orden</A>
</td></tr>
				<tr><td colspan="2">
				<hr align="center" color="#0033FF" width="100%" size="1px">
				</td></tr>
				<tr>
                  <td colspan="2">
<?
$idadq=$idadq;
$logoprecio="$ ";
/* SELECCIONO LOS DATOS DE LA ORDEN (ORDENADQ1)  */  
$conn=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$result5=mssql_query("SELECT ordendped,nadquisicion,diaadqui,mesadqui,anioadqui,fechoadq1,fecharevision,
                             condicionespago,fechaenvioadqui1,fechaenvioadqui2,fechadesent,fechadesent2,
							 calleadq,numeroadq,coloniaadq,codpost,ciudadadq,estadoadq,rfcadq,
							 idtransporte,formatransporte,consolidadora,frmpagotranspadq,revision,comentaadq,statusadq
			          FROM ordenadq1 WHERE idadquisicion=$idadq",$conn);
$ficha2=mssql_fetch_array($result5);
$n0=$ficha2["ordendped"];
$n1=$ficha2["nadquisicion"];
$n2=$ficha2["diaadqui"];
$n3=$ficha2["mesadqui"];
$n4=$ficha2["anioadqui"];
$fechacreada=$ficha2["fechoadq1"];
$fecharevisa=$ficha2["fecharevision"];
$n5=$ficha2["condicionespago"];
$n6=$ficha2["fechaenvioadqui1"];
$n7=$ficha2["fechadesent"];
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
$estatusadq=$ficha2["statusadq"];
$diacam=substr($m6,0,2);
$mescam=substr($m6,3,-5);
$aniocam=substr($m6,-4);
$diaentd=substr($m7,0,2);
$mesentd=substr($m7,3,-5);
$anioentd=substr($m7,-4);
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
<table border=0 width='100%' cellpadding='2' cellspacing='2'>
<tr>
	<td align='center' valign='middle' with='auto' colspan='3' rowspan='4'>
		<img src='http://www.airenergy-mexico.com/new/ventas/img/logoga.png' width='148' height='81'>
	</td>	
	<td align='right' valign='middle' with='auto' colspan='3' rowspan='4'>
		<img src='http://www.airenergy-mexico.com/new/img/whitespace.png' width='225' height='81'>
	</td>	
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='0.2'><b>
	Orden de Adquisicion No.:</b></font>
	</td>
	<td align='center' valign='middle' with='auto' colspan='2'><font face='Arial' size='0.2' color='red'><b>
	$n1</b></font>
	</td>
</tr>
<tr>
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' style='font-size:.75em;'><b>
	Orden de Pedido:</b></font>
	</td>
	<td align='center' valign='middle' with='auto' colspan='2'><font face='Arial' style='font-size:.75em;'>
	<input type='text' name='ordenpe' size='7' maxlength='6' value='$n0' style='font-size:.75em;'></font>
	</td>
</tr>
<tr>
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='0.2'><b>
	Fecha creacion orden:</b></font>
	</td>
	<td align='center' valign='middle' with='auto' colspan='2'><font face='Arial' size='0.2'>
	$n2 / $n3 / $n4</font>
	</td>
</tr>
<tr>
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='0.2'><b>Revision:&nbsp;
	<input type='text' size='2' maxlength='2' name='revi' value=$revi>Fecha revision:</b></font>
	</td>
	<td align='center' valign='middle' with='auto' colspan='2'><font face='Arial' size='0.2'>
	<input type='hidden' name='fecharevisa' value=$fecharevisa>$fecharevisa</font>
	</td>
</tr>
</table>
<hr align='center' color='#0033FF' width='100%' size='2px'>
<table border=1 width='100%' cellpadding='2' cellspacing='2'>
<tr>
	<td align='left' valign='middle' colspan='3' rowspan='4'><font face='Arial' size='0.2'>
		Energia Ambiental de Mexico S.A. de C.V.<br>
		Angel Urraza # 1111 Col. del Valle<br>
		C.P. 03100<br>
		Mexico, D.F.<br>
		R.F.C.: EAM-020710-G93		
		 </font>
	</td>
	<td align='left' colspan='8'><font face='Arial' size='0.2' style='background-image:url(img/blue.png);'><b>
		Fecha envio:</b></font>
	<select name='diacam' style='font-size:.60em;'>
	<option value=$diacam selected>$diacam</option>
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
	<select name='mescam' style='font-size:.60em;'>
	<option value=$mescam selected>$mescam</option>
	<option value=01>ENERO</option>  
	<option value=02>FEBRERO</option>  
	<option value=03>MARZO</option>
	<option value=04>ABRIL</option>
	<option value=05>MAYO</option>
	<option value=06>JUNIO</option>
	<option value=07>JULIO</option>
	<option value=08>AGOSTO</option>
	<option value=09>SEPTIEMBRE</option>
	<option value=10>OCTUBRE</option>
	<option value=11>NOVIEMBRE</option>
	<option value=12>DICIEMBRE</option>
	</select>
	<select name='aniocam' style='font-size:.60em;'>
	<option value=$aniocam selected>$aniocam</option>
	<option value=2007>2007</option>
	<option value=2008>2008</option> 
	<option value=2009>2009</option> 
	<option value=2010>2010</option> 
	<option value=2011>2011</option> 
	</select><font face='Arial' size='0.2' style='background-image:url(img/blue.png);'><b>
		Fecha deseada Entrega:</b></font>
	<select name='diae1' style='font-size:.60em;'>
	<option value=$diaentd selected>$diaentd</option>
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
	<select name='mese1' style='font-size:.60em;'>
	<option value=$mesentd selected>$mesentd</option>
	<option value=01>ENERO</option>  
	<option value=02>FEBRERO</option>  
	<option value=03>MARZO</option>
	<option value=04>ABRIL</option>
	<option value=05>MAYO</option>
	<option value=06>JUNIO</option>
	<option value=07>JULIO</option>
	<option value=08>AGOSTO</option>
	<option value=09>SEPTIEMBRE</option>
	<option value=10>OCTUBRE</option>
	<option value=11>NOVIEMBRE</option>
	<option value=12>DICIEMBRE</option>
	</select>
	<select name='anioe1' style='font-size:.60em;'>
	<option value=$anioentd selected>$anioentd</option>
	<option value=2007>2007</option>
	<option value=2008>2008</option> 
	<option value=2009>2009</option> 
	<option value=2010>2010</option> 
	<option value=2011>2011</option> 
	</select><br><font face='Arial' size='0.2' style='background-image:url(img/blue.png);'><b>
		Forma Pago:</b>$n5</font>
	</td>
</tr>
<tr>
	
	<td align='right' colspan='2' background='img/blue.png'><font face='Arial' size='0.2'><b>
		Agencia Aduanal:</b></font>
	</td>
	<td align='left' colspan='4'>";
?>
<? 
echo "<select name='trnsprt' style='font-size:.60em;'>";
echo "<option value=$n15 selected>$tran</option>";
$coexion=mssql_connect("SISTEMAS","","");
mssql_select_db("airenergy",$coexion);
$trns=mssql_query("SELECT idtransporte,razonsocialtrns FROM proveedores WHERE tipoproveedor='Agencia Aduanal'",$conn);
while($tr=mssql_fetch_array($trns)){
$idtr1=$tr["idtransporte"];
$idtr2=$tr["razonsocialtrns"];
echo "<option value=" . $idtr1 . ">" . $idtr2 . "</option>";
}
mssql_close($conn);
?>
<?

	echo "</td>
	<td align='right' background='img/blue.png'><font face='Arial' size='0.2'><b>
		Transporte:</b></font>
	</td>
	<td align='left'>";
?>
<? 
echo "<select name='ftrans' style='font-size:.60em;'>
<option value='$n16'selected>$n16</option>
    <option value='Aereo'>Aereo</option> 
	<option value='Maritimo'>Maritimo</option> 
	<option value='Terrestre'>Terrestre</option> 
	<option value='UPS'>UPS</option>   
</select>";
?>
<? 
echo "
</td>
</tr>
<tr>
	<td align='right' colspan='2' background='img/blue.png'><font face='Arial' size='0.2'><b>
		Consolidadora:</b></font>
	</td>
	<td align='left' colspan='6'>";
?>
<? echo "<select name='cndra' style='font-size:.60em;'>
<option value='$consolida' selected>$consol</option>";

$coexion=mssql_connect("SISTEMAS","","");
mssql_select_db("airenergy",$coexion);
$trns=mssql_query("SELECT idtransporte,razonsocialtrns FROM proveedores WHERE tipop2='Consolidadora'",$coexion);
while($tr=mssql_fetch_array($trns)){
$idtr1=$tr["idtransporte"];
$idtr2=$tr["razonsocialtrns"];
echo "<option value=" . $idtr1 . ">" . $idtr2 . "</option>";
}
mssql_close($coexion);
echo "</select>";
?>
<?
echo "
</td>
</tr>
<tr>
	<td align='right' colspan='2' background='img/blue.png'><font face='Arial' size='0.2'><b>
	Forma de Pago Transporte:</b></font>
	</td>
	<td align='left' colspan='6'><font face='Arial' size='0.2'>
		&nbsp;$n17</font> &nbsp;
		<font face='Arial' size='0.2' style='background-image:url(img/blue.png);'>Estatus orden:</font>		
		<select name='staus' style='font-size:.60em;'>
	<option value='$estatusadq'selected>$estatusadq</option>
    <option value='Entregado'>Entregado</option> 
	<option value='Pendiente'>Pendiente</option> 
	<option value='Cancelado'>Cancelado</option>
	</select>
	</td>
</tr>
</table>
<table border=1 width='100%' cellpadding='2' cellspacing='2'>
<tr>
	<td align='left' valign='middle' colspan='3'  height='3' width='auto' background='img/blue1.jpg'><font face='Arial' size='0.2'><b>
		Direccion de Entrega:		
		</b><font>
	</td>
	<td align='left' colspan='4' background='img/blue1.jpg'><font face='Arial' size='0.2'><b>
		Comentarios:</b></font>
	</td>
</tr>
<tr>
	<td align='left' valign='top' colspan='3' rowspan='3'><font face='Arial' style='font-size:.75em;'>			
Calle:<input type='text' name='calle' value='$n8' style='font-size:.75em;'>&nbsp;No.:<input type='text' name='numero' value='$n9' style='font-size:.75em;'><br>
Col.:<input type='text' name='colonia' value='$n10' style='font-size:.75em;'>&nbsp;C.P.:<input type='text' name='codpst' value='$n11' style='font-size:.75em;'><br>
Ciudad:<input type='text' name='ciuda' value='$n12' style='font-size:.75em;'> 
Estado:<input type='text' name='estado' value='$n13' style='font-size:.75em;'>
</font>
	</td>
	<td align='left' colspan='7' rowspan='3' valign='top'><font face='Arial' size='0.2'><b>
	<textarea name='comet' rows='5' cols='50'>$n18</textarea>
	</b></font>
	</td>
</tr>
</table>
<hr align='center' color='#0033FF' width='100%' size='2px'>
<center>";
echo "\n<table align=center width='100%' border='1'>"; 
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
	  echo "<td  class='peque' align='center'><a href='elimn.php?idadq=$idadq&idproduct=" . $fila2['cod'] . "'>Eliminar</a></td>";
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
   <input type=hidden name='idadq' value='$idadq'>
   <input type='submit' value='Actualizar Orden' onClick=this.form.action='modifadq2.php'>
   </td></tr>"; 
   echo "\n</table>";
  echo "\n<tr class='small_text1' align='center'>
		  <td colspan=7 background='img/blue1.jpg'>Agregar Producto a Orden</td>
		  </tr>";
  echo "\n<tr class='small_text1' align='center'>
		  <td colspan=7>
		  Clave Producto:<input type='text' name='pc1'>&nbsp;
		  Cantidad<input type='text' name='ct1' size='5' maxlength='2'><input type='hidden' name='iddq' value=$idadq><br>
		  <input type='submit' value='Agregar Producto a Orden' onClick=this.form.action='aniade.php'>
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