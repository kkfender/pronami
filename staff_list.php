<body>

<?php

try
{

$dsn = 'mysql:dbname=php;host=localhost;charset=utf8mb4';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT code, name FROM mst_staff WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh = null;

print 'スタッフ一覧<br/>';
print '<form method="POST" action="staff_branch.php">';

while(true)
{
	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($rec == false)
	{
		break;
	}
	print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
	print $rec['name'];
	print '<br/>';
}
print '<input type="submit" name="add"  value="追加">';
print '<input type="submit" name="edit"  value="修正">';
print '<input type="submit" name="delete"  value="削除">';


print '</form>';
}
catch (Exception $e)
{
	print'shogaichu';
	exit();
}

?>
