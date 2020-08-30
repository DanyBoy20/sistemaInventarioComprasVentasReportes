<?
session_start(); 
header('Content-Description: File Transfer'); 
header('Content-Type: text/rtf'); 
header('Content-Disposition: attachment; filename=ESCRIBIR_NOMBRE_DEL_ARCHIVO.doc');
	$logoprecio="$ ";
	$cantent=0;
	$orden=$idadq;
$conn=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");

/* SELECCIONO LOS DATOS DE LA ORDEN (ORDENADQ1)  */  
$result5=mssql_query("SELECT nadquisicion,ordendped,diaadqui,mesadqui,anioadqui,fechoadq1,fecharevision,
                             condicionespago,fechaenvioadqui1,fechaenvioadqui2,fechadesent,fechadesent2,
							 calleadq,numeroadq,coloniaadq,codpost,ciudadadq,estadoadq,rfcadq,
							 idtransporte,formatransporte,consolidadora,frmpagotranspadq,revision,comentaadq
			          FROM ordenadq1 WHERE idadquisicion=$orden",$conn);
//$result5=mssql_query("SELECT norden,dayo,montho,yearo,formapago FROM orden1 WHERE idorden=$orden",$conn);
$ficha2=mssql_fetch_array($result5);
$n1=$ficha2["nadquisicion"];
$ordnped=$ficha2["ordendped"];
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
mssql_close($conn);
echo "
<table border=0 width='100%' cellpadding='2' cellspacing='2'>
<tr>
	<td align='right' valign='middle' with='auto' colspan='3' rowspan='4'>
		<img src='http://www.airenergy-mexico.com/new/ventas/img/logoga.jpg' width='168' height='91'>
	</td>	
	<td align='right' valign='middle' with='auto' colspan='3' rowspan='4'>
		<img src='http://www.airenergy-mexico.com/new/img/whitespace.jpg' width='125' height='80'>
	</td>	
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='2'><b>
	Orden de Adquisicion No.:</b></font>
	</td>
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='2' color='red'><b>
	$n1</b></font>
	</td>
</tr>
<tr>
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='2'><b>
	Fecha creacion orden:</b></font>
	</td>
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='2'>
	$n2 / $n3 / $n4</font>
	</td>
</tr>
<tr>
	<td align='right' valign='middle' with='auto' colspan='2'><font face='Arial' size='2'><b>
	Orden de pedido:</b></font>
	</td>
	<td align='center' valign='middle' with='auto' colspan='2'><font face='Arial' size='2' color='red'><b>
	$ordnped</b></font>
	</td>
</tr>
<tr>
	<td align='right' valign='middle' with='auto' colspan='4'><font face='Arial' size='2'><b>
	Revision:</font>&nbsp;<font face='Arial' size='2' color='red'>$revi</font><font face='Arial' size='2'>&nbsp;Fecha revision:$fecharevisa</b></font>
	</td>
</tr>
</table>
<hr align='center' color='#0033FF' width='100%' size='2px'>
<table border=0 width='100%' cellpadding='1' cellspacing='1'>
<tr>
	<td align='left' valign='middle' colspan='3' rowspan='6'><font face='Arial' size='1'><b>
		Energia Ambiental de Mexico S.A. de C.V.<br>
		Angel Urraza # 1111 Col. del Valle<br>
		C.P. 03100<br>
		Mexico, D.F.<br>
		R.F.C.: EAM-020710-G93</b>		
		 </font>
	</td>
	<td align='right'>&nbsp;
	<td align='right'><font face='Arial' size='1'><b>
		Fecha Envio:</b></font>
	</td>
	<td align='left'><font face='Arial' size='1'><b>
	$m6</b></font>
	</td>
	<td align='right' colspan='2'><font face='Arial' size='1'><b>
		Fecha Deseada Entrega:</b></font>
	</td>
	<td align='left'><font face='Arial' size='1'><b>
	$fchdeseada</b></font>
	</td>
	<td align='right'><font face='Arial' size='1'><b>
		Forma de Pago:</b></font>
	</td>
	<td align='left'><font face='Arial' size='1'><b>
	$n5</b></font>
	</td>
</tr>
<tr>
	
	</td>
	<td align='right'><font face='Arial' size='1'><b>
		Agencia Aduanal:</b></font>
	</td>
	<td align='left' colspan='4'><font face='Arial' size='1'><b>
	$tran</b></font>
	</td>
	<td align='right'><font face='Arial' size='1'><b>
		Transporte:</b></font>
	</td>
	<td align='left'><font face='Arial' size='1'><b>
	$n16</b></font>
	</td>
</tr>
<tr>
	
	</td>
	<td align='right'><font face='Arial' size='1'><b>
		Consolidadora:</b></font>
	</td>
	<td align='left' colspan='6'><font face='Arial' size='1'><b>
	$consol</b></font>
	</td>
</tr>
<tr>
	
	</td>
	<td align='right' colspan='2'><font face='Arial' size='1'><b>
	Forma Pago Transporte:</b></font>
	</td>
	<td align='left' colspan='5'><font face='Arial' size='1'><b>
		$n17</b></font>
	</td>
</tr>
</table>
<table border=0 width='auto' cellpadding='2' cellspacing='2'>
<tr>
	<td align='left' valign='middle' colspan='3'  height='3' width='auto' bgcolor='#0033ff'><font face='Arial' size='1' color='white'><b>
		DIRECCION DE ENTREGA:		
		</b><font>
	</td>
	<td align='right'>
	</td>	
	<td align='right' colspan='2'><font face='Arial' size='1'><b>
		Comentarios:</b></font>
	</td>
	<td align='left' colspan='5'><font face='Arial' size='1'><b>
	$n18</b></font>
	</td>	
</tr>
<tr>
	<td align='left' valign='middle' colspan='3' rowspan='3'><font face='Arial' size='1'><b>
		$n8 # $n9 Col. $n10<br>
		C.P. $n11<br>
		$n12 , $n13<br>		
		</b></font>
	</td>
	<td align='left' colspan='7' rowspan='3'><font face='Arial' size='1'><b>
	
	</b></font>
	</td>
</tr>
</table>
<hr align='center' color='#0033FF' width='100%' size='2px'>
<center>
<table width='100%' border=1 cellpadding='2' cellspacing='2'>
<tr>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' size='0.1' color='white'><b>
		CLAVE</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' size='0.1' color='white'><b>
		CANT</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' size='0.1' color='white'><b>
		LINEA</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' size='0.1' color='white'><b>
		DESCRIPCION</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' size='0.1' color='white'><b>
		P.UUNITARIO</b></font>
	</td>
	<td align='center' bgcolor='#0033ff' width='auto'><font face='Arial' size='0.1' color='white'><b>
		TOTAL</b></font>
	</td>
</tr>";
/* SACO EL PRODUCTO COTIZADO, SEGUN EL NUMERO DE ORDEN DE LA TABLA INVENTARIO Y ORDEN2*/
    $con=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");
	$resul=mssql_query("SELECT idproduct,linea,descripcion,cantidadadq,precprouniadq,totlprdadq
                        FROM(inventa1 INNER JOIN ordenadq2 ON inventa1.cod=ordenadq2.cod)
                        WHERE idadquisicion=$orden",$con);
	 while($f=mssql_fetch_array($resul)){
    $a1=$f["idproduct"];
	$a2=$f["linea"];
	$a3=$f["descripcion"];
	$a4=$f["cantidadadq"];
	$a5=$f["precprouniadq"];
	$a6=$f["totlprdadq"];
echo "<tr>
	  <td style='text-align:center;' width='auto'><font face='Arial' size='1'><b>
	  $a1</b></font>
	  </td>
	  <td style='text-align:center;' width='auto'><font face='Arial' size='1'><b>
	  $a4</b></font>
	  </td>
	  <td style='text-align:center;' width='auto'><font face='Arial' size='1'><b>
	  $a2</b></font>
	  </td>
	  <td style='text-align:left;' width='auto'><font face='Arial' size='1'><b>
	  $a3</b></font>
	  </td>
	  <td style='text-align:center;' width='auto'><font face='Arial' size='1'><b>
	  $logoprecio". number_format($a5,2) . "</font>
	  </td>
	  <td style='text-align:center;' width='auto'><font face='Arial' size='1'><b>
	  $logoprecio" . number_format($a6,2) . "</font>
	  </td></tr>";
    }	
$resuls=mssql_query("SELECT SUM(totlprdadq)AS subtotal
                    FROM ordenadq2
                    WHERE idadquisicion=$orden",$con);
$g=mssql_fetch_array($resuls);
$totaluno=$g["subtotal"];
$iva=$totaluno*.15;
$neto=$totaluno+$iva;
mssql_query("UPDATE ordenadq1 SET totalordenadq=$neto WHERE idadquisicion=$orden",$con);
mssql_close($con);
echo "<tr>
    <td colspan='4' rowspan='3'>&nbsp;</td>
    <td style='text-align:right;' bgcolor='#0033ff' width='auto'><font face='Arial' size='1' color='white'><b>SUBTOTAL</b></font></td>
    <td style='text-align:center;' width='auto'><font face='Arial' size='1'><b>$logoprecio" . number_format($totaluno,2) . "</b></font></td>
  </tr>
  <tr>
    <td style='text-align:right;' bgcolor='#0033ff' width='auto'><font face='Arial' size='1' color='white'><b>I.V.A.</b></font></td>
    <td style='text-align:center;' width='auto'><font face='Arial' size='1'><b>$logoprecio" . number_format($iva,2) . "</b></font></td>
  </tr>
  <tr>
    <td style='text-align:right;' bgcolor='#0033ff' width='auto'><font face='Arial' size='1' color='white'><b>TOTAL</b></font></td>
    <td style='text-align:center;' width='auto'><font face='Arial' size='1'><b>$logoprecio" . number_format($neto,2) . "</b></font></td>
  </tr>
  </table>
  
  </center>";
echo "<form name='formu' method='post' action='claudia.php'>";
echo "<script>formu.submit();</script></form>";	
?>