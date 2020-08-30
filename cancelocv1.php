<?
session_start();
if(!isset($_SESSION['cod']) AND !isset($_SESSION['administra']) AND !isset($_SESSION['pws'])){
session_destroy();
session_unset();
header("Location:salidas.php");
}
	$cxx=mssql_connect("SISTEMAS","","");
    mssql_select_db("baseDatos");	 

	mssql_query("UPDATE intentos2 SET idintento=0",$cxx);
	$reso=mssql_query("SELECT idcompraventa FROM ordencvcambios WHERE idcompraventa=$orden",$cxx);
	$fia=mssql_fetch_array($reso);
	$b1=$fia["idcompraventa"];	
		if($b1 == $orden){
			mssql_query("DELETE FROM ordencvcambios WHERE idcompraventa=$orden",$cxx); 
		}else if($b1 == ""){
			echo "<script>alert('PREPARANDO ELIMINACION')</script>";
		}else{
			echo "<script>alert('PREPARANDO ELIMINACION')</script>";
		}	
	
	mssql_query("DELETE FROM pagocv2 WHERE npagoc=$w",$cxx);
	mssql_query("DELETE FROM pagocv1 WHERE npagoc=$w AND idcompraventa=$orden",$cxx);
	mssql_query("DELETE FROM ordencv2 WHERE idcompraventa=$orden",$cxx);
	mssql_query("DELETE FROM ordencv1 WHERE idcompraventa=$orden",$cxx);
	//mssql_query("UPDATE bloqueacompra SET blockcompra='no' WHERE blockcompra='si'",$cxx);
	mssql_close($cxx);
	echo "<script>alert('Orden De Compra Cancelada')</script>";
	echo "<script>window.location='claudia.php'</script>";
?>			