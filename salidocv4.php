<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<?
	$dist=trim($dist);
    $cproc=$cproc;
	$canti=trim($canti);	
	$serie=strtoupper(trim($serie));
	$series1=explode("/",$serie);
	$series3=count($series1);
	$series2=substr($serie,0,2);
	$idadq=trim($idadq);
	$idocv=trim($idocv);
	$codorden=trim($codorden);
	$code=trim($code);
	$dia=trim($dia);
	$mes=trim($mes);
	$nmes=trim($nmes);
	$year=trim($year);
	$nyear=trim($nyear);
    $disponible=trim($disponible);
	/*  $pedi=trim($pedi);  */
	$fecharecadq="$dia/$nmes/$year";
	$canregi=0;
	$conn1=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	$produ=mssql_query("SELECT cod FROM inventa1 WHERE idproduct='$cproc'",$conn1);
	$lafi4=mssql_fetch_array($produ);
	$cproc1=$lafi4["cod"];	
	$resulta2=mssql_query("SELECT existencia FROM inventa1 WHERE cod=$cproc1",$conn1);
    $lafi2=mssql_fetch_array($resulta2);
    $laf2=$lafi2["existencia"];
    $cantisal=$laf2-$canti;
	$resu2=mssql_query("SELECT preciounitcv FROM ordencv2 WHERE cod=$cproc1 AND idcompraventa=$idocv",$conn1);
    $la2=mssql_fetch_array($resu2);
    $laf12=$la2["preciounitcv"];
    $precio=$laf12;
	$rsl=mssql_query("SELECT diferente,cod FROM ordencv2 WHERE cod=$cproc1 AND idcompraventa=$idocv",$conn1);
	$linea=mssql_fetch_array($rsl);
	$f1=$linea["diferente"];
	$f2=$linea["cod"];
