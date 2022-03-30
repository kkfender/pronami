<?php

if(isset($_POST['edit'])==true)
{
	$staff_code=$_POST['staffcode'];
	header('Location:staff_edit.php?staffcode='.$staff_code);
	exit();
}

if(isset($_POST['delete'])==true)
{
	$staf_code=$_POST['stafcode'];
	header('Location:staff_delete.php?stafcode='.$staff_code);
	exit();
}
?>
