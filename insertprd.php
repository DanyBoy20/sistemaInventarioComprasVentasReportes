<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
?>
<?
$cproc=trim(strtoupper($cproc));
$tipo=$tipo;
$linea=$linea;
$descripcion=trim(ucwords($descripcion));
$notas=trim($notas);
$pusa=trim($pusa);
$pea=trim($pea);
$pma=trim($pma);
$pswm=trim($pswm);
$pspn=trim($pspn);
$psta=trim($psta);
$pgdl=trim($pgdl);
$pmty=trim($pmty);
$preg=trim($preg);
$pgen=trim($pgen);
$ppubmn=trim($ppubmn);
## $mx=trim(((float)$maximo));
$mx=trim($maximo);
$idp=$idp;
$existe=$existe;
$facgen=$facgen;
$facmay=$facmay;
$facreg=$facreg;
$facest=$facest;
$facea=$facea;
$facpmin=$facpmin;
$facpmx=$facpmx;
$aument=$aument;
$nprecusa=$nprecusa;
$usuario=$usuario;
$dia = date ("d"); // formato de dos digitos (ejemplo 01)
$mes = date ("F"); // mes en formato texto en ingles ( ejemplo January )
$nmes = date ("m"); // mes en formato de dos digitos con numeros ( ejemplo: 01  )
$year = date ("Y"); // fecha en formato de 4 digitos ( ejemplo 2007 )
$nyear = date ("y"); // fecha en formato de dos digitos ( ejemplo: 07 )
$fechaing="$dia/$nmes/$year";
/* saco del inventario datos para despues verificar que no se repita el producto insertado */
$conexionw=mssql_connect("SISTEMAS","","");
mssql_select_db("baseDatos");
$produw=mssql_query("SELECT idproduct,linea,descripcion FROM inventa1 WHERE idproduct='$cproc' AND statusP IS NULL",$conexionw);
$lafiw=mssql_fetch_array($produw);
$cprocw=$lafiw["idproduct"];
$cprocw2=$lafiw["linea"];
$cprocw3=$lafiw["descripcion"];
/* termina */
if($cproc=="" || $descripcion=="" || $pusa=="" || $pea=="" || $pma=="" || $pswm=="" || $pspn=="" || $psta=="" || $pgdl=="" || $pmty=="" || $preg=="" || $pgen=="" || $ppubmn=="" || $pubmx=""){
echo "<script>alert('CAMPOS VACIOS ... DEBE DE LLENAR TODOS LOS CAMPOS');</script>";
echo "<script>window.location='newproduct2.php'</script>";
/* verifico que no existe el producto que estoy insertando */
}else if($cprocw != ""){
echo "<script>alert('YA EXISTE ESE PRODUCTO. PARTE NUMERO: $cprocw * LINEA: $cprocw2 * DESCRIPCION: $cprocw3');</script>";
echo "<script>window.location='newproduct2.php'</script>";
}else if($cprocw != "" && $cproc2 !="" && $cproc3 != ""){
echo "<script>alert('YA EXISTE ESE PRODUCTO. PARTE NUMERO: $cprocw * LINEA: $cprocw2 * DESCRIPCION: $cprocw3');</script>";
echo "<script>window.location='newproduct2.php'</script>";
}else{
mssql_query("INSERT INTO inventa1(cod,idproduct,precioUSA,linea,tipo,descripcion,notas,existencia,general,mayoristas,regional,estatal,guadalajara,monterrey,ppubmin,spin,ppubmx,pventaEA,fgeneral,fmayoristas,fregional,festatal,fEA,fppubmin,fppubmx,pswimquip,aumento,nuevopreUSA,fechains,clave)VALUES($idp,'$cproc',$pusa,'$linea','$tipo','$descripcion','$notas',$existe,$pgen,$pma,$preg,$psta,$pgdl,$pmty,$ppubmn,$pspn,$mx,$pea,$facgen,$facmay,$facreg,$facest,$facea,$facpmin,$facpmx,$pswm,$aument,$nprecusa,'$fechaing',$usuario)",$conexionw);
echo "<script>alert('PRODUCTO AGREGADO');</script>";
}
?>
<script language="javascript" type="text/javascript">
confirma=confirm("DESEA AGREGAR OTRO PRODUCTO?");
if(confirma){
window.location='newproduct2.php';
}else{
window.close();
}
</script>