/* si series2 es igual a EA (productos sin numero de series) */
if($series2 == "EA"){
	$pedim=mssql_query("SELECT numpedimento3 FROM receqpadq2 WHERE serial='$serie'",$conn1);
					$pedim2=mssql_fetch_array($pedim);
					$pedim3=$pedim2["numpedimento3"];
	mssql_query("INSERT INTO salordncv2(idsalidaocv,cantisalida,cod,serial,preciounitocv,numpedimento4)
	             VALUES($code,$canti,$cproc1,'$serie',$precio,'$pedim3')",$conn1);
	mssql_query("INSERT INTO registro1(cod,serial,canreg,canreg2,fechasalidainv,cve_distribuidor,stado,numpedim)
	             VALUES($cproc1,'$serie',$canti,$canregi,'$fecharecadq',$dist,'$disponible','$pedim3')",$conn1);
	$resulta6=mssql_query("SELECT cantentregacv FROM ordencv2 
			               WHERE idcompraventa=$idocv AND cod=$cproc1",$conn1);
    $lafi6=mssql_fetch_array($resulta6);
    $laf6=$lafi6["cantentregacv"];
    $cantisal6=$laf6;			
    $cantisal7=$cantisal6+$canti;
    mssql_query("UPDATE ordencv2 SET cantentregacv=$cantisal7 WHERE idcompraventa=$idocv AND cod=$cproc1",$conn1);
	mssql_query("UPDATE inventa1 SET existencia=$cantisal WHERE cod=$cproc1",$conn1);
	$resulta3=mssql_query("SELECT cantsalid FROM inventa2 
					       WHERE serial='$serie' AND cod=$cproc1 AND numpedimento1='$pedim3'",$conn1);
    $lafi3=mssql_fetch_array($resulta3);
    $laf3=$lafi3["cantsalid"];
    $cantisal3=$laf3;			
	$cantisal4=$cantisal3+$canti; 					 
	mssql_query("UPDATE inventa2 SET cantsalid=$cantisal4,fechasalida1='$fecharecadq',fechasalida2='$fecharecadq' 
			     WHERE serial='$serie' AND cod=$cproc1 AND numpedimento1='$pedim3'",$conn1);
/* si series2 es igual a 1 y cantidad es igual a 1 */
}else if($series2 != "EA" AND $canti == 1 AND $series3 == 1){
	$pedim=mssql_query("SELECT numpedimento3 FROM receqpadq2 WHERE serial='$serie'",$conn1);
					$pedim2=mssql_fetch_array($pedim);
					$pedim3=$pedim2["numpedimento3"];
	mssql_query("INSERT INTO salordncv2(idsalidaocv,cantisalida,cod,serial,preciounitocv,numpedimento4)
	             VALUES($code,$canti,$cproc1,'$serie',$precio,'$pedim3')",$conn1);
	mssql_query("INSERT INTO registro1(cod,serial,canreg,canreg2,fechasalidainv,cve_distribuidor,stado,numpedim)
	             VALUES($cproc1,'$serie',$canti,$canregi,'$fecharecadq',$dist,'$disponible','$pedim3')",$conn1);
	$resulta6=mssql_query("SELECT cantentregacv FROM ordencv2 
			WHERE idcompraventa=$idocv AND cod=$cproc1",$conn1);
    $lafi6=mssql_fetch_array($resulta6);
    $laf6=$lafi6["cantentregacv"];
    $cantisal6=$laf6;			
    $cantisal7=$cantisal6+$canti;
    mssql_query("UPDATE ordencv2 SET cantentregacv=$cantisal7 WHERE idcompraventa=$idocv AND cod=$cproc1",$conn1);
	mssql_query("UPDATE inventa1 SET existencia=$cantisal WHERE cod=$cproc1",$conn1);
	$resulta3=mssql_query("SELECT cantsalid FROM inventa2 
					       WHERE serial='$serie' AND cod=$cproc1 AND numpedimento1='$pedim3'",$conn1);
    $lafi3=mssql_fetch_array($resulta3);
    $laf3=$lafi3["cantsalid"];
    $cantisal3=$laf3;								
	$cantisal4=$cantisal3+$canti; 
	mssql_query("UPDATE inventa2 SET cantsalid=$cantisal4,fechasalida1='$fecharecadq',fechasalida2='$fecharecadq' 
			     WHERE serial='$serie' AND cod=$cproc1 AND numpedimento1='$pedim3'",$conn1);
/* si series2 es diferente de EA y la cantidad es igual al numero de series (productos con numero de series) */
}else if($series2 != "EA" AND $canti == $series3){
	$resulta6=mssql_query("SELECT cantentregacv FROM ordencv2 
			               WHERE idcompraventa=$idocv AND cod=$cproc1",$conn1);
    $lafi6=mssql_fetch_array($resulta6);
    $laf6=$lafi6["cantentregacv"];
    $cantisal6=$laf6;			
    $cantisal7=$cantisal6+$canti;
    mssql_query("UPDATE ordencv2 SET cantentregacv=$cantisal7 WHERE idcompraventa=$idocv AND cod=$cproc1",$conn1);
	mssql_query("UPDATE inventa1 SET existencia=$cantisal WHERE cod=$cproc1",$conn1);
			     $xa=1;
			     $ax=0;
					for($u=1;$u<=$canti;$u++){	
					$pedim=mssql_query("SELECT numpedimento3 FROM receqpadq2 WHERE serial='$series1[$ax]'",$conn1);
					$pedim2=mssql_fetch_array($pedim);
					$pedim3=$pedim2["numpedimento3"];
					mssql_query("INSERT INTO salordncv2(idsalidaocv,cantisalida,cod,serial,preciounitocv,numpedimento4)
	                             VALUES($code,$xa,$cproc1,'$series1[$ax]',$precio,'$pedim3')",$conn1);
					mssql_query("INSERT INTO registro1(cod,serial,canreg,canreg2,fechasalidainv,cve_distribuidor,stado,numpedim)
	                             VALUES($cproc1,'$series1[$ax]',$xa,$canregi,'$fecharecadq',$dist,'$disponible','$pedim3')",$conn1);
					$resulta3=mssql_query("SELECT cantsalid FROM inventa2 
					                       WHERE serial='$series1[$ax]' AND cod=$cproc1 AND numpedimento1='$pedim3'",$conn1);
                    $lafi3=mssql_fetch_array($resulta3);
                    $laf3=$lafi3["cantsalid"];
                    $cantisal3=$laf3;	
					$cantisal4=$cantisal3+$xa;							 
					mssql_query("UPDATE inventa2 SET cantsalid=$cantisal4,fechasalida1='$fecharecadq',fechasalida2='$fecharecadq' 
			                     WHERE serial='$series1[$ax]' AND cod=$cproc1 AND numpedimento1='$pedim3'",$conn1);
					$ax++;
			        } 
}else{
echo "<script>alert('Error ... realize la insercion nuevamente');</script>";
echo "<form name='formu' method='post' action='salidocv5.php'>
	  			 <input type='hidden' name='cproc' value='$cproc'>
	  			 <input type='hidden' name='canti' value='$canti'>
	  			 <input type='hidden' name='pedi' value='$serie'>
	  			 <input type='hidden' name='idadq' value='$idadq'>
	  			 <input type='hidden' name='idocv' value='$idocv'>
	  			 <input type='hidden' name='code' value='$code'>
				 <input type='hidden' name='codorden' value='$codorden'>
	  			 <input type='hidden' name='mes' value='mes'>
	  			 <input type='hidden' name='nmes' value='$nmes'>
	  			 <input type='hidden' name='year' value='$year'>
	  			 <input type='hidden' name='nyear' value='$nyear'>
	  			 <input type='hidden' name='dia' value='$dia'>
	 			 <input type='hidden' name='dist' value='$dist'>
	  			 <input type='hidden' name='disponible' value='$disponible'>";
echo "<script>formu.submit();</script></form>";		
}
mssql_close($conn1);	
/* Saco el ultimo valor del producto ordenado y le sumo uno a cantidad entregada e ir restando a cantidad adquierida */
$conn=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$resuls=mssql_query("SELECT SUM(diferente) AS total
FROM ordencv2 WHERE idcompraventa=$idocv",$conn);
$g=mssql_fetch_array($resuls);
$entregatotal=$g["total"];
 ?>
<? if($entregatotal == 0):
     mssql_query("UPDATE ordencv1 SET statusordencv='Entregado' WHERE idcompraventa=$idocv",$conn);
     echo "<script>alert('Orden de Compra Completa')</script>";
	 mssql_close($conn);
     echo "<script>window.location='claudia.php'</script>";
?>
<? else: ?>
<? mssql_close($conn);?>
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
<script language="javascript">
function desactivar(formulario) {	
	var res=confirm("Son correctos los datos introducidos?");
	if(res==true){
	formulario.botonDesactivar.disabled = true;	
	formulario.guardar.disabled = false;
    }else{
	formulario.botonDesactivar.disabled = false;	
	formulario.guardar.disabled = true;
	formulario.botonDesactivar.focus();
	}
}
</script>

<script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</HEAD>
<BODY background="img/fondo.gif" leftMargin=0 topMargin=0 marginwidth="0" marginheight="0" bottommargin="0" bgproperties="fixed"><center>
  <table width="804" height="336" align="center" cellpadding="0" cellspacing="0" class="bordet"> 
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
            </table>
			<table width="100%"  border="0">
  <tr>
    <td background="img/blue1.jpg" align="left">
	
<?	  				  						  
/* selecciono LOS VALORES A LAS TABLAS CORRESPONDIENTES */ 
	$conn=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	$adquisicion1=mssql_query("SELECT idcompraventa,ncompraventa,diacv,mescv,aniocv,cve_distribuidor,statusordencv
							  FROM ordencv1 WHERE idcompraventa=$idocv",$conn);
	$reg1=mssql_fetch_array($adquisicion1);
	$regis1=$reg1["idcompraventa"];
	$regis2=$reg1["ncompraventa"];
	$regis3=$reg1["diacv"];
	$distri=$reg1["cve_distribuidor"];
	$regis4=$reg1["mescv"];
	$regis5=$reg1["aniocv"];
	$regis6=$reg1["statusordencv"];
	?>
	<SPAN class="navigation_heading">Folio de Entrada No.<? echo $codorden;?></SPAN>	
	</td>	
    </tr>
	<tr><td align="center">
	<table width="100%"  border="0">
  <tr>
    <td width="51%" align="left" class="main_text_bold">Orden de Compra: <? echo $regis2;?></td>
    <td width="19%">
	<a class=main_navigation target="_blank" href="verordncv.php?ursec=<? echo $cod;?>&ndn=<? echo $regis2;?>&idadq=<? echo $idocv;?>&secur=<? echo session_id();?>">
	Ver Orden Completa
	</a>	
	</td>
    <td width="5%">&nbsp;</td>
    <td width="29%">&nbsp;</td>
  </tr>
  <tr>
    <td  class="main_text_bold" align="left">Fecha Orden de Compra: <? echo $regis3 . " / " . $regis4 . " / " . $regis5;?></td>
    <td>
	<A class=main_navigation 
    href="prevconsul.php?ursec=<? echo $cod;?>&secur=<? echo session_id();?>" target="_blank">
	Inventario
	</A>
	</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td  class="main_text_bold" align="left">Estatus Orden de Compra: <? echo $regis6;?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


	<?
	$adquisicion2=mssql_query("SELECT idproduct,linea,descripcion,cantidadcv,cantentregacv
                                 FROM (inventa1 INNER JOIN ordencv2 ON inventa1.cod=ordencv2.cod)
                                 WHERE idcompraventa=$idocv",$conn);								 
	echo "<table width='100%' border='1'>
    <tr class='peque'>
	<td align='center' background='img/blue1.jpg'>Item</td>
	<td align='center' background='img/blue1.jpg'>Descripcion</td>
    <td align='center' background='img/blue1.jpg'>Ordenada</td>
    <td align='center' background='img/blue1.jpg'>Recibida</td></tr>";
	$a=1;
    while($st=mssql_fetch_array($adquisicion2)){	
	$dp1=$st["idproduct"];
	$dp2=$st["linea"];
	$dp3=$st["descripcion"];
	$dp4=$st["cantidadcv"];
	$dp5=$st["cantentregacv"];
	echo "<tr>
    <td style='font-size:.75em;' align='center'>" . $a . "</td>
	<td style='font-size:.75em;'>$dp1 - $dp2 - $dp3</td>
	<td style='font-size:.75em;' align='center'>" . $dp4 . "</td>
	<td style='font-size:.75em;' align='center'>" . $dp5 . "</td>
    </tr>";
	$a++;
	}	
	mssql_close($conn);
	echo "</table>";
	?>			
			
	</td></tr>
	<tr>
	<td align="center">	
		<form name="formulario" method="post" action="salidocv8.php">
<table border="0" width="100%" class="small_text">
<tr> 
 <td width="84" align="right">Producto:</td>
 <td valign="middle" colspan="2"> 
<select name="cproc" style="width:95%; font-size:.85em;">
<?
		$cn=mssql_connect("SISTEMAS","","");
        mssql_select_db("airenergy",$cn);
		$rsl=mssql_query("SELECT idproduct,linea,descripcion
                          FROM (inventa1 INNER JOIN ordencv2 ON inventa1.cod=ordencv2.cod)
                          WHERE idcompraventa=$idocv AND diferente <> 0 ORDER BY linea",$cn);
		while($linea=mssql_fetch_array($rsl)){
		$f2=$linea["idproduct"];
		$f3=$linea["linea"];
		$f4=$linea["descripcion"];		
		echo "<option value=$f2>$f2  -  $f3-$f4</option>";
		}
		mssql_close($cn);	
?>			
	
</select>

</td>
</tr>
<tr>
    <td width="94" align="right">Cantidad:</td>
	<td width="574" colspan="2"><input type="text" name="canti" width="40">&nbsp;
	&nbsp; <!-- Pedimento:<input type="text" name="pedi"> -->
		
	</td>	
 </tr> 
 <tr>
	<td width="94" align="right">No.de Serie(s):</td>
	<td width="574" colspan="2"><font class="peque2">&nbsp;Formato:XX00/XX11<br></font><textarea name="serie" rows="5" cols="50"></textarea></td>
</tr>
 <tr> 
 <td colspan="3" align="center">
 <input type="hidden" name="idadq" value=<? echo $idadq;?>>
 <input type="hidden" name="idocv" value="<? echo $idocv;?>">
	<input type="hidden" name="code" value=<? echo $code;?>>
	<input type="hidden" name="codorden" value="<? echo $codorden;?>">
	<input type="hidden" name="mes" value="<? echo $mes;?>">
	<input type="hidden" name="nmes" value=<? echo $nmes;?>>
	<input type="hidden" name="year" value=<? echo $year;?>>
	<input type="hidden" name="nyear" value=<? echo $nyear;?>>
	<input type="hidden" name="dia" value=<? echo $dia;?>>
	<input type="hidden" name="disponible" value="No registrado">
	<input type="hidden" name="dist" value="<? echo $dist;?>">
 <input type="button" name="botonDesactivar" value="Verificar Datos" onClick="desactivar(this.form)"> 
<input type="submit" name="guardar" value="Guardar" disabled>
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
</center></BODY>
</HTML>
<? endif;?>