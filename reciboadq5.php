<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<?
	$pedi=$pedi;
	$cproc=$cproc;
	$canti=$canti;
	$serie=strtoupper(trim($serie));
	$series1=explode(",",$serie);
	$series3=count($series1);
	$idadq=$idadq;
	$codorden=$codorden;
	$code=$code;
	$dia=$dia;
	$mes=$mes;
	$nmes=$nmes;
	$year=$year;
	$nyear=$nyear;
	$comenta=$comenta;
	$disponible=$disponible;
	$esta=$esta;
	$ubica=$ubica;
	$tipoentra=$tipoentra;
	$fecharecadq="$dia/$nmes/$year";	
function serial(){
	global $serie;
	global $cproc;
	global $series;
	global $canti;
	global $fecharecadq;
	global $ubica;
	global $esta;
	global $comenta;
	global $pedi;
	global $tipoentra;
	global $disponible;
	global $series1;
	global $series3;
	global $idadq;
	global $xa;
	global $ax;
	global $serial2;
	global $i;
	global $u;
	global $f;
	global $resul45;
	global $w;
	global $a;
	global $conn1;
	global $code;
	global $codorden;
	global $dia;
	global $mes;
	global $year;
	global $cod;
	global $resulta1;
	global $lafil;
	global $laf;
	global $cantentregada;
	$conn1=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	if($serie == ""){		      
		  $resul45=mssql_query("SELECT idinventa FROM inventa3",$conn1);
                        $i=1;
                        while($f=mssql_fetch_array($resul45)){
                              $a[$i]=$f["idinventa"];
                              $i++;
                              }
                        rsort ($a);
                        $w=$a[0];
                        $w=$w+1;
			            $serial2="EA$dia$nmes$year$ubica$w";
			mssql_query("INSERT INTO receqpadq2(idreciboadq,cantrecibidaadq,cod,serial,comentrecadq,numpedimento3)
	                     VALUES($code,$canti,$cproc,'$serial2','$comenta','$pedi')",$conn1);
			mssql_query("INSERT INTO inventa3(idinventa)VALUES($w)",$conn1);
			mssql_query("INSERT INTO inventa2(cod,serial,cantidad,fechaentrada1,fechaentrada2,ubicacion,
	 					 status,comentas,numpedimento1,tipoentrada,disponible)
	                     VALUES($cproc,'$serial2',$canti,'$fecharecadq','$fecharecadq',
			            '$ubica','$esta','$comenta','$pedi','$tipoentra','$disponible')",$conn1);
		   $resulta1=mssql_query("SELECT cantentregadadq FROM ordenadq2 WHERE idadquisicion=$idadq AND cod=$cproc",$conn1);
           $lafil=mssql_fetch_array($resulta1);
           $laf=$lafil["cantentregadadq"];
	       $cantentregada=$laf+$canti;
           mssql_query("UPDATE ordenadq2 SET cantentregadadq=$cantentregada WHERE idadquisicion=$idadq AND cod=$cproc",$conn1);
           mssql_query("UPDATE inventa1 SET existencia=$cantentregada WHERE cod=$cproc",$conn1);
	}else{
	               if($canti <> $series3){
		           echo "<script>alert('No concuerda el numero de equipos con el numero de series');</script>";
			       echo "<script>alert('No concuerda el numero de equipos con el numero de series');</script>";
                   echo "<script>window.location='reciboadq6.php'</script>";
		           }
			$xa=1;
			$ax=0;
					for($u=1;$u<=$canti;$u++){			    
			     	mssql_query("INSERT INTO inventa2(cod,serial,cantidad,fechaentrada1,fechaentrada2,ubicacion,
	 				status,comentas,numpedimento1,tipoentrada,disponible)
	                VALUES($cproc,'$series1[$ax]',$xa,'$fecharecadq','$fecharecadq',
					'$ubica','$esta','$comenta','$pedi','$tipoentra','$disponible')",$conn1);
					mssql_query("INSERT INTO receqpadq2(idreciboadq,cantrecibidaadq,cod,serial,comentrecadq,numpedimento3)
	                VALUES($code,$xa,$cproc,'$series1[$ax]','$comenta','$pedi')",$conn1);
					$ax++;
			        }	        					
	}
return true;
mssql_close($conn1);	
}
serial();
/*actualizo cantidad entregada e inventario general*/
$conn=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$resulta1=mssql_query("SELECT cantentregadadq FROM ordenadq2 WHERE idadquisicion=$idadq AND cod=$cproc",$conn);
$lafil=mssql_fetch_array($resulta1);
$laf=$lafil["cantentregadadq"];
$cantentregada=$laf+$canti;
mssql_query("UPDATE ordenadq2 SET cantentregadadq=$cantentregada WHERE idadquisicion=$idadq AND cod=$cproc",$conn);
mssql_query("UPDATE inventa1 SET existencia=$cantentregada WHERE cod=$cproc",$conn);	
/* Saco el ultimo valor del producto ordenado y le sumo uno a cantidad entregada e ir restando a cantidad adquierida */
$resuls=mssql_query("SELECT SUM(diferen) AS total
FROM ordenadq2 WHERE idadquisicion=$idadq",$conn);
$g=mssql_fetch_array($resuls);
$entregatotal=$g["total"];
 ?>
<? if($entregatotal == 0):
     mssql_query("UPDATE ordenadq1 SET statusadq='Entregado' WHERE idadquisicion=$idadq",$conn);
     echo "<script>alert('Orden de Adquisicion Completa')</script>";
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
    <tr>
      <td height="123" valign="top">
        <table width="100%"  border="0" bgcolor="#FFFFFF">
          <tr>
            <td width="67%" valign="top">
              <table width="100%"  border="0">
                <tr>
                  <td colspan="2" background="../img/blue.png" class="small_text1" align="center">
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
            </table>
			<table width="100%"  border="0">
  <tr>
    <td background="img/blue1.jpg" align="left">
	
<?  
/* selecciono LOS VALORES A LAS TABLAS CORRESPONDIENTES */ 
$conn=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	$adquisicion1=mssql_query("SELECT idadquisicion,ordendped,nadquisicion,diaadqui,mesadqui,anioadqui,statusadq
							  FROM ordenadq1 WHERE idadquisicion=$idadq",$conn);
	$reg1=mssql_fetch_array($adquisicion1);
	$regis1=$reg1["idadquisicion"];
	$ordnpedi=$reg1["ordendped"];
	$regis2=$reg1["nadquisicion"];
	$regis3=$reg1["diaadqui"];
	$regis4=$reg1["mesadqui"];
	$regis5=$reg1["anioadqui"];
	$regis6=$reg1["statusadq"];
	?>
	<SPAN class="navigation_heading">Folio de Entrada No.<? echo $codorden;?></SPAN>	
	</td>	
    </tr>
	<tr><td align="center">
	<table width="100%"  border="0">
  <tr>
    <td width="35%" align="left" class="main_text_bold">Orden de Adquisicion: <? echo $regis2;?></td>
    <td width="31%" align="left" class="main_text_bold">Orden de Pedido: <? echo $ordnpedi;?></td>
    <td width="5%">&nbsp;</td>
    <td width="29%"><a class=main_navigation target="_blank" href="veradqui.php?ursec=<? echo $cod;?>&ndn=<? echo $regis2;?>&idadq=<? echo $idadq;?>&secur=<? echo session_id();?>">
	Ver Orden Completa
	</a></td>
  </tr>
  <tr>
    <td  class="main_text_bold" align="left">Fecha Orden de adquisicion: <? echo $regis3 . " / " . $regis4 . " / " . $regis5;?></td>
    <td>&nbsp;
	
	</td>
    <td>&nbsp;</td>
    <td><a class=main_navigation target="_blank" href="prevconsul.php?ursec=<? echo $cod;?>&ndn=<? echo $regis2;?>&idadq=<? echo $idadq;?>&secur=<? echo session_id();?>">
	Inventario
	</a></td>
  </tr>
  <tr>
    <td  class="main_text_bold" align="left">Estatus Orden de Adquisicion: <? echo $regis6;?></td>
    <td>&nbsp;
	
	</td>
    <td>&nbsp;</td>
    <td><a class=main_navigation target="_blank" href="equipment2.php?ursec=<? echo $cod;?>&ndn=<? echo $regis2;?>&idadq=<? echo $idadq;?>&secur=<? echo session_id();?>">
	Series
	</a></td>
  </tr>
</table>


	<?
	$adquisicion2=mssql_query("SELECT idproduct,linea,descripcion,cantidadadq,cantentregadadq
                                 FROM (inventa1 INNER JOIN ordenadq2 ON inventa1.cod=ordenadq2.cod)
                                 WHERE idadquisicion=$idadq",$conn);								 
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
	$dp4=$st["cantidadadq"];
	$dp5=$st["cantentregadadq"];
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
		<form name="formulario" method="post" action="reciboadq4.php">
<table border="0" width="100%" class="small_text">
<tr> 
 <td width="84" align="right">Producto:</td>
 <td valign="middle" colspan="2"> 
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
		echo "<option value=$f1>$f2  -  $f3-$f4</option>";
		}
		mssql_close($cn);	
?>		
</select>

</td>
</tr>
<tr>
    <td width="84" align="right">Cantidad:</td>
	<td width="686"><input type="text" name="canti" width="40"> Estado:
	<select name="esta" style="font-size:.85em;">
	<option value="Optimo" selected>Optimo</option>
	<option value="Maltratado">Da&ntilde;ado</option>
	</select>
	Ubicacion:<select name="ubica" style="font-size:.85em;">
	<option value="MDF" selected>Mexico, D.F.</option>
	<option value="GDL">Guadalajara</option>
	<option value="MTY">Monterrey</option>
	</select>
	Comentarios:<input type="text" name="comenta">
	
	</td>
	<td width="4"></td>
 </tr>
 <tr>
	<td width="84" align="right">No. de serie:</td>
	<td width="686">
	<font class="peque2">Formato:XX00/XX11<br></font><textarea name="serie" rows="5" cols="50"></textarea>	
	</td>
	<td width="4">&nbsp;</td>
</tr>
 <tr> 
 <td colspan="3" align="center">
 <input type="hidden" name="idadq" value=<? echo $idadq;?>>
	<input type="hidden" name="code" value=<? echo $code;?>>
	<input type="hidden" name="codorden" value="<? echo $codorden;?>">
	<input type="hidden" name="mes" value="<? echo $mes;?>">
	<input type="hidden" name="nmes" value=<? echo $nmes;?>>
	<input type="hidden" name="year" value=<? echo $year;?>>
	<input type="hidden" name="nyear" value=<? echo $nyear;?>>
	<input type="hidden" name="dia" value=<? echo $dia;?>>
	<input type="hidden" name="disponible" value="si">
	<input type="hidden" name="tipoentra" value="ADQ">
	<input type="hidden" name="pedi" value=<? echo $pedi;?>>
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