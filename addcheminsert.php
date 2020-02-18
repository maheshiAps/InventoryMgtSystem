<?php
session_start();
$user=$_SESSION['usernm'];

$status='1';

$adate=date('Y-m-d');
echo $user.$adate.$rstatus;
// include'dbcon.php';
$connect= new PDO("mysql:host=localhost;dbname=chem","root","");
$insert="INSERT INTO chemical(ChemName,Type,Qty,Emp,status,Datee) VALUES(:chem,:chemtype,:qty,:emp,:status,:datee)";


for($count = 0; $count<count($_POST['hidden_chem']); $count++)
{
	$data = array(
		':chem'	=>	$_POST['hidden_chem'][$count],
		':chemtype'	=>	$_POST['hidden_astype'][$count],
		':qty'	=>	$_POST['hidden_qty'][$count],		
		
		':emp'	=>	$user,
		':status'	=>	$status,
		':datee'	=>	$adate
		

	);
	var_dump($data);
	$statement = $connect->prepare($insert);
	$statement->execute($data);
}

?>
