<body>

<?php

try
{

$dsn = 'mysql:dbname=php;host=localhost;charset=utf8mb4';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT code, name, price FROM mst_product WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh = null;

print '商品一覧<br/>';
print '<form method="POST" action="pro_branch.php">';

while(true)
{
	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($rec == false)
	{
		break;
	}
	print '<input type="radio" name="procode" value="'.$rec['code'].'">';
	print $rec['name'].'---';
	print $rec['price'].'円';
	print '<br/>';
}

print '<input type="submit" name="disp" value="参照">';
print '<input type="submit" name="add" value="追加">';
print '<input type="submit" name="edit" value="修正">';
print '<input type="submit" name="delete" value="削除">';

print '</form>';
}
catch (Exception $e)
{
	print'障害中';
	exit();
}

?>