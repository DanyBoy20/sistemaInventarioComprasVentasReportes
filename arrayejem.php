<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?
$canti=1;
$series="1234";
$serie=explode(",",$series);
$serie2=count($serie);
if($canti <> $serie2){
echo "<script>alert('No concuerda el numero de equipos con el numero de serie')</script>";
echo "Ningun valor";
}else{
$a=0;
for($i=1;$i<=$canti;$i++){
echo $i . " - " . $serie[$a] . "<br>";
$a++;
}
}
$a="EXTRAE CARACTERES/extrae caracteres";
$b=substr($a,0,2);
$c=explode("/",$a);
$d=count($c);
echo "<br>$b<br>$d<br>";

$conn=mssql_connect("DANIEL","sa","51473747694");
    mssql_select_db("baseDatos");

   $ssql="SELECT idproduct,linea,descripcion,idadquisicion,cantidadadq,precprouniadq
          FROM(inventa1 INNER JOIN ordenadq2 ON inventa1.cod=ordenadq2.cod)
		  WHERE idadquisicion=1";
$result=mssql_query($ssql);
$numero=mssql_num_rows($result);

	echo $numero; 
	echo "<br>";

$fecha="05/03/2007";
$fecha2="08/04/2007";

$mes1=substr($fecha,3,-5);
echo "<br><b><i>$mes1</i></b><br>";

//mssql_query("update registro1 set fecharegistro='$fecha2' where serial='AZ1'",$conn);

$fech=mssql_query("SELECT DATEDIFF(dd, fechasalidainv, fecharegistro) AS Dias
					FROM registro1 WHERE serial='AZ1'",$conn);
$filaq=mssql_fetch_array($fech);
$cod9=$filaq["Dias"];
$fech2=mssql_query("SELECT DATEDIFF(mm, fechasalidainv, fecharegistro) AS Mes
					FROM registro1 WHERE serial='AZ1'",$conn);
$filaq2=mssql_fetch_array($fech2);
$cod92=$filaq2["Mes"];



echo "diferencia de dias:   ". $cod9 . "<br>";

echo "diferencia de meses:   ". $cod92 . "<br>";

$dia=substr($fecha,0,2);
$mes=substr($fecha,3,-5);
$anio=substr($fecha,-4);
echo "DIA:  ". $dia . "<br>";
echo "MES:  ". $mes . "<br>";
echo "A&Ntilde;O:  ". $anio . "<br>";

echo $dia*$mes;
/*
$forzado=((int)$anio);
echo gettype($forzado);
*/
echo "<br><br><br>";
echo $fecha . "<br>";
$fechu=mssql_query("SELECT DATEADD(year, 1, fecharegistro) AS nuevaf
					FROM registro1 WHERE serial='AZ1'",$conn);
$filaqt=mssql_fetch_array($fechu);
$cod9t=$filaqt["nuevaf"];
//$fechext=substr($cod9t,0,10);
//$forza=((string)$fechaext);
//echo "$forza   aqui<br>";

$fechacorta1=substr($cod9t,0,-10);
$fechacorta=trim($fechacorta1);
$fecharem=str_replace("-","/",$fechacorta);
$series1=explode("/",$fecharem);
$mesun=$series1[0];
$diaun=$series1[1];
$anioun=$series1[2];
function dia(){
global $diaun;
global $dia1;
if($diaun <= 9){
$dia1="0".$diaun;
}else{
$dia1=$diaun;
}
return $dia1;
}
function mes(){
global $mesun;
global $mes1;
if($mesun <= 9){
$mes1="0".$mesun;
}else{
$mes1=$mesun;
}
return $mes1;
}
mes();
dia();
$diefectivo=$dia1;
$mesefectivo=$mes1;
echo "Fecha con formato por defecto(formato mm-dd-yyy):<b><i>" . $cod9t . "</i></b><br>";
echo "Fecha corta, sin hora(formato mm-dd-yyy):<b><i>        " . $fechacorta . "</i></b><br>";
echo "Fecha con diferente formato (mm/dd/yyy):<b><i>         " .  $fecharem . "</i></b><br>";
echo "Mes separado de la fecha:<b><i>                        " . $mesun . "</i></b><br>";
echo "Dia separado de la fecha:<b><i>                        " . $diaun . "</i></b><br>";
echo "Anio separeado de la fecha:<b><i>                      " . $anioun . "</i></b><br>";
echo "Dia con formato de dos digitos si previamente era de solo un digito:<b><i>" . $diefectivo . "</i></b><br>";
echo "Mes con formato de dos digitos si previamente es de uno solo:<b><i>       " . $mesefectivo . "</i></b><br><BR>";

$db = @mssql_connect("DNI","","") or die("Unable to connect to server");
mssql_select_db("pubs");
$result = mssql_query("SELECT * FROM authors");
print("<table border=1>");
print("<tr><th>Name</th></tr>");
for ($i=0; $i < mssql_num_fields($result); $i++) {
    print("<tr>");
    printf("<td>%s</td>", mssql_field_name($result, $i));
    print("</tr>");
}
print("</table><BR><BR>");

$db = @mssql_connect("DNI","","") or die("Unable to connect to server");
mssql_select_db("pubs");
$result = mssql_query("SELECT * FROM authors");
print("<table border=1>");
print("<tr><th>Name</th></tr>");
mssql_field_seek($result,1);
while ($row = mssql_fetch_field($result)) {
    print("<tr>");
    printf("<td>%s</td>", $row->name);
    print("</tr>\n");
}
print("</table>");




?>
<br>
<?
$variable1=97;
$resultado1=chr($variable1);
echo $resultado1;
?>
</body>
</html>
