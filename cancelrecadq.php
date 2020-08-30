<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
	$cxx=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");	
	mssql_query("DELETE FROM ordencv2 WHERE idcompraventa=$orden",$cxx);
	mssql_query("DELETE FROM ordencv1 WHERE idcompraventa=$orden",$cxx);
	mssql_close($cxx);
	echo "<script>alert('Orden de Compra Cancelada')</script>";
	echo "<script>window.location='claudia.php'</script>";
?>			
	<?
	$pedi=$pedi;
	$cproc=$cproc;
	$canti=$canti;
	$serie=$serie;
	$idadq=$idadq;
	$code=$code;
	$conn=mssql_connect("SISTEMAS","","");
     mssql_select_db("baseDatos");
	 
	 /* Saco el ultimo valor del producto que inserte y le resto el mismo a cantidad entregada */
	 $resulta1=mssql_query("SELECT cantentregadadq FROM ordenadq2 WHERE idadquisicion=$idadq AND cod=$cproc",$conn);
	 $lafil=mssql_fetch_array($resulta1);
	 $laf=$lafil["cantenregadadq"];
	 $cantentregada=$laf-$canti;
	 
	 $resulta2=mssql_query("SELECT existencia FROM inventa2 WHERE cod=$cproc",$conn);
	 $lafil2=mssql_fetch_array($resulta2);
	 $laf2=$lafil2["existencia"];
	 $resta=$laf2-$cantentregada;
	 
	 /*empiezo a eliminar lo que acabo de insertar*/
	 mssql_query("DELETE FROM inventa2 WHERE cod=$cproc AND serial='$serie' AND numpedimento1='$pedi'",$cxx);
	 
	 /*actualizo el campo cantidad entregada*/
	 mssql_query("UPDATE ordenadq2 SET cantentregadadq=$cantentregada WHERE idadquisicion=$idadq AND cod=$cproc",$conn);
	 
	 /* actualizo el inventario insertando cada producto */	
	mssql_query("UPDATE inventa1 SET existencia=$resta WHERE cod=$cproc",$conn);
	
	mssql_query("UPDATE ordenadq1 SET statusadq='Entregado' WHERE idadquisicion=$idadq",$conn);
	
mssql_query("INSERT INTO receqpadq2(idreciboadq,cantrecibidaadq,cod,serial,comentrecadq,
	                      numpedimento3)
	                      VALUES($code,$canti,$cproc,'$serie','$comenta','$pedi')",$conn);	
		  
	$resuls=mssql_query("SELECT SUM(diferen) AS total
                    FROM ordenadq2 WHERE idadquisicion=$idadq",$conn);
     $g=mssql_fetch_array($resuls);
 $entregatotal=$g["total"];
 ?>
<? if($entregatotal == 0):
     mssql_query("UPDATE ordenadq1 SET statusadq='Entregado' WHERE idadquisicion=$idadq",$conn);
     echo "<script>alert('Orden de Adquisicion Completa');window.location='claudia.php'</script>";
     echo "<script>window.location='claudia.php'</script>